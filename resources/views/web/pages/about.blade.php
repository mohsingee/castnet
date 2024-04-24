@extends('web.layouts.default')
@section('keywords'){{$keywords??'Castnet'}}@endsection
@section('content')
<section class="section_breadcrumb about_bg" style="
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

<!-- Welcome Start -->
<section class="section_block welcome">
    <div class="container">
        <div class="row gy-5 gy-md-0 gx-md-5">
            <div class="col-md-6 col-lg-6 order-2 order-md-1" data-aos="fade-right" data-aos-duration="1000">
                {!! $section1->description !!}
            </div>
            <div class="col-md-6 col-lg-6 order-1 order-md-2" data-aos="fade-left" data-aos-duration="1000">
                <div class="img_border">
                    <img src="{{ asset('assets/web/images/' . ($section1->image ?? '')) }}" alt="value">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Welcome End -->

<!-- Our Value Start -->
<section class="section_block our_value">
    <div class="container">
        <div class="row gy-5 gy-md-0 gx-md-5">
            <div class="col-md-6 col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="img_border">
                    <img src="{{ asset('assets/web/images/' . ($section2->image ?? '')) }}" alt="value">
                </div>
            </div>
            <div class="col-md-6 col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                {!! $section2->description !!}
            </div>
        </div>
    </div>
</section>
<!-- Our Value End -->

<!-- Sourcing Start -->
<section class="section_block welcome">
    <div class="container">
        <div class="row gy-5 gy-md-0 gx-md-5">
            <div class="col-md-6 col-lg-6 order-2 order-md-1" data-aos="fade-right" data-aos-duration="1000">
                {!! $section3->description !!}
            </div>
            <div class="col-md-6 col-lg-6 order-1 order-md-2" data-aos="fade-left" data-aos-duration="1000">
                <div class="img_border">
                    <img src="{{ asset('assets/web/images/' . ($section3->image ?? '')) }}" alt="value">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Sourcing End -->
@stop
