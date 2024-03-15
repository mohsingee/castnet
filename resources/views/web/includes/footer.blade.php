<!-- Footer Start -->
@php
$setting = appSetting();
$result = socialLinks();
@endphp
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('web.index') }}">
                    <img src="{{ asset('assets/web/images/'.$setting->footer_logo) }}" alt="logo" class="footer_logo">
                </a>
                <p class="footer_text">{{ $setting->footer_description }}</p>
                <div class="d-flex gap-3">
                    <a href="{{ !empty($result->facebook) ? $result->facebook : '#' }}" class="social_link">
                        <img src="{{ asset('assets/web/images/icon_fb.png') }}" alt="social icons" class="img-icon">
                    </a>
                    <a href="{{ !empty($result->twitter) ? $result->twitter : '#' }}" class="social_link">
                        <img src="{{ asset('assets/web/images/icon_tw.png') }}" alt="social icons" class="img-icon">
                    </a>
                    <a href="{{ !empty($result->linkedin) ? $result->linkedin : '#' }}" class="social_link">
                        <img src="{{ asset('assets/web/images/icon_li.png') }}" alt="social icons" class="img-icon">
                    </a>
                    <a href="{{ !empty($result->instagram) ? $result->instagram : '#' }}" class="social_link">
                        <img src="{{ asset('assets/web/images/icon_ig.png') }}" alt="social icons" class="img-icon">
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mt-lg-5">
                <div class="ms-lg-5">
                    <div class="footer_heading">main links</div>
                    <div class="footer_links">
                        <a href="{{route('web.index')}}" class="footer_link">Home</a>
                        <a href="{{route('web.about')}}" class="footer_link">About us</a>
                        <a href="{{route('web.membership')}}" class="footer_link">Membership</a>
                        <a href="{{route('web.sectors')}}" class="footer_link">Sectors</a>
                        <a href="{{route('web.advocacy')}}" class="footer_link">Advocacy</a>
                        <a href="{{route('web.financial')}}" class="footer_link">Financial</a>
                        <a href="{{route('web.privacypolicy')}}" class="footer_link">Privacy & Policy</a>
                        <a href="{{route('web.termsuse')}}" class="footer_link">Term Of Use</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mt-lg-5">
                <div class="footer_heading">contact</div>
                <div class="footer_links">
                    <div class="contact_media">
                        <div class="icon">
                            <img src="{{ asset('assets/web/images/icon_phone.png') }}" alt="phone" class="img-fluid">
                        </div>
                        <div class="text">
                            <a href="tel:{{ $setting->phone ?? '' }}">{{ $setting->phone ?? '' }}</a>
                        </div>
                    </div>
                    <div class="contact_media">
                        <div class="icon">
                            <img src="{{ asset('assets/web/images/icon_email.png') }}" alt="phone" class="img-fluid">
                        </div>
                        <div class="text">
                            <a href="mailto:{{ $setting->email ?? '' }}">{{ $setting->email ?? ''}}</a>
                        </div>
                    </div>
                    <div class="contact_media">
                        <div class="icon">
                            <img src="{{ asset('assets/web/images/icon_map.png') }}" alt="phone" class="img-fluid">
                        </div>
                        <div class="text">{{ $setting->address ?? '' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mt-lg-5">
                <div class="footer_heading text-uppercase">our newsletter</div>
                <form id="newsletter">
                    <input type="email" id="email" class="form-control" required placeholder="Your Email Address">
                    <button type="submit" class="btn btn-submit">subscribe</button>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p class="text-center text-lg-start fw-light fs-5">&copy; Copyright <?=date('Y')?> international chamber of Commerce. All rights reserved</p>
                </div>
                <div class="col-lg-6">
                    <p class="text-center text-lg-end fw-light fs-5"><a href="https://leadconcept.com/" onclick="window.open(this.href, '_blank', 'resizable=yes'); return false;">Designed &amp; Developed by LEADconcept</a></p>
                </div>
            </div>
        </div>
    </div>

    {{-- Back to Top --}}
    <a href="#top" class="btn-top">
        <img src="/assets/web/images/angle_down.png" alt="">
    </a>
</footer>

<!-- REQUIRED SCRIPTS -->
@include('web.includes.script')
<script>
$(window).scroll(function() {
	var $height = $(window).scrollTop();
	if($height > 500) {
            $('.btn-top').addClass('scrollVisible');
        } else {
            $('.btn-top').removeClass('scrollVisible');
        }
    });
</script>