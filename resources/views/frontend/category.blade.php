@extends('frontend.layouts.master')

@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span>Category</span>
                    <h3>{{ $category->name }}</h3>
                    <p>{{ $category->description ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-white">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4 mb-4">
                        <div class="entry2">
                            <a href="{{ route('frontend.posts.display', $post->slug) }}">
                                <img src="@if ($post->getFirstMediaUrl('posts')) {{ $post->getFirstMediaUrl('posts') }}
                                @else {{ asset('assets/backend/images/posts/picture.jpg') }} @endif"
                                    width="100%" style="height: 250px !important" alt="Image"
                                    class="img-fluid rounded main-shadow"></a>
                            <div class="excerpt">
                                <span
                                    class="post-category text-white bg-secondary mb-3">{{ $post->category->name }}</span>

                                <h2>
                                    <a href="{{ route('frontend.posts.display', $post->slug) }}">
                                        {!! \Illuminate\Support\Str::limit($post->title, 25, '...') !!}
                                    </a>
                                </h2>
                                <div class="post-meta align-items-center text-left clearfix">
                                    <figure class="author-figure mb-0 mr-3 float-left">
                                        <img src="@if ($post->user->getFirstMediaUrl('users')) {{ $post->user->getFirstMediaUrl('users') }}
                                        @else {{ asset('assets/backend/images/posts/user-default.png') }} @endif"
                                            alt="Image" class="img-fluid">
                                    </figure>
                                    <span class="d-inline-block mt-1">By <a href="#">{{ $post->user->name }}</a></span>
                                    <span>&nbsp;-&nbsp;
                                        {{ Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}</span>
                                </div>

                                <p>
                                    {!! \Illuminate\Support\Str::limit($post->description, 150, '...') !!}
                                </p>
                                <p><a href="{{ route('frontend.posts.display', $post->slug) }}">Read More</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row text-center pt-5 border-top">
                <div class="col-md-12">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
