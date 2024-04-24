@extends('web.layouts.default')
@section('keywords'){{$keywords??'Castnet'}}@endsection
@section('content')
    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb rfx_bg" style="
    background: linear-gradient(90deg, rgba(7, 27, 52, 0.80) 0%, rgba(7, 27, 52, 0.61) 51.46%, rgba(7, 27, 52, 0.42) 99.24%, rgba(7, 27, 52, 0.28) 99.7%, rgba(7, 27, 52, 0.00) 100%), url({{ asset('assets/web/images/' . $banner->image) }}) center no-repeat;
    background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb_title">PROJECTS</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.html">home</a></li>
                            <li class="breadcrumb-item"><a href="opportunities.html">Opportunities</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Projects</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- header below text start -->
    <section class="section_block section_block_alt">
        <div class="container">
            <div class="row gx-md-5">
                <div class="col-lg-12" data-aos="fade-left" data-aos-duration="1000">
                    <h2 class="section_title fw-bold text-center">{{ $section1->title }}</h2>
                    <p class="about_text text-center">{!! $section1->description !!}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- header below text end -->

    @foreach($section2 as $key=>$item)
    @if($key % 2 == 0)
    <!-- Section Alt Start -->
    <section class="section_block section_block_alt section_project">
        <div class="container">
            <div class="row gx-md-5">
                <div class="col-lg-6 order-1 order-lg-1" data-aos="fade-left" data-aos-duration="1000">
                    <h2 class="section_title fw-bold">{{$item->title}}</h2>
                    <div class="about_text">{!! $item->description !!}</div>
                    <div class="my-2">
                        <span class="fw-bold">Project Industry Sector (</span>{{$item->pro_detail->pro_industry_sector}}<span class="fw-bold">)</span>
                    </div>
                    <div class="mb-2">
                        <span class="fw-bold">Summary Of Scope (</span>{{$item->pro_detail->summary_of_scope}}<span class="fw-bold">)</span>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-2"><span class="fw-bold">Product Or Service (</span>{{$item->pro_detail->pro_or_ser}}<span class="fw-bold">)</span></div>
                        <div class="col-12 col-md-6 mb-2"><span class="fw-bold">Region / Country (</span>{{$item->pro_detail->region_country}}<span class="fw-bold">)</span></div>
                        <div class="col-12 col-md-6"><span class="fw-bold">Funded (</span>{{$item->pro_detail->funded}}<span class="fw-bold">)</span></div>
                    </div>
                    <a href="{{$item->btn_link}}" class="btn btn-project">{{$item->btn_text}} <img
                        src="{{ asset('assets/web/images/pro-arrow.png') }}" alt="icon login" class="icon-login"></a>
                </div>
                <div class="col-lg-6 order-2 order-lg-2" data-aos="fade-right" data-aos-duration="1000">
                    <div class="img_border img-top-margin">
                        <img src="{{asset('assets/web/images/'.$item->image)}}" alt="rfx_intro">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    @else
    <section class="section_block section_block_alt">
        <div class="container">
            <div class="row gx-md-5">
                <div class="col-lg-6 order-1 order-lg-1" data-aos="fade-right" data-aos-duration="1000">
                    <div class="img_border">
                        <img src="{{asset('assets/web/images/'.$item->image)}}" alt="rfx_intro">
                    </div>
                </div>
                <div class="col-lg-6 order-2 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                    <h2 class="section_title fw-bold">{{$item->title}}</h2>
                    <div class="about_text">{!! $item->description !!}</div>
                    <div class="my-2">
                        <span class="fw-bold">Project Industry Sector (</span>{{$item->pro_detail->pro_industry_sector}}<span class="fw-bold">)</span>
                    </div>
                    <div class="mb-2">
                        <span class="fw-bold">Summary Of Scope (</span>{{$item->pro_detail->summary_of_scope}}<span class="fw-bold">)</span>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-2"><span class="fw-bold">Product Or Service (</span>{{$item->pro_detail->pro_or_ser}}<span class="fw-bold">)</span></div>
                        <div class="col-12 col-md-6 mb-2"><span class="fw-bold">Region / Country (</span>{{$item->pro_detail->region_country}}<span class="fw-bold">)</span></div>
                        <div class="col-12 col-md-6"><span class="fw-bold">Funded (</span>{{$item->pro_detail->funded}}<span class="fw-bold">)</span></div>
                    </div>
                    <a href="{{$item->btn_link}}" class="btn btn-project">{{$item->btn_text}} <img
                        src="{{ asset('assets/web/images/pro-arrow.png') }}" alt="icon login" class="icon-login"></a>
                </div>
            </div>
        </div>
        </div>
    </section>
    @endif
    @endforeach
@stop