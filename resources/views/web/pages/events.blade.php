@extends('web.layouts.default')
@section('content')

    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb events_bg" style="
    background: linear-gradient(90deg, rgba(7, 27, 52, 0.80) 0%, rgba(7, 27, 52, 0.61) 51.46%, rgba(7, 27, 52, 0.42) 99.24%, rgba(7, 27, 52, 0.28) 99.7%, rgba(7, 27, 52, 0.00) 100%), url({{ asset('assets/web/images/' . $banner->image) }}) center no-repeat;
    background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb_title">{{$banner->title}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('web.index') }}">home</a></li>
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
                        <img src="{{ asset('assets/web/images/'.$section1->image) }}" alt="event">

                    </div>
                </div>
                <div class="col-lg-6 order-2 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                    <span class="event_date">{{ $section1->date }}</span>
                    <h2 class="section_title fw-bold">{{ $section1->title }}</h2>
                    {!! $section1->description !!}
                </div>
            </div>
        </div>
    </section>
    <!-- Section Alt End -->

    <!-- Section Events Start -->
    <section class="section_block all_events">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section_title" data-aos="fade-up" data-aos-duration="1000">events</h2>
                </div>
            </div>
            <div class="row gy-5 mt-5">
                @foreach($events as $event)
                <div class="col-md-6 col-lg-4">
                    <div class="card" data-aos="zoom-in-right" data-aos-duration="1000">
                        <img src="{{ asset('assets/web/images/'.$event->image) }}" class="card-img-top">
                        <div class="card-body">
                            <p class="card-date">{{ $event->date }}</p>
                            <p class="card-text">{{ $event->title }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Section Events End -->

    <!-- Section Alt Start -->
    <section class="section_block section_block_alt">
        <div class="container">
            <div class="row gx-md-5">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                    <div class="img_border">
                        <img src="{{ asset('assets/web/images/'.$section3->image) }}" alt="advocacy trips">
                    </div>
                </div>
                <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right" data-aos-duration="1000">
                    <span class="event_date">{{ $section3->date }}</span>
                    <h2 class="section_title fw-bold">{{ $section3->title }}</h2>
                    {!! $section3->description !!}
                </div>
            </div>
        </div>
    </section>
    <!-- Section Alt End -->

    @stop
