{{-- <div id="preloder">
    <div class="loader"></div>
</div> --}}

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__widget">
        <a href="#"><i class="fa fa-cart-plus"></i></a>
        <a href="#" class="search-switch"><i class="fa fa-search"></i></a>
        <a href="#" class="primary-btn">Add Car</a>
    </div>
    <div class="offcanvas__logo">
        <a href="{{ route('home') }}"><img src="{{ asset('front/img/l.png') }}" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <ul class="offcanvas__widget__add">
        <li><i class="fa fa-clock-o"></i> Week day: 08:00 am to 18:00 pm</li>
        <li><i class="fa fa-envelope-o"></i> Info.colorlib@gmail.com</li>
    </ul>
    <div class="offcanvas__phone__num">
        <i class="fa fa-phone"></i>
        <span>(+12) 345 678 910</span>
    </div>
    <div class="offcanvas__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-google"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header"
style="
    position: fixed;
    top: 0;
    left: 0;
    background: white;
    z-index: 122515515;
    width: 100%;
    box-shadow: 0px 0px 10px #ccc
"
>
    {{-- <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <ul class="header__top__widget">
                        <li><i class="fa fa-clock-o"></i> Week day: 08:00 am to 18:00 pm</li>
                        <li><i class="fa fa-envelope-o"></i> Info.colorlib@gmail.com</li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="header__top__right">
                        <div class="header__top__phone">
                            <i class="fa fa-phone"></i>
                            <span>(+12) 345 678 910</span>
                        </div>
                        <div class="header__top__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('front/img/l.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-auto">
                <div class="header__nav">
                    <nav class="header__menu">
                        <ul>
                            <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                            <li class="{{ request()->routeIs('sapre-parts.index') ? 'active' : '' }}"><a href="{{ route('sapre-parts.index') }}">Spare Parts</a></li>
                            <li class="{{ request()->routeIs('posts.index') ? 'active' : '' }}"><a href="{{ route('posts.index') }}">Social Media</a></li>
                            {{-- <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./about.html">About Us</a></li>
                                    <li><a href="./car-details.html">Car Details</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> --}}
                            <li class="{{ request()->routeIs('car_tuning.index') ? 'active' : '' }}"><a href="{{ route('car_tuning.index') }}">Car Tuning Service</a></li>
                            <li class="{{ request()->routeIs('about.index') ? 'active' : '' }}"><a href="{{ route('about.index') }}">About</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
            <div class="col-auto"
            style="margin-left: auto"
            >
                <div class="header__nav__widget d-flex">
                    <div class="header__nav__widget__btn d-flex align-items-center">
                        <a href="{{ route('cart.index') }}"><i class="fa fa-cart-plus"></i></a>
                        {{-- <a href="#" class="search-switch"><i class="fa fa-search"></i></a> --}}
                    </div>
                    {{-- <a href="#" style="border-radius: 16px;" class="primary-btn">Find Nearest Mechanic</a> --}}
                    {{-- @if (request()->routeIs('cart')) --}}
                        @auth
                            <nav class="header__menu" style="margin-left: 22px">
                                <ul>
                                    <li><a href="#">{{ auth()->user()->first_name }}</a>
                                        <ul class="dropdown">
                                            <li><a href="./about.html">Profile</a></li>
                                            <li>
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button
                                                    style="background: none;
                                                    border: none;
                                                    text-decoration: none;
                                                    cursor: pointer;
                                                    color:white;
                                                    font-size: inherit;
                                                    padding: 0;
                                                    margin-left:17px"
                                                    type="submit" class="link-button">LogOut</button>
                                                </form>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        @endauth
                    {{-- @endif --}}
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <span class="fa fa-bars"></span>
        </div>
    </div>
</header>
<!-- Header Section End -->
