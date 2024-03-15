@extends('web.layouts.default')
@section('content')
<section class="section_breadcrumb about_bg" style="
background: linear-gradient(90deg, rgba(7, 27, 52, 0.80) 0%, rgba(7, 27, 52, 0.61) 51.46%, rgba(7, 27, 52, 0.42) 99.24%, rgba(7, 27, 52, 0.28) 99.7%, rgba(7, 27, 52, 0.00) 100%), url({{ asset('assets/web/images/' . $banner->image) }}) center no-repeat;
background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="breadcrumb_title">Privacy Policy</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html">home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">PRIVACY POLICY</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb End -->

<section class="section_block welcome pt-5 pb-0">
    <div class="container">
        <div class="row gy-5 gy-md-0 gx-md-5">
            <div class="col-lg-12 mb-5" style="text-align: center;" data-aos="fade-right" data-aos-duration="1000">
                {!! $section1->text !!}
            </div>
            <div class="dotted-line"></div>
        </div>
    </div>
    <section class="section_block welcome pb-0">
        <div class="container">
            <div class="row gy-5 gy-md-0 gx-md-5">
                <div class="col-lg-12 order-2 order-md-1" data-aos="fade-right" data-aos-duration="1000">
                    {!! $section2->text !!}
                </div>
            </div>
        </div>
    </section>
</section>
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
