@extends('web.layouts.default')
@section('keywords'){{$keywords??'Castnet'}}@endsection
@section('content')
    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb event_calendar_bg" style="
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
    <!-- Calendar Start -->
    <section class="section_calendar">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-12">
                    <span class="bg-md-primary"></span>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row gy-5 gy-md-0 gx-md-5">
                <div class="col-md-4 col-lg-4">
                    <div class="card" data-aos="fade-right" data-aos-duration="1000">
                        <div class="card-body">
                            <h3 class="card-title">filter events</h3>
                            <p class="card-text">point of interest</p>
                            <form action="#">
                                <div class="input-group mb-4">
                                    <span class="input-group-text">
                                        <img src="assets/web/images/icon_map.png" alt="map icon">
                                    </span>
                                    <input type="search" name="location" id="location" onfocusout="searchFilter()" class="form-control" placeholder="Places, Cities">
                                </div>
                                <h3 class="card-title">category</h3>
                                <div class="form-check">
                                    <input class="form-check-input" value="all" type="radio" name="category" onclick="filterChange('all')">
                                    <label class="form-check-label" for="all"> All </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="chamber" type="radio" name="category" onclick="filterChange('chamber')">
                                    <label class="form-check-label" for="chamber"> Chamber Events </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="community" type="radio" name="category" onclick="filterChange('community')">
                                    <label class="form-check-label" for="community"> Community Events </label>
                                </div>
                                <button type="reset" onclick="filterReset()" class="btn btn-primary">reset filters</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8" data-aos="fade-left" data-aos-duration="1000">
                    <form id="search_keywords" class="form_search">
                        <div class="row gy-4 gy-md-0">
                            <div class="col-md-6">
                                <label for="keyword" class="form-label">Keyword</label>
                                <input type="text" class="form-control" placeholder="search" id="keyword">
                            </div>
                            <div class="col-md-4">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" placeholder="search" id="date">
                            </div>
                            <div class="col-md-2 align-self-end">
                                <button type="submit" class="btn btn-primary">enter</button>
                            </div>
                        </div>
                    </form>
                    <div id="dataShow">
                        @forelse($items as $item)
                        <div class="event_box">
                            <h3 class="event_title">{{ $item->title }}</h3>
                            <p class="event_meta">{{ \Carbon\Carbon::parse($item->event_date)->format('d F Y') }} At {{ \Carbon\Carbon::parse($item->from_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($item->to_time)->format('h:i A') }} PT</p>
                            <p class="event_desc">{{ $item->description }}</p>
                            <a href="#" class="btn btn-primary">{{ $item->category == 1 ? 'Chamber Events' : 'Community Events' }}</a>
                        </div>
                        @empty
                        <div class="event_box">
                            <p class="text-center">No records were found.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Calendar End -->

    <!-- Event CTA Start -->
    <section class="section_block event_cta">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <h2 class="section_title">{{ eventWidget()->title }}</h2>
                    <p class="text col-md-10 mx-auto">{{ eventWidget()->description }}</p>
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-3">
                        <a href="{{ eventWidget()->button1_link }}" class="btn btn-primary">
                            <span>{{ eventWidget()->button1 }}</span>
                        </a>
                        <a href="{{ eventWidget()->button2_link }}" class="btn btn-primary">
                            <span>{{ eventWidget()->button2 }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Event CTA End -->
@stop
@push('scripts')
<script>
    $("body").on("submit", "#search_keywords", function (e) {
        e.preventDefault();
        let title = $('#keyword').val();
        let date = $('#date').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "{{ route('filter.keywords') }}",
            data: {
                'title': title,
                'date': date,
            },
            dataType: "json",
            beforeSend: function () {
                $('#overlay').show();
            },
            success: function (response) {
                $("#dataShow").html(response.data);
                $('#overlay').hide();
            },
        });
    });

    function filterChange(category){
        var location = $('#location').val();
        $.ajax({
            type: "get",
            url: "{{ route('filter.search') }}",
            data: {
                'category': category,
                'location': location,
            },
            dataType: "json",
            beforeSend: function () {
                $('#overlay').show();
            },
            success: function (response) {
                $("#dataShow").html(response.data);
                $('#overlay').hide();
            },
        });
    }

    function searchFilter(){
        var category = $('input[name="category"]:checked').val();
        var location = $('#location').val();
        $.ajax({
            type: "get",
            url: "{{ route('filter.search') }}",
            data: {
                'category': category,
                'location': location,
            },
            dataType: "json",
            beforeSend: function () {
                $('#overlay').show();
            },
            success: function (response) {
                $("#dataShow").html(response.data);
                $('#overlay').hide();
            },
        });
    }

    function filterReset(){
        $.ajax({
            type: "get",
            url: "{{ route('filter.search') }}",
            dataType: "json",
            beforeSend: function () {
                $('#overlay').show();
            },
            success: function (response) {
                $("#dataShow").html(response.data);
                $('#overlay').hide();
            },
        });
    }
</script>
@endpush