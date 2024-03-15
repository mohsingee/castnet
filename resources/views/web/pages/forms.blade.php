@extends('web.layouts.default')
@section('content')

    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb forms_bg-1" style="
    background: linear-gradient(90deg, rgba(7, 27, 52, 0.80) 0%, rgba(7, 27, 52, 0.61) 51.46%, rgba(7, 27, 52, 0.42) 99.24%, rgba(7, 27, 52, 0.28) 99.7%, rgba(7, 27, 52, 0.00) 100%), url({{ asset('assets/web/images/' . $banner->image) }}) center no-repeat;
    background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb_title">Forms</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="index.html">home</a></li>
                            <li class="breadcrumb-item"><a href="about_us.html">FINANCIAL</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Forms</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Event Request Form Start -->
    <section class="section_block request_form">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="section_title" data-aos="fade-up" data-aos-duration="1000">Financial Form</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="{{route('store.financial')}}" method="POST" enctype="multipart/form-data" id="financial_form" data-aos="zoom-in" data-aos-duration="1000">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6 errorshow">
                                <input type="text" class="form-control" name="first_name" placeholder="First Name">
                            </div>
                            <div class="col-md-6 errorshow">
                                <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                            </div>
                            <div class="col-md-6 errorshow">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="col-md-6 errorshow">
                                <input type="number" class="form-control" placeholder="Phone" name="phone">
                            </div>
                            <div class="col-md-12 errorshow">
                                <input type="text" class="form-control" placeholder="Business Name" name="business_name">
                            </div>
                            <div class="col-md-12 errorshow">
                                <input type="text" class="form-control" placeholder="Business Address" name="business_address">
                            </div>
                            <div class="col-md-4 errorshow">
                                <select class="form-select" name="fund_purpose">
                                    <option selected disabled>Purpose of Funding</option>
                                    <option value="Investments">Investments</option>
                                    <option value="Loans">Loans</option>
                                    <option value="Grants">Grants</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group errorshow">
                                    <input type="number" class="form-control" name="fund_amount" placeholder="Enter Fund">
                                </div>
                            </div>
                            <div class="col-md-4 errorshow">
                                <input type="text" class="form-control" placeholder="Country" name="country">
                            </div>
                            <div class="col-md-12">
                                <div class="errorshow">
                                <div class="checkbox-border">
                                    <h3 class="checkbox-title">Business Type</h3>
                                    <div class="form-check py-5">
                                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                                            <div class="col">
                                                <input type="radio" class="form-check-input" id="btype1" name="business_type" value="Private Limited Company">
                                                <label class="form-check-label" for="btype1">Private Limited Company</label>
                                            </div>
                                            <div class="col">
                                                <input type="radio" class="form-check-input" id="btype2" name="business_type" value="Public Listed Company">
                                                <label class="form-check-label" for="btype2">Public Listed Company</label>
                                            </div>
                                            <div class="col">
                                                <input type="radio" class="form-check-input" id="btype3" name="business_type" value="Cooperative">
                                                <label class="form-check-label" for="btype3">Cooperative</label>
                                            </div>
                                            <div class="col">
                                                <input type="radio" class="form-check-input" id="btype4" name="business_type" value="Sole Proprietorship">
                                                <label class="form-check-label" for="btype4">Sole Proprietorship</label>
                                            </div>
                                            <div class="col">
                                                <input type="radio" class="form-check-input" id="btype5" name="business_type" value="Partnership">
                                                <label class="form-check-label" for="btype5">Partnership</label>
                                            </div>
                                            <div class="col">
                                                <input type="radio" class="form-check-input" id="btype6" name="business_type" value="Other">
                                                <label class="form-check-label" for="btype6">Other</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-12 errorshow">
                                    <div class="checkbox-border">
                                        <h3 class="checkbox-title">Your Net Worth</h3>
                                        <div class="form-check py-5">
                                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                                                <div class="col">
                                                    <input type="radio" id="newtop1" class="form-check-input" name="net_worth" value="More than $320k">
                                                    <label class="form-check-label" for="newtop1">More than $320k</label>
                                                </div>
                                                <div class="col">
                                                    <input type="radio" id="newtop2" class="form-check-input" name="net_worth" value="Less than $320k">
                                                    <label class="form-check-label" for="newtop2">Less than $320k</label>
                                                </div>
                                                <div class="col">
                                                    <input type="radio" id="newtop3" class="form-check-input" name="net_worth" value="I am not sure">
                                                    <label class="form-check-label" for="newtop3">I am not sure</label>
                                                </div>
                                                <div class="col">
                                                    <input type="radio" id="newtop4" class="form-check-input" name="net_worth" value="Other">
                                                    <label class="form-check-label" for="newtop4">Other</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group errorshow">
                                <select class="form-select" name="program">
                                    <option selected disabled>Select Program</option>
                                    <option value="Advocacy Program">Advocacy Program</option>
                                    <option value="Active Project">Active Project</option>
                                    <option value="Planned Project">Planned Project</option>
                                    <option value="Development / Prototype">Development / Prototype</option>
                                    <option value="Research / Feacibility Reports">Research / Feacibility Reports</option>
                                    <option value="Event / Workshop">Event / Workshop</option>
                                    <option value="Education / Training">Education / Training</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6 errorshow">
                                <input type="text" class="form-control" name="recent_year_income"
                                    placeholder="Declared Personal Income for Recent Year">
                            </div>
                            <div class="upl-head">
                                <h2 class="form-heading-upl">Please upload all documents in support of the associated financial request</h2>
                            </div>
                            <div class="col-md-4 mx-auto errorshow">
                                <input type="file" name="file" class="form-control" id="">
                            </div>
                            <div class="text-center mt-4" data-aos="fade-right" data-aos-duration="1000">
                                <button type="submit" class="btn btn-submit1">submit</button>
                            </div>      
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Event Request Form End -->
@stop
@push('scripts')
<script>
$('#financial_form').validate({
    rules: {
        first_name: {
            required: true,
        },
        last_name: {
            required: true,
        },
        email: {
            required: true,
            email: true,
        },
        phone: {
            required: true,
        },
        business_name: {
            required: true,
        },
        business_address: {
            required: true,
        },
        fund_purpose: {
            required: true,
        },
        country: {
            required: true,
        },
        business_type: {
            required: true,
        },
        net_worth: {
            required: true,
        },
        program: {
            required: true,
        },
        recent_year_income: {
            required: true,
        },
        file: {
            required: true,
        }, 
    },
    messages: {
        email: {
            required: "Please enter your email address.",
            email: "Please enter a valid email address."
        },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.errorshow').append(error);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    }
});

$("body").on("submit", "#join_form", function (e) {
    var data = $('#email_valid').val();
    if(data=='not valid'){
        e.preventDefault();
    }
});
</script>
@endpush