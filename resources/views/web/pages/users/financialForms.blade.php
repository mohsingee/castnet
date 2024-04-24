@extends('web.layouts.default')
@section('keywords'){{$keywords??'Castnet'}}@endsection
@section('content')
<link rel="stylesheet" href="{{asset('assets/web/css/user_dashboard.css')}}">
    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb partners_sponsors_bg">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb_title">User Dashboard</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Dashboard Start -->
    <section class="section_dashboard">
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="col-12">
                    <div class="d-flex flex-column flex-lg-row gap-3 min-h-dash">
                        @include('web.pages.users.sidebar')
                        <div class="dashboard_content flex-lg-grow-1">
                            <section class="section_content tabcontent">
                                <div class="container-fluid">
                                    <div class="row mb-5">
                                        <div class="col-12 mt-3">
                                            <h2 class="section_title">Financial Forms</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <table class="table table-bordered table-striped" style="max-width: 99%;">
                                        <thead>
                                          <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($financialForms as $financialForm)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $financialForm->first_name }} {{ $financialForm->last_name }}</td>
                                                <td>{{ $financialForm->email }}</td>
                                                <td>{{ $financialForm->phone }}</td>
                                                <td><a href="{{ route('web.user-financialDetail', ['id' => $financialForm->id]) }}" class="btn-outline-info"><i class="fa fa-eye"></i></a></td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No records were found.</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                      </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard End -->
@stop
@push('scripts')
<script>
</script>
@endpush