@extends('backend.layouts.master')

@section('css')
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
                        <span class="ml-1">Edit Website Settings</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Website Settings</a></li>
                    </ol>
                </div>
            </div>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Settings</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('admin.settings.update', $setting) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <div class="col-md-12 text-center">
                                            @if ($setting->getFirstMediaUrl('settings'))
                                                <img src="{{ $setting->getFirstMediaUrl('settings') }}"
                                                    class="img img-thumbnail" width="250">
                                            @else
                                                <img src="{{ asset('assets/backend/images/posts/settings.png') }}"
                                                    class="img img-thumbnail" style="border-radius: 50%" width="250"
                                                    alt="">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <label for="name">Website Name</label>
                                            <div class="form-group">
                                                <input name="name" id="name" type="text"
                                                    class="form-control input-default @error('name') is-invalid @enderror"
                                                    value="{{ old('name', $setting->name) }}" placeholder="Website Name">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <label for="image">Website Logo</label>
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
                                            <label for="email">email</label>
                                            <div class="form-group">
                                                <input name="email" id="email" type="email"
                                                    class="form-control input-default @error('email') is-invalid @enderror"
                                                    value="{{ old('email', $setting->email) }}"
                                                    placeholder="Website email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <label for="facebook">Facebook</label>
                                            <div class="form-group">
                                                <input name="facebook" id="facebook" type="text"
                                                    class="form-control input-default @error('facebook') is-invalid @enderror"
                                                    value="{{ old('facebook', $setting->facebook) }}"
                                                    placeholder="Website facebook">
                                                @error('facebook')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <label for="location">location</label>
                                            <div class="form-group">
                                                <input name="location" id="location" type="text"
                                                    class="form-control input-default @error('location') is-invalid @enderror"
                                                    value="{{ old('location', $setting->location) }}"
                                                    placeholder="Website location">
                                                @error('location')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <label for="mobile">mobile</label>
                                            <div class="form-group">
                                                <input name="mobile" id="mobile" type="text"
                                                    class="form-control input-default @error('mobile') is-invalid @enderror"
                                                    value="{{ old('mobile', $setting->mobile) }}"
                                                    placeholder="Website mobile">
                                                @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <label for="telegram">telegram</label>
                                            <div class="form-group">
                                                <input name="telegram" id="telegram" type="text"
                                                    class="form-control input-default @error('telegram') is-invalid @enderror"
                                                    value="{{ old('telegram', $setting->telegram) }}"
                                                    placeholder="Website telegram">
                                                @error('telegram')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <label for="github">github</label>
                                            <div class="form-group">
                                                <input name="github" id="github" type="text"
                                                    class="form-control input-default @error('github') is-invalid @enderror"
                                                    value="{{ old('github', $setting->github) }}"
                                                    placeholder="Website github">
                                                @error('github')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <label for="copyright">Copyright</label>
                                            <div class="form-group">
                                                <input name="copyright" id="copyright" type="text"
                                                    class="form-control input-default @error('copyright') is-invalid @enderror"
                                                    value="{{ old('copyright', $setting->copyright) }}"
                                                    placeholder="Website copyright">
                                                @error('copyright')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <div class="col-md-12 col-lg-12">
                                            <label for="summernote">Website Bio</label>
                                            <div class="form-group">
                                                <textarea name="bio" id="summernote" type="text" rows="5"
                                                    class="form-control input-default @error('bio') is-invalid @enderror" placeholder="Type website bio">
                                                    {!! $setting->bio !!}
                                                </textarea>
                                                @error('bio')
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
        </div>
    </div>
@endsection


@section('js')
    {{-- Summernode --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
