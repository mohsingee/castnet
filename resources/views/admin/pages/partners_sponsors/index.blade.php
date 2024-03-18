@extends('admin.layouts.default')
@section('title','Partners Sponsors')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Partners Sponsors {{$sn}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Partners Sponsors</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <label for="">Section Title</label>
                    <div class="input-group mb-3">
                        <input type="text" name="title" id="title" value="{{$title->title}}" class="form-control" placeholder="Section title...">
                        <input type="hidden" id="page" name="page" value="partners_sponsors">
                        @if($sn=='Section 1')
                            <input type="hidden" id="section" name="section" value="1">
                        @else
                            <input type="hidden" id="section" name="section" value="2">
                        @endif
                        <div class="input-group-append">
                          <button class="btn btn-primary btn-sm" id="saveMainTitle" type="button">Save</button>
                        </div>
                    </div>
                </div> 
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
                                        <img src="{{ asset('assets/web/images/'.$item->image) }}" height="50" width="50">
                                    </td>
                                    <td>
                                        <a href="{{ route('partnersponsor.edit',$item->id) }}"><i class="fa fa-edit"></i></a>
                                        <button class="btn-outline-danger delete_btn" data-url="/admin/partnersponsor"
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
                        <h5 class="modal-title" id="exampleModalLabel">Add New Partners Sponsors</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('partnersponsor.store') }}" id="partnersponsor" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <div class="form-group errorshow">
                                        <label for="prin_title">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter Title...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                        <label for="prin_title">Image <span class="text-danger">(270 x 130)</span></label>
                                        <input type="file" name="image" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                        <label for="prin_title">Url</label>
                                        <input type="text" name="url" class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($sn=='Section 1')
                            <input type="hidden" name="section" value="1">
                        @else
                            <input type="hidden" name="section" value="2">
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
    $('#partnersponsor').validate({
        rules: {
            image: {
                required: true,
            },
            url: {
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

    $(document).on('click','#saveMainTitle',function(){
        let title = $.trim($('#title').val());
        let section = $('#section').val();
        let page = $('#page').val();
        if(title == ''){
            Swal.fire({
                position: 'top-end',
                toast: true,
                timer: 6000,
                icon: 'error',
                text: "please enter the section title.",
            });
        }
        else{
        $.ajaxSetup({
            headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "post",
            url: '{{ route("partnersponsor.title") }}',
            dataType: "json",
            data: {
                title: title,
                section : section,
                page : page,
            },
            success: function (response) {
                if(response.status === true){
                    Swal.fire({
                    position: 'top-end',
                    toast: true,
                    timer: 6000,
                    icon: 'success',
                    text: response.message,
                    });
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                }
            },
        });
        }
    });
</script>
@endpush
