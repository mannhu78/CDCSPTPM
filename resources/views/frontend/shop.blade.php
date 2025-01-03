
@extends('flayouts.master')

@section('noidung')

<!---- home page section -------->
<section id="page-header">
      <h2>Trang sản phẩm</h2>
      <p>Save more with coupons & up to 70% off!</p>
    </section>

    <!---- feature product section -------->
    <section id="product1" class="section-p1">
      <div class="danhmuc">
        <div class="title">Danh mục sản phẩm</div>
        <ul>
       @foreach($dmsps as $dmsp )
        <li><a href="{{route('sanphamtheodanhmuc', $dmsp->slug)}}">{{strtoupper($dmsp->name)}}</a></li>
       @endforeach
      </ul>
      </div>
      <div class="pro-container">
      @foreach($sanphams as $sanpham)
    <div class="pro" onClick="window.location.href='{{ route('chitietsanpham',$sanpham->slug)}}'">
        @if($sanpham->hinhanhs->count() > 0)
            <img src="{{ asset($sanpham->hinhanhs[0]->tenanh) }}" alt="">
        @else
            <img src="{{ asset('default-image.jpg') }}" alt="">
        @endif
        
          <div class="des">
            <span>{{$sanpham->danhmuc}}</span>
            <h5>{{$sanpham->name}}</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>{{$sanpham->gia}} VND</h4>
          </div>
          
          <a href="#" class="themvaogio" data-product-id="{{$sanpham->id}}" data-soluong="1"><i class="fa fa-shopping-cart cart"></i></a>
        </div>
@endforeach
       
      </div>
    </section>

    <!-- pagination  -->
    <section id="pagination" class="section-p1">
     {{$sanphams->links()}}
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
@push('scripts')
<script>
const all_themvaogios = document.querySelectorAll('.themvaogio');

all_themvaogios.forEach(bt => {
    bt.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();

        console.log(bt.dataset.productId);
        console.log(bt.dataset.soluong);

        axios.post("{{route('themVaoGiohang')}}", {
            sanpham_id: bt.dataset.productId,
            soluong: bt.dataset.soluong
        })
        .then(response => {
            console.log(response);

            document.querySelector('#tongsoluong').innerText=response.data.tongsoluong;
        });
    });
});
</script>


@endpush