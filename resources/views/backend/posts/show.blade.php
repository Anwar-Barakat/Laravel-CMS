@extends('backend.layouts.master')


@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <span class="ml-1">Show Post</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Show Post</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Show Post ({{ $post->title }})</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>
                                                <img src="{{ $post->getFirstMediaUrl('posts') }}" alt=""
                                                    style="max-width: 40vw" class="img img-thumbnail">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Title</th>
                                            <td>{{ $post->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Slug</th>
                                            <td>{{ $post->slug }}</td>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <td>
                                                <span class="badge light badge-primary">{{ $post->category->name }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Author</th>
                                            <td>
                                                <span class="badge light badge-secondary">{{ $post->user->name }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tags</th>
                                            <td class=" d-grid">
                                                @foreach ($post->tags as $tag)
                                                    <span class="badge light badge-light">{{ $tag->name }}</span>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td>{!! $post->description !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
