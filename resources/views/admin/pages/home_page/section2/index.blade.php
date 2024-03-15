@extends('admin.layouts.default')
@section('title', 'About us')
@section('content')
<style>
    .note-editor.note-airframe .note-editing-area .note-editable,.note-editor.note-frame .note-editing-area .note-editable{word-wrap:break-word;overflow:auto;padding:10px;background-color: #0c2038;color:white;}
</style>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">About us</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">About us</li>
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
                            <form action="{{ route('homesection2.update',$section2->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label for="prin_title">Title</label>
                                            <input type="text" name="heading" class="form-control" placeholder="Enter Title" value="{{ $section2->heading ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="prin_title">Upload Image <span class="text-danger">(600 x 450)</span></label>
                                            <input type="file" name="image" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <img src="{{ asset('assets/web/images/'.$section2->image) }}" width="120" height="140" alt="">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label>Button Text</label>
                                            <input type="text" name="button" placeholder="Enter Button Text" class="form-control" value="{{ $section2->button ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group errorshow">
                                            <label>Button Link</label>
                                            <input type="text" name="buttonlink" placeholder="Enter Button Link" pattern="^#|https?://\S+$" value="{{ $section2->buttonlink ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <!-- /.card-header -->
                                        <div class="card-body" style="padding: 0px">
                                            <textarea id="summernote" name="description">
                                            {{ $section2->description ?? '' }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" style="background:none;">
                                    <button id="sectionslist" type="submit" class="btn btn-sm btn-primary" style="float: right;">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
