<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Danhmuc;
class DanhmucController extends Controller
{
    //lietke
    public function index (){
        $all = Danhmuc::all();//lay tat ca danh muc
        //truyen du lieu ra view
        return view('danhmuc.index',['all' => $all]);
    }
     //them
    public function add(){
        return view('danhmuc.form');
     }

     //luu
    public function save(Request $request){
        $data = [
            'name'=> $request->name,
            'slug' => Str::slug($request->name),
            'order'=>0,
            'status'=>'Active',
            'parent_id'=>0
        ];
        Danhmuc::create($data);
        return redirect()->route('danhmuc');
     }

    public function edit($id){
        $danhmuc = Danhmuc::find($id);
        return view('danhmuc.form',['danhmuc'=>$danhmuc]);
     }
    public function update(Request $request,$id){
        $data = [
            'name'=> $request->name,
            'slug' => Str::slug($request->name),
            //'order'=>0,
            //'status'=>'Active',
            //'parent_id'=>0
        ];
        Danhmuc::find($id)->update($data);
        return redirect()->route('danhmuc');
     }
     public function delete($id){
        Danhmuc::find($id)->delete();
        return redirect()->route('danhmuc');
     }
}
