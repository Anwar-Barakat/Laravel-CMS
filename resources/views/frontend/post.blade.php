@extends('frontend.layouts.master')
@section('content')
    <div class="site-cover site-cover-sm same-height overlay single-page"
        @if ($post->getFirstMediaUrl('posts')) style="background-image: url('{{ $post->getFirstMediaUrl('posts') }}');"
        @else style="background-image: url('{{ asset('assets/backend/images/posts/picture.jpg') }}');" @endif>

        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <span class="post-category text-white bg-success mb-3">{{ $post->category->name }}</span>
                        <h1 class="mb-4"><a href="javascript:void()">{{ $post->title }}</a></h1>
                        <div class="post-meta align-items-center text-center">
                            <figure class="author-figure mb-0 mr-3 d-inline-block">
                                <img src="@if ($post->user->getFirstMediaUrl('users')) {{ $post->user->getFirstMediaUrl('users') }}
                                @else {{ asset('assets/backend/images/posts/user-default.png') }} @endif"
                                    alt="Image" class="img-fluid" width="100">
                            </figure>
                            <span class="d-inline-block mt-1">By {{ $post->user->name }}</span>
                            <span>&nbsp;-&nbsp;
                                {{ Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="site-section py-lg">
        <div class="container">
            <div class="row blog-entries element-animate">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="post-content-body">
                        {!! $post->description !!}
                    </div>
                    <div class="pt-5">
                        <p>
                            Categories: <a href="#">{{ $post->category->name }}</a>
                            @if ($post->tags()->count() > 0)
                                Tags:
                                @foreach ($post->tags as $tag)
                                    <a href="">#{{ $tag->name }}</a>,
                                @endforeach
                            @endif
                        </p>
                    </div>
                    <div class="pt-5">
                        <h3 class="mb-5" id="dsq-count-scr">6 Comments</h3>
                        <a href="">Comments</a>

                        <div id="disqus_thread"></div>
                    </div>
                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">
                    <div class="sidebar-box search-form-wrap">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon fa fa-search"></span>
                                <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <div class="bio text-center">
                            <img src="@if ($post->user->getFirstMediaUrl('users')) {{ $post->user->getFirstMediaUrl('users') }}
                            @else {{ asset('assets/backend/images/posts/user-default.png') }} @endif"
                                alt="Image Placeholder" class="img-fluid mb-5 img-thumbnail">
                            <div class="bio-body">
                                <h2>{{ $post->user->name }}</h2>
                                <p class="mb-4">{{ $post->user->description }}</p>
                                <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h3 class="heading">Popular Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                @foreach ($popularPosts as $post)
                                    <li>
                                        <a href="">
                                            <img src="@if ($post->getFirstMediaUrl('posts')) {{ $post->getFirstMediaUrl('posts') }}
                                            @else {{ asset('assets/backend/images/posts/picture.jpg') }} @endif"
                                                alt="Image placeholder" class="mr-4 img img-thumbnail">
                                            <div class="text">
                                                <h4> {!! \Illuminate\Support\Str::limit($post->title, 25, '...') !!} </h4>
                                                <div class="post-meta">
                                                    <span class="mr-2">
                                                        {{ Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            @foreach ($categories as $category)
                                <li><a href="#">{{ $category->name }} <span>({{ $category->posts->count() }})</span>
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h3 class="heading">Tags</h3>
                        <ul class="tags">
                            @foreach ($tags as $tag)
                                <li><a href="">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar -->

            </div>
        </div>
    </section>

    <div class="site-section bg-light">
        <div class="container">

            <div class="row mb-5">
                <div class="col-12">
                    <h2>More Related Posts</h2>
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
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt
                            error illum a
                            explicabo, ipsam nostrum.</p>
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
