@extends('admin.layouts.default')
@section('title', 'Member Feedback')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Member Feedback</h1>
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
                              <th>Feedback</th>
                              <th>Member Events</th>
                              <th>Member Responses</th>
                              <th>Demographic Feedback</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $index => $item)
                               <tr>
                                <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $item->feedback }}
                                    </td>
                                    <td>
                                        {{ $item->member_events }}
                                    </td>
                                    <td>
                                        {{ $item->feedback_responses }}
                                    </td>
                                    <td>
                                        {{ $item->demographic_feedback }}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-info" href="{{ route('memberFeedback.detail',$item->id) }}"><i class="fa fa-eye"></i></a>
                                        <button class="btn btn-sm btn-outline-danger delete_btn" data-url="/admin/member-feedback"
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
