@extends('admin.layouts.default')
@section('title', 'Event Data')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Event Data</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Event</th>
                              <th>View</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $index => $item)
                               <tr>
                                <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $item->event_contact_FN . ' ' . $item->event_contact_LN }}
                                    </td>
                                    <td>
                                        {{ $item->event_contact_email }}
                                    </td>
                                    <td>
                                        {{ $item->telephone }}
                                    </td>
                                    <td>{{ $item->event_title }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-info" href="{{ route('eventRequest.detail',$item->id) }}"><i class="fa fa-eye"></i></a>
                                        <button class="btn btn-sm btn-outline-danger delete_btn" data-url="/admin/eventRequest-delete"
                                            data-id="{{ $item->id }}" type="submit"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
