@extends('backend.layouts.master')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-primary">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <i class="la la-newspaper-o"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Total Posts</p>
                                    <h3 class="text-white">{{ App\Models\Post::count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-warning">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <i class="la la-th-list"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Total Categories</p>
                                    <h3 class="text-white">{{ App\Models\Category::count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-secondary">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <i class="la la-tags"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Total Tags</p>
                                    <h3 class="text-white">{{ App\Models\Tag::count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-danger">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <i class="la la-users"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Total Users</p>
                                    <h3 class="text-white">{{ App\Models\User::where('id', '>', 1)->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
