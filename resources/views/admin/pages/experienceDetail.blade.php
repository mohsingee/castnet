@extends('admin.layouts.default')
@section('title', 'Event Detail')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Experience Detail</h1>
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
                            <div class="col-sm-4"><h6>About You/Organization:</h6></div>
                            <div class="col-sm-8">{{ $eventInfo->organization }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-4"><h6>Reason Of Castnet Visit:</h6></div>
                            <div class="col-sm-8">{{ $eventInfo->castnet_visit }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-4"><h6>Primary Intrested Sector:</h6></div>
                            <div class="col-sm-8">{{ $eventInfo->sector }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-4"><h6>Current Business Challenge:</h6></div>
                            <div class="col-sm-8">{{ $eventInfo->challenge }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-4"><h6>Would you like to receive more information about membership?:</h6></div>
                            <div class="col-sm-8"><p>{{ $eventInfo->membership_info }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-4"><h6>Name:</h6></div>
                            <div class="col-sm-8"><p>{{ $eventInfo->contact_info }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-4"><h6>Phone:</h6></div>
                            <div class="col-sm-8"><p>{{ $eventInfo->phone }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-4"><h6>Company:</h6></div>
                            <div class="col-sm-8"><p>{{ $eventInfo->company }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-4"><h6>Email:</h6></div>
                            <div class="col-sm-8"><p>{{ $eventInfo->email }}</p></div>
                          </div>
                                                <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
