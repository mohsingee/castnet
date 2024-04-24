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
                    <h2 class="breadcrumb_title">{{$banner->title}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('web.index') }}">home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('web.opportunities') }}">Opportunities</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$banner->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->
    <!-- secton project detail start -->
    <section class="section_block section_block_alt ">
        <div class="container">
            <h2 class="section_title fw-bold text-center mb-5">Our Business Members</h2>
            <div class="row row-cols-1 row-cols-md-3 mb-5 mx-5 mx-md-0 filter-btn gy-3">
                <div class="col d-flex justify-content-center" id="all">
                    <div class="btn-div p-0 active" onclick="toggleActiveClass(this, 0)">
                        <a href="javascript:void(0);">
                            <span>All</span>
                        </a>
                    </div>
                </div>
                <div class="col d-flex justify-content-center" id="industry">
                    <div class="btn-div p-0" onclick="toggleActiveClass(this, 1)">
                        <a href="javascript:void(0);">
                            <span>Industry Sector</span>
                        </a>
                    </div>
                </div>
                <div class="col d-flex justify-content-center" id="advocacy">
                    <div class="btn-div p-0" onclick="toggleActiveClass(this, 2)">
                        <a href="javascript:void(0);">
                            <span>Advocacy</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xxl-6 gx-md-5 gy-5" id="loadAjax">
                @foreach($members as $member)
                <div class="col" data-aos="fade-right" data-aos-duration="1000">
                    <div class="sec-dir-card text-center">
                        <img src="{{ asset('assets/web/images/'.$member->image) }}" alt="card-img">
                        <h3 class="sec-dir-card-title">{{$member->name}}</h3>
                        <div class="sec-dir-card-info">
                            <p class="sec-dir-card-company">Company:</p>
                            <p class="sec-dir-card-company-text">{{$member->company}}</p>
                        </div>
                        <div class="sec-dir-card-info">
                            <p class="sec-dir-card-company">Position:</p>
                            <p class="sec-dir-card-company-text">{{$member->position}}</p>
                        </div>
                        <div class="sec-dir-card-info">
                            <p class="sec-dir-card-company">Member Type:</p>
                            <p class="sec-dir-card-company-text">{{$member->member_type}}</p>
                        </div>
                        <div class="sec-dir-card-med-icon">
                            <a href="{{$member->lindedin}}" class="media-icon-bg">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@stop
@push('scripts')
<script>
    function toggleActiveClass(element, query) {
        // Remove active class from all div elements with class btn-div
        $('.btn-div').removeClass('active');
        
        // Add active class to the clicked div element
        $(element).addClass('active');

        // Call the getMembers function
        getMembers(query);
    }

    function getMembers(query){
        $.ajax({
            type: "get",
            url: "{{ route('filter.members') }}",
            dataType: "json",
            data: {
                data: query,
            },
            success: function (response) {
                $("#loadAjax").html(response.data);
            },
        });
    }
</script>
@endpush