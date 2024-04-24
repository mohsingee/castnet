@extends('web.layouts.default')
@section('keywords'){{$keywords??'Castnet'}}@endsection
@section('content')
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

<!-- Member Benefits Start -->
<section class="section_block member_benefits">
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto text-center" data-aos="fade-right" data-aos-duration="1000">
                <h2 class="section_title">{{ $section1->title }}</h2>
                <p class="benefit_text">{{ $section1->description }}</p>
            </div>
        </div>
        <div class="row gy-4">
            @foreach($section1->details as $item)
            <div class="col-md-4 col-lg-4 d-flex">
                <div class="card" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('assets/web/images/'.$item->image) }}" alt="icon" class="img-icon">
                        </div>
                        <h3 class="card-text">{{ $item->title }}</h3>
                        {!! $item->description !!}
                    </div>
                </div>
            </div>
           @endforeach
        </div>
    </div>
</section>
<!-- Member Benefits End -->

<!-- VIP Benefits Start -->
<section class="section_block member_benefits pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto text-center" data-aos="fade-right" data-aos-duration="1000">
                <h2 class="section_title">{{ $section2->title }}</h2>
                <p class="benefit_text">{{ $section2->description }}</p>
            </div>
        </div>
        <div class="row gy-4">
            @foreach($section2->details as $item)
            <div class="col-md-6 col-lg-6 d-flex">
                <div class="card vip_card flex-grow-1" data-aos="fade-right" data-aos-duration="1000">
                    <div class="card-body text-white">
                        <div class="text-center">
                            <img src="{{ asset('assets/web/images/'.$item->image) }}" alt="icon" class="img-icon">
                        </div>
                        <h3 class="card-text">{{ $item->title }}</h3>
                        {!! $item->description !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- VIP Benefits End -->

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
                        <img src="assets/web/images//icon_log.png" alt="login" class="img-login">
                    </a>
                    <a href="{{ joinWidget()->button2_link }}" class="btn btn-contact">{{ joinWidget()->button2 }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Ready to Join end -->

@stop
