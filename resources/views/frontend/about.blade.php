
@extends('flayouts.master')

@section('noidung')

 <!---- home page section -------->
 <section id="page-header" class="about-header">
      <h2>Giới thiệu</h2>
      <p>Về chúng tôi</p>
    </section>

    <section id="about-head" class="section-p1">
      <img src="img/about/a6.jpg" alt="" />
      <div>
        <h2>Về chúng tôi</h2>
        <p>
        Chúng tôi là Cara, đơn vị chuyên cung cấp các sản phẩm văn phòng phẩm chất lượng cao, đa dạng mẫu mã và giá cả cạnh tranh. Với sứ mệnh mang đến những giải pháp văn phòng hiệu quả, chúng tôi cam kết đem đến cho khách hàng sự hài lòng tuyệt đối.


        </p>
        <abbr title=""
          >Tại sao chọn chúng tôi?<br>

            Sản phẩm chính hãng, chất lượng đảm bảo <br>
            Giá cả cạnh tranh, nhiều chương trình khuyến mãi<br>
            Giao hàng nhanh chóng, miễn phí vận chuyển<br>
            Đội ngũ nhân viên chuyên nghiệp, tư vấn nhiệt tình</abbr
        >
        <marquee behavior="" direction="" bgcolor="#ccc" loop="-1">
        Văn phòng phẩm Cara: Chất lượng, tiện lợi, giá tốt.
        </marquee>
      </div>
    </section>

    <!---- feature section -------->
    <section id="feature" class="section-p1">
      <div class="fe-box">
        <img src="./img/features/f1.png" alt="" />
        <h6>Free Shipping</h6>
      </div>
      <div class="fe-box">
        <img src="./img/features/f2.png" alt="" />
        <h6>Online Order</h6>
      </div>
      <div class="fe-box">
        <img src="./img/features/f3.png" alt="" />
        <h6>Save Money</h6>
      </div>
      <div class="fe-box">
        <img src="./img/features/f4.png" alt="" />
        <h6>Promotions</h6>
      </div>
      <div class="fe-box">
        <img src="./img/features/f5.png" alt="" />
        <h6>Happy Sell</h6>
      </div>
      <div class="fe-box">
        <img src="./img/features/f6.png" alt="" />
        <h6>F24/7 Supper</h6>
      </div>
    </section>

    <!---- newletter section start -->

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