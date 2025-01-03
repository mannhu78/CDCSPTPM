<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Thuonghieu;
class ThuonghieuController extends Controller
{
    //lietke
    public function index (){
        $all = Thuonghieu::all();//lay tat ca danh muc
        //truyen du lieu ra view
        return view('thuonghieu.index',['all' => $all]);
    }
     //them
    public function add(){
        return view('thuonghieu.form');
     }

     //luu
    public function save(Request $request){
        $data = [
            'name'=> $request->name,
            'slug' => Str::slug($request->name),
            'order'=>0,
            'status'=>'Active',
            'logo'=>'',
            'website'=>''
            
        ];
        Thuonghieu::create($data);
        return redirect()->route('thuonghieu');
     }

    public function edit($id){
        $thuonghieu = Thuonghieu::find($id);
        return view('thuonghieu.form',['thuonghieu'=>$thuonghieu]);
     }
    public function update(Request $request,$id){
        $data = [
            'name'=> $request->name,
            'slug' => Str::slug($request->name),
            //'order'=>0,
            //'status'=>'Active',
            //'parent_id'=>0
        ];
        Thuonghieu::find($id)->update($data);
        return redirect()->route('thuonghieu');
     }
     public function delete($id){
        Thuonghieu::find($id)->delete();
        return redirect()->route('thuonghieu');
     }
}
