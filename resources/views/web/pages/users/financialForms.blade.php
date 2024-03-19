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
                                <a class="dashboard-link tablinks " href="{{route('web.user-sponsor')}}">
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
                                    <a class="dashboard-link tablinks active" href="{{route('web.user-financialForms')}}">
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
                                            <h2 class="section_title">Financial Forms</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <table class="table table-bordered table-striped"">
                                        <thead>
                                          <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($financialForms as $financialForm)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $financialForm->first_name }} {{ $financialForm->last_name }}</td>
                                                <td>{{ $financialForm->email }}</td>
                                                <td>{{ $financialForm->phone }}</td>
                                                <td><a href="{{ route('web.user-financialDetail', ['id' => $financialForm->id]) }}" class="btn-outline-info"><i class="fa fa-eye"></i></a></td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                      </table>
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