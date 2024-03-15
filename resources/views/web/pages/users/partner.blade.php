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
                                <a class="dashboard-link tablinks" href="{{route('web.user-dashboard')}}">
                                    <div class="dashboard-links">
                                        <div class="d-flex align-items-center gap-2 gap-lg-4">
                                            <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                                            <span>member account</span>
                                        </div>
                                    </div>
                                </a>
                                @endif
                                @if(auth()->user()->sponsor==1)
                                <a class="dashboard-link tablinks" href="{{route('web.user-dashboard')}}">
                                    <div class="dashboard-links">
                                        <div class="d-flex align-items-center gap-2 gap-lg-4">
                                            <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                                            <span>sponser account</span>
                                        </div>
                                    </div>
                                </a>
                                @endif
                                @if(auth()->user()->partner==1)
                                <a class="dashboard-link tablinks active" href="{{route('web.user-dashboard')}}">
                                    <div class="dashboard-links">
                                        <div class="d-flex align-items-center gap-2 gap-lg-4">
                                            <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                                            <span>partner account</span>
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
                                            <h2 class="section_title">Partner Detail</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="tab-pane  {{ empty($memberRecord) ? ' active' : '' }}" id="tab_2">
                                            <div class="content">
                                                <div class="container-fluid">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <!-- /.card-header -->
                                                            <div class="card-body">
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Organization Name:</h3></div>
                                                                <div class="col-sm-8">{{ $partner->organization_name }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Phone Number:</h3></div>
                                                                <div class="col-sm-8">{{ $partner->contact_person_name }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Email:</h3></div>
                                                                <div class="col-sm-8">{{ $partner->email }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Phone Number:</h3></div>
                                                                <div class="col-sm-8">{{ $partner->phone_number }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Organization's Website:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $partner->organization_website }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Partnership Interest Area:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $partner->industry_sector }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Duration Of Partnership:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $partner->partnership_dur }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Type Of Partnership Interest:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $partner->partnership_interest }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Previous Partnership Experience:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $partner->previous_partnershipt }}</p><p>{{ $partner->target_geographic_regions }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Partnership Contribution Details:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $partner->project_opportunities }}</p><p>{{ $partner->non_monetary_support }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Goals And Objective Of Partnership:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $partner->partnering_goals }}</div>
                                                              </div>
        
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Preferred Terms Of Partnership:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $partner->expected_outcomes }}</p><p>{{ $partner->non_monetary_support_offered }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Legal Compliance And Agreements:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $partner->legal_compliance_agree }}</p><p>{{ $partner->legal_compliance_understanding }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>How Did You Hear About Us?:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $partner->hear_about }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Additional Information:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $partner->additional_information }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Data Protection Consent:</h3></div>
                                                                <div class="col-sm-8"><p>{{ $partner->data_protection_consent }}</p></div>
                                                              </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Account Status:</h3></div>
                                                                <div class="col-sm-4">
                                                                    @if($partner->status==0)
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