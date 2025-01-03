
@extends('flayouts.master')

@section('noidung')

<!---- home page section -------->
<section id="page-header" class="about-header">
      <h2>Giỏ hàng</h2>
    </section>

    <section id="cart" class="section-p1">
      <table width="100%">
        <thead>
          <tr>
            <th>Xóa</th>
            <th>Ảnh</th>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
          </tr>
        </thead>
        <tbody>
        @php $total = 0 @endphp
          @if(session('cart'))
          @foreach (session('cart') as $id => $sanpham)
          <tr>
              <td><i class="fa fa-times-circle"></i></td>
              <td><img src="asset()" alt="" /></td>
              <td>{{$sanpham['name']}}</td>
              <td>{{ $sanpham ["gia"]}} VNĐ</td>
              <td><input type="number" value="1" /></td>
              <td>{{ $sanpham ["gia"] * $sanpham["soluong"]}}</td>
          </tr>
        @endforeach
        @endif
        </tbody>
      </table>
    </section>

    <section id="cart-add" class="section-p1">
      <div id="coupon">
        <h3>Mã giảm giá</h3>
        <div>
          <input type="text" placeholder="Nhập mã giảm giá" />
          <button class="normal">Áp dụng</button>
        </div>
      </div>

      <div id="subtotal">
        <h3>Cart Totals</h3>
        <table>
          <tr>
            <td>Tổng tiền:</td>
            <td>499.000 VNĐ</td>
          </tr>
          <tr>
            <td>Vận chuyển:</td>
            <td>Miễn phí</td>
          </tr>
          <tr>
            <td><strong>Tiền thanh toán:</strong></td>
            <td><strong>499.000 VNĐ</strong></td>
          </tr>
        </table>

        <button class="normal">Tiến hành thanh toán</button>
      </div>
    </section>
    <section id="newsletter" class="section-p1 section-m1">
      <div class="newstext">
        <h4>Sign Up For Newsletters</h4>
        <p>
          Get Email updates about our latest shop and
          <span>special offers.</span>
        </p>
      </div>
      <div class="form">
        <input type="text" placeholder="Your email address" />
        <button class="normal">Sign Up</button>
      </div>
    </section>


@endsection