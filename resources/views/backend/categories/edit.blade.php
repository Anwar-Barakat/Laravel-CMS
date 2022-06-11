@extends('backend.layouts.master')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <span class="ml-1">Edit Category</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Category</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Category ({{ $category->name }})</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('admin.categories.update', $category) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <label for="name">Category Name</label>
                                            <div class="form-group">
                                                <input name="name" id="name" type="text"
                                                    class="form-control input-default @error('name') is-invalid @enderror"
                                                    value="{{ old('name', $category->name) }}"
                                                    placeholder="Category Name">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <label for="name">Category Description</label>
                                            <div class="form-group">
                                                <textarea name="description" id="description" type="text" rows="5"
                                                    class="form-control input-default @error('description') is-invalid @enderror" placeholder="Category Description">{{ old('description', $category) }}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <button type="submit" class="btn btn-rounded btn-info">
                                                <span class="btn-icon-left text-info">
                                                    <i class="fa fa-plus color-info"></i>
                                                </span>
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
