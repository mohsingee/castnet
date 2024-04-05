@extends('admin.layouts.default')
@section('title','Registered Users')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Registered Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Registered Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <!-- /.card-header -->
                         <!-- add new member work start -->
                         <div class="card-header">
                            <a href="{{ route('controlMembers.index') }}" class="btn btn-sm btn-primary" style="float: right;">Add New Member</a>
                        </div>
                        <!-- add new member work end -->

                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Type</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                               @if($user->type != 0)
                               <tr>
                                   <td>{{ $loop->iteration-1 }}</td> 
                                   <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                                   <td>{{ $user->email }}</td> 
                                   <td>
                                        @if($user->type == 1)
                                            @if($user->member == 1)
                                                <small class="badge badge-primary">Member</small>
                                            @endif
                                    
                                            @if($user->partner == 1)
                                                <small class="badge badge-success">Partner</small>
                                            @endif
                                    
                                            @if($user->sponsor == 1)
                                                <small class="badge badge-warning">Sponsor</small>
                                            @endif
                                        @endif
                                    </td> 
                                   <td>
                                        <a class="btn btn-sm btn-outline-info" href="{{ route('registerusers.detail',$user->id) }}"><i class="fa fa-eye"></i></a>
                                   </td>
                               </tr>
                               @endif
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
