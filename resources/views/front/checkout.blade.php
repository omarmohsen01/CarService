@extends('layouts.front')
@section('content')

<div style="margin-top: 110px"  class="breadcrumb-option set-bg" data-setbg="{{ asset('front/img/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__links">
                        <a href="{{ route('cart.index') }}"><i class="fa fa-cart-plus"></i></i>Cart</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="car-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- <div class="col-lg-6 col-md-6"> --}}
                    <div class="contact__form">
                        <form action="{{ route('checkout.pay') }}" method="POST">
                            @csrf
                            <h4 style="margin-bottom: 10px">Your Personal Details</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input name="first_name" type="text" placeholder="First Name">
                                </div>
                                <div class="col-lg-6">
                                    <input name="last_name" type="text" placeholder="Last Name">
                                </div>
                                <div class="col-lg-6">
                                    <input name="email" type="email" placeholder="Email">
                                </div>
                                <div class="col-lg-6">
                                    <input name="address" type="text" placeholder="Address">
                                </div>
                                <div class="col-lg-6">
                                    <input name="country" type="text" placeholder="Country">
                                </div>
                                <div class="col-lg-6">
                                    <input name="city" type="text" placeholder="City">
                                </div>
                                <div class="col-lg-6">
                                    <input name="phone" type="number" placeholder="Phone Number">
                                </div>
                            </div>
                            {{-- <input type="text" placeholder="Subject">
                            <textarea placeholder="Your Question"></textarea> --}}
                            <button type="submit" class="site-btn">Pay Now</button>
                        </form>
                    </div>
                {{-- </div> --}}
            </div>
            <div class="col-lg-3">
                <div class="car__details__sidebar">
                    <div class="car__details__sidebar__model">
                        <h4><b>Your Invoice</b></h4>
                        {{-- <ul>
                            <li>Stock <span>    </span></li>
                            <li>Production Date <span>  </span></li>
                            <li>Expiration Date <span>  </span></li>
                            <li>Sold Out <span> </span></li>
                            <li>Status <span>   </span></li>
                        </ul> --}}
                        {{-- <a href="#" class="primary-btn">{{ $spare_part->status }}</a> --}}
                        {{-- <p>Sold Out {{ $spare_part->sold_out }}</p> --}}
                        {{-- <p>Sold Out {{ $spare_part->status }}</p> --}}
                    </div>
                    <div class="car__details__sidebar__payment">
                        <ul>
                            <li>Price <span>$ {{ $total_price }}  </span></li>
                            <li>Tax <span>$ 00.00</span></li>
                            <li>Price <span>$ {{ $total_price }}</span></li>
                        </ul>

                        {{-- <a href="#" class="primary-btn"><i class="fa fa-credit-card"></i> Express Purchase</a> --}}
                        {{-- <a href="#" class="primary-btn sidebar-btn"><i class="fa fa-sliders"></i> Build Payment</a>
                        <a href="#" class="primary-btn sidebar-btn"><i class="fa fa-money"></i> Value Trade</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
