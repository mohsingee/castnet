@extends('admin.layouts.default')
@section('title', 'CompanyInfo Detail')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">CompanyInfo Detail</h1>
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
                            <div class="col-sm-2"><h6>Organization Name:</h6></div>
                            <div class="col-sm-10">{{ $companyInfo->organization_name }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Phone Number:</h6></div>
                            <div class="col-sm-10">{{ $companyInfo->phone_number }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Website Address:</h6></div>
                            <div class="col-sm-10">{{ $companyInfo->website_address }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Number Of Employees:</h6></div>
                            <div class="col-sm-10">{{ $companyInfo->number_of_employees }}</div>
                        </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Billing Email:</h6></div>
                            <div class="col-sm-10"><p>{{ $companyInfo->billing_email }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Billing Address:</h6></div>
                            <div class="col-sm-10"><p>{{ $companyInfo->billing_address }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Billing City:</h6></div>
                            <div class="col-sm-10"><p>{{ $companyInfo->billing_city }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Billing State:</h6></div>
                            <div class="col-sm-10"><p>{{ $companyInfo->billing_state }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Zip:</h6></div>
                            <div class="col-sm-10"><p>{{ $companyInfo->billing_zip }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Billing Country:</h6></div>
                            <div class="col-sm-10"><p>{{ $companyInfo->billing_country }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Address Check:</h6></div>
                            <div class="col-sm-10"><p>{{ $companyInfo->billing_address_check }}</div>
                          </div>
                          <h2 class="section_title">Primary Contact Information</h2>
                          <br>
                          <div class="row">
                            <div class="col-sm-2"><h6>First Name:</h6></div>
                            <div class="col-sm-10"><p>{{ $companyInfo->first_name }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Last Name:</h6></div>
                            <div class="col-sm-10"><p>{{ $companyInfo->last_name }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Title:</h6></div>
                            <div class="col-sm-10"><p>{{ $companyInfo->title }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Phone Number:</h6></div>
                            <div class="col-sm-10"><p>{{ $companyInfo->primary_phone_number }}</p></div>
                          </div>
                        <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Email:</h6></div>
                            <div class="col-sm-10"><p>{{ $companyInfo->primary_email }}</p></div>
                          </div>
                          <h2 class="section_title">Membership Level</h2>
                          <br>
                          <div class="row">
                            <div class="col-sm-2"><h6>Membership Level:</h6></div>
                            <div class="col-sm-10"><p>{{ $companyInfo->membership_level }}</p></div>
                          </div>
                          <h2 class="section_title">About Organization</h2>
                          <br>
                          <div class="row">
                            <div class="col-sm-2"><h6>About Organization:</h6></div>
                            <div class="col-sm-10"><p>{{ $companyInfo->about_organization }}</p></div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-2"><h6>Ownership Structure:</h6></div>
                            <div class="col-sm-10"><p>{{ $companyInfo->ownership_structure }}</p></div>
                          </div>
                          <h2 class="section_title m-0">Reasons For Joining</h2>
                          <br>
                          <div class="row">
                            <div class="col-sm-2"><h6>Reason To Join:</h6></div>
                            <div class="col-sm-10"><p>{{ $companyInfo->reason_joining }}</p></div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
