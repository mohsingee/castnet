@extends('web.layouts.default')
@section('keywords'){{$keywords??'Castnet'}}@endsection
@section('content')
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
                        <li class="breadcrumb-item"><a href="{{ route('web.index') }}">home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('web.membership') }}">membership</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$banner->title}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb End -->

<!-- Programs Start -->
<section class="section_block programs">
    <div class="container">
        <div class="row mb-50">
            <div class="col-md-9 mx-auto" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="section_title">{{ $section1->title }}</h2>
                <p class="section_text">{{ $section1->description }}</p>
            </div>
        </div>
        <div class="row gy-5">
            @foreach($section2 as $item)
            <div class="col-md-12">
                <div class="card primary_border" data-aos="fade-right" data-aos-duration="1000">
                    <div class="card-body">
                        <img src="{{ asset('assets/web/images/'.$item->image)}}" alt="logo" class="logo">
                        <h3 class="card-title">{{ $item->title }}</h3>
                        <p class="card-text">{!! $item->description !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Programs End -->

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
