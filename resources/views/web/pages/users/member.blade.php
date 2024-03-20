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
                                <a class="dashboard-link tablinks active" href="{{route('web.user-member')}}">
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
                                @if($eventRequestForms->count() > 0)
                                    <a class="dashboard-link tablinks" href="{{route('web.user-eventReqForms')}}">
                                        <div class="dashboard-links">
                                            <div class="d-flex align-items-center gap-2 gap-lg-4">
                                                <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                                                <span>event request</span>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="dashboard_content flex-lg-grow-1">
                            <section class="section_content tabcontent">
                                <div class="container-fluid">
                                    <div class="row mb-5">
                                        <div class="col-12 mt-3">
                                            <h2 class="section_title">Member Detail</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="tab-pane active" id="tab_1">
                                            <div class="content">
                                                <div class="container-fluid">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Organization Name:</h3></div>
                                                                <div class="col-sm-8">{{ $member->organization_name }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Phone Number:</h3></div>
                                                                <div class="col-sm-8">{{ $member->phone_number }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Website Address:</h3></div>
                                                                <div class="col-sm-8">{{ $member->website_address }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Number Of Employees:</h3></div>
                                                                <div class="col-sm-8">{{ $member->number_of_employees }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Billing Email:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->billing_email }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Billing Address:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->billing_address }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Billing City:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->billing_city }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Billing State:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->billing_state }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Zip:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->billing_zip }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Billing Country:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->billing_country }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Address Check:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->billing_address_check }}</p></div>
                                                              </div>
                                                              <h2 class="section_title">Primary Contact Information</h2>
                                                              <br>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>First Name:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->first_name }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Last Name:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->last_name }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Title:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->title }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Phone Number:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->primary_phone }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Email:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->email }}</p></div>
                                                              </div>
                                                              <h2 class="section_title">Membership Level</h2>
                                                              <br>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Membership Level:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->membership_level }}</p></div>
                                                              </div>
                                                              <h2 class="section_title">About Organization</h2>
                                                              <br>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>About Organization:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->about_organization }}</p></div>
                                                              </div>
                                                              <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Ownership Structure:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->ownership_structure }}</p></div>
                                                              </div>
                                                              <h2 class="section_title m-0">Reasons For Joining</h2>
                                                              <br>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Reason To Join:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->reason_joining }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <h2 class="section_title m-0">Payment Details</h2>
                                                              <br>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Paid Amount:</h3></div>
                                                                <div class="col-sm-8"><p>${{ $member->paymentdetail->amount }}</p></div>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Trx ID:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $member->paymentdetail->trx_id }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Account Status:</h3></div>
                                                                <div class="col-sm-4">
                                                                    @if($member->status==0)
                                                                        <h3><span class="text-success">Active</span></h3>
                                                                    @else
                                                                        <h3><span class="texgt-danger">Inactive</span></h3>
                                                                    @endif
                                                                </div>
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