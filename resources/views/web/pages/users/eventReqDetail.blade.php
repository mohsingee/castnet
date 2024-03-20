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
                        <div class="dashboard_side flex-lg-grow-1">
                            <div class="profile-box">
                                <img src="{{ asset('assets/web/images/dashboard_profile.png') }}" alt="profile" class="profile-img">
                                <h3 class="profile-text mb-3">{{ Auth::user()->first_name }}</h3>
                            </div>
                            <div class="d-flex gap-4 gap-lg-0 align-items-center justify-content-center flex-lg-column flex-wrap w-lg-100 tab-list">
                                <a class="dashboard-link tablinks" href="{{route('web.user-dashboard')}}">
                                    <div class="dashboard-links">
                                        <div class="d-flex align-items-center gap-2 gap-lg-4">
                                            <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                                            <span>Account setting</span>
                                        </div>
                                    </div>
                                </a>
                                @if(auth()->user()->member==1)
                                <a class="dashboard-link tablinks" href="{{route('web.user-member')}}">
                                    <div class="dashboard-links">
                                        <div class="d-flex align-items-center gap-2 gap-lg-4">
                                            <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                                            <span>member account</span>
                                        </div>
                                    </div>
                                </a>
                                @endif
                                @if(auth()->user()->sponsor==1)
                                <a class="dashboard-link tablinks" href="{{route('web.user-sponsor')}}">
                                    <div class="dashboard-links">
                                        <div class="d-flex align-items-center gap-2 gap-lg-4">
                                            <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                                            <span>sponser account</span>
                                        </div>
                                    </div>
                                </a>
                                @endif
                                @if(auth()->user()->partner==1)
                                <a class="dashboard-link tablinks" href="{{route('web.user-partner')}}">
                                    <div class="dashboard-links">
                                        <div class="d-flex align-items-center gap-2 gap-lg-4">
                                            <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                                            <span>partner account</span>
                                        </div>
                                    </div>
                                </a>
                                @endif
                                @if($financialForms->count() > 0)
                                    <a class="dashboard-link tablinks" href="{{route('web.user-financialForms')}}">
                                        <div class="dashboard-links">
                                            <div class="d-flex align-items-center gap-2 gap-lg-4">
                                                <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                                                <span>Financial Forms</span>
                                            </div>
                                        </div>
                                    </a>
                                    @endif
                                    <a class="dashboard-link tablinks active" href="{{route('web.user-eventReqForms')}}">
                                        <div class="dashboard-links">
                                            <div class="d-flex align-items-center gap-2 gap-lg-4">
                                                <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                                                <span>event request</span>
                                            </div>
                                        </div>
                                    </a>
                            </div>
                        </div>
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