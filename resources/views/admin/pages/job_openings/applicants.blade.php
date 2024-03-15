@extends('admin.layouts.default')
@section('title',$page)
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $sn.' '.$page }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Job</a></li>
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

                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>File</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($section as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $item->first_name }} {{ $item->last_name }}
                                    </td>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        {{ $item->phone_number }}
                                    </td>
                                    <td>
                                    {{--******** File Download Working Start ********--}}
                                        @if(isset($item->file))
                                            @php $ext = substr($item->file, strrpos($item->file, '.')+1); @endphp
                                            @if(strtolower($ext)=='pdf')
                                            <div class="row">
                                                <div class="col-4">
                                                    <a download href="{{ asset('assets/web/applications/'.$item->file) }}" target="_blank">
                                                        <img class="selected_img" src="{{ asset('assets/web/images/pdf.png') }}" height="50px" width="50px">
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif(strtolower($ext)=='doc')
                                            <div class="row">
                                                <div class="col-4">
                                                    <a download href="{{ asset('assets/web/applications/'.$item->file) }}" target="_blank">
                                                        <img class="selected_img" src="{{ asset('assets/web/images/doc.png') }}" height="50px" width="50px">
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif(strtolower($ext)=='docx')
                                            <div class="row">
                                                <div class="col-4">
                                                    <a download href="{{ asset('assets/web/applications/'.$item->file) }}" target="_blank">
                                                        <img class="selected_img" src="{{ asset('assets/web/images/docx.png') }}" height="50px" width="50px">
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif(strtolower($ext)=='txt')
                                            <div class="row">
                                                <div class="col-4">
                                                    <a download href="{{ asset('assets/web/applications/'.$item->file) }}" target="_blank">
                                                        <img class="selected_img" src="{{ asset('assets/web/images/txt.png') }}" height="50px" width="50px">
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif(strtolower($ext)=='rtf')
                                            <div class="row">
                                                <div class="col-4">
                                                    <a download href="{{ asset('assets/web/applications/'.$item->file) }}" target="_blank">
                                                        <img class="selected_img" src="{{ asset('assets/web/images/rtf.png') }}" height="50px" width="50px">
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif(strtolower($ext)=='html')
                                            <div class="row">
                                                <div class="col-4">
                                                    <a download href="{{ asset('assets/web/applications/'.$item->file) }}" target="_blank">
                                                        <img class="selected_img" src="{{ asset('assets/web/images/html.png') }}" height="50px" width="50px">
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif(strtolower($ext)=='jpg')
                                            <div class="row">
                                                <div class="col-4">
                                                    <a download href="{{ asset('assets/web/applications/'.$item->file) }}" target="_blank">
                                                        <img class="selected_img" src="{{ asset('assets/web/applications/'.$item->file) }}" height="50px" width="50px">
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif(strtolower($ext)=='png')
                                            <div class="row">
                                                <div class="col-4">
                                                    <a download href="{{ asset('assets/web/applications/'.$item->file) }}" target="_blank">
                                                        <img class="selected_img" src="{{ asset('assets/web/applications/'.$item->file) }}" height="50px" width="50px">
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif(strtolower($ext)=='odt')
                                            <div class="row">
                                                <div class="col-4">
                                                    <a download href="{{ asset('assets/web/applications/'.$item->file) }}" target="_blank">
                                                        <img class="selected_img" src="{{ asset('assets/web/images/odt.png') }}" height="50px" width="50px">
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif(strtolower($ext)=='tex')
                                            <div class="row">
                                                <div class="col-4">
                                                    <a download href="{{ asset('assets/web/applications/'.$item->file) }}" target="_blank">
                                                        <img class="selected_img" src="{{ asset('assets/web/images/tex.png') }}" height="50px" width="50px">
                                                    </a>
                                                </div>
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-4">
                                                    <a download href="{{ asset('assets/web/applications/'.$item->file) }}" target="_blank">
                                                        <img class="selected_img" src="{{ asset('assets/web/applications/'.$item->file) }}" height="50px" width="50px">
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                        @else
                                            <p class="text-danger">{{ "No file selected" }}</p>
                                        @endif
                                    </td>
                                    {{--******** End File Download Working ********--}}
                                    <td>
                                        <button class="btn-outline-danger delete_btn" type="button" data-url="/admin/delete_application" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></button>
                                        {{-- <a href="{{ route('delete_application',$item->id) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a> --}}
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
