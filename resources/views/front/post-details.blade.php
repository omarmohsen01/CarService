@extends('layouts.front')
@section('content')
<!-- Blog Details Hero Begin -->
<section class="blog-details-hero spad set-bg" data-setbg="{{ asset('front/img/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <div class="blog__details__hero__text">
                    <span class="label">Car , {{ $post->brand->name }}</span>
                    {{-- <h2>An Update on Adobe Fuse as Adobe Moves to the Future of 3D & AR Development</h2> --}}
                    <ul>
                        @php
                            $images=json_decode($post->images);
                        @endphp
                        <li><img src="{{ asset('storage/'.$images[0]) }}" alt=""> <span>By {{ $post->user->first_name }}</span>
                        </li>
                        <li><i class="fa fa-calendar-o"></i> <span>{{ $post->created_at }}</span></li>
                        <li><i class="fa fa-edit"></i> <span>{{ $post->comments->count() }} Comment</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__pic">
                    <img height="500px" src="{{ asset('storage/'.$images[0]) }}" alt="">
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="blog__details__text">
                    <p>{{ $post->content}}</p>
                </div>
                {{-- <div class="blog__details__quote">
                    <p>Though a major upgrade to 2.1 is due out soon, the 2.0.3 is something you should definitely
                        download and install if only</p>
                </div>
                <div class="blog__details__desc">
                    <p>In addition to the 2.0.3 install, you should be aware that some bugs have already been found,
                        and that a plugin will need to be installed to repair those bugs. If you modify any of the
                        files that this patch plugin fixes, you’ll need to either merge the changes with the new
                        files or make those changes manually once again. You can find these issues by running a diff
                        to locate changes; if the only changes you find are your own, then you’re fine, and
                        otherwise you’ll need to merge them manually into the</p>
                </div> --}}
                <div class="blog__details__share">
                    <a href="#" class="blog__details__share__item">
                        <i class="fa fa-facebook"></i>
                        <span>Share</span>
                    </a>
                    <a href="#" class="blog__details__share__item twitter">
                        <i class="fa fa-twitter"></i>
                        <span>Share</span>
                    </a>
                    <a href="#" class="blog__details__share__item google">
                        <i class="fa fa-google"></i>
                        <span>Share</span>
                    </a>
                    <a href="#" class="blog__details__share__item linkedin">
                        <i class="fa fa-linkedin"></i>
                        <span>Share</span>
                    </a>
                </div>
                {{-- <div class="blog__details__author">
                    <div class="blog__details__author__pic">
                        <img src="{{ asset('front/img/blog/details/author.png') }}" alt="">
                    </div>
                    <div class="blog__details__author__text">
                        <h5>Marry Jean</h5>
                        <p>Another thing that I don’t really like about them is that they’re such sideline actors,
                            lacking the abilities to participate actively.</p>
                    </div>
                </div> --}}
                {{-- <div class="blog__details__btns">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="#" class="blog__details__btns__item set-bg"
                                        data-setbg="{{ asset('front/img/blog/details/pre.jpg')}}">
                                        <h6>Promotional Advertising Specialty</h6>
                                        <ul>
                                            <li>By Don Townsend</li>
                                            <li>Dec 22, 2018</li>
                                        </ul>
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="#" class="blog__details__btns__item set-bg"
                                        data-setbg="img/blog/details/next.jpg">
                                        <h6>Promotional Advertising Specialty</h6>
                                        <ul>
                                            <li>By Don Townsend</li>
                                            <li>Dec 22, 2018</li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="blog__details__comment">
                    <h4>{{ $post->comments->count() }} Comment</h4>
                    @foreach ($post->comments as $comment )
                    <div class="blog__details__comment__item">
                        <div class="blog__details__comment__item__pic">
                            <img src="{{ asset('front/img/blog/details/comment-1.png') }}" alt="">
                        </div>
                        <div class="blog__details__comment__item__text">
                            <h6>{{ $comment->user->first_name }}</h6>
                            <p>{{ $comment->content }}</p>
                            {{-- <a href="#">Like</a>
                            <a href="#">Reply</a> --}}
                        </div>
                    </div>
                    @endforeach

                    {{-- <div class="blog__details__comment__item reply__comment">
                        <div class="blog__details__comment__item__pic">
                            <img src="img/blog/details/comment-2.png" alt="">
                        </div>
                        <div class="blog__details__comment__item__text">
                            <h6>Brandon Kelley</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                            <a href="#">Like</a>
                            <a href="#">Reply</a>
                        </div>
                    </div> --}}
                </div>
                <div class="blog__details__comment__form">
                    <h4>Leave A Reply</h4>
                    <form action="{{ route('post.comment',$post->id) }}" method="POST">
                        @csrf
                        {{-- <div class="input-list">
                            <div class="input-list-item">
                                <p>Name</p>
                                <input type="text">
                            </div>
                            <div class="input-list-item">
                                <p>Email</p>
                                <input type="text">
                            </div>
                            <div class="input-list-item">
                                <p>Website</p>
                                <input type="text">
                            </div>
                        </div> --}}
                        <div class="input-desc">
                            <p>Comment</p>
                            <textarea name="content"></textarea>
                        </div>
                        <button type="submit" class="site-btn">Replay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->
@endsection
