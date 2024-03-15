@extends('admin.layouts.default')
@section('title',$page)
@section('content')
@if(strtolower($page)=='advocacy' && $sn=='Section 4')
<style>
    .bgchange{
        background-color:blue;
        padding:10px;
    }
</style>
@endif
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
                            <button type="button" class="btn btn-sm btn-primary" style="float: right;" data-toggle="modal" data-target="#newModal">
                                Add New
                              </button>
                        </div>
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($section as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <img src="{{ asset('assets/web/images/'.$item->image) }}" class="bgchange" height="50" width="50">
                                    </td>
                                    <td>
                                        <a href="{{ route('financial.edit',$item->id) }}"><i class="fa fa-edit"></i></a>
                                        <button class="btn-outline-danger delete_btn" data-url="/admin/financial"
                                            data-id="{{ $item->id }}" type="submit"><i class="fa fa-trash"></i></button>
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
                    <form action="{{ route('financial.store') }}" id="advocacy" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                        <label for="prin_title">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter Title...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                        <label for="prin_title">Image @if(strtolower($page)=='financial' && $sn=='Section 1')<span class="text-danger">(365 x 225)</span>@elseif(strtolower($page)=='financial' && $sn=='Section 3')<span class="text-danger">(60 x 60)</span>@elseif(strtolower($page)=='grants' && $sn=='Section 2')<span class="text-danger">(45 x 40)</span>@elseif(strtolower($page)=='funding' && $sn=='Section 2')<span class="text-danger">(60 x 60)</span>@endif</label>
                                        <input type="file" name="image" class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                            @if(strtolower($page)!='advocacy' && $sn!='Section 4')
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="card-body" style="padding: 0px">
                                        <textarea class="summernote" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        @if(strtolower($page)=='financial')
                            <input type="hidden" name="page" value="financial">
                            @if($sn=='Section 1')
                                <input type="hidden" name="section" value="1">
                            @elseif($sn=='Section 3')
                                <input type="hidden" name="section" value="3">
                            @elseif($sn=='Section 4')
                                <input type="hidden" name="section" value="4">
                            @endif
                        @elseif(strtolower($page)=='grants')
                            <input type="hidden" name="page" value="grants">
                            @if($sn=='Section 2')
                                <input type="hidden" name="section" value="2">
                            @endif
                        @elseif(strtolower($page)=='funding')
                            <input type="hidden" name="page" value="funding">
                            @if($sn=='Section 2')
                                <input type="hidden" name="section" value="2">
                            @endif
                        @elseif($page=='Support Services')
                            <input type="hidden" name="page" value="support_services">
                            @if($sn=='Section 2')
                                <input type="hidden" name="section" value="2">
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
    $('#advocacy').validate({
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
