@extends('web.layouts.default')
@section('keywords'){{$keywords??'Castnet'}}@endsection
@section('content')


    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb sectors_tech_bg" style="
    background: linear-gradient(90deg, rgba(7, 27, 52, 0.80) 0%, rgba(7, 27, 52, 0.61) 51.46%, rgba(7, 27, 52, 0.42) 99.24%, rgba(7, 27, 52, 0.28) 99.7%, rgba(7, 27, 52, 0.00) 100%), url({{ asset('assets/web/images/' . $banner->image) }}) center no-repeat;
    background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb_title">{{$banner->title}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('web.index') }}">home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('web.sectors') }}">sectors</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$banner->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Intro Section Start -->
    <section class="section_block accessibility">
        <div class="container">
            <div class="row gy-5 gy-md-0 gx-md-5">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                    <div class="img_border">
                        <img src="{{ asset('assets/web/images/'.$section1->image)}}">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                    <h2 class="section_title">{{ $section1->title }}</h2>
                    <p class="about_text">{!! $section1->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Intro Section End -->

    <!-- Sector's Blog Section Start -->
    <section class="sector_blog">
        <div class="container">
            <div class="row gy-5 gy-lg-0">
                <div class="col-lg-5" data-aos="fade-right" data-aos-duration="1000">
                    <div class="card">
                        <img src="{{ asset('assets/web/images/'.$section2->image)}}" alt="main" class="card-img-top">
                        <div class="card-header">
                            <p class="card-meta">{{ $section2->updated_at->diffForHumans() }}</p>
                            <h3 class="card-title">
                                {{ $section2->title }}
                            </h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{!! $section2->description !!}</p>
                        </div>
                        {{-- <div class="card-footer">
                            <a href="#" class="btn btn-secondary">read more</a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left" data-aos-duration="1000">
                    @foreach($section2->details as $item)
                    <div class="blog_item">
                        <div class="featured_image">
                            <img src="{{ asset('assets/web/images/'.$item->image)}}" alt="featured image">
                        </div>
                        <div class="content">
                            <h3 class="blog_title">
                                {{ $item->title }}
                            </h3>
                            <p class="blog_meta">{{ \Carbon\Carbon::parse($item->updated_at)->format('l, F j, Y') }}</p>
                            <p class="blog_desc">{{ $item->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Sector's Blog Section End -->
    @stop