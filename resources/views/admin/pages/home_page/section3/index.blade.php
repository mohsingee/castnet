@extends('admin.layouts.default')
@section('title', 'HomePage Section 3')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">HomePage Section 3</h1>
                    </div> 
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Section 3</li>
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
                            <form action="{{ route('homesection3.update',$section3->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Title</label>
                                                <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ $section3->title ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Heading</label>
                                                <input type="text" name="heading" class="form-control" placeholder="Enter Heading" value="{{ $section3->heading ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Sub title 1</label>
                                                <input type="text" name="subtitle1" class="form-control" placeholder="Enter Title" value="{{ $section3->subtitle1 ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Description 1</label>
                                                <textarea name="description1" class="form-control" id="" cols="30" rows="3">{{ $section3->description1 ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Sub title 2</label>
                                                <input type="text" name="subtitle2" class="form-control" placeholder="Enter Title" value="{{ $section3->subtitle2 ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Description 2</label>
                                                <textarea name="description2" class="form-control" id="" cols="30" rows="3">{{ $section3->description2 ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Sub title 3</label>
                                                <input type="text" name="subtitle3" class="form-control" placeholder="Enter Title" value="{{ $section3->subtitle3 ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Description 3</label>
                                                <textarea name="description3" class="form-control" id="" cols="30" rows="3">{{ $section3->description3 ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-footer" style="background:none;">
                                    <button type="submit" class="btn btn-sm btn-primary" style="float: right;">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
    </div>
@stop