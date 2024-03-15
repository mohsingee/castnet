@extends('admin.layouts.default')
@section('title', 'Section 1')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Section 1</h1>
                    </div> 
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Section 1</li>
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
                            <a href="{{ route('homesection1.create') }}" class="btn btn-sm btn-primary" style="float: right;">Add Section</a>
                        </div>
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>heading</th>
                              <th>Image</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($section1 as $index => $item)
                            <tr>
                              <td>{{ $index + 1 }}</td>
                              <td>
                                <div>
                                     <div>{{ $item->heading }}</div>
                                </div>
                              </td>
                              <td>
                                <img style="border:1px solid black;" src="{{ asset('assets/web/images/'.$item->image) }}" alt="section img" height="50" width="50">
                              </td>
                              <td>
                                <a class="btn btn-sm btn-outline-success" href="{{ route('homesection1.edit',$item->id) }}"><i class="fa fa-edit"></i></a>
                                <button class="btn btn-sm btn-outline-danger delete_btn" data-url="/admin/homesection1"
                                    data-id="{{ $item->id }}" type="submit"><i class="fa fa-trash"></i></button>
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
@pushOnce('scripts')
    <!-- data table -->
    <script>
        $(function() {
            $('#allpages_tbl').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": false,
            });
        });

       
            document.getElementById('addSectionLink').addEventListener('click', function(event) {
                event.preventDefault();
                toggleVisibility('visibleElement');
                toggleVisibility('hiddenElement');
            });
        
            function toggleVisibility(elementId) {
                var element = document.getElementById(elementId);
                element.style.display = (element.style.display === 'none') ? 'block' : 'none';
            }
            
    </script>
@endPushOnce