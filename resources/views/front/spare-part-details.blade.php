@extends('layouts.front')
@section('content')
<style>
    .add-cart-btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    background-color: #db2d2e; /* Change this to your desired color */
    border: none;
    border-radius: 5px;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.add-cart-btn:hover {
    background-color: #840000; /* Change this to a darker shade of your desired color */
}

.add-cart-btn i {
    margin-right: 5px; /* Adjust spacing between the icon and text */
}

</style>
<div style="margin-top: 110px"  class="breadcrumb-option set-bg" data-setbg="{{ asset('front/img/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{ $spare_part->name }}</h2>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ route('sapre-parts.index') }}">Spare Part Listing</a>
                        <span>{{ $spare_part->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Begin -->

<!-- Car Details Section Begin -->
<section class="car-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="car__details__pic">
                    <div class="car__details__pic__large">
                        <img class="car-big-img" src="img/cars/details/cd-1.jpg" alt="">
                    </div>
                    <div class="car-thumbs">
                        <div class="car-thumbs-track car__thumb__slider owl-carousel">
                            @php
                                $images=json_decode($spare_part->images);
                            @endphp
                            @foreach ($images as $image)
                                <div class="ct" style="height: 30%" data-imgbigurl="{{ asset('storage/'.$image) }}"><img
                                    src="{{ asset('storage/'.$image) }}" style="height: 209px;" alt=""></div>
                            @endforeach
                            {{-- <div class="ct" data-imgbigurl="img/cars/details/cd-2.jpg"><img
                                    src="img/cars/details/sm-1.jpg" alt=""></div>
                            <div class="ct" data-imgbigurl="img/cars/details/cd-3.jpg"><img
                                    src="img/cars/details/sm-2.jpg" alt=""></div>
                            <div class="ct" data-imgbigurl="img/cars/details/cd-4.jpg"><img
                                    src="img/cars/details/sm-3.jpg" alt=""></div>
                            <div class="ct" data-imgbigurl="img/cars/details/cd-5.jpg"><img
                                    src="img/cars/details/sm-4.jpg" alt=""></div>
                            <div class="ct" data-imgbigurl="img/cars/details/cd-6.jpg"><img
                                    src="img/cars/details/sm-5.jpg" alt=""></div> --}}
                        </div>
                    </div>
                </div>
                <div class="car__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Vehicle
                                Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Technical</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Features & Options</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">Vehicle Location</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="car__details__tab__info">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="car__details__tab__info__item">
                                            <h5>General Information</h5>
                                            <ul>
                                                <li><i class="fa fa-check"></i> Pellentesque lacus urna, feugiat non
                                                    consectetur nec</li>
                                                <li><i class="fa fa-check"></i> Aliquam sem neque, efficitur atero
                                                    lectus vitae.</li>
                                                <li><i class="fa fa-check"></i> Pellentesque erat libero, eleifend
                                                    sit amet felis ido.</li>
                                                <li><i class="fa fa-check"></i> Maecenas eget consectetur quam.
                                                    Vestibulum ligula.</li>
                                                <li><i class="fa fa-check"></i> Praesent lorem sapien, vestibulum
                                                    eget aliquet et.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="car__details__tab__info__item">
                                            <h5>General Information</h5>
                                            <ul>
                                                <li><i class="fa fa-check"></i> Pellentesque lacus urna, feugiat non
                                                    consectetur nec</li>
                                                <li><i class="fa fa-check"></i> Aliquam sem neque, efficitur atero
                                                    lectus vitae.</li>
                                                <li><i class="fa fa-check"></i> Pellentesque erat libero, eleifend
                                                    sit amet felis ido.</li>
                                                <li><i class="fa fa-check"></i> Maecenas eget consectetur quam.
                                                    Vestibulum ligula.</li>
                                                <li><i class="fa fa-check"></i> Praesent lorem sapien, vestibulum
                                                    eget aliquet et.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="car__details__tab__feature">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="car__details__tab__feature__item">
                                            <h5>Interior Design</h5>
                                            <ul>
                                                <li><i class="fa fa-check-circle"></i> Auxiliary heating</li>
                                                <li><i class="fa fa-check-circle"></i> Bluetooth</li>
                                                <li><i class="fa fa-check-circle"></i> CD player</li>
                                                <li><i class="fa fa-check-circle"></i> Central locking</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="car__details__tab__feature__item">
                                            <h5>Safety Design</h5>
                                            <ul>
                                                <li><i class="fa fa-check-circle"></i> Head-up display</li>
                                                <li><i class="fa fa-check-circle"></i> MP3 interface</li>
                                                <li><i class="fa fa-check-circle"></i> Navigation system</li>
                                                <li><i class="fa fa-check-circle"></i> Panoramic roof</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="car__details__tab__feature__item">
                                            <h5>Extra Design</h5>
                                            <ul>
                                                <li><i class="fa fa-check-circle"></i> Alloy wheels</li>
                                                <li><i class="fa fa-check-circle"></i> Electric side mirror</li>
                                                <li><i class="fa fa-check-circle"></i> Sports package</li>
                                                <li><i class="fa fa-check-circle"></i> Sports suspension</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="car__details__tab__feature__item">
                                            <h5>Extra Design</h5>
                                            <ul>
                                                <li><i class="fa fa-check-circle"></i> MP3 interface</li>
                                                <li><i class="fa fa-check-circle"></i> Navigation system</li>
                                                <li><i class="fa fa-check-circle"></i> Panoramic roof</li>
                                                <li><i class="fa fa-check-circle"></i> Parking sensors</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="car__details__tab__info">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="car__details__tab__info__item">
                                            <h5>General Information2</h5>
                                            <ul>
                                                <li><i class="fa fa-check"></i> Pellentesque lacus urna, feugiat non
                                                    consectetur nec</li>
                                                <li><i class="fa fa-check"></i> Aliquam sem neque, efficitur atero
                                                    lectus vitae.</li>
                                                <li><i class="fa fa-check"></i> Pellentesque erat libero, eleifend
                                                    sit amet felis ido.</li>
                                                <li><i class="fa fa-check"></i> Maecenas eget consectetur quam.
                                                    Vestibulum ligula.</li>
                                                <li><i class="fa fa-check"></i> Praesent lorem sapien, vestibulum
                                                    eget aliquet et.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="car__details__tab__info__item">
                                            <h5>General Information</h5>
                                            <ul>
                                                <li><i class="fa fa-check"></i> Pellentesque lacus urna, feugiat non
                                                    consectetur nec</li>
                                                <li><i class="fa fa-check"></i> Aliquam sem neque, efficitur atero
                                                    lectus vitae.</li>
                                                <li><i class="fa fa-check"></i> Pellentesque erat libero, eleifend
                                                    sit amet felis ido.</li>
                                                <li><i class="fa fa-check"></i> Maecenas eget consectetur quam.
                                                    Vestibulum ligula.</li>
                                                <li><i class="fa fa-check"></i> Praesent lorem sapien, vestibulum
                                                    eget aliquet et.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="car__details__tab__feature">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="car__details__tab__feature__item">
                                            <h5>Interior Design</h5>
                                            <ul>
                                                <li><i class="fa fa-check-circle"></i> Auxiliary heating</li>
                                                <li><i class="fa fa-check-circle"></i> Bluetooth</li>
                                                <li><i class="fa fa-check-circle"></i> CD player</li>
                                                <li><i class="fa fa-check-circle"></i> Central locking</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="car__details__tab__feature__item">
                                            <h5>Safety Design</h5>
                                            <ul>
                                                <li><i class="fa fa-check-circle"></i> Head-up display</li>
                                                <li><i class="fa fa-check-circle"></i> MP3 interface</li>
                                                <li><i class="fa fa-check-circle"></i> Navigation system</li>
                                                <li><i class="fa fa-check-circle"></i> Panoramic roof</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="car__details__tab__feature__item">
                                            <h5>Extra Design</h5>
                                            <ul>
                                                <li><i class="fa fa-check-circle"></i> Alloy wheels</li>
                                                <li><i class="fa fa-check-circle"></i> Electric side mirror</li>
                                                <li><i class="fa fa-check-circle"></i> Sports package</li>
                                                <li><i class="fa fa-check-circle"></i> Sports suspension</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="car__details__tab__feature__item">
                                            <h5>Extra Design</h5>
                                            <ul>
                                                <li><i class="fa fa-check-circle"></i> MP3 interface</li>
                                                <li><i class="fa fa-check-circle"></i> Navigation system</li>
                                                <li><i class="fa fa-check-circle"></i> Panoramic roof</li>
                                                <li><i class="fa fa-check-circle"></i> Parking sensors</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="car__details__tab__info">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="car__details__tab__info__item">
                                            <h5>General Information3</h5>
                                            <ul>
                                                <li><i class="fa fa-check"></i> Pellentesque lacus urna, feugiat non
                                                    consectetur nec</li>
                                                <li><i class="fa fa-check"></i> Aliquam sem neque, efficitur atero
                                                    lectus vitae.</li>
                                                <li><i class="fa fa-check"></i> Pellentesque erat libero, eleifend
                                                    sit amet felis ido.</li>
                                                <li><i class="fa fa-check"></i> Maecenas eget consectetur quam.
                                                    Vestibulum ligula.</li>
                                                <li><i class="fa fa-check"></i> Praesent lorem sapien, vestibulum
                                                    eget aliquet et.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="car__details__tab__info__item">
                                            <h5>General Information</h5>
                                            <ul>
                                                <li><i class="fa fa-check"></i> Pellentesque lacus urna, feugiat non
                                                    consectetur nec</li>
                                                <li><i class="fa fa-check"></i> Aliquam sem neque, efficitur atero
                                                    lectus vitae.</li>
                                                <li><i class="fa fa-check"></i> Pellentesque erat libero, eleifend
                                                    sit amet felis ido.</li>
                                                <li><i class="fa fa-check"></i> Maecenas eget consectetur quam.
                                                    Vestibulum ligula.</li>
                                                <li><i class="fa fa-check"></i> Praesent lorem sapien, vestibulum
                                                    eget aliquet et.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="car__details__tab__feature">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="car__details__tab__feature__item">
                                            <h5>Interior Design</h5>
                                            <ul>
                                                <li><i class="fa fa-check-circle"></i> Auxiliary heating</li>
                                                <li><i class="fa fa-check-circle"></i> Bluetooth</li>
                                                <li><i class="fa fa-check-circle"></i> CD player</li>
                                                <li><i class="fa fa-check-circle"></i> Central locking</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="car__details__tab__feature__item">
                                            <h5>Safety Design</h5>
                                            <ul>
                                                <li><i class="fa fa-check-circle"></i> Head-up display</li>
                                                <li><i class="fa fa-check-circle"></i> MP3 interface</li>
                                                <li><i class="fa fa-check-circle"></i> Navigation system</li>
                                                <li><i class="fa fa-check-circle"></i> Panoramic roof</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="car__details__tab__feature__item">
                                            <h5>Extra Design</h5>
                                            <ul>
                                                <li><i class="fa fa-check-circle"></i> Alloy wheels</li>
                                                <li><i class="fa fa-check-circle"></i> Electric side mirror</li>
                                                <li><i class="fa fa-check-circle"></i> Sports package</li>
                                                <li><i class="fa fa-check-circle"></i> Sports suspension</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="car__details__tab__feature__item">
                                            <h5>Extra Design</h5>
                                            <ul>
                                                <li><i class="fa fa-check-circle"></i> MP3 interface</li>
                                                <li><i class="fa fa-check-circle"></i> Navigation system</li>
                                                <li><i class="fa fa-check-circle"></i> Panoramic roof</li>
                                                <li><i class="fa fa-check-circle"></i> Parking sensors</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-4" role="tabpanel">
                            <div class="car__details__tab__info">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="car__details__tab__info__item">
                                            <h5>General Information4</h5>
                                            <ul>
                                                <li><i class="fa fa-check"></i> Pellentesque lacus urna, feugiat non
                                                    consectetur nec</li>
                                                <li><i class="fa fa-check"></i> Aliquam sem neque, efficitur atero
                                                    lectus vitae.</li>
                                                <li><i class="fa fa-check"></i> Pellentesque erat libero, eleifend
                                                    sit amet felis ido.</li>
                                                <li><i class="fa fa-check"></i> Maecenas eget consectetur quam.
                                                    Vestibulum ligula.</li>
                                                <li><i class="fa fa-check"></i> Praesent lorem sapien, vestibulum
                                                    eget aliquet et.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="car__details__tab__info__item">
                                            <h5>General Information</h5>
                                            <ul>
                                                <li><i class="fa fa-check"></i> Pellentesque lacus urna, feugiat non
                                                    consectetur nec</li>
                                                <li><i class="fa fa-check"></i> Aliquam sem neque, efficitur atero
                                                    lectus vitae.</li>
                                                <li><i class="fa fa-check"></i> Pellentesque erat libero, eleifend
                                                    sit amet felis ido.</li>
                                                <li><i class="fa fa-check"></i> Maecenas eget consectetur quam.
                                                    Vestibulum ligula.</li>
                                                <li><i class="fa fa-check"></i> Praesent lorem sapien, vestibulum
                                                    eget aliquet et.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="car__details__tab__feature">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="car__details__tab__feature__item">
                                            <h5>Interior Design</h5>
                                            <ul>
                                                <li><i class="fa fa-check-circle"></i> Auxiliary heating</li>
                                                <li><i class="fa fa-check-circle"></i> Bluetooth</li>
                                                <li><i class="fa fa-check-circle"></i> CD player</li>
                                                <li><i class="fa fa-check-circle"></i> Central locking</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="car__details__tab__feature__item">
                                            <h5>Safety Design</h5>
                                            <ul>
                                                <li><i class="fa fa-check-circle"></i> Head-up display</li>
                                                <li><i class="fa fa-check-circle"></i> MP3 interface</li>
                                                <li><i class="fa fa-check-circle"></i> Navigation system</li>
                                                <li><i class="fa fa-check-circle"></i> Panoramic roof</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="car__details__tab__feature__item">
                                            <h5>Extra Design</h5>
                                            <ul>
                                                <li><i class="fa fa-check-circle"></i> Alloy wheels</li>
                                                <li><i class="fa fa-check-circle"></i> Electric side mirror</li>
                                                <li><i class="fa fa-check-circle"></i> Sports package</li>
                                                <li><i class="fa fa-check-circle"></i> Sports suspension</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="car__details__tab__feature__item">
                                            <h5>Extra Design</h5>
                                            <ul>
                                                <li><i class="fa fa-check-circle"></i> MP3 interface</li>
                                                <li><i class="fa fa-check-circle"></i> Navigation system</li>
                                                <li><i class="fa fa-check-circle"></i> Panoramic roof</li>
                                                <li><i class="fa fa-check-circle"></i> Parking sensors</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="car__details__sidebar">
                    <div class="car__details__sidebar__model">
                        <ul>
                            <li>Stock <span>{{ $spare_part->quantity }}</span></li>
                            <li>Production Date <span>{{ $spare_part->production_date }}</span></li>
                            <li>Expiration Date <span>{{ $spare_part->expiration_date }}</span></li>
                            <li>Sold Out <span>{{ $spare_part->sold_out }}</span></li>
                            <li>Status <span>{{ $spare_part->status }}</span></li>
                        </ul>
                        {{-- <a href="#" class="primary-btn">{{ $spare_part->status }}</a> --}}
                        {{-- <p>Sold Out {{ $spare_part->sold_out }}</p> --}}
                        {{-- <p>Sold Out {{ $spare_part->status }}</p> --}}
                    </div>
                    <div class="car__details__sidebar__payment">
                        <ul>
                            <li>Price <span>${{ $spare_part->price }}</span></li>
                            <li>Tax <span>${{ rand(1,100) }}</span></li>
                            <li>Price <span>${{ $spare_part->price }}</span></li>
                        </ul>
                        <form method="POST" action="{{ route('cart.add_to_cart',$spare_part->id) }}">
                            @csrf
                            <button type="submit" class="primary-btn">Add To Cart</button>
                        </form>
                        {{-- <a href="#" class="primary-btn"><i class="fa fa-credit-card"></i> Express Purchase</a> --}}
                        {{-- <a href="#" class="primary-btn sidebar-btn"><i class="fa fa-sliders"></i> Build Payment</a>
                        <a href="#" class="primary-btn sidebar-btn"><i class="fa fa-money"></i> Value Trade</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Car Details Section End -->
@endsection
