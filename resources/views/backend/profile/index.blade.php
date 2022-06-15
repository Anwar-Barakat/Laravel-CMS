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
                        <span class="ml-1">Edit Profile</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Profile</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Details ({{ $user->name }})</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('admin.details.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <div class="col-md-12 text-center">
                                            @if ($user->getFirstMediaUrl('users'))
                                                <img src="{{ $user->getFirstMediaUrl('users') }}"
                                                    class="img img-thumbnail" width="150">
                                            @else
                                                <img src="{{ asset('assets/backend/images/posts/user-default.png') }}"
                                                    class="img img-thumbnail" style="border-radius: 50%" width="150" alt="">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <label for="name">Username</label>
                                            <div class="form-group">
                                                <input name="name" id="name" type="text"
                                                    class="form-control input-default @error('name') is-invalid @enderror"
                                                    value="{{ old('name', $user->name) }}" placeholder="Username">
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
                                                <input class="form-control input-default " value="{{ $user->email }}"
                                                    readonly disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <div class="col-md-12 col-lg-12">
                                            <label for="summernote">User Description</label>
                                            <div class="form-group">
                                                <textarea name="description" id="summernote" type="text" rows="5"
                                                    class="form-control input-default @error('description') is-invalid @enderror" placeholder="Post description">
                                                    {!! $user->description !!}
                                                </textarea>
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
                                                    <i class="fa fa-edit color-info"></i>
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Password ({{ $user->name }})</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('admin.profile.update', $user) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <label for="current_password">Current Password</label>
                                            <div class="form-group" style="width: 100%">
                                                <input id="current_password" type="password"
                                                    class="form-control input-default  @error('current_password') is-invalid @enderror"
                                                    name="current_password" autocomplete="new-current_password"
                                                    placeholder="********">
                                                @error('current_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <label for="password">New Password</label>
                                            <div class="form-group" style="width: 100%">
                                                <input id="password" type="password"
                                                    class="form-control input-default  @error('password') is-invalid @enderror"
                                                    name="password" autocomplete="new-password" placeholder="********">
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
                                                    name="password_confirmation" autocomplete="new-password"
                                                    placeholder="********">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <button type="submit" class="btn btn-rounded btn-info">
                                                <span class="btn-icon-left text-info">
                                                    <i class="fa fa-edit color-info"></i>
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
