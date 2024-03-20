@extends('web.layouts.default')
@section('content')
<link rel="stylesheet" href="{{asset('assets/web/css/user_dashboard.css')}}">
    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb partners_sponsors_bg">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb_title">User Dashboard</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Dashboard Start -->
    <section class="section_dashboard">
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="col-12">
                    <div class="d-flex flex-column flex-lg-row gap-3 min-h-dash">
                        @include('web.pages.users.sidebar')
                        <div class="dashboard_content flex-lg-grow-1">
                            <section class="section_content tabcontent">
                                <div class="container-fluid">
                                    <div class="row mb-5">
                                        <div class="col-12 mt-3">
                                            <h2 class="section_title">Event Request Detail</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="tab-pane {{ empty($memberRecord) && empty($partnerRecord) ? ' active' : '' }}" id="tab_3">
                                            <div class="content">
                                                <div class="container-fluid">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <!-- /.card-header -->
                                                            <div class="card-body">
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Title:</h3></div>
                                                                <div class="col-sm-8">{{ $eventReqDetail->title }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Event Category:</h3></div>
                                                                <div class="col-sm-8">{{ $eventReqDetail->event_category }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Event Information:</h3></div>
                                                                <div class="col-sm-8">{{ $eventReqDetail->event_info }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Start Date:</h3></div>
                                                                <div class="col-sm-8">{{ $eventReqDetail->start_date }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>End Date:</h3></div>
                                                                <div class="col-sm-8">{{ $eventReqDetail->end_date }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Start Time:</h3></div>
                                                                <div class="col-sm-8">{{ $eventReqDetail->start_time }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>End Time:</h3></div>
                                                                <div class="col-sm-8">{{ $eventReqDetail->end_time }}</div>
                                                            </div>
                                                            <hr>
                                                            
                                                            <div class="row">
                                                              <div class="col-sm-4"><h3>Event Request Type:</h3></div>
                                                              <div class="col-sm-8">{{ $eventReqDetail->event_req_type }}</div>
                                                          </div>
                                                          <hr>
                                                            <div class="row">
                                                              <div class="col-sm-4"><h3>Event Cost:</h3></div>
                                                              <div class="col-sm-8">{{ $eventReqDetail->event_cost }}</div>
                                                          </div>
                                                          <hr>
                                                            <div class="row">
                                                              <div class="col-sm-4"><h3>First Name:</h3></div>
                                                              <div class="col-sm-8">{{ $eventReqDetail->first_name }}</div>
                                                          </div>
                                                          <hr>
                                                            <div class="row">
                                                              <div class="col-sm-4"><h3>Last Name:</h3></div>
                                                              <div class="col-sm-8">{{ $eventReqDetail->last_name }}</div>
                                                          </div>
                                                          <hr>
                                                           
                                                            <div class="row">
                                                              <div class="col-sm-4"><h3>Email:</h3></div>
                                                              <div class="col-sm-8">{{ $eventReqDetail->email }}</div>
                                                          </div>
                                                          <hr>
                                                            <div class="row">
                                                              <div class="col-sm-4"><h3>Phone Number:</h3></div>
                                                              <div class="col-sm-8">{{ $eventReqDetail->telephone }}</div>
                                                          </div>
                                                          <hr>
                                                            <div class="row">
                                                              <div class="col-sm-4"><h3>Event Location:</h3></div>
                                                              <div class="col-sm-8">{{ $eventReqDetail->event_location }}</div>
                                                          </div>
                                                          <hr>
                                                            <div class="row">
                                                              <div class="col-sm-4"><h3>Event Type:</h3></div>
                                                              <div class="col-sm-8">{{ $eventReqDetail->event }}</div>
                                                          </div>
                                                    
                                                            </div>
                                                            <!-- /.card-body -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard End -->
@stop
@push('scripts')
<script>
</script>
@endpush