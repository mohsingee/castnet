@extends('web.layouts.default')
@section('content')
<!-- Breadcrumb Start -->
<section class="section_breadcrumb sectors_bg" style="
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

<!-- Industry Sectors Start -->
<section class="section_block sectors">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="section_title">industry sectors</h2>
            </div>
        </div>
        <div class="row gy-5 mt-0 mt-lg-50">
            @foreach($sectors as $sector)
            <div class="col-md-6 col-lg-4">
                <a href="{{ $sector->link }}" class="sector_link">
                    <div class="card" data-aos="zoom-in-right" data-aos-duration="1000">
                        <img src="{{ asset('assets/web/images/'.$sector->image)}}" alt="construction" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">{{ $sector->title }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Industry Sectors End -->


@stop