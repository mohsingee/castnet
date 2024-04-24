@extends('web.layouts.default')
@section('keywords'){{$keywords??'Castnet'}}@endsection
@section('content')

    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb outreach_bg" style="
    background: linear-gradient(90deg, rgba(7, 27, 52, 0.80) 0%, rgba(7, 27, 52, 0.61) 51.46%, rgba(7, 27, 52, 0.42) 99.24%, rgba(7, 27, 52, 0.28) 99.7%, rgba(7, 27, 52, 0.00) 100%), url({{ asset('assets/web/images/' . $banner->image) }}) center no-repeat;
    background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb_title">{{$banner->title}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('web.index') }}">home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('web.outreach') }}">outreach</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$banner->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Map Start -->
    <section class="section_map" data-aos="zoom-in" data-aos-duration="1000">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="img-padding">
                    <img src="{{ asset('assets/web/images/'.$section1->image) }}" alt="map" class="img-map">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Map End -->

    <!-- Outreach Inner CTA Start -->
    <section class="section_block outreach_inner_cta">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="section_title">{{$section1->title}}</h2>
                    <p class="text col-md-10 mx-auto">{!! $section1->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Outreach Inner CTA End -->

    <!-- Section Alt Start -->
    <section class="section_block section_block_alt">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                    <div class="img_border">
                        <img src="{{ asset('assets/web/images/'.$section2->image)}}" alt="culture_chad">
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

    @stop
