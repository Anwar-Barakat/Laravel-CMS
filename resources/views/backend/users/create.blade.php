@extends('backend.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/select2/css/select2.min.css') }}">

    {{-- Summernode --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <span class="ml-1">New User</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">New User</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add A New User</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('admin.users.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <label for="name">Username</label>
                                            <div class="form-group">
                                                <input name="name" id="name" type="text"
                                                    class="form-control input-default @error('name') is-invalid @enderror"
                                                    value="{{ old('name') }}" placeholder="Username">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <label for="image">User Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image"
                                                        class="@error('image') is-invalid @enderror">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <label for="email">E-mail</label>
                                            <div class="form-group">
                                                <input name="email" id="email" type="email"
                                                    class="form-control input-default @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}" placeholder="E-mail">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <label for="password">Password</label>
                                            <div class="form-group" style="width: 100%">
                                                <input id="password" type="password"
                                                    class="form-control input-default  @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <label for="password-confirm">Password Confirmation</label>
                                            <div class="form-group" style="width: 100%">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <div class="col-md-12 col-lg-12">
                                            <label for="summernote">User Description</label>
                                            <div class="form-group">
                                                <textarea name="description" id="summernote" type="text" rows="5"
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

    {{-- Summernode --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
