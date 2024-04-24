@extends('web.layouts.default')
@section('keywords'){{$keywords??'Castnet'}}@endsection
@section('content')

    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb advocacy_bg" style="
    background: linear-gradient(90deg, rgba(7, 27, 52, 0.80) 0%, rgba(7, 27, 52, 0.61) 51.46%, rgba(7, 27, 52, 0.42) 99.24%, rgba(7, 27, 52, 0.28) 99.7%, rgba(7, 27, 52, 0.00) 100%), url({{ asset('assets/web/images/' . $banner->image) }}) center no-repeat;
    background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb_title">{{$banner->title}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('web.index') }}">home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('web.advocacy') }}">advocacy</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$banner->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Advocacy Start -->
    <section class="section_block why_join">
        <div class="container">
            <div class="row gx-md-5">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                    <div class="img_border">
                        <img src="{{ asset('assets/web/images/'.$section1->image) }}" alt="veteran families">
                    </div>
                </div>
                <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="section_title fw-bold">{{$section1->title}}</h2>
                    <p class="about_text">{!! $section1->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Advocacy End -->

    <!-- Advocacy Values Start -->
    <section class="section_block advocacy_values">
        <div class="container">
            <div class="row gy-4 gy-lg-0 gx-lg-4">
                @foreach($section2 as $item)
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
    <!-- Advocacy Values end -->

    <!-- Advocacy Alt Start -->
    <section class="section_block advocacy_alt white_ghost_bg">
        <div class="container">
            <div class="row gx-md-5">
                <div class="col-lg-6 order-1 order-lg-1" data-aos="fade-right" data-aos-duration="1000">
                    <div class="img_border">
                        <img src="{{ asset('assets/web/images/'.$section3->image) }}" alt="working">
                    </div>
                </div>
                <div class="col-lg-6 order-2 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                    <h2 class="section_title fw-bold">{{$section3->title}}</h2>
                    <p class="about_text">{!! $section3->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Advocacy Alt End -->

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
