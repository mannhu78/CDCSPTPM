
@extends('flayouts.master')

@section('noidung')

<!---- home page section -------->
<section id="page-header" class="blog-header">
      <h2>Trang tin tức</h2>
      <p>Save more with coupons & up to 70% off!</p>
    </section>

    <section id="blog">
      <div class="blog-box">
        <div class="blog-img">
          <img src="img/blog/b1.jpg" alt="" />
        </div>
        <div class="blog-details">
          <h4>Top 5 loại bút bi viết êm nhất.</h4>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt
            earum aliquam saepe alias praesentium quos sit repudiandae omnis
            rerum est?
          </p>
          <a href="#">Xem chi tiết</a>
        </div>
        <h1>19/05/2025</h1>
      </div>

      <div class="blog-box">
        <div class="blog-img">
          <img src="img/blog/b1.jpg" alt="" />
        </div>
        <div class="blog-details">
          <h4>Cách chọn giấy A4 phù hợp với máy in</h4>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt
            earum aliquam saepe alias praesentium quos sit repudiandae omnis
            rerum est?
          </p>
          <a href="#">Xem chi tiết</a>
        </div>
        <h1>19/05/2025</h1>
      </div>

      <div class="blog-box">
        <div class="blog-img">
          <img src="img/blog/b1.jpg" alt="" />
        </div>
        <div class="blog-details">
          <h4>Bí quyết sắp xếp văn phòng gọn gàng</h4>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt
            earum aliquam saepe alias praesentium quos sit repudiandae omnis
            rerum est?
          </p>
          <a href="#">Xem chi tiết</a>
        </div>
        <h1>19/05/2025</h1>
      </div>

      <div class="blog-box">
        <div class="blog-img">
          <img src="img/blog/b1.jpg" alt="" />
        </div>
        <div class="blog-details">
          <h4>Những món quà tặng văn phòng ý nghĩa</h4>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt
            earum aliquam saepe alias praesentium quos sit repudiandae omnis
            rerum est?
          </p>
          <a href="#">Xem chi tiết</a>
        </div>
        <h1>19/05/2025</h1>
      </div>

    
    </section>
    <!-- pagination  -->
    <section id="pagination" class="section-p1">
      <a href="#">1</a>
      <a href="#">2</a>
      <a href="#">3</a>
      <a href="#"><i class="fa fa-long-arrow-alt-right"></i></a>
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