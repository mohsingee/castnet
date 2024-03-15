@extends('admin.layouts.default')
@section('title', 'Member Feedback Deatil')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Member Feedback Deatil</h1>
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
                            <div class="col-sm-4"><h6>HOW SATISFIED ARE YOU WITH YOUR MEMBERSHIP EXPERIENCE:</h6></div>
                            <div class="col-sm-8">{{ $data->feedback }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-4"><h6>HAVE YOU PARTICIPATED IN ANY MEMBER EVENTS:</h6></div>
                            <div class="col-sm-8">{{ $data->member_events }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-4"><h6>HOW WOULD YOU DESCRIBE YOUR OVERALL EXPERIENCE AS A MEMBER OF OUR PROGRAM:</h6></div>
                            <div class="col-sm-8">{{ $data->feedback_responses }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-4"><h6>ARE THERE SPECIFIC DEMOGRAPHICS OR GROUPS THAT YOU BELIEVE THE PROGRAM COULD BETTER SERVE:</h6></div>
                            <div class="col-sm-8">{{ $data->demographic_feedback}}</div>
                        </div>
                                                <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
