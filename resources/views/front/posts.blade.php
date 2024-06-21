@extends('layouts.front')
@section('content')
     <!-- Breadcrumb End -->
     <div style="margin-top: 110px"  class="breadcrumb-option set-bg" data-setbg="{{ asset('front/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Social Media</h2>
                        <div class="breadcrumb__links">
                            <a href="{{ route('posts.index') }}">Home</a>
                            <span>Posts</span>
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
                        @foreach ($posts as $post)
                            @php
                                $images=json_decode($post->images);
                            @endphp
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="blog__item">
                                    <div class="blog__item__pic set-bg" data-setbg="{{ asset('storage/'.$images[0]) }}">
                                        <ul>
                                            <li>For {{ $post->brand->name }}</li>
                                            <li>{{ $post->created_at }}</li>
                                            <li>{{ $post->comments->count() }} Comment</li>
                                        </ul>
                                    </div>
                                    <div class="blog__item__text">
                                        <h5><a href="{{ route('posts.show',$post->id) }}">By {{ $post->user->first_name }}</a></h5>
                                        <p>{{ $post->content }}</p>
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
                        {{ $posts->withQueryString()->links() }}
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-9">
                    <div class="blog__sidebar">

                        <div class="blog__sidebar__feature">
                            <h4>Add Post</h4>
                            <form action="#" class="blog__sidebar__search">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
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
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
