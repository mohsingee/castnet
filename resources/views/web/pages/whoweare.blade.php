@extends('web.layouts.default')
@section('content')

<!-- Breadcrumb Start -->
    <section class="section_breadcrumb who_bg" style="
    background: linear-gradient(90deg, rgba(7, 27, 52, 0.80) 0%, rgba(7, 27, 52, 0.61) 51.46%, rgba(7, 27, 52, 0.42) 99.24%, rgba(7, 27, 52, 0.28) 99.7%, rgba(7, 27, 52, 0.00) 100%), url({{ asset('assets/web/images/' . $banner->image) }}) center no-repeat;
    background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb_title">{{$banner->title}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('web.index') }}">home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('web.about') }}">about us</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$banner->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Welcome Start -->
    <section class="section_block ten_things">
        <div class="container">
            <div class="row gy-5 gy-md-0 gx-md-5">
                <div class="col-md-12 col-lg-12" data-aos="zoom-in" data-aos-duration="1000">
                    {!! $section4->description !!}
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome End -->

    <!-- What We Do Start -->
    <section class="section_block our_value">
        <div class="container">
            <div class="row gy-5 gy-md-0 gx-md-5">
                <div class="col-md-6 col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                    <div class="img_border">
                        <img src="{{ asset('assets/web/images/' . ($section5->image ?? '')) }}" alt="value">

                    </div>
                </div>
                <div class="col-md-6 col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                    {!! $section5->description !!}
                </div>
            </div>
        </div>
    </section>
    <!-- What We Do End -->

    <!-- Principles Start -->
    <section class="section_block principles">
        <div class="container" data-aos="zoom-in" data-aos-duration="1000">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section_title">{{ $section6->heading }}</h2>
                </div>
            </div>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-mission-tab" data-bs-toggle="pill" data-bs-target="#pills-mission" type="button" role="tab" aria-controls="pills-mission" aria-selected="true">{{ $section6 -> subtitle1 }}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-vision-tab" data-bs-toggle="pill" data-bs-target="#pills-vision" type="button" role="tab" aria-controls="pills-vision" aria-selected="false">{{ $section6 -> subtitle2 }}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-purpose-tab" data-bs-toggle="pill" data-bs-target="#pills-purpose" type="button" role="tab" aria-controls="pills-purpose" aria-selected="false">{{ $section6 -> subtitle3 }}</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-mission" role="tabpanel" aria-labelledby="pills-mission-tab" tabindex="0">{{ $section6 -> description1 }}</div>
                <div class="tab-pane fade" id="pills-vision" role="tabpanel" aria-labelledby="pills-vision-tab" tabindex="0">{{ $section6 -> description2 }}</div>
                <div class="tab-pane fade" id="pills-purpose" role="tabpanel" aria-labelledby="pills-purpose-tab" tabindex="0">{{ $section6 -> description3 }}</div>
            </div>
        </div>
    </section>
    <!-- Principles End -->

@stop
