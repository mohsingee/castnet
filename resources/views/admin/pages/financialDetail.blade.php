@extends('admin.layouts.default')
@section('title', 'Financial Detail')
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Financial Detail</h1>
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
                            <div class="col-sm-2"><h6>Name:</h6></div>
                            <div class="col-sm-10">{{ $financialData->first_name }} {{ $financialData->last_name }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Email:</h6></div>
                            <div class="col-sm-10">{{ $financialData->email }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Phone:</h6></div>
                            <div class="col-sm-10">{{ $financialData->phone }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Business Name:</h6></div>
                            <div class="col-sm-10">{{ $financialData->business_name }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Business Address:</h6></div>
                            <div class="col-sm-10"><p>{{ $financialData->business_address }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Purpose of Funding:</h6></div>
                            <div class="col-sm-10"><p>{{ $financialData->fund_purpose }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Enter Fund:</h6></div>
                            <div class="col-sm-10"><p>{{ $financialData->fund_amount }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Country:</h6></div>
                            <div class="col-sm-10"><p>{{ $financialData->country }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Business Type:</h6></div>
                            <div class="col-sm-10"><p>{{ $financialData->business_type }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Your Net Worth:</h6></div>
                            <div class="col-sm-10"><p>{{ $financialData->net_worth }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Select Program:</h6></div>
                            <div class="col-sm-10"><p>{{ $financialData->program }}</div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"><h6>Declared Personal Income for Recent Year:</h6></div>
                            <div class="col-sm-10"><p>{{ $financialData->recent_year_income }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>File:</h6></div>
                            {{-- <div class="col-sm-10"><p>{{ $financialData->last_name }}</p></div> --}}
                            <div class="col-sm-10">
                               {{--******** File Download Working Start ********--}}
                               @if($financialData->file)
                               @php $ext = substr($financialData->file, strrpos($financialData->file, '.')+1); @endphp
                               @if(strtolower($ext)=='pdf')
                               <div class="row">
                                   <div class="col-4">
                                       <a download href="{{ asset('assets/web/images/'.$financialData->file) }}" target="_blank">
                                           <img class="selected_img" src="{{ asset('assets/web/images/pdf.png') }}" height="50px" width="50px">
                                       </a>
                                   </div>
                               </div>
                               @elseif(strtolower($ext)=='doc')
                               <div class="row">
                                   <div class="col-4">
                                       <a download href="{{ asset('assets/web/images/'.$financialData->file) }}" target="_blank">
                                           <img class="selected_img" src="{{ asset('assets/web/images/doc.png') }}" height="50px" width="50px">
                                       </a>
                                   </div>
                               </div>
                               @elseif(strtolower($ext)=='docx')
                               <div class="row">
                                   <div class="col-4">
                                       <a download href="{{ asset('assets/web/images/'.$financialData->file) }}" target="_blank">
                                           <img class="selected_img" src="{{ asset('assets/web/images/docx.png') }}" height="50px" width="50px">
                                       </a>
                                   </div>
                               </div>
                               @elseif(strtolower($ext)=='txt')
                               <div class="row">
                                   <div class="col-4">
                                       <a download href="{{ asset('assets/web/images/'.$financialData->file) }}" target="_blank">
                                           <img class="selected_img" src="{{ asset('assets/web/images/txt.png') }}" height="50px" width="50px">
                                       </a>
                                   </div>
                               </div>
                               @elseif(strtolower($ext)=='rtf')
                               <div class="row">
                                   <div class="col-4">
                                       <a download href="{{ asset('assets/web/images/'.$financialData->file) }}" target="_blank">
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
                                       <a download href="{{ asset('assets/web/images/'.$financialData->file) }}" target="_blank">
                                           <img class="selected_img" src="{{ asset('assets/web/images/odt.png') }}" height="50px" width="50px">
                                       </a>
                                   </div>
                               </div>
                               @elseif(strtolower($ext)=='tex')
                               <div class="row">
                                   <div class="col-4">
                                       <a download href="{{ asset('assets/web/images/'.$financialData->file) }}" target="_blank">
                                           <img class="selected_img" src="{{ asset('assets/web/images/tex.png') }}" height="50px" width="50px">
                                       </a>
                                   </div>
                               </div>
                               @else
                               <div class="row">
                                   <div class="col-4">
                                       <a download href="{{ asset('assets/web/images/'.$financialData->file) }}" target="_blank">
                                           <img class="selected_img" src="{{ asset('assets/web/images/'.$financialData->file) }}" height="50px" width="50px">
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
@stop
