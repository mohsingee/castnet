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
                                    <a class="dashboard-link tablinks active" href="{{route('web.user-financialForms')}}">
                                        <div class="dashboard-links">
                                            <div class="d-flex align-items-center gap-2 gap-lg-4">
                                                <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                                                <span>financial from</span>
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
                                            <h2 class="section_title">Financial Detail</h2>
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
                                                                <div class="col-sm-4"><h3>First Name:</h3></div>
                                                                <div class="col-sm-8">{{ $financialForm->first_name }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Last Name:</h3></div>
                                                                <div class="col-sm-8">{{ $financialForm->last_name }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Email:</h3></div>
                                                                <div class="col-sm-8">{{ $financialForm->email }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Phone Number:</h3></div>
                                                                <div class="col-sm-8">{{ $financialForm->phone }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Business Name:</h3></div>
                                                                <div class="col-sm-8">{{ $financialForm->business_name }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Business Address:</h3></div>
                                                                <div class="col-sm-8">{{ $financialForm->business_address }}</div>
                                                            </div>
                                                            <hr>
                                                              <div class="row">
                                                                <div class="col-sm-4"><h3>Purpose Of Funding:</h3></div>
                                                                <div class="col-sm-8">{{ $financialForm->fund_purpose }}</div>
                                                            </div>
                                                            <hr>
                                                            
                                                            <div class="row">
                                                              <div class="col-sm-4"><h3>Fund Amount:</h3></div>
                                                              <div class="col-sm-8">{{ $financialForm->fund_amount }}</div>
                                                          </div>
                                                          <hr>
                                                            <div class="row">
                                                              <div class="col-sm-4"><h3>Country:</h3></div>
                                                              <div class="col-sm-8">{{ $financialForm->country }}</div>
                                                          </div>
                                                          <hr>
                                                            <div class="row">
                                                              <div class="col-sm-4"><h3>Business Type:</h3></div>
                                                              <div class="col-sm-8">{{ $financialForm->business_type }}</div>
                                                          </div>
                                                          <hr>
                                                            <div class="row">
                                                              <div class="col-sm-4"><h3>Net Worth:</h3></div>
                                                              <div class="col-sm-8">{{ $financialForm->net_worth }}</div>
                                                          </div>
                                                          <hr>
                                                           
                                                            <div class="row">
                                                              <div class="col-sm-4"><h3>Program:</h3></div>
                                                              <div class="col-sm-8">{{ $financialForm->program }}</div>
                                                          </div>
                                                          <hr>
                                                            <div class="row">
                                                              <div class="col-sm-4"><h3>Recent Year Income:</h3></div>
                                                              <div class="col-sm-8">{{ $financialForm->recent_year_income }}</div>
                                                          </div>
                                                          <hr>
                                                            <div class="row">
                                                              <div class="col-sm-4"><h3>File:</h3></div>
                                                              <div class="col-sm-8">
                                                                {{--******** File Download Working Start ********--}}
                               @if($financialForm->file)
                               @php $ext = substr($financialForm->file, strrpos($financialForm->file, '.')+1); @endphp
                               @if(strtolower($ext)=='pdf')
                               <div class="row">
                                   <div class="col-4">
                                       <a download href="{{ asset('assets/web/images/'.$financialForm->file) }}" target="_blank">
                                           <img class="selected_img" src="{{ asset('assets/web/images/pdf.png') }}" height="50px" width="50px">
                                       </a>
                                   </div>
                               </div>
                               @elseif(strtolower($ext)=='doc')
                               <div class="row">
                                   <div class="col-4">
                                       <a download href="{{ asset('assets/web/images/'.$financialForm->file) }}" target="_blank">
                                           <img class="selected_img" src="{{ asset('assets/web/images/doc.png') }}" height="50px" width="50px">
                                       </a>
                                   </div>
                               </div>
                               @elseif(strtolower($ext)=='docx')
                               <div class="row">
                                   <div class="col-4">
                                       <a download href="{{ asset('assets/web/images/'.$financialForm->file) }}" target="_blank">
                                           <img class="selected_img" src="{{ asset('assets/web/images/docx.png') }}" height="50px" width="50px">
                                       </a>
                                   </div>
                               </div>
                               @elseif(strtolower($ext)=='txt')
                               <div class="row">
                                   <div class="col-4">
                                       <a download href="{{ asset('assets/web/images/'.$financialForm->file) }}" target="_blank">
                                           <img class="selected_img" src="{{ asset('assets/web/images/txt.png') }}" height="50px" width="50px">
                                       </a>
                                   </div>
                               </div>
                               @elseif(strtolower($ext)=='rtf')
                               <div class="row">
                                   <div class="col-4">
                                       <a download href="{{ asset('assets/web/images/'.$financialForm->file) }}" target="_blank">
                                           <img class="selected_img" src="{{ asset('assets/web/images/rtf.png') }}" height="50px" width="50px">
                                       </a>
                                   </div>
                               </div>
                               @elseif(strtolower($ext)=='html')
                               <div class="row">
                                   <div class="col-4">
                                       <a download href="{{ asset('assets/web/images/'.$ifinancialDatatem->file) }}" target="_blank">
                                           <img class="selected_img" src="{{ asset('assets/web/images/html.png') }}" height="50px" width="50px">
                                       </a>
                                   </div>
                               </div>
                               @elseif(strtolower($ext)=='odt')
                               <div class="row">
                                   <div class="col-4">
                                       <a download href="{{ asset('assets/web/images/'.$financialForm->file) }}" target="_blank">
                                           <img class="selected_img" src="{{ asset('assets/web/images/odt.png') }}" height="50px" width="50px">
                                       </a>
                                   </div>
                               </div>
                               @elseif(strtolower($ext)=='tex')
                               <div class="row">
                                   <div class="col-4">
                                       <a download href="{{ asset('assets/web/images/'.$financialForm->file) }}" target="_blank">
                                           <img class="selected_img" src="{{ asset('assets/web/images/tex.png') }}" height="50px" width="50px">
                                       </a>
                                   </div>
                               </div>
                               @else
                               <div class="row">
                                   <div class="col-4">
                                       <a download href="{{ asset('assets/web/images/'.$financialForm->file) }}" target="_blank">
                                           <img class="selected_img" src="{{ asset('assets/web/images/'.$financialForm->file) }}" height="50px" width="50px">
                                       </a>
                                   </div>
                               </div>
                               @endif
                           @else
                               <p class="text-danger">{{ "No file selected" }}</p>
                           @endif
                      
                       {{--******** End File Download Working ********--}}
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