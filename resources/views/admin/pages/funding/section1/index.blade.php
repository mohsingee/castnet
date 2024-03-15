@extends('admin.layouts.default')
@section('title', 'About Banner')
@section('content')
{{--  @dd($record->banner)  --}}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">AboutPage Section 1</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">About</a></li>
                            <li class="breadcrumb-item active">Section 1</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content start -->
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="prin_title">Image</label>
                                            <input type="file" name="banner" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <img src="" alt="Image" width="50" height="50">
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
                                    <button type="submit" class="btn btn-primary" style="float: right;">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content end -->
        <!-- /.content-wrapper -->
    </div>
@stop