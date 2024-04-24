@extends('web.layouts.default')
@section('keywords'){{$keywords??'Castnet'}}@endsection
@section('content')
    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb int_event_bg" style="
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
    @foreach($events as $key=>$event)
    @if($key % 2 == 0)
    <!-- Section Alt Start -->
    <section class="section_block section_block_alt">
        <div class="container">
            <div class="row gx-md-5">
                <div class="col-lg-6 order-1 order-lg-1" data-aos="fade-right" data-aos-duration="1000">
                    <div class="img_border">
                        <img src="{{ asset('assets/web/images/'.$event->image)}}" alt="event">
                    </div>
                </div>
                <div class="col-lg-6 order-2 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                    <span class="event_date">{{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</span>
                    <h2 class="section_title fw-bold">{{$event->title}}</h2>
                    <p class="about_text">{!! $event->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Alt End -->
    @else
    <!-- Section Alt Start -->
    <section class="section_block section_block_alt pt-0">
        <div class="container">
            <div class="row gx-md-5">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                    <div class="img_border">
                        <img src="{{ asset('assets/web/images/'.$event->image)}}" alt="event">
                    </div>
                </div>
                <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right" data-aos-duration="1000">
                    <span class="event_date">{{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</span>
                    <h2 class="section_title fw-bold">{{$event->title}}</h2>
                    <p class="about_text">{!! $event->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Alt End -->
    @endif
    @if($key==1)
    <!-- Event CTA Start -->
    <section class="section_block event_cta">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="section_title">{{ $widget->title }}</h2>
                    <p class="text col-md-10 mx-auto">{{ $widget->description }}</p>
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-3">
                        <a href="{{ $widget->button1_link }}" class="btn btn-primary">
                            <span>{{ $widget->button1 }}</span>
                        </a>
                        <a href="{{ $widget->button2_link }}" class="btn btn-primary">
                            <span>{{ $widget->button2 }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Event CTA End -->
    @endif
    @endforeach
    @stop