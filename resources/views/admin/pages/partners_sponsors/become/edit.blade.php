@extends('admin.layouts.default')
@section('title','Partners Sponsors')
@section('content')
@if($section->page=='become_partner' && $sn=='Section 3')
<style>
    .bgchange{
        background-color:blue;
        padding:10px;
    }
</style>
@endif
@if($section->page=='become_partner' && $sn=='Section 3')
<style>
    .note-editor.note-airframe .note-editing-area .note-editable,.note-editor.note-frame .note-editing-area .note-editable{word-wrap:break-word;overflow:auto;padding:10px;background-color: #0c2038;color:white;}
</style>
@endif
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
                    <div class="card ">
                        <div class="card-body">
                            <form action="{{ route('becomepartner.update',$section->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @php if($section->page=='become_partner' && $sn=='Section 2'){
                                    $class = "col-sm-12";
                                }else{
                                    $class = "col-sm-6";
                                }
                                @endphp
                                <div class="row mb-2">
                                    <div class="{{$class}}">
                                        <div class="form-group">
                                            <label for="prin_title">Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter Title..." value="{{ $section->title }}">
                                        </div>
                                    </div>
                                    @if($section->page!='become_sponsor' && $sn!='Section 2')
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="prin_title">Image</label>
                                            <input type="file" name="image" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <img class="bgchange" src="{{ asset('assets/web/images/'.$section->image) }}" width="50" height="50">
                                    </div>
                                    @endif
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="card-body" style="padding: 0px">
                                            <textarea class="summernote" name="description">{!! $section->description !!}</textarea>
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
