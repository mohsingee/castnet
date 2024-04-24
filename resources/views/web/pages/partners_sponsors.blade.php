@extends('web.layouts.default')
@section('keywords'){{$keywords??'Castnet'}}@endsection
@section('content')
<style>
    .imgclass{
        align-items: center;
        display: flex;
        justify-content: center;
        flex-direction: column;
    }
</style>
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
                            <li class="breadcrumb-item active" aria-current="page">{{$banner->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Sponsors Start -->
    <section class="section_block sponsors">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section_title mb-5 mt-0" data-aos="fade-up" data-aos-duration="1000">{{$title1->title}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="swiper sponsorSwiper">
                        <div class="swiper-wrapper">
                            @foreach($section1 as $item)
                            <div class="swiper-slide" style="width: 369.5px; margin-right: 30px;">
                                <div class="img-box">
                                    <a href="{{$item->url}}" class="imgclass">
                                        <img src="{{ asset('assets/web/images/'.$item->image) }}" class="img-fluid" style="height: 120px;"> 
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

    <!-- Special Sponsors Start -->
    <section class="section_block special_sponsors">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="section_title" data-aos="fade-up" data-aos-duration="1000">{{$title2->title}}</h2>
                </div>
            </div>
            <div class="row gy-5 gx-md-5">
                @foreach($section2 as $item)
                <div class="col-md-3 col-lg-3">
                    <div class="card" data-aos="fade-right" data-aos-duration="1000">
                        <div class="card-body">
                            <a href="{{$item->url}}" class="imgclass">
                                <img src="{{ asset('assets/web/images/'.$item->image) }}" class="img-sponsor" style="height: 120px;">
                                <h3 class="text-center">{{$item->title}}</h3>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Special Sponsors End -->

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