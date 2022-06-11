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
                        <span class="ml-1">Categories</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Categories</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Categories List</h4>
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-rounded btn-info">
                                <span class="btn-icon-left text-info">
                                    <i class="fa fa-plus color-info"></i>
                                </span>
                                Add
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Post Count</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>5</td>
                                                <td>{{ $category->created_at }}</td>
                                                <td>
                                                    <span>
                                                        <form action="{{ route('admin.categories.destroy', $category) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('admin.categories.edit', $category) }}"
                                                                class="mr-4 text-info" data-toggle="tooltip"
                                                                data-placement="top" title="Edit">
                                                                <i class="fa fa-pencil color-muted"></i>
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
                                                <td colspan="6">No Categories found</td>
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