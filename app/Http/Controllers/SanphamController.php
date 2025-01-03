<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Thuonghieu;
use App\Models\Sanpham;
use App\Models\Danhmuc;
use App\Models\HinhanhSanpham;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SanphamImportClass;
use Illuminate\Support\Facades\DB;


use DataTables;

class SanphamController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            //$products = Sanpham::latest()->get();
            $products = Sanpham::query()
            
            ->join('danhmucs','danhmucs.id','=','sanphams.danhmuc_id')
            ->join('thuonghieus','thuonghieus.id','=','sanphams.thuonghieu_id')
            ->select([
                'sanphams.id as id',
                'sanphams.name as sname',
                'sanphams.price as price',
                'danhmucs.name as dname',
                'thuonghieus.name as tname'
            ]);
            return DataTables::of($products)
                ->addIndexColumn()
                ->addColumn('action', function ($product) {
                    $btn = '
                        <a href="' . route('sanpham.view', $product->id) . '" 
                        class="btn btn-info"><i class="fas fa-eye"></i></a>
                        
                        <a href="' . route('sanpham.edit', $product->id) . '" 
                        class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        
                        <a href="' . route('sanpham.delete', $product->id) . '" 
                        class="btn btn-danger" ><i class="fas fa-trash"></i></a>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('sanpham.index');
    }
    public function view($id){}

    public function add()
    {
        $danhmucs = Danhmuc::get();
        $thuonghieus = Thuonghieu::get();
        return view('sanpham.form', ['danhmucs' => $danhmucs,'thuonghieus'=>$thuonghieus]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'images.*'=>'image | mimes:png,jpg,jpeg,webp'
        ]);
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'danhmuc_id' => $request->danhmuc_id,
            'thuonghieu_id' => $request->thuonghieu_id,
            'price'=> $request->price,
            'description'=>$request->description,
            'content'=>$request->content,
            'status'=>'Active'
        ];

        $newsp = Sanpham::create($data);
        $anhData = [];
         if($files = $request->file('images')){
            foreach($files as $key=>$file){
                $duoifile=$file->getClientOriginalExtension();
                $tenfile = $key . '-' .time() . '.' .$duoifile;
                $path="upload/sanpham";
                $file->move($path,$tenfile);
                $tmp=[
                    'sanpham_id'=> $newsp->id,
                    'tenanh' => $path . '/' . $tenfile,
                ];
                $anhData[]=$tmp;
            }
            if (!empty($anhData)) {
                HinhanhSanpham::insert($anhData);
            }
            
         }

        return redirect()->route('sanpham');
    }

    public function edit($id)
    {
        $sanpham = Sanpham::find($id);
        $danhmucs = Danhmuc::get();
        $thuonghieus = Thuonghieu::get();

        $anhs = HinhanhSanpham::where('sanpham_id','=',$id)->get();
        return view('sanpham.form', ['sanpham' => $sanpham, 'danhmucs' => $danhmucs,'thuonghieus'=>$thuonghieus,'anhs'=>$anhs ]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'danhmuc_id' => $request->danhmuc_id,
            'thuonghieu_id' => $request->thuonghieu_id,
            'price'=> $request->price
        ];

        Sanpham::find($id)->update($data);

        $anhData = [];
         if($files = $request->file('images')){

            $anhs = HinhanhSanpham::where('sanpham_id','=',$id)->get();
            foreach($anhs as $anh){
                if(File::exists($anh-> tenanh)){
                    File::delete($anh-> tenanh);
                }
                $anh->delete();
            }
            foreach($files as $key=>$file){
                $duoifile=$file->getClientOriginalExtension();
                $tenfile = $key . '-' .time() . '.' .$duoifile;
                $path="upload/sanpham";
                $file->move($path,$tenfile);
                $tmp = [
                    'sanpham_id' => $id,
                    'tenanh' => $path . '/' . $tenfile, // Thêm dấu '/' giữa $path và $tenfile
                ];
                
                $anhData[]=$tmp;
            }
            if (!empty($anhData)) {
                HinhanhSanpham::insert($anhData);
            }
            
        }

        return redirect()->route('sanpham');
    }

    public function delete($id)
    {
        Sanpham::find($id)->delete();

        return redirect()->route('sanpham');
    }

    public function import() {
        return view('sanpham.import');
    }
    
    
    public function importsave(Request $request)
{
    // Validate dữ liệu
    $request->validate([
        'file_excel' => 'required|mimes:xlsx,xls',
        'anhs' => 'required|array', // Đảm bảo `anhs` là mảng
        'anhs.*' => 'mimes:jpg,jpeg,png|max:2048', // Validate từng file
    ]);

    DB::beginTransaction();

    try {
        // Xử lý file Excel
        $excel_file = $request->file('file_excel');
        Excel::import(new SanphamImportClass, $excel_file);

        // Lấy sản phẩm mới nhất
        $sanpham = Sanpham::latest()->first();
        if (!$sanpham) {
            throw new Exception('Không tìm thấy sản phẩm từ file Excel.');
        }
        $id = $sanpham->id;

        // Xử lý hình ảnh
        if ($files = $request->file('anhs')) {
            foreach ($files as $file) {
                $tenfile = $file->getClientOriginalName();
                $path = 'upload/sanpham';
                $file->move(public_path($path), $tenfile);

                // Lưu thông tin ảnh
                HinhanhSanpham::create([
                    'sanpham_id' => $id,
                    'tenanh' => $path . '/' . $tenfile,
                ]);
            }
        }

        DB::commit();
        return back()->with('success', 'Dữ liệu và hình ảnh đã được tải lên thành công!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
    }
}

    
    
}