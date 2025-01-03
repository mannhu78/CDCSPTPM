<?php

namespace App\Http\Controllers;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\DanhmucController;
use App\Models\Sanpham;
use App\Models\Danhmuc;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function home(){
    return view('frontend/index');
   }
   public function shop()
{
   $dmsps =Danhmuc::orderBy('order','ASC')->get();
    $sanphams = Sanpham::with('hinhanhs') // Nạp quan hệ 'hinhanhs'
        ->orderBy('created_at', 'DESC')
        ->paginate(16);
    return view('frontend.shop', ['sanphams' => $sanphams,'dmsps' => $dmsps]);
}
      public function sanphamtheodanhmuc($slug){
         $dmsps =Danhmuc::orderBy('order','ASC')->get();
         //$sanphams = Sanpham::where('slug','=',$slug)->orderBy('created_at', 'DESC') ->paginate(16); // Nạp quan hệ 'hinhanhs'
        $danhmuc_id=Danhmuc::where('slug',$slug)->pluck('id');
        $sanphams = Sanpham::where('danhmuc_id','=',$danhmuc_id)->orderBy('created_at', 'DESC') ->paginate(16);
       
    return view('frontend.shop', ['sanphams' => $sanphams,'dmsps' => $dmsps]);
      }
      public function chitietsanpham($slug){
         $dmsps =Danhmuc::orderBy('order','ASC')->get();
         $sanpham = Sanpham::where('slug','=',$slug)->first();
         return view('frontend/sanpham',['sanpham'=>$sanpham,'dmsps' => $dmsps]);
      }
     public function blog(){
      return view('frontend/blog');
     }
     public function about(){
      return view('frontend/about');
     }
     public function contact(){
      return view('frontend/contact');
     }
     public function cart(){
      return view('frontend/cart');
     }
}

