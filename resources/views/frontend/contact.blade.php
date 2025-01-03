
@extends('flayouts.master')

@section('noidung')

 <!---- home page section -------->
 <section id="page-header" class="about-header">
      <h2>Liên hệ</h2>
      <p>Hãy liên hệ với chúng tôi - Rất vui nhận được phản hồi từ các bạn</p>
    </section>

    <section id="contact-details" class="section-p1">
      <div class="details">
        <span>Liên hệ</span>
        <h2>Địa chỉ</h2>
        <ul>
          <li>
            <i class="fa fa-map"></i>
            <p>300A – Nguyễn Tất Thành, Phường 13, Quận 4, TP. Hồ Chí Minh (Trụ sở chính)</p>
          </li>
          <li>
            <i class="fa fa-envelope"></i>
            <p>331 - Quốc lộ 1A, Phường An Phú Đông, Quận 12, TP. Hồ Chí Minh (Trụ sở Quận 12)</p>
          </li>
          
          <li>
            <i class="fa fa-clock"></i>
            <p>Từ thứ 2 đến Chủ nhật - 9h sáng đến 18h tối</p>
          </li>
        </ul>
      </div>

      <div class="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.365133865779!2d106.69204877377605!3d10.859808157652745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529c17978287d%3A0xec48f5a17b7d5741!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBOZ3V54buFbiBU4bqldCBUaMOgbmggLSBDxqEgc-G7nyBxdeG6rW4gMTI!5e0!3m2!1svi!2s!4v1735811216256!5m2!1svi!2s"
          width="600"
          height="450"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </section>
    <!---- newletter section start -->

    <!-- form contact -->
    <section id="form-contact">
      <form action="">
        <span>Gởi tin nhắn đến chúng tôi</span>
        <h2>Rất vui khi nhận phản hồi từ bạn</h2>
        <input type="text" placeholder="Tên của bạn" />
        <input type="text" placeholder="Email" />
        <input type="text" placeholder="Tiêu đề" />
        <textarea placeholder="Nội dung gởi" cols="30" rows="10"></textarea>
        <button>Gởi phản hồi</button>
      </form>

      <div class="people">
        <div>
          
          <p>
            <span>Mẫn Như</span> Dev in FullStack
            <br />
            Phone: 0123456789
            <br />
            Email: mannhu@gji.com
          </p>
        </div>

        <div>
         
          <p>
            <span>Thành Nhân</span> Dev in FullStack
            <br />
            Phone: 012345678
            <br />
            Email: pnat@gji.com
          </p>
        </div>

       
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