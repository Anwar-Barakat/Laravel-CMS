@extends('frontend.layouts.master')

@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout-2">
                @foreach ($headerPosts as $post)
                    <div class="col-md-4">
                        <a href="{{ route('frontend.posts.display', $post->slug) }}"
                            class="h-entry mb-30 v-height gradient"
                            @if ($post->getFirstMediaUrl('posts')) style="background-image: url('{{ $post->getFirstMediaUrl('posts') }}');"
                                @else style="background-image: url('{{ asset('assets/backend/images/posts/picture.jpg') }}');" @endif>

                            <div class="text">
                                <h2>
                                    {!! \Illuminate\Support\Str::limit($post->title, 50, '...') !!}
                                </h2>
                                <span class="date">
                                    {{ Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}
                                </span>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2>Recent Posts</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($recentPosts as $post)
                    <div class="col-lg-4 mb-4">
                        <div class="entry2">
                            <a href="{{ route('frontend.posts.display', $post->slug) }}">
                                @if ($post->getFirstMediaUrl('posts'))
                                    <img src="{{ $post->getFirstMediaUrl('posts') }}" alt="Image"
                                        class="img-fluid rounded main-shadow" width="100%" style="height: 250px !important">
                                @else
                                    <img src="{{ asset('assets/backend/images/posts/picture.jpg') }}" alt="" width="100%"
                                        style="height: 250px !important" class="main-shadow">
                                @endif
                            </a>
                            <div class="excerpt">
                                <span class="post-category text-white bg-secondary mb-3">
                                    {{ $post->category->name }}
                                </span>

                                <h2>
                                    <a href="{{ route('frontend.posts.display', $post->slug) }}">
                                        {!! \Illuminate\Support\Str::limit($post->title, 50, '...') !!}
                                    </a>
                                </h2>
                                <div class="post-meta align-items-center text-left clearfix">
                                    <figure class="author-figure mb-0 mr-3 float-left"><img
                                            src="{{ asset('assets/frontend/images/person_1.jpg') }}" alt="Image"
                                            class="img-fluid"></figure>
                                    <span class="d-inline-block mt-1">By <a href="#">{{ $post->user->name }}</a></span>
                                    <span>&nbsp;-&nbsp;
                                        {{ Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}</span>
                                </div>

                                <p>{!! \Illuminate\Support\Str::limit($post->description, 145, '...') !!}</p>
                                <p><a href="#">Read More</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $recentPosts->links() }}
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">

            <div class="row align-items-stretch retro-layout">

                <div class="col-md-5 order-md-2">
                    <a href="single.html" class="hentry img-1 h-100 gradient"
                        style="background-image: url('{{ asset('assets/frontend/images/img_4.jpg') }}');">
                        <span class="post-category text-white bg-danger">Travel</span>
                        <div class="text">
                            <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                            <span>February 12, 2019</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-7">

                    <a href="single.html" class="hentry img-2 v-height mb30 gradient"
                        style="background-image: url('{{ asset('assets/frontend/images/img_1.jpg') }}');">
                        <span class="post-category text-white bg-success">Nature</span>
                        <div class="text text-sm">
                            <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                            <span>February 12, 2019</span>
                        </div>
                    </a>

                    <div class="two-col d-block d-md-flex">
                        <a href="single.html" class="hentry v-height img-2 gradient"
                            style="background-image: url('{{ asset('assets/frontend/images/img_2.jpg') }}');">
                            <span class="post-category text-white bg-primary">Sports</span>
                            <div class="text text-sm">
                                <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                                <span>February 12, 2019</span>
                            </div>
                        </a>
                        <a href="single.html" class="hentry v-height img-2 ml-auto gradient"
                            style="background-image: url('{{ asset('assets/frontend/images/img_3.jpg') }}');">
                            <span class="post-category text-white bg-warning">Lifestyle</span>
                            <div class="text text-sm">
                                <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                                <span>February 12, 2019</span>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <div class="site-section bg-lightx">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-5">
                    <div class="subscribe-1 ">
                        <h2>Subscribe to our newsletter</h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit
                            nesciunt error illum a explicabo, ipsam nostrum.</p>
                        <form action="#" class="d-flex">
                            <input type="text" class="form-control" placeholder="Enter your email address">
                            <input type="submit" class="btn btn-primary" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
