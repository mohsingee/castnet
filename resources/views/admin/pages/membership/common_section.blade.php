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
                    <div class="card ">
                        <div class="card-body">
                            <form action="{{ route('membership.updation',$section->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="prin_title">Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter Title..." value="{{ $section->title }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="prin_title">Image <span class="text-danger">(520 x 435)</span></label>
                                            <input type="file" name="image" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <img src="{{ asset('assets/web/images/'.$section->image) }}" width="50" height="50">
                                    </div>
                                </div>
                                @if(isset($section->description))
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="card-body" style="padding: 0px">
                                            <textarea class="summernote" name="description">{!! $section->description !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @endif
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
