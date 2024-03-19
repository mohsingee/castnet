@extends('admin.layouts.default')
@section('title', 'Event Detail')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Event Detail</h1>
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
                            <div class="col-sm-2"><h6>Event Title:</h6></div>
                            <div class="col-sm-10">{{ $eventInfo->title }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Event Category:</h6></div>
                            <div class="col-sm-10">{{ $eventInfo->event_category }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Event Information:</h6></div>
                            <div class="col-sm-10">{{ $eventInfo->event_info }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Start Date:</h6></div>
                            <div class="col-sm-10">{{ $eventInfo->start_date }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>End Date:</h6></div>
                            <div class="col-sm-10"><p>{{ $eventInfo->end_date }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Start Time:</h6></div>
                            <div class="col-sm-10"><p>{{ $eventInfo->start_time }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>End Time:</h6></div>
                            <div class="col-sm-10"><p>{{ $eventInfo->end_time }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Event Cost:</h6></div>
                            <div class="col-sm-10"><p>{{ $eventInfo->event_cost }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>EVENT REQUEST TYPE:</h6></div>
                            <div class="col-sm-10"><p>{{ $eventInfo->event_req_type }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Fee:</h6></div>
                            <div class="col-sm-10"><p>{{ $eventInfo->event_fee }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Event Contact - First Name:</h6></div>
                            <div class="col-sm-10"><p>{{ $eventInfo->event_contact_FN }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Event Contact - Last Name:</h6></div>
                            <div class="col-sm-10"><p>{{ $eventInfo->event_contact_LN }}</div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"><h6>Email:</h6></div>
                            <div class="col-sm-10"><p>{{ $eventInfo->event_contact_email }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Telephone:</h6></div>
                            <div class="col-sm-10"><p>{{ $eventInfo->telephone }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Event Location:</h6></div>
                            <div class="col-sm-10"><p>{{ $eventInfo->eventLocation }}</p></div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Event Type:</h6></div>
                            <div class="col-sm-10"><p>{{ $eventInfo->event }}</p></div>
                          </div>
                          
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
