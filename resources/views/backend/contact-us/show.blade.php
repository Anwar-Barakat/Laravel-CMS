@extends('backend.layouts.master')


@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <span class="ml-1">Show Message</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Show Message</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Show Message</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-responsive-sm">
                                    <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $contactUs->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Slug</th>
                                            <td>{{ $contactUs->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Subject</th>
                                            <td>
                                                {{ $contactUs->subject }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Message</th>
                                            <td>
                                                {{ $contactUs->message }}
                                            </td>
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
