@extends('admin.layouts.default')
@section('title',$page)
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $page.' '.$sn }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{$page}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('jobs.create')}}" class="btn btn-sm btn-primary" style="float: right;">
                                Add Job
                            </a>
                        </div>
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($section as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $item->job_title }}
                                    </td>
                                    <td>
                                        {{ $item->job_location }}
                                    </td>
                                    <td>@if($item->status == 0)<span class='badge bg-secondary bg-success'>Active</span>@else<span class='badge bg-secondary bg-danger'>Inactive</span>@endif</td>
                                    <td>
                                        <a href="{{ route('jobs.edit',$item->id) }}"><i class="fa fa-edit"></i></a>
                                        <button class="btn-outline-danger delete_btn" type="submit" data-url="/admin/jobs" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></button>
                                        @if($item->status == 1)
                                            <a onclick="changeStatus({{$item->id}},0,'change-status')" href="javascript:;" class="btn btn-sm btn-outline-info">Active</a>
                                        @endif
                                        @if($item->status == 0)
                                            <a  onclick="changeStatus({{$item->id}},1,'change-status')" href="javascript:;" class="btn btn-sm btn-outline-info">Inactive</a>
                                        @endif
                                        <a href="{{ route('job_applicants',$item->id) }}" class="btn btn-sm btn-outline-info">View Applicants</a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('careers.store') }}" id="careers" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                        <label for="prin_title">Image</label>
                                        <input type="file" name="image" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                        <label for="prin_title">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter Title...">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="card-body" style="padding: 0px">
                                        <textarea class="summernote" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(strtolower($page)=='careers')
                            <input type="hidden" name="page" value="careers">
                            @if($sn=='Section 2')
                                <input type="hidden" name="section" value="2">
                            @elseif($sn=='Section 3')
                                <input type="hidden" name="section" value="3">
                            @elseif($sn=='Section 4')
                                <input type="hidden" name="section" value="4">
                            @endif
                        @endif
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
<script>
    $('#careers').validate({
        rules: {
            title: {
                required: true,
            },
            image: {
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
