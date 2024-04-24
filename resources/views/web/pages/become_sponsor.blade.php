@extends('web.layouts.default')
@section('keywords'){{$keywords??'Castnet'}}@endsection
@section('content')

    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb partners_sponsors_bg" style="
    background: linear-gradient(90deg, rgba(7, 27, 52, 0.80) 0%, rgba(7, 27, 52, 0.61) 51.46%, rgba(7, 27, 52, 0.42) 99.24%, rgba(7, 27, 52, 0.28) 99.7%, rgba(7, 27, 52, 0.00) 100%), url({{ asset('assets/web/images/' . $banner->image) }}) center no-repeat;
    background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb_title">{{$banner->title}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('web.index') }}">home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('web.partners_sponsors') }}">partners/sponsors</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$banner->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Become Partner Values Start -->
    <section class="section_block become_partner">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <h2 class="section_title" data-aos="fade-up" data-aos-duration="1000">{{$section1->title}}</h2>
                    <p class="section_text" data-aos="fade-up" data-aos-duration="1000">{!! $section1->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Become Partner Values End -->

    <!-- Sponsorship Category Start -->
    <section class="section_block sponsorship_category">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="section_title" data-aos="fade-up" data-aos-duration="1000">{{$title->title}}</h2>
                </div>
            </div>
            <div class="row gy-4 gx-md-4">
                @foreach($section2 as $item)
                <div class="col-md-4 col-lg-4 d-flex">
                    <div class="card" data-aos="fade-right" data-aos-duration="1000">
                        <div class="card-body">
                            <h3 class="card-title">{{$item->title}}</h3>
                            <p class="card-text">{!! $item->description !!}</p>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </section>
    <!-- Sponsorship Category End -->

    <!-- Sponsors Start -->
    <section class="section_block sponsors">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section_title mb-5 mt-0" data-aos="fade-up" data-aos-duration="1000">{{ $title2->title }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="swiper sponsorSwiper">
                        <div class="swiper-wrapper">
                            @foreach($partners as $item)
                            <div class="swiper-slide">
                                <div class="img-box">
                                    <a href="{{$item->url}}">
                                        <img src="{{ asset('assets/web/images/'.$item->image) }}" alt="{{$item->title}}" class="img-fluid">
                                        <h3 class="text-center">{{$item->title}}</h3>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sponsors End -->

<!-- Become Sponsor Form Start -->
<section class="section_block become_sponsor_form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section_title">Sponsorship Form</h2>
                <form action="{{ route('charge.sponsor') }}" id="sponsor_form" method="POST"
                role="form" 
                class="require-validation"
                data-cc-on-file="false"
                data-stripe-publishable-key="{{ env('STRIPE_PUBLISH_KEY') }}">
                    @csrf
                    <div class="form_box" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="row mb-4">
                            <div class="col-12">
                                <h3 class="form_box_title">Sponsor Information:</h3>
                            </div>
                        </div>
                        <div class="row gy-4 mb-4 row_padding">
                            <div class="col-12 col-md-6 errorshow">
                                <input type="text" class="form-control" placeholder="Sponsor's Name" name="sponsor_name">
                            </div>
                            <div class="col-12 col-md-6 errorshow">
                                <input type="text" class="form-control" placeholder="Contact Person's Name" name="contact_person_name">
                            </div>
                            @if(isset(auth()->user()->email))
                                <div class="col-12 col-md-12">
                                    <div class="form-group errorshow">
                                        <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" readonly>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 col-md-6 errorshow">
                                    <input type="email" class="form-control" id="email_check" placeholder="Email Address" name="email">
                                    <input type="hidden" name="email_valid" id="email_valid">
                                    <div id="email_message"></div>
                                </div> 
                                <div class="col-12 col-md-6 errorshow">
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                            @endif
                            <div class="col-12 col-md-6 errorshow">
                                <input type="text" class="form-control" placeholder="Phone Number" name="phone_number">
                            </div>
                            <div class="col-12 col-md-6 errorshow">
                                <input type="text" class="form-control" placeholder="Website URL (optional)" name="website_url">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <h3 class="form_box_title">Sponsorship Interest Area:</h3>
                            </div>
                        </div>
                        <div class="row gy-4 mb-4 row_padding">
                            <div class="col-12 col-md-6 errorshow">
                                <select class="form-select" name="industry_sector">
                                    <option selected disabled>Industry Sectors</option>
                                    <option value="construction">Construction</option>
                                    <option value="agriculture">Agriculture</option>
                                    <option value="supply_chain">Supply Chain</option>
                                    <option value="technology">Technology</option>
                                    <option value="natural_resources">Natural Resources</option>
                                    <option value="energy">Energy</option>
                                    <option value="textiles">Textiles</option>
                                    <option value="advocacy">Advocacy</option>
                                </select>                                
                            </div>
                            <div class="col-12 col-md-6 errorshow">
                                <select class="form-select" name="specific_interest">
                                    <option selected disabled>Specific Interest in Sponsorship</option>
                                    <option value="events">Events</option>
                                    <option value="programs">Programs</option>
                                    <option value="advocacy_for_indigenous_people">Advocacy for Indigenous People</option>
                                    <option value="women">Women</option>
                                    <option value="veterans">Veterans</option>
                                    <option value="disabled_persons">Disabled Persons</option>
                                    <option value="young_entrepreneurs">Young Entrepreneurs</option>
                                </select>                                
                            </div>
                            <div class="col-12 errorshow">
                                <input type="text" class="form-control" placeholder="Preferred Geographic Focus" name="geographic_focus">
                            </div>
                            <div class="col-12">
                                <div class="checkbox-border errorshow">
                                    <h3 class="checkbox-title">Sponsorship Level Preferences</h3>
                                    <div class="row gy-3">
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="sponsorship_level" id="platinum_sponsor">
                                                <label class="form-check-label" for="platinum_sponsor">Platinum Sponsor</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="sponsorship_level" id="gold_sponsor">
                                                <label class="form-check-label" for="gold_sponsor">Gold Sponsor</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="sponsorship_level" id="silver_sponsor">
                                                <label class="form-check-label" for="silver_sponsor">Silver Sponsor</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="sponsorship_level" id="custom_sponsorship">
                                                <label class="form-check-label" for="custom_sponsorship">Custom Sponsorship</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <h3 class="form_box_title">Sponsorship Goals and Objectives:</h3>
                            </div>
                        </div>
                        <div class="row gy-4 mb-4 row_padding">
                            <div class="col-12 errorshow">
                                <textarea cols="30" rows="7" class="form-control" placeholder="What you hope to achieve through their sponsorship" name="sponsorship_goals"></textarea>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="checkbox-border errorshow">
                                    <h3 class="checkbox-title">Previous Sponsorship Experiences</h3>
                                    <div class="row gy-3">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="sponsorship_experiences" id="prev_yes">
                                                <label class="form-check-label" for="prev_yes">Yes</label>
                                                <input type="text" class="form-control" placeholder="details about past sponsorships">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="sponsorship_experiences" id="prev_no">
                                                <label class="form-check-label" for="prev_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="checkbox-border errorshow">
                                    <h3 class="checkbox-title">Sponsorship Agreement Preferences</h3>
                                    <div class="row gy-3">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="sponsorship_preferences" id="pref_yes">
                                                <label class="form-check-label" for="pref_yes">Yes</label>
                                                <input type="text" class="form-control" placeholder="Specific terms or conditions">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="sponsorship_preferences" id="pref_no">
                                                <label class="form-check-label" for="pref_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <h3 class="form_box_title">Budget Information:</h3>
                            </div>
                        </div>
                        <div class="row gy-4 mb-4 row_padding">
                            <div class="col-md-6 errorshow">
                                <input type="text" class="form-control" placeholder="Estimated Budget for Sponsorship" name="sponsorship_budget">
                            </div>
                            <div class="col-md-6 errorshow">
                                <select class="form-select" name="payment_schedule">
                                    <option selected disabled>Preferred Payment Schedule</option>
                                    <option value="one_time">One-Time</option>
                                    <option value="quarterly">Quarterly</option>
                                </select>                                
                            </div>
                            <div class="col-12">
                                <div class="checkbox-border errorshow">
                                    <h3 class="checkbox-title">Additional Support Offered</h3>
                                    <div class="row gy-3">
                                        <div class="col-md-4">
                                            <div class="form-check d-inline-block">
                                                <input type="radio" class="form-check-input" name="additional_support" id="kind_support">
                                                <label class="form-check-label" for="kind_support">In-kind Support (services, products, expertise)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-md-center">
                                            <div class="form-check d-inline-block">
                                                <input type="radio" class="form-check-input" name="additional_support" id="volunteer_support">
                                                <label class="form-check-label" for="volunteer_support">Volunteer Support</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-md-center">
                                            <div class="form-check d-inline-block">
                                                <input type="radio" class="form-check-input" name="additional_support" id="other">
                                                <label class="form-check-label" for="other">Other</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-4 row_padding">
                            <div class="col-12">
                                <div class="checkbox-border errorshow">
                                    <h3 class="checkbox-title">How Did You Hear About Us?</h3>
                                    <div class="row gy-3">
                                        <div class="col-lg-3">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="hear_about" id="social_media">
                                                <label class="form-check-label" for="social_media">Social Media</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="hear_about" id="referral">
                                                <label class="form-check-label" for="referral">Referral</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="hear_about" id="event">
                                                <label class="form-check-label" for="event">Event</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="hear_about" id="online_search">
                                                <label class="form-check-label" for="online_search">Online Search</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <div class="d-flex gap-4 align-items-center">
                                                    <div>
                                                        <input type="radio" class="form-check-input" name="hear_about" id="hear_other">
                                                        <label class="form-check-label" for="hear_other">Other</label>
                                                    </div>
                                                    <input type="text" class="form-control w-md-50" placeholder="Details about past partnership experiences">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 row_padding">
                            <div class="col-12">
                                <div class="checkbox-border errorshow">
                                    <h3 class="checkbox-title">Data Protection Consent</h3>
                                    <div class="row gy-3">
                                        <div class="col-md-4">
                                            <div class="form-check d-inline-block">
                                                <input type="radio" class="form-check-input" name="data_protection_consent" id="compliance">
                                                <label class="form-check-label" for="compliance">GDPR compliance</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-md-center">
                                            <div class="form-check d-inline-block">
                                                <input type="radio" class="form-check-input" name="data_protection_consent" id="consent_to_store">
                                                <label class="form-check-label" for="consent_to_store">Consent to Store</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-md-center">
                                            <div class="form-check d-inline-block">
                                                <input type="radio" class="form-check-input" name="data_protection_consent" id="data_protection_consent_other">
                                                <label class="form-check-label" for="data_protection_consent_other">Other</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        {{-- payment detail start --}}
                        <div class="form_box" data-aos="zoom-in" data-aos-duration="1000" style="padding: 40px 50px 0 50px">
                            <h2 class="section_title">Payment Details</h2>
                            <div class="row gy-4" style="margin-bottom: 15px">
                                <div class="col-12 col-md-4">
                                    <div class="form-group errorshow">
                                        <input type="text" value="${{$amount->fee}}" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group errorshow">
                                    <input type="text" class="form-control" placeholder="Name on Card" name="full_name">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group errorshow">
                                    <input type="number" class="form-control card-number" min="1" placeholder="Card Number" name="card_number">
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4">
                                <div class="col-12 col-md-4">
                                    <div class="form-group errorshow">
                                    <input type="number" class="form-control card-cvc" size='4' placeholder="CVC" name="cvv">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group errorshow">
                                        <select class="form-control card-expiry-month" name="expiry_month">
                                            <option disabled selected>MM</option>
                                            @foreach(range(1, 12) as $month)
                                                <option value="{{$month}}">{{$month}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group errorshow">
                                        <select class="form-control card-expiry-year" name="expiry_year">
                                            <option disabled selected>YYYY</option>
                                            @foreach(range(date('Y'), date('Y') + 10) as $year)
                                                <option value="{{$year}}">{{$year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class='form-row row mt-2'>
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'>Please correct the errors and try again.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- payment deatil end --}}
                    <div class="text-center mt-5" data-aos="fade-right" data-aos-duration="1000">
                        <button type="submit" class="btn btn-submit">Submit Your Sponsorship Form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Become Sponsor Form End -->


    <!-- Ready to Join Start -->
    <section class="section_block ready_to_join">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="section_title">{{ joinWidget()->title }}</h2>
                    <p class="text">{{ joinWidget()->description }}</p>
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-3 gap-md-5">
                        <a href="{{ joinWidget()->button1_link }}" class="btn btn-primary">
                            <span>{{ joinWidget()->button1 }}</span>
                            <img src="assets/web/images/icon_log.png" alt="login" class="img-login">
                        </a>
                        <a href="{{ joinWidget()->button2_link }}" class="btn btn-contact">{{ joinWidget()->button2 }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Ready to Join end -->

@stop
@push('scripts')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
$(function() {
    $('#sponsor_form').validate({
        rules: {
            sponsor_name: {
                required: true,
            },
            contact_person_name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },
            phone_number: {
                required: true,
            },
            website_url: {
                required: true,
            },
            industry_sector: {
                required: true,
            },
            specific_interest: {
                required: true,
            },
            geographic_focus: {
                required: true,
            },
            sponsorship_level: {
                required: true,
            },
            sponsorship_goals: {
                required: true,
            },
            sponsorship_experiences: {
                required: true,
            },
            sponsorship_preferences: {
                required: true,
            },
            sponsorship_budget: {
                required: true,
            },
            payment_schedule: {
                required: true,
            },
            additional_support: {
                required: true,
            },
            hear_about: {
                required: true,
            },
            data_protection_consent: {
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
            cvv: {
                required: true,
            },
            expiry_month: {
                required: true,
            },
            expiry_year: {
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
    $("body").on("submit", "#sponsor_form", function (e) {
        var data = $('#email_valid').val();
        if(data=='not valid'){
            e.preventDefault();
        }
    });

    $("body").on("submit", "#sponsor_form", function (e) {
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

        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }
    });

    function stripeResponseHandler(status, response) {
        var $form = $('.require-validation');
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});
</script>
@endpush
