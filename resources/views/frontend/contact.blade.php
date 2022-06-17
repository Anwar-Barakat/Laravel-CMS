@extends('frontend.layouts.master')

@section('content')
    <div class="site-cover site-cover-sm same-height overlay single-page"
        style="background-image: url('{{ asset('assets/frontend/images/img_1.jpg') }}');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <h1 class="">Contact Us</h1>
                        <p class="lead mb-4 text-white">
                            {{ $setting->bio }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mb-5">
                    <form action="{{ route('frontend.contact-us.store') }}" method="post" class="p-5 bg-white">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="fname">Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    placeholder="Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="subject">Subject</label>
                                <input type="subject" id="subject" name="subject"
                                    class="form-control @error('subject') is-invalid @enderror"
                                    value="{{ old('subject') }}" placeholder="Subject">
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="7"
                                    class="form-control @error('message') is-invalid @enderror" value="{{ old('message') }}"
                                    placeholder="Write your notes or questions here..."></textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Send Message" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>


                    </form>
                </div>
                <div class="col-md-5">

                    <div class="p-4 mb-3 bg-white">
                        <p class="mb-0 font-weight-bold">Location</p>
                        <p class="mb-4">{{ $setting->location }}</p>

                        <p class="mb-0 font-weight-bold">Phone</p>
                        <p class="mb-4">{{ $setting->mobile }}</p>

                        <p class="mb-0 font-weight-bold">Email Address</p>
                        <p class="mb-0"><a href="{{ $setting->email }}">{{ $setting->email }}</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
