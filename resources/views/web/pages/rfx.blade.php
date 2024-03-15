@extends('web.layouts.default')
@section('content')

    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb rfx_bg" style="
    background: linear-gradient(90deg, rgba(7, 27, 52, 0.80) 0%, rgba(7, 27, 52, 0.61) 51.46%, rgba(7, 27, 52, 0.42) 99.24%, rgba(7, 27, 52, 0.28) 99.7%, rgba(7, 27, 52, 0.00) 100%), url({{ asset('assets/web/images/' . $banner->image) }}) center no-repeat;
    background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb_title">{{$banner->title}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('web.index') }}">home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('web.opportunities') }}">Opportunities</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$banner->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Section Alt Start -->
    <section class="section_block section_block_alt">
        <div class="container">
            <div class="row gx-md-5">
                <div class="col-lg-6 order-1 order-lg-1" data-aos="fade-right" data-aos-duration="1000">
                    <div class="img_border">
                        <img src="{{ asset('assets/web/images/'.$section1->image) }}" alt="rfx_intro">
                    </div>
                </div>
                <div class="col-lg-6 order-2 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                    <h2 class="section_title fw-bold">{{$section1->title}}</h2>
                    <p class="about_text">{!! $section1->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Alt End -->

    <!-- Section Alt Start -->
    <section class="section_block section_block_alt">
        <div class="container">
            <div class="row gx-md-5">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                    <div class="img_border">
                        <img src="{{ asset('assets/web/images/'.$section2->image) }}" alt="rfx_intro">
                    </div>
                </div>
                <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="section_title fw-bold">{{$section2->title}}</h2>
                    <p class="about_text">{!! $section2->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Alt End -->

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

    <!-- Project Opportunities -->
    <section class="section_block section_block_alt">
        <div class="container">
            <div class="row gx-md-5">
                <div class="col-lg-12 order-2 order-lg-1 content-center" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="section_title fw-bold text-center">{{$project->title}}</h2>
                    <p class="about_text">{!! $project->description !!}</p>
                    <a href="{{ $project->button_link }}" class="btn btn-project text-center">{{ $project->button_text }}<img
                        src="{{ asset('assets/web/images/pro-arrow.png') }}" alt="icon login" class="icon-login">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Project Opportunities end -->
@stop