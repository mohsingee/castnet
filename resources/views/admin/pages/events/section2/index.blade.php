@extends('admin.layouts.default')
@section('title', 'Our Events')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Our Events Section 2</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Events</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('myEvent.create') }}" class="btn btn-sm btn-primary" style="float: right;">Add Event</a>
                        </div>
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Title</th>
                              <th>Image</th>
                              <th>Date</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                               <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('assets/web/images/' . $event->image) }}" alt="section img" height="50" width="50">
                                    </td>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->date }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-success" href="{{ route('myEvent.edit',$event->id) }}"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-sm btn-outline-danger delete_btn" data-url="/admin/myEvent"
                                            data-id="{{ $event->id }}" type="submit"><i class="fa fa-trash"></i></button>
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
