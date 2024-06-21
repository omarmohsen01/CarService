@extends('layouts.front')
@section('content')
    <!-- Breadcrumb End -->
    <div style="margin-top: 110px" class="breadcrumb-option set-bg" data-setbg="{{ asset('front/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Spare Part Listing</h2>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            <span>Spare Part</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Begin -->
    <!-- Car Section Begin -->
    <section class="car spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="car__sidebar">
                        <div class="car__search">
                            <h5>Spare Part Search</h5>
                            <form action=" {{ URL::current() }} " method="get">
                                <input type="text" name="name" placeholder="Search...">
                                {{-- <button type="submit"><i class="fa fa-search"></i></button>
                            </form> --}}
                        </div>
                        <div class="car__filter">
                            <h5>Spare Part Filter</h5>
                            {{-- <form action="#"> --}}
                                <livewire:filter-model />

                                <select name="status">
                                    <option value="">Status</option>
                                    <option value="NEW">NEW</option>
                                    <option value="USED">USED</option>
                                    <option value="IMPORTATION">IMPORTATION</option>
                                </select>
                                <div class="car__filter__btn">
                                    <button type="submit" class="site-btn">Reset FIlter</button>
                                </div>
                                {{-- </form> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="car__filter__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="car__filter__option__item">
                                    <h6>Show On Page</h6>
                                    <select name="paginate">
                                        <option value="9">9 Car</option>
                                        <option value="15">15 Car</option>
                                        <option value="20">20 Car</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="car__filter__option__item car__filter__option__item--right">
                                    <h6>Sort By</h6>
                                    <select name='price'>
                                        <option value="desc">Price: Highest Fist</option>
                                        <option value="asc">Price: Lowest Fist</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="row">
                        @foreach ($spare_parts as $spare_part)
                            @php
                                $images = json_decode($spare_part->images);
                            @endphp
                            <div class="col-lg-4 col-md-4">
                                <div class="car__item">
                                    <div class="car__item__pic__slider owl-carousel">
                                        @foreach ($images as $image)
                                            <img height="263px" src="{{ asset('storage/' . $image) }}" alt="">
                                        @endforeach
                                    </div>
                                    <div class="car__item__text">
                                        <div class="car__item__text__inner">
                                            <div class="label-date">{{ $spare_part->production_date }}</div>
                                            <div class="label-date">{{ $spare_part->status }}</div>
                                            <h5><a href="{{ route('sapre-part.show',$spare_part->id) }}">{{ $spare_part->name }}</a></h5>
                                            <ul>
                                                <li><span>{{ $spare_part->quantity }}</span> Peace</li>
                                                <li><span>{{ $spare_part->quantity }}</span> Peace</li>
                                                <li>For <span>{{ $spare_part->brand->name }}</span></li>
                                                <li><span>{{ $spare_part->sold_out }}</span> Sold</li>
                                            </ul>
                                        </div>
                                        <div class="car__item__price">
                                            <span>
                                                <form method="POST" action="{{ route('cart.add_to_cart',$spare_part->id) }}">
                                                    @csrf
                                                    <button type="submit" class="primary-btn">Add To Cart</button>
                                                </form>
                                                {{-- <a href="" class="primary-btn">Add To Cart</a> --}}
                                                <h6>${{ number_format($spare_part->price, 2) }}</h6>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="pagination__option">
                        {{-- <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><span class="arrow_carrot-2right"></span></a> --}}
                        {{ $spare_parts->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Car Section End -->
@endsection
