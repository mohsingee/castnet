@extends('admin.layouts.default')
@section('title', 'Subscribers')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Subscribers</h1>
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
                              <th>Email</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $index => $item)
                               <tr>
                                <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-danger delete_btn" data-url="/admin/subscribers-delete"
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
