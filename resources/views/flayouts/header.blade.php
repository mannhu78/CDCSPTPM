<section id="header">
        <a href="#"><img src="{{asset('img/logo.png')}}" class="logo" alt=""></a>

        <div>
        @php
            $tongsoluong = 0;
@endphp
            @if (session('cart')) 
                 @foreach (session('cart') as $item) 
                 @php
                 $tongsoluong += $item['soluong'];
                 @endphp
            @endforeach
            @endif
      
    



            <ul id="navbar">
                <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{route('home')}}">Home</a></li>
                <li><a class="{{ request()->routeIs('shop') ? 'active' : '' }}"href="{{route('shop')}}">Shop</a></li>
                <li><a class="{{ request()->routeIs('blog') ? 'active' : '' }}"href="{{route('blog')}}">Blog</a></li>
                <li><a class="{{ request()->routeIs('about') ? 'active' : '' }}"href="{{route('about')}}">About</a></li>
                <li><a class="{{ request()->routeIs('contact') ? 'active' : '' }}"href="{{route('contact')}}">Contact</a></li>
                <li id="lg-bag">
                    <a class="{{ request()->routeIs('cart') ? 'active' : '' }}"href="{{route('cart')}}">
                        <i class="fas fa-shopping-bag"></i></a></li>
                <a href="#" id="close"><i class="fas fa-times"></i>
               <span id="tongsoluong"> {{$tongsoluong}}</span>
            </a>
            </ul>
        </div>
        <div id="mobile">
            <a class="{{ request()->routeIs('cart') ? 'active' : '' }}"href="{{route('cart')}}"><i class="fas fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>