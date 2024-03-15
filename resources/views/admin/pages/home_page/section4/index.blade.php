@extends('admin.layouts.default')
@section('title', 'Home Section 4')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Home Section 4</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Section 4</li>
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
                            <form action="{{ route('homesection4.updataion',$section4->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="prin_title">Image <span class="text-danger">(600 x 450)</span></label>
                                            <input type="file" name="image" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <img src="{{ asset('assets/web/images/'.$section4->image) }}" alt="" width="120" height="140">
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Heading</label>
                                                <input type="text" name="heading" class="form-control" value="{{ $section4->heading }}" placeholder="Enter Heading...">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Sub Heading</label>
                                            <input type="text" name="sub_heading" class="form-control" value="{{ $section4->sub_heading }}" placeholder="Enter Sub Heading...">
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
                            <a href="{{ route('homesection4.create') }}" class="btn btn-sm btn-primary" style="float: right;">Add Feature</a>
                        </div>
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Features</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($section4detail as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{!! $item->features !!}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-success" href="{{ route('homesection4.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-sm btn-outline-danger delete_btn" data-url="/admin/homesection4"
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
