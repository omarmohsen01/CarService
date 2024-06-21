@extends('layouts.front')
@section('content')
 <!-- Breadcrumb End -->
 <div class="breadcrumb-option set-bg" data-setbg="{{ asset('front/img/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Latest Car Tuning</h2>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Car Tuning Service</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Begin -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    @foreach ($car_tuning_services as $car_tuning_service)
                        @php
                            $images=json_decode($car_tuning_service->images)
                        @endphp
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                @if (!empty($images))
                                    <div class="blog__item__pic set-bg" data-setbg="{{ asset('storage/'.$images[0]) }}">
                                @else
                                    <div class="blog__item__pic set-bg" data-setbg="{{ asset('front/img/blog/blog-1.jpg') }}">
                                @endif
                                    <ul>
                                        <li>By {{ $car_tuning_service->admin->first_name }}</li>
                                        <li>{{ $car_tuning_service->created_at }}</li>
                                        <li>{{ $car_tuning_service->installation }}</li>
                                    </ul>
                                </div>
                                <div class="blog__item__text">
                                    {{-- <h5><a href="#">Benjamin Franklin S Method Of</a></h5> --}}
                                    <p>{{ $car_tuning_service->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination__option">
                    {{ $car_tuning_services->withQueryString()->links() }}
                </div>
            </div>
            {{-- <div class="col-lg-3 col-md-6 col-sm-9">
                <div class="blog__sidebar">
                    <form action="#" class="blog__sidebar__search">
                        <input type="text" placeholder="Search...">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="blog__sidebar__feature">
                        <h4>Feature News</h4>
                        <div class="blog__sidebar__feature__item">
                            <h6><a href="#">Where To Look For Cheap Brochure</a></h6>
                            <ul>
                                <li>By Polly Williams</li>
                                <li>Dec 27, 2018</li>
                            </ul>
                        </div>
                        <div class="blog__sidebar__feature__item">
                            <h6><a href="#">Using Banner Stands To Increase</a></h6>
                            <ul>
                                <li>By Evelyn Lane</li>
                                <li>Dec 17, 2018</li>
                            </ul>
                        </div>
                        <div class="blog__sidebar__feature__item">
                            <h6><a href="#">Promotional Advertising Specialty</a></h6>
                            <ul>
                                <li>By Don Townsend</li>
                                <li>Dec 22, 2018</li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog__sidebar__categories">
                        <h4>Categories</h4>
                        <ul>
                            <li><a href="#">Creativity</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Inspiration</a></li>
                            <li><a href="#">News</a></li>
                        </ul>
                    </div>
                    <div class="blog__sidebar__tag">
                        <h4>Tag</h4>
                        <a href="#">Car Dealer</a>
                        <a href="#">bmw</a>
                        <a href="#">Chevrolet</a>
                        <a href="#">ferrari</a>
                        <a href="#">Honda</a>
                        <a href="#">Hatchback</a>
                    </div>
                    <div class="blog__sidebar__newslatter">
                        <h4>Newsletter</h4>
                        <p>Subscribe our newsletter gor get</p>
                        <form action="#">
                            <input type="text" placeholder="Your email">
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection
