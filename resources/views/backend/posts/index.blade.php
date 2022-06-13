@extends('backend.layouts.master')


@section('css')
@endsection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <span class="ml-1">Posts</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Posts</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Posts List</h4>
                            <a href="{{ route('admin.posts.create') }}" class="btn btn-rounded btn-info">
                                <span class="btn-icon-left text-info">
                                    <i class="fa fa-plus color-info"></i>
                                </span>
                                <span>Add</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Crated At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>
                                                    @if ($post->getFirstMediaUrl('posts', 'thumb'))
                                                        <img src="{{ $post->getFirstMediaUrl('posts', 'thumb') }}"
                                                            class="img img-thumbnail" width="100px">
                                                    @endif
                                                </td>
                                                <td>{{ $post->title }}</td>
                                                <td>
                                                    <span class="badge light badge-primary">{{ $post->category->name }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge light badge-secondary">{{ $post->user->name }}
                                                    </span>
                                                </td>
                                                <td>{{ $post->created_at }}</td>
                                                <td>
                                                    <span>
                                                        <form action="{{ route('admin.posts.destroy', $post) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('admin.posts.edit', $post) }}"
                                                                class="mr-4 text-info" data-toggle="tooltip"
                                                                data-placement="top" title="Edit">
                                                                <i class="fa fa-pencil color-muted"></i>
                                                            </a>

                                                            <a href="{{ route('admin.posts.show', $post) }}"
                                                                class="mr-4 text-warning" data-toggle="tooltip"
                                                                data-placement="top" title="Edit">
                                                                <i class="fa fa-eye color-muted"></i>
                                                            </a>

                                                            <button type="submit" class="text-danger"
                                                                style="border: none ;background: none" data-toggle="tooltip"
                                                                data-placement="top" title="delete">
                                                                <i class="fa fa-close color-danger"></i>
                                                            </button>
                                                        </form>
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="8">No Posts found</td>
                                            </tr>
                                        @endforelse
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
