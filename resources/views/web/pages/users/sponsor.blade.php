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
                    <div class="d-flex flex-column flex-lg-row gap-3">
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
                                <a class="dashboard-link tablinks active" href="{{route('web.user-sponsor')}}">
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
                                                <span>financial from</span>
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
                                            <h2 class="section_title">Sponsor Detail</h2>
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
                                                                <div class="col-sm-4"><h3>Sponsor's Name:</h3></div>
                                                                <div class="col-sm-8">{{ $sponsor->sponsor_name }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Contact Person's Name:</h3></div>
                                                                <div class="col-sm-8">{{ $sponsor->contact_person_name }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Email Address:</h3></div>
                                                                <div class="col-sm-8">{{ $sponsor->email }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Phone Number:</h3></div>
                                                                <div class="col-sm-8">{{ $sponsor->phone_number }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Website URL (optional):</h3></div>
                                                                <div class="col-sm-8"><p>{{ $sponsor->website_url }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Industry Sectors:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $sponsor->industry_sector }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Specific Interest in Sponsorship:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $sponsor->specific_interest }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Preferred Geographic Focus:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $sponsor->geographic_focus }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Sponsorship Level Preferences:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $sponsor->sponsorship_level }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Sponsorship Goals and Objectives:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $sponsor->sponsorship_goals }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Previous Sponsorship Experiences:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $sponsor->sponsorship_experiences }}</div>
                                                              </div>
                                                          
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Sponsorship Agreement Preferences:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $sponsor->sponsorship_preferences }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Estimated Budget for Sponsorship:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $sponsor->sponsorship_budget }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Preferred Payment Schedule:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $sponsor->payment_schedule }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>ADDITIONAL SUPPORT OFFERED:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $sponsor->additional_support }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>HOW DID YOU HEAR ABOUT US?:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $sponsor->hear_about }}</p></div>
                                                              </div>
        
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>DATA PROTECTION CONSENT:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $sponsor->data_protection_consent }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <h2 class="section_title m-0">Payment Details</h2>
                                                              <br>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Paid Amount:</h3></div>
                                                                <div class="col-sm-8"><p>${{ $sponsor->paymentdetail->amount }}</p></div>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Trx ID:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $sponsor->paymentdetail->trx_id }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Account Status:</h3></div>
                                                                <div class="col-sm-4">
                                                                    @if($sponsor->status==0)
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