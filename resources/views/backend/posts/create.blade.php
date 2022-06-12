@extends('backend.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/select2/css/select2.min.css') }}">
    <style>
        .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
            width: 100%;
        }

        .select2-container .select2-selection--single {
            height: 38px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 38px;
        }
    </style>
@endsection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <span class="ml-1">New Post</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">New Post</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add A New Post</h4>
                        </div>
                        @if ($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('admin.posts.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <label for="title">Tag Title</label>
                                            <div class="form-group">
                                                <input name="title" id="title" type="text"
                                                    class="form-control input-default @error('title') is-invalid @enderror"
                                                    value="{{ old('title') }}" placeholder="Tag Title">
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <label for="image">Post Image</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-primary" type="button">Button</button>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image"
                                                        class="@error('image') is-invalid @enderror">
                                                    <label class="custom-file-label">Choose file</label>
                                                    @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <label for="category_id">Choose Category</label>
                                            <div class="form-group" style="width: 100%">
                                                <select class="customize-result" name="category_id" id="category_id"
                                                    style="width: 100%"
                                                    class="form-control input-default @error('category_id') is-invalid @enderror">
                                                    <option value="">Choose</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <label for="name">Post Description</label>
                                            <div class="form-group">
                                                <textarea name="description" id="description" type="text" rows="5"
                                                    class="form-control input-default @error('description') is-invalid @enderror" placeholder="Post Description">{{ old('description') }}</textarea>
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
                                                Add
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


@section('js')
    <script src="{{ asset('assets/backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins-init/select2-init.js') }}"></script>
@endsection
