@php
    $navCategories = \App\Models\Category::where(['status' => 1, 'show_at_nav' => 1])->get();
@endphp
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-md-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li><img src="Frontend/assets/img/icon/header_icon1.png" alt="">34ºc, Sunny </li>
                                    <li><img src="Frontend/assets/img/icon/header_icon1.png" alt="">Tuesday, 18th June,
                                        2019</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid d-none d-md-block">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-6 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="{{route('home')}}"><img src="{{asset('Frontend/assets/img/logo/logo.png')}}"
                                        alt=""></a>
                            </div>
                        </div>


                        @if (Auth::check())
                            <!--Hiển thị các thông tin khi đăng nhập-->
                            <div class="col-xl-6 col-lg-9 col-md-9">
                                <div class="dropdown d-flex justify-content-end">
                                    <button style="background: none;"
                                        class="dropdown-toggle border-0 d-flex align-items-center text-black" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <a style="color: #635c5c;" href="#">
                                            <p>Hi, {{ optional(Auth::user())->name }}</p>
                                            <!-- <i class="fa-solid fa-user"></i> -->
                                        </a>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @if (Auth::user()->role == '1')
                                            <li><a class="dropdown-item" href="{{route('categories')}}">Trang quản trị</a></li>
                                            <a class="dropdown-item" href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Đăng xuất
                                            </a>
                                        @else
                                            <a class="dropdown-item" href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Đăng xuất
                                            </a>
                                        @endif
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>


                                    </ul>
                                </div>
                            </div>
                            <!--Hiển thị các thông tin khi chưa đăng nhập-->
                        @else
                            <div class="col-xl-6 col-lg-9 col-md-9">
                                <div class="dropdown d-flex justify-content-end">
                                    <button style="background: none;"
                                        class="dropdown-toggle border-0 d-flex align-items-center text-black" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <a style="color: #635c5c;" href="#"
                                            onclick="window.location='{{ route('login') }}';">
                                            <i class="fa-solid fa-user"></i>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="index.html"><img src="Frontend/assets/img/logo/logo.png" alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        @foreach ($navCategories as $nav)
                                            <li>
                                                <a
                                                    href="{{ route('news', ['category' => $nav->slug])}}">{{ $nav->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <i class="fas fa-search special-tag"></i>
                                <div class="search-box">
                                    <form action="{{ route('news') }}" method="get">
                                        <input type="text" name="search" placeholder="Search"
                                            value="{{ request()->search }}">
                                        <button type="submit">Tìm kiếm</button>
                                    </form>
                                </div>

                            </div>

                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>