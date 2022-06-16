@extends('frontend.layouts.master')

@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span>Category</span>
                    <h3>{{ $category->name }}</h3>
                    <p>{{ $category->description ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>

 
@endsection
