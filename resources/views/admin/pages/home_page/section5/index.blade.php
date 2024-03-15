@extends('admin.layouts.default')
@section('title', 'Home Section 5')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Home Section 5</h1>
                    </div> 
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Section 5</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-body">
                            <form action="{{ route('homesection5.updataion',$section5->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="prin_title">Title</label>
                                            <input type="text" name="title" class="form-control" value="{{ $section5->title }}" placeholder="Enter Title...">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Heading</label>
                                                <input type="text" name="heading" class="form-control" value="{{ $section5->heading }}" placeholder="Enter Heading...">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Sub Heading</label>
                                            <input type="text" name="sub_heading" class="form-control" value="{{ $section5->sub_heading }}" placeholder="Enter Sub Heading...">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Description</label>
                                            <textarea name="description" class="form-control summernote">{!! $section5->description !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="field_wrapper"></div>
                                <div class="card-footer" style="background:none;">
                                    <button id="sectionslist" type="submit" class="btn btn-sm btn-primary" style="float: right;">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('homesection5.create') }}" class="btn btn-sm btn-primary" style="float: right;">Add Event</a>
                        </div>
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($event as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td><img src="{{ asset('assets/web/images/'.$item->image) }}" alt="" width="120" height="80"></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-success" href="{{ route('homesection5.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-sm btn-outline-danger delete_btn" data-url="/admin/homesection5"
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
    </div>
@stop