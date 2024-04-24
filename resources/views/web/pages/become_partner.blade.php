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
            <div class="row mb-5">
                <div class="col-md-10 mx-auto">
                    <h2 class="section_title" data-aos="fade-up" data-aos-duration="1000">{{$section1->title}}</h2>
                    <p class="section_text" data-aos="fade-up" data-aos-duration="1000">{!! $section1->description !!}</p>
                </div>
            </div>
            <div class="row gy-4 gy-lg-0 gx-lg-4">
                @foreach($section1s as $item)
                <div class="col-md-6 col-lg-3 d-flex">
                    <div class="card" data-aos="zoom-in-right" data-aos-duration="1000">
                        <div class="card-body">
                            <img src="{{ asset('assets/web/images/'.$item->image) }}" alt="icon" class="img-icon">
                            <h3 class="card-title">{{$item->title}}</h3>
                            <p class="card-text">{!! $item->description !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Become Partner Values End -->

    <!-- Section Alt Start -->
    <section class="section_block why_join light_blue_bg pb-50">
        <div class="container">
            <div class="row gy-5 gy-lg-0 gx-md-5">
                <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="section_title fw-bold">{{$section2->title}}</h2>
                    <p class="about_text">{!! $section2->description !!}</p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                    <div class="img_border">
                        <img src="{{ asset('assets/web/images/'.$section2->image) }}" alt="startup">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Alt End -->

    <!-- Partnership Scale Start -->
    <section class="section_block member_benefits white_ghost_bg">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-9 mx-auto text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="section_title mb-0">{{$title->title}}</h2>
                </div>
            </div>
            <div class="row gy-4">
                @foreach($section3 as $item)
                <div class="col-md-4 col-lg-4 d-flex">
                    <div class="card vip_card flex-grow-1 border-radius-0" data-aos="fade-right" data-aos-duration="1000">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset('assets/web/images/'.$item->image) }}" alt="icon" class="img-icon">
                            </div>
                            <h3 class="card-text">{{$item->title}}</h3>
                            <p class="card-desc">{!! $item->description !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Partnership Scale End -->

    <!-- Sponsors Start -->
    <section class="section_block sponsors">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section_title mb-5 mt-0" data-aos="fade-up" data-aos-duration="1000">our partners</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="swiper sponsorSwiper">
                        <div class="swiper-wrapper">
                            @foreach($partners as $partner)
                            <div class="swiper-slide">
                                <div class="img-box">
                                    <a href="{{$partner->url}}">
                                        <img src="{{ asset('assets/web/images/'.$partner->image)}}" alt="{{$partner->title}}" class="img-fluid">
                                        <h3 class="text-center">{{$partner->title}}</h3>
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

    {{-- form start ********************************************************************************************** --}}
    <section class="section_block become_partner_form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section_title">Partnership Form</h2>
                    <form action="{{ route('store.partneruser') }}" id="partner_form" method="POST">
                        @csrf
                        <div class="form_box" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h3 class="form_box_title">Partner Information:</h3>
                                </div>
                            </div>
                            <div class="row gy-4 mb-4 row_padding">
                                <div class="col-12 col-md-6 errorshow">
                                    <input type="text" class="form-control" placeholder="Organization/Individual Name" name="organization_name" value="{{ session('partnerData.organization_name') }}">
                                </div>
                                <div class="col-12 col-md-6 errorshow">
                                    <input type="text" class="form-control" placeholder="Contact Person's Name" name="contact_person_name" value="{{ session('partnerData.contact_person_name') }}">

                                </div>
                                @if(isset(auth()->user()->email))
                                    <div class="col-12 col-md-12">
                                        <div class="form-group errorshow">
                                            <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" readonly>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-12 col-md-6 errorshow">
                                        <input type="email" class="form-control" id="email_check" placeholder="Email Address" name="email" value="{{ session('partnerData.email') }}">
                                        <input type="hidden" name="email_valid" id="email_valid">
                                        <div id="email_message"></div>
                                    </div>
                                    <div class="col-12 col-md-6 errorshow">
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                @endif
                                <div class="col-12 col-md-6 errorshow">
                                    <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" value="{{ session('partnerData.phone_number') }}">
                                </div>
                                <div class="col-12 col-md-6 errorshow">
                                    <input type="text" class="form-control" placeholder="Organization's Website (if applicable)" name="organization_website" value="{{ session('partnerData.organization_website') }}">
                                </div>
                            </div>
                            <div class="row gy-4 gy-md-0 mb-4">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form_box_title mb-4">Partnership Interest Area:</h3>
                                        </div>
                                        <div class="col-12 row_padding errorshow">
                                            <select class="form-select" name="industry_sector">
                                                <option selected disabled>Industry Sectors</option>
                                                <option value="construction" {{ session('partnerData.industry_sector') == 'construction' ? 'selected' : '' }}>Construction</option>
                                                <option value="agriculture" {{ session('partnerData.industry_sector') == 'agriculture' ? 'selected' : '' }}>Agriculture</option>
                                                <option value="supply chain" {{ session('partnerData.industry_sector') == 'supply chain' ? 'selected' : '' }}>Supply Chain</option>
                                                <option value="technology" {{ session('partnerData.industry_sector') == 'technology' ? 'selected' : '' }}>Technology</option>
                                                <option value="natural_resources" {{ session('partnerData.industry_sector') == 'natural_resources' ? 'selected' : '' }}>Natural Resources</option>
                                                <option value="energy" {{ session('partnerData.industry_sector') == 'energy' ? 'selected' : '' }}>Energy</option>
                                                <option value="textiles" {{ session('partnerData.industry_sector') == 'textiles' ? 'selected' : '' }}>Textiles</option>
                                                <option value="advocacy" {{ session('partnerData.industry_sector') == 'advocacy' ? 'selected' : '' }}>Advocacy</option>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 errorshow">
                                    <div class="checkbox-border">
                                        <h3 class="checkbox-title">Duration of Partnership</h3>
                                        <div class="row gy-3">
                                            <div class="col-md-4">
                                                <div class="form-check d-inline-block">
                                                    <input type="radio" class="form-check-input" value="Short-Term" name="partnership_dur" id="short_term" {{ session('partnerData.partnership_dur') == 'Short-Term' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="short_term">Short-Term</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-md-center">
                                                <div class="form-check d-inline-block">
                                                    <input type="radio" class="form-check-input" value="Long Term" name="partnership_dur" id="long_term" {{ session('partnerData.partnership_dur') == 'Long-Term' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="long_term">Long-Term</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-4 row_padding">
                                <div class="col-12 col-md-6 d-flex">
                                    <div class="checkbox-border flex-grow-1 errorshow">
                                        <h3 class="checkbox-title">Type of Partnership Interest</h3>
                                        <div class="row gy-3">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" value="Project Collaboration" name="partnership_interest" id="project_collaboration" {{ session('partnerData.partnership_interest') == 'Project Collaboration' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="project_collaboration">Project Collaboration</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" value="In-Kind Support" name="partnership_interest" id="kind_support" {{ session('partnerData.partnership_interest') == 'In-Kind Suppor' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="kind_support">In-Kind Support</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" value="Expertise Sharing" name="partnership_interest" id="expertise_sharing" {{ session('partnerData.partnership_interest') == 'Expertise Sharing' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="expertise_sharing">Expertise Sharing</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" value="Advocacy Programs" name="partnership_interest" id="advocacy_programs" {{ session('partnerData.partnership_interest') == 'Advocacy Program' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="advocacy_programs">Advocacy Programs</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 d-flex">
                                    <div class="checkbox-border flex-grow-1 errorshow">
                                        <h3 class="checkbox-title">Previous Partnership Experiences:</h3>
                                        <div class="row gy-3">
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input type="radio" value="Yes" {{ session('partnerData.previous_partnership') == 'Yes' ? 'checked' : '' }} class="form-check-input" name="previous_partnership" id="prev_yes">
                                                    <label class="form-check-label" for="prev_yes">Yes</label>
                                                    <input type="text" class="form-control" placeholder="Details about past partnership experiences" name="past_partnership_details" value="{{ session('partnerData.past_partnership_details') }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input type="radio" value="No" {{ session('partnerData.previous_partnership') == 'No' ? 'checked' : '' }} class="form-check-input" name="previous_partnership" id="prev_no">
                                                    <label class="form-check-label" for="prev_no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 errorshow">
                                    <input type="text" class="form-control" placeholder="Target Geographic Region(s) for Partnership" name="target_geographic_regions" value="{{ session('partnerData.target_geographic_regions') }}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12 errorshow">
                                    <h3 class="form_box_title">Partnership Contribution Details:</h3>
                                </div>
                            </div>
                            <div class="row gy-4 mb-4 row_padding">
                                <div class="col-12 errorshow">
                                    <textarea cols="30" rows="7" class="form-control" placeholder="Project Opportunities" name="project_opportunities">{{ session('partnerData.project_opportunities') }}</textarea>
                                </div>
                                <div class="col-12 errorshow">
                                    <textarea cols="30" rows="7" class="form-control" placeholder="Non-Monetary Support Offered (e.g., services, expertise, equipment, software)" name="non_monetary_support">{{ session('partnerData.non_monetary_support') }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12 errorshow">
                                    <h3 class="form_box_title">Goals and Objectives of Partnership:</h3>
                                </div>
                            </div>
                            <div class="row gy-4 mb-4 row_padding">
                                <div class="col-12 errorshow">
                                    <input type="text" class="form-control" placeholder="Goals or Objectives in Partnering with C.A.S.T.N.E.T. (e.g., community impact, market expansion, technology transfer)" name="partnering_goals" value="{{ session('partnerData.partnering_goals') }}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12 errorshow">
                                    <h3 class="form_box_title">Preferred Terms of Partnership:</h3>
                                </div>
                            </div>
                            <div class="row gy-4 mb-4 row_padding">
                                <div class="col-12 errorshow">
                                    <textarea cols="30" rows="7" class="form-control" placeholder="Expected Outcomes and Deliverables" name="expected_outcomes">{{ session('partnerData.expected_outcomes') }}</textarea>
                                </div>
                                <div class="col-12 errorshow">
                                    <textarea cols="30" rows="7" class="form-control" placeholder="Non-Monetary Support Offered (e.g., services, expertise, equipment, software)" name="non_monetary_support_offered">{{ session('partnerData.non_monetary_support_offered') }}</textarea>
                                </div>
                            </div>
                            <div class="row gy-4 mb-4 row_padding">
                                <div class="col-12">
                                    <div class="checkbox-border">
                                        <h3 class="checkbox-title">Legal Compliance and Agreements</h3>
                                        <div class="row gy-3">
                                            <div class="col-12">
                                                <div class="form-check errorshow">
                                                    <input type="checkbox" class="form-check-input" name="legal_compliance_agree" id="legal_compliance_agree" value="Agreement to discuss legal terms and conditions" {{ session('partnerData.legal_compliance_agree') == 'Agreement to discuss legal terms and conditions' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="legal_compliance_agree">Agreement to discuss legal terms and conditions</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check errorshow">
                                                    <input type="checkbox" class="form-check-input" name="legal_compliance_understanding" id="legal_compliance_understanding" value="Understanding of data protection and privacy policy" {{ session('partnerData.legal_compliance_understanding') == 'Understanding of data protection and privacy polic' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="legal_compliance_understanding">Understanding of data protection and privacy policy</label>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-4 row_padding">
                                <div class="col-12">
                                    <div class="checkbox-border">
                                        <h3 class="checkbox-title">How Did You Hear About Us?</h3>
                                        <div class="row gy-3">
                                            <div class="col-lg-3">
                                                <div class="form-check errorshow">
                                                    <input type="radio" class="form-check-input" name="hear_about" id="social_media" value="Social Media" {{ session('partnerData.hear_about') == 'Social Media' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="social_media">Social Media</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check errorshow">
                                                    <input type="radio" class="form-check-input" name="hear_about" id="referral" value="Referral" {{ session('partnerData.hear_about') == 'Referral' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="referral">Referral</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check errorshow">
                                                    <input type="radio" class="form-check-input" name="hear_about" id="event" value="Event" {{ session('partnerData.hear_about') == 'Event' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="event">Event</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check errorshow">
                                                    <input type="radio" class="form-check-input" name="hear_about" id="online_search" value="Online Search" {{ session('partnerData.hear_about') == 'Online Search' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="online_search">Online Search</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <div class="d-flex gap-4 align-items-center errorshow">
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
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h3 class="form_box_title">Additional Information:</h3>
                                </div>
                            </div>
                            <div class="row gy-4 row_padding">
                                <div class="col-12">
                                    <div class="row gy-4 mb-4">
                                        <div class="col-12 errorshow">
                                            <textarea cols="30" rows="7" class="form-control" placeholder="Information" name="additional_information"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 row_padding">
                                <div class="col-12">
                                    <div class="checkbox-border">
                                        <h3 class="checkbox-title">Data Protection Consent</h3>
                                        <div class="row gy-3">
                                            <div class="col-12">
                                                <div class="form-check d-inline-block errorshow">
                                                    <input type="radio" class="form-check-input" name="data_protection_consent" id="data_consent" value="Store and use the provided information for partnership purposes according to privacy laws">
                                                    <label class="form-check-label" for="data_consent">Store and use the provided information for partnership purposes according to privacy laws</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-5" data-aos="fade-right" data-aos-duration="1000">
                            <button type="submit" class="btn btn-submit">Submit Partnership Form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- form end ********************************************************************************************** --}}
    
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
<script>
    $('#partner_form').validate({
        rules: {
            organization_name: {
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
            organization_website: {
                required: true,
            },
            industry_sector: {
                required: true,
            },
            partnership_dur: {
                required: true,
            },
            partnership_interest: {
                required: true,
            },
            previous_partnership: {
                required: true,
            },
            target_geographic_regions: {
                required: true,
            },
            project_opportunities: {
                required: true,
            },
            non_monetary_support: {
                required: true,
            },
            partnering_goals: {
                required: true,
            },
            expected_outcomes: {
                required: true,
            },
            non_monetary_support_offered: {
                required: true,
            },
            legal_compliance_agree: {
                required: true,
            },
            legal_compliance_understanding: {
                required: true,
            },
            hear_about: {
                required: true,
            },
            additional_information: {
                required: true,
            },
            data_protection_consent: {
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

    $("body").on("submit", "#partner_form", function (e) {
        var data = $('#email_valid').val();
        if(data=='not valid'){
            e.preventDefault();
        }
   });
</script>
@endpush