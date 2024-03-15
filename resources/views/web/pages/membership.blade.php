@extends('web.layouts.default')
@section('content')

{{-- @dd($widget); --}}

<!-- Breadcrumb Start -->
<section class="section_breadcrumb membership_bg" style="
background: linear-gradient(90deg, rgba(7, 27, 52, 0.80) 0%, rgba(7, 27, 52, 0.61) 51.46%, rgba(7, 27, 52, 0.42) 99.24%, rgba(7, 27, 52, 0.28) 99.7%, rgba(7, 27, 52, 0.00) 100%), url({{ asset('assets/web/images/' . $banner->image) }}) center no-repeat;
background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="breadcrumb_title">{{$banner->title}}</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('web.index') }}l">home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$banner->title}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb End -->

<!-- Why Join Start -->
<section class="section_block why_join">
    <div class="container">
        <div class="row gy-5 gy-lg-0 gx-md-5">
            <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right" data-aos-duration="1000">
                <h2 class="section_title">{{ $section1->title }}</h2>
                {!! $section1->description !!}
            </div>
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                <div class="img_border">
                    <img src="{{ asset('assets/web/images/'.$section1->image) }}" alt="why-join">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Why Join End -->

<!-- Membership Values Start -->
<section class="section_block membership_values">
    <div class="container">
        <div class="row gy-5 gx-lg-5">
            @foreach ($section2 as $item)
            <div class="col-md-4 col-lg-4 d-flex">
                <div class="card border_p flex-grow-1" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="card-body">
                        <img src="{{ asset('assets/web/images/'.$item->image) }}" alt="value" class="img-icon">
                        <p class="card-text">{{ $item->heading }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Membership Values end -->

<!-- Membership Levels Start -->
<section class="section_block">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section_title text-center" data-aos="fade-up" data-aos-duration="1000">{{ $section3->title }}</h2>
            </div>
            <div class="col-12">
                <img src="{{ asset('assets/web/images/'.$section3->image)}}" alt="membership-levels" class="img-fluid" data-aos="fade-right" data-aos-duration="1000">
            </div>
        </div>
    </div>
</section>
<!-- Membership Levels end -->

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
