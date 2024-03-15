@extends('admin.layouts.default')
@section('title', 'Join Widget')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Widget</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Widget</a></li>
                        <li class="breadcrumb-item active">JoinWidget</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <form action="{{ route('joinWidget.update', ['id' => $joinWidgetData->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                             <div class="row mb-2">

                                <div class="col-sm-12">
                                    <div class="form-group errorshow">
                                        <label for="prin_title">Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ $joinWidgetData -> title }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" rows="4" placeholder="Enter Description" style="resize: none;">{{ $joinWidgetData -> description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                        <label>Button 1</label>
                                        <input type="text" name="button1" placeholder="Enter Button1 Text" class="form-control" id="" value="{{ $joinWidgetData -> button1 }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                        <label>Button 1 Link</label>
                                        <input type="text" name="button1_link" placeholder="Enter Button1 Link" pattern="^#|https?://\S+$" class="form-control" id="" value="{{ $joinWidgetData -> button1_link }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                        <label>Button 2</label>
                                        <input type="text" name="button2" placeholder="Enter Button2 Text" class="form-control" id="" value="{{ $joinWidgetData -> button2 }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group errorshow">
                                        <label>Button 2 Link</label>
                                        <input type="text" name="button2_link" placeholder="Enter Button2 Link" pattern="^#|https?://\S+$" class="form-control" id="" value="{{ $joinWidgetData -> button2_link }}">
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
    <!-- /.content-wrapper -->
</div>
@stop

@pushOnce('scripts')
<!-- data table -->
<script>

</script>
@endPushOnce
