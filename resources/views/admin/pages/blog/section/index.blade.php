@extends('admin.layouts.default')
@section('title', 'My Blog')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">My Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
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
                            <a href="{{ route('my-blog.create') }}" class="btn btn-sm btn-primary" style="float: right;">Add Blog</a>
                        </div>
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Title</th>
                              <th>Image</th>
                              <th>Category</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $key=>$blog)
                               <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>
                                        <img src="{{ asset('assets/web/images/' . $blog->image) }}" alt="section img" height="50" width="50">
                                    </td>
                                    <td>
                                        {{ $blog->category }}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-success" href="{{ route('my-blog.edit',$blog->id) }}"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-sm btn-outline-danger delete_btn" data-url="/admin/my-blog"
                                            data-id="{{ $blog->id }}" type="submit"><i class="fa fa-trash"></i></button>
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
