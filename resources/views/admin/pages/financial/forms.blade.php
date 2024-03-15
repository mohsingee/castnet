@extends('admin.layouts.default')
@section('title','Forms')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Forms</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Financial</a></li>
                            <li class="breadcrumb-item active">Forms</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('forms.update') }}" id="forms" method="post">
                              @csrf
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Investment Payment</label>
                                            <input type="number" name="investment" class="form-control" placeholder="Partner Fee" value="{{ $fee->investment }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Loans Payment</label>
                                            <input type="number" name="loans" class="form-control" placeholder="Sponsor Fee" value="{{ $fee->loans }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Grants Payment</label>
                                            <input type="number" name="grants" class="form-control" placeholder="Partner Fee" value="{{ $fee->grants }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" style="background:none;">
                                    <button type="submit" class="btn btn-primary" style="float: right;">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
<script>
    $('#forms').validate({ 
        rules: {
            investment: {
                required: true,
            },
            loans: {
                required: true,
            },
            grants: {
                required: true,
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.errorshow').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
</script>
@endpush