@extends('admin.layouts.default')
@section('title', 'Create Member')
<!-- <style>
 .form-check {
  display: block;
  min-height: 1.5rem;
  padding-left: 1.5em;
  margin-bottom: .125rem;
}
.checkbox-title {
  background: var(--white);
  color: var(--primary);
  font-family: 'Roboto', sans-serif;
  font-size: 1.3rem;
  font-weight: 700;
  text-transform: uppercase;
}
.section_title {
  text-align: center;
  font-size: 1.6rem;
}
 @media screen and (min-width: 992px) {
   .checkbox-border {
    border: 0.1rem solid #4BC4CC;
    padding-left: 3rem;
    margin-top: 2rem;
    position: relative;
  }
  }
  @media screen and (min-width: 992px) {
  .checkbox-title {
    background: var(--white);
    color: black;
    font-size: 1.2rem;
    padding: 0 1rem;
    position: absolute;
    top: -0.8rem;
    left: 3rem;
  }
}
@media screen and (min-width: 992px) {
 .form-check {
    margin-top: 1.0rem;
  }
}
</style> -->
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Member</h1>
                    </div> 
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">User</a></li>
                            <li class="breadcrumb-item active">Member</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-body">
                            <form action="{{ route('controlMembers.store')}}" id="join_form" method="post" enctype="multipart/form-data">
                                @csrf
                                <h2 class="section_title">COMPANY INFORMATION</h2>
                                <div class="row">
                                    <div class="col-sm-6">

                                    <div class="form-group errorshow">
                                    <input type="text" class="form-control" placeholder="Organization Name" name="organization_name" value="">
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                    <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" value="">
                                    </div>
                                    </div>
                                    </div>


                                <div class="row">
                                    <div class="col-sm-6">

                                    <div class="form-group errorshow">
                                    <input type="text" class="form-control" placeholder="Website Address" name="website_address" value="">
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                    <input type="number" class="form-control" placeholder="Number of Employees" name="number_of_employees" value="">
                                    </div>
                                    </div>
                                    </div>

                                <div class="row">
                                    <div class="col-sm-12">

                                    <div class="form-group errorshow">
                                    <input type="email" class="form-control" placeholder="Billing Email" name="billing_email" value="">
                                    </div>
                                    </div>
                                    </div>

                                <div class="row">
                                    <div class="col-sm-12">

                                    <div class="form-group errorshow">
                                    <input type="text" class="form-control" placeholder="Billing Address" name="billing_address" value="">
                                    </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-sm-6">

                                    <div class="form-group errorshow">
                                    <input type="text" class="form-control" placeholder="Billing City" name="billing_city" value="">
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                    <input type="text" class="form-control" placeholder="Billing State" name="billing_state" value="">
                                    </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-sm-6">

                                    <div class="form-group errorshow">
                                    <input type="text" class="form-control" placeholder="Billing Zip (Billing zip code must match credit card billing address)" name="billing_zip" value="">
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                    <input type="text" class="form-control" placeholder="Billing Country" name="billing_country" value="">
                                    </div>
                                    </div>
                                    </div>
                       
                                    <div class="row">
                                    <div class="col-sm-12">

                                    <div class="form-group errorshow errorshow">
                                <div class="checkbox-border">
                                    <h3 class="checkbox-title">Is the billing address the same as the Physical Address?</h3>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="yes" name="address_check" value="1" >
                                        <label class="form-check-label" for="yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="no" name="address_check" value="0" checked>
                                        <label class="form-check-label" for="no">No</label>
                                    </div>
                                </div>
                                </div>
                                    </div>
                                    </div>

                                    <h2 class="section_title">PRIMARY CONTACT INFORMATION</h2>

                                    <div class="row">
                                    <div class="col-sm-6">

                                    <div class="form-group errorshow">
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name" value="">
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                    <input type="text" class="form-control" placeholder="Last Number" name="last_name" value="">
                                    </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-sm-6">

                                    <div class="form-group errorshow">
                                    <input type="text" class="form-control" placeholder="Title" name="title" value="">
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                    <input type="text" class="form-control" placeholder="Phone" name="primary_phone" value="">
                                    </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-sm-6">

                                    <div class="form-group errorshow">
                                    <input type="email" class="form-control" placeholder="Email" name="email" id="email_check" value="">
                                        <input type="hidden" name="email_valid" id="email_valid">
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    </div>
                                    </div>

                                    <h2 class="section_title">MEMBERSHIP LEVEL</h2>

                                    <div class="row">
                                    <div class="col-sm-12">

                                    <div class="form-group errorshow">
                                <select class="form-control" name="membership_level">
                                    <option selected disabled>Please Select A Member Level</option>
                                                                            <option value="BASIC ($500 ANNUALLY)" >BASIC ($500 ANNUALLY)</option>
                                                                            <option value="PROFESSIONAL ($1000 ANNUALLY)" >PROFESSIONAL ($1000 ANNUALLY)</option>
                                                                            <option value="BUSINESS ($1,700 ANNUALLY)" >BUSINESS ($1,700 ANNUALLY)</option>
                                                                            <option value="EXECUTIVE ($2,500 ANNUALLY)" >EXECUTIVE ($2,500 ANNUALLY)</option>
                                                                            <option value="PREMIER ($5,000 ANNUALLY)" >PREMIER ($5,000 ANNUALLY)</option>
                                                                    </select>
                                </div>
                                    </div>
                                    </div>
                                    <h2 class="section_title">ABOUT YOUR ORGANIZATION</h2>

                                    <div class="row">
                                    <div class="col-sm-12">

                                    <div class="form-group errorshow">
                                    <select class="form-control" name="about_organization">
                                    <option selected disabled>Please select a category that best describes your business</option>
                                     
                                        <option value="Startup/Small Business" >Startup/Small Business</option>
                                     
                                        <option value="Academic/Educator" >Academic/Educator</option>
                                     
                                        <option value="Industry Professional" >Industry Professional</option>
                                     
                                        <option value="Mid-Size Business" >Mid-Size Business</option>
                                                                    </select>
                                </div>
                                    </div>
                                    <div class="col-sm-12">

                                    <div class="form-group errorshow">
                                    <select class="form-control" name="ownership_structure">
                                    <option selected disabled>Ownership Structure</option>
                                                                            <option value="Sole Proprietorship" >Sole Proprietorship</option>
                                                                            <option value="Partnership" >Partnership</option>
                                                                            <option value="C Corp/S Corp" >C Corp/S Corp</option>
                                                                            <option value="Non-Profit" >Non-Profit</option>
                                                                    </select>
                                </div>
                                    </div>
                                    </div>
                                    <h2 class="section_title">REASON FOR JOINING</h2>
                                    <p>What are your reasons for joining the CASTNET Chamber? You may select as many options as you would like.</p>
                                    <div class="row">
                                    <div class="col-sm-12">

                                    <div class="form-group errorshow">
                                    <select class="form-control" name="reason_joining">
                                        <option selected disabled>Select Options</option>
                                                                                    <option value="Access to industry specific resources" >Access to industry specific resources</option>
                                                                                    <option value="Explore partnership or sponsorship opportunities" >Explore partnership or sponsorship opportunities</option>
                                                                                    <option value="Find events and networking opportunities" >Find events and networking opportunities</option>
                                                                                    <option value="Global project opportunities" >Global project opportunities</option>
                                                                                    <option value="Access to financing and investors" >Access to financing and investors</option>
                                                                                    <option value="Other" >Other</option>
                                                                            </select>
                                </div>
                                    </div>
                                    </div>
                                    <div class="card-footer" style="background:none;">
                                    <button id="sectionslist" type="submit" class="btn btn-sm btn-primary" style="float: right;">Create Member</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    $('#section4').validate({ 
        rules: {
            title: {
                required: true,
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

    // validation start from here ******************************* below code

    $(function() {
        $('#join_form').validate({
        rules: {
            organization_name: {
                required: true,
            },
            full_name: {
                required: true,
            },
            card_number: {
                required: true,
                number: true,
                creditcard: true,
            },
            expiry_month: {
                required: true,
            },
            expiry_year: {
                required: true,
            },
            cvv: {
                required: true,
                number: true,
                maxlength: 4,
            },
            phone_number: {
                required: true,
            },
            website_address: {
                required: true,
            },
            number_of_employees: {
                required: true,
            },
            billing_email: {
                required: true,
                email: true,
            },
            billing_address: {
                required: true,
            },
            billing_city: {
                required: true,
            },
            billing_state: {
                required: true,
            },
            billing_zip: {
                required: true,
            },
            billing_country: {
                required: true,
            },
            address_check: {
                required: true,
            },
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            title: {
                required: true,
            },
            primary_phone: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },
            membership_level: {
                required: true,
            },
            about_organization: {
                required: true,
            },
            ownership_structure: {
                required: true,
            },
            reason_joining: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address."
            },
            billing_email: {
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

    $("body").on("submit", "#join_form", function (e) {
        var $form = $(this);
        var $inputs = $form.find('.required');
        var $errorMessage = $form.find('div.error');
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');

        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });

    });

});
</script>
@endpush
