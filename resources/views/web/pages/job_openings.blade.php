@extends('web.layouts.default')
@section('content')

    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb career_bg" style="
    background: linear-gradient(90deg, rgba(7, 27, 52, 0.80) 0%, rgba(7, 27, 52, 0.61) 51.46%, rgba(7, 27, 52, 0.42) 99.24%, rgba(7, 27, 52, 0.28) 99.7%, rgba(7, 27, 52, 0.00) 100%), url({{ asset('assets/web/images/' . $banner->image) }}) center no-repeat;
    background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb_title">{{$banner->title}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('web.index') }}">home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('web.careers') }}">careers</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$banner->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Section Alt Start -->
    <section class="section_block why_join pb-0">
        <div class="container">
            <div class="row gx-md-5">
                <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="section_title fw-bold">{{ $section1->title }}</h2>
                    {!! $section1->description !!}
                </div>
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                    <div class="img_border">
                        <img src="{{ asset('assets/web/images/'.$section1->image) }}" alt="job_opening_intro">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Alt End -->

    <!-- Latest Job Start -->
    <section class="section_block latest_jobs">
        <div class="container">
            <div class="row" data-aos="zoom-in" data-aos-duration="1000">
                <div class="col-12 border-t">
                    <h2 class="section_title">latest jobs</h2>
                </div>
            </div>
            <div class="row gy-5 mt-5" data-aos="zoom-in" data-aos-duration="1000">
                @foreach($section2 as $job)
                @if($job->status == 0)
                <div class="col-md-12 {{ $loop->first ? 'mt-0' : '' }}">
                    <div class="box_job">
                        <div class="row gy-4 gy-lg-0">
                            <div class="col-lg-1 text-center text-lg-start">
                                <img src="{{ asset('assets/web/images/icon_job.png') }}" alt="job icon" class="img-job">
                            </div>
                            <div class="col-lg-11">
                                <div class="box_header">
                                    <h3 class="title">{{ $job->job_title }}</h3>
                                </div>
                                <div class="box_body">
                                    {{ $job->job_description}}
                                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-start gap-4">
                                        @foreach(explode(',',$job->duration_detail) as $item)
                                        <span class="tag">{{ $item }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="box_footer">
                                    <a href="{{ route('web.job_detail', ['id' => $job->id]) }}" class="btn btn-primary">
                                        <span>apply now</span>
                                        <img src="{{ asset('assets/web/images/icon_arrow.png') }}" alt="arrow">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- Latest Job End -->

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
                            <img src="{{ asset('assets/web/images/icon_log.png') }}" alt="login" class="img-login">
                        </a>
                        <a href="{{ joinWidget()->button2_link }}" class="btn btn-contact">{{ joinWidget()->button2 }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Ready to Join end -->
    @stop
