@extends('web.layouts.default')
@section('content')

    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb financial_bg" style="
    background: linear-gradient(90deg, rgba(7, 27, 52, 0.80) 0%, rgba(7, 27, 52, 0.61) 51.46%, rgba(7, 27, 52, 0.42) 99.24%, rgba(7, 27, 52, 0.28) 99.7%, rgba(7, 27, 52, 0.00) 100%), url({{ asset('assets/web/images/' . $banner->image) }}) center no-repeat;
    background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb_title">{{$banner->title}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('web.index') }}">home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('web.financial') }}">financial</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$banner->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Section Alt Start -->
    <section class="section_block why_join">
        <div class="container">
            <div class="row gy-5 gy-lg-0 gx-md-5">
                <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="section_title fw-bold">{{$section1->title}}</h2>
                    <p class="about_text">{!! $section1->description !!}</p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                    <div class="img_border">
                        <img src="{{ asset('assets/web/images/'.$section1->image)}}" alt="grant_program">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Alt End -->

    <!-- Types of Finance Grants Start -->
    <section class="section_block member_benefits white_ghost_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="section_title">Types of Finance Grants</h2>
                </div>
            </div>
            <div class="row gy-4">
                @foreach($section2 as $item)
                <div class="col-md-4 col-lg-4 d-flex">
                    <div class="card vip_card flex-grow-1 border-radius-0" data-aos="fade-right" data-aos-duration="1000">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset('assets/web/images/'.$item->image)}}" alt="icon" class="img-icon">
                            </div>
                            <h3 class="card-text">{{ $item->title }}</h3>
                            <p class="card-desc">{!! $item->description !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Types of Finance Grants End -->

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
