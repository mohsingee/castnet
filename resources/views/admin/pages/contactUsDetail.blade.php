@extends('admin.layouts.default')
@section('title', 'ContactUs Data')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">ContactUs Detail</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-2"><h6>First Name:</h6></div>
                            <div class="col-sm-10">{{ $contact->first_name }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Last Name:</h6></div>
                            <div class="col-sm-10">{{ $contact->last_name }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Email:</h6></div>
                            <div class="col-sm-10">{{ $contact->email }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Phone:</h6></div>
                            <div class="col-sm-10">{{ $contact->telephone }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Message:</h6></div>
                            <div class="col-sm-10"><p>{{ $contact->message }}</p></div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
