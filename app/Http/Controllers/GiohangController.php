<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GiohangController extends Controller
{
    public function index(){

    }
    public function themVaoGiohang(Request $request){
        $sanpham_id =$request->sanpham_id;
        $soluong=$request->soluong;

        $sanpham=Sanpham::find($sanpham_id);
        if($sanpham==null){
            return response()->json([
                'error'=>'Sản phẩm không tìm thấy'
            ],404);
        }

        $giohang =session()->get('cart',[]);
        //[maSP1: ['id'=>1=>'name'=>....,'soluong'=>30],'maSP4':['id'=>4,....,'soluong'=>20]]
        if(isset($giohang[$sanpham_id])){
            $giohang[$sanpham_id]['soluong']+=$soluong;
        }else{
            $giohang[$sanpham_id]=[
                'id'=>$sanpham->id,
                'name'=>$sanpham->name,
                'gia'=>$sanpham->gia,
                'soluong'=>$soluong,
                'anh'=>$sanpham->hinhanhs[0]->tenanh
            ];
        }
        session()->put('cart',$giohang);

        $tongsoluong=0;
        foreach($giohang as $item){
            $tongsoluong+=$item['soluong'];

        }
        return response()->json(['message'=>'Cart updated','tongsoluong'=>$tongsoluong],200);
    }
    public function xoaPhantu(Request $request)
{
    // Kiểm tra xem có nhận được ID sản phẩm cần xóa không
    if ($request->id) {
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart');

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if (isset($cart[$request->id])) {
            // Xóa sản phẩm khỏi giỏ hàng
            unset($cart[$request->id]);

            // Cập nhật lại giỏ hàng trong session
            session()->put('cart', $cart);

            // Hiển thị thông báo thành công
            session()->flash('success', 'Product successfully deleted.');
        }
    }
}
}
