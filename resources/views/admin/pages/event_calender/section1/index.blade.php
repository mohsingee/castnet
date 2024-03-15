@extends('admin.layouts.default')
@section('title', 'Event Calender')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Event Calender Section 1</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Event calender</li>
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
                            <a href="{{ route('event-calender.create') }}" class="btn btn-sm btn-primary" style="float: right;">Add Event</a>
                        </div>
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Event Date</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                                @php 
                                    $words = str_word_count($event->description, 1);
                                    $showwords = implode(' ', array_slice($words, 0, 20));
                                @endphp
                               <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $showwords }}@if(count($words)>20)...@endif</td>
                                    <td>{{ $event->event_date }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-success" href="{{ route('event-calender.edit',$event->id) }}"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-sm btn-outline-danger delete_btn" data-url="/admin/event-calender"
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
