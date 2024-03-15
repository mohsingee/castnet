@extends('admin.layouts.default')
@section('title','User Detail')
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User Detail</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">User Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3">User Detail:</h3>
                            <ul class="nav nav-pills ml-auto p-2">
                                @if(!empty($memberRecord))
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#tab_1" data-toggle="tab">Member</a>
                                    </li>
                                @endif
                                @if(!empty($partnerRecord))
                                    <li class="nav-item">
                                        <a class="nav-link {{ empty($memberRecord) ? ' active' : '' }}" href="#tab_2" data-toggle="tab">Partner</a>
                                    </li>
                                @endif
                                @if(!empty($sponsorRecord))
                                    <li class="nav-item">
                                        <a class="nav-link {{ empty($memberRecord) && empty($partnerRecord) ? ' active' : '' }}" href="#tab_3" data-toggle="tab">Sponsor</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                @if(!empty($memberRecord))
                                <div class="tab-pane active" id="tab_1">
                                    <div class="content">
                                        <div class="container-fluid">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Organization Name:</h6></div>
                                                        <div class="col-sm-10">{{ $memberRecord->organization_name }}</div>
                                                    </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Phone Number:</h6></div>
                                                        <div class="col-sm-10">{{ $memberRecord->phone_number }}</div>
                                                    </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Website Address:</h6></div>
                                                        <div class="col-sm-10">{{ $memberRecord->website_address }}</div>
                                                    </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Number Of Employees:</h6></div>
                                                        <div class="col-sm-10">{{ $memberRecord->number_of_employees }}</div>
                                                    </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Billing Email:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->billing_email }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Billing Address:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->billing_address }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Billing City:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->billing_city }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Billing State:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->billing_state }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Zip:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->billing_zip }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Billing Country:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->billing_country }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Address Check:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->billing_address_check }}</p></div>
                                                      </div>
                                                      <h2 class="section_title">Primary Contact Information</h2>
                                                      <br>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>First Name:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->first_name }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Last Name:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->last_name }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Title:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->title }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Phone Number:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->primary_phone }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Email:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->email }}</p></div>
                                                      </div>
                                                      <h2 class="section_title">Membership Level</h2>
                                                      <br>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Membership Level:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->membership_level }}</p></div>
                                                      </div>
                                                      <h2 class="section_title">About Organization</h2>
                                                      <br>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>About Organization:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->about_organization }}</p></div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Ownership Structure:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->ownership_structure }}</p></div>
                                                      </div>
                                                      <h2 class="section_title m-0">Reasons For Joining</h2>
                                                      <br>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Reason To Join:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->reason_joining }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <h2 class="section_title m-0">Payment Details</h2>
                                                      <br>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Paid Amount:</h6></div>
                                                        <div class="col-sm-10"><p>${{ $memberRecord->paymentdetail->amount }}</p></div>
                                                      </div>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Trx ID:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $memberRecord->paymentdetail->trx_id }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Account Status:</h6></div>
                                                        @if($memberRecord->status==0)
                                                          <h5><span class="badge badge-success">Active</span></h5>
                                                        @else
                                                          <h5><span class="badge badge-danger">Inactive</span></h5>
                                                        @endif
                                                      </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <button class="btn btn-sm btn-outline-danger delete_btn" data-url="/admin/delete-membership"
                                                      data-id="{{ $memberRecord->id }}" type="submit">Click To Delete Membership</button>
                                                @if($memberRecord->status==0)
                                                  <button class="btn btn-sm btn-outline-danger" onclick="changeStatus({{ $memberRecord->id }},1,'/admin/membership-status')" type="submit">Click To Inactivate Status</button>
                                                @else
                                                  <button class="btn btn-sm btn-outline-success activeStatus" onclick="changeStatus({{ $memberRecord->id }},0,'/admin/membership-status')" type="submit">Click To Activate Status</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if(!empty($partnerRecord))
                                <div class="tab-pane  {{ empty($memberRecord) ? ' active' : '' }}" id="tab_2">
                                    <div class="content">
                                        <div class="container-fluid">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Organization Name:</h6></div>
                                                        <div class="col-sm-10">{{ $partnerRecord->organization_name }}</div>
                                                    </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Phone Number:</h6></div>
                                                        <div class="col-sm-10">{{ $partnerRecord->contact_person_name }}</div>
                                                    </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Email:</h6></div>
                                                        <div class="col-sm-10">{{ $partnerRecord->email }}</div>
                                                    </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Phone Number:</h6></div>
                                                        <div class="col-sm-10">{{ $partnerRecord->phone_number }}</div>
                                                    </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Organization's Website:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $partnerRecord->organization_website }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Partnership Interest Area:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $partnerRecord->industry_sector }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Duration Of Partnership:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $partnerRecord->partnership_dur }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Type Of Partnership Interest:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $partnerRecord->partnership_interest }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Previous Partnership Experience:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $partnerRecord->previous_partnershipt }}</p><p>{{ $partnerRecord->target_geographic_regions }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Partnership Contribution Details:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $partnerRecord->project_opportunities }}</p><p>{{ $partnerRecord->non_monetary_support }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Goals And Objective Of Partnership:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $partnerRecord->partnering_goals }}</div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Preferred Terms Of Partnership:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $partnerRecord->expected_outcomes }}</p><p>{{ $partnerRecord->non_monetary_support_offered }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Legal Compliance And Agreements:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $partnerRecord->legal_compliance_agree }}</p><p>{{ $partnerRecord->legal_compliance_understanding }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>How Did You Hear About Us?:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $partnerRecord->hear_about }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Additional Information:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $partnerRecord->additional_information }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Data Protection Consent:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $partnerRecord->data_protection_consent }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Account Status:</h6></div>
                                                        @if($partnerRecord->status==0)
                                                        <h5><span class="badge badge-success">Active</span></h5>
                                                        @else
                                                        <h5><span class="badge badge-danger">Inactive</span></h5>
                                                        @endif
                                                      </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <button class="btn btn-sm btn-outline-danger delete_btn" data-url="/admin/delete-partnership"
                                                      data-id="{{ $partnerRecord->id }}" type="submit">Click To Delete Partnership</button>
                                                @if($partnerRecord->status==0)
                                                  <button class="btn btn-sm btn-outline-danger" onclick="changeStatus({{ $partnerRecord->id }},1,'/admin/partnership-status')" type="submit">Click To Inactivate Status</button>
                                                @else
                                                  <button class="btn btn-sm btn-outline-success activeStatus" onclick="changeStatus({{ $partnerRecord->id }},0,'/admin/partnership-status')" type="submit">Click To Activate Status</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if(!empty($sponsorRecord))
                                <div class="tab-pane {{ empty($memberRecord) && empty($partnerRecord) ? ' active' : '' }}" id="tab_3">
                                    <div class="content">
                                        <div class="container-fluid">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Sponsor's Name:</h6></div>
                                                        <div class="col-sm-10">{{ $sponsorRecord->sponsor_name }}</div>
                                                    </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Contact Person's Name:</h6></div>
                                                        <div class="col-sm-10">{{ $sponsorRecord->contact_person_name }}</div>
                                                    </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Email Address:</h6></div>
                                                        <div class="col-sm-10">{{ $sponsorRecord->email }}</div>
                                                    </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Phone Number:</h6></div>
                                                        <div class="col-sm-10">{{ $sponsorRecord->phone_number }}</div>
                                                    </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Website URL (optional):</h6></div>
                                                        <div class="col-sm-10"><p>{{ $sponsorRecord->website_url }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Industry Sectors:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $sponsorRecord->industry_sector }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Specific Interest in Sponsorship:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $sponsorRecord->specific_interest }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Preferred Geographic Focus:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $sponsorRecord->geographic_focus }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Sponsorship Level Preferences:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $sponsorRecord->sponsorship_level }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Sponsorship Goals and Objectives:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $sponsorRecord->sponsorship_goals }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Previous Sponsorship Experiences:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $sponsorRecord->sponsorship_experiences }}</div>
                                                      </div>
                                                  
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Sponsorship Agreement Preferences:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $sponsorRecord->sponsorship_preferences }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Estimated Budget for Sponsorship:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $sponsorRecord->sponsorship_budget }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Preferred Payment Schedule:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $sponsorRecord->payment_schedule }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>ADDITIONAL SUPPORT OFFERED:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $sponsorRecord->additional_support }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>HOW DID YOU HEAR ABOUT US?:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $sponsorRecord->hear_about }}</p></div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>DATA PROTECTION CONSENT:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $sponsorRecord->data_protection_consent }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <h2 class="section_title m-0">Payment Details</h2>
                                                      <br>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Paid Amount:</h6></div>
                                                        <div class="col-sm-10"><p>${{ $sponsorRecord->paymentdetail->amount }}</p></div>
                                                      </div>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Trx ID:</h6></div>
                                                        <div class="col-sm-10"><p>{{ $sponsorRecord->paymentdetail->trx_id }}</p></div>
                                                      </div>
                                                    <hr>
                                                      <div class="row">
                                                        <div class="col-sm-2"><h6>Account Status:</h6></div>
                                                        @if($sponsorRecord->status==0)
                                                        <h5><span class="badge badge-success">Active</span></h5>
                                                        @else
                                                        <h5><span class="badge badge-danger">Inactive</span></h5>
                                                        @endif
                                                      </div>
                                                      
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <button class="btn btn-sm btn-outline-danger delete_btn" data-url="/admin/delete-sponsorship"
                                                      data-id="{{ $sponsorRecord->id }}" type="submit">Click To Delete Sponsorship</button>
                                                @if($sponsorRecord->status==0)
                                                  <button class="btn btn-sm btn-outline-danger" onclick="changeStatus({{ $sponsorRecord->id }},1,'/admin/sponsorship-status')" type="submit">Click To Inactivate Status</button>
                                                @else
                                                  <button class="btn btn-sm btn-outline-success activeStatus" onclick="changeStatus({{ $sponsorRecord->id }},0,'/admin/sponsorship-status')" type="submit">Click To Activate Status</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
