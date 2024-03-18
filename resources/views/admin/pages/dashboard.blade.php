@extends('admin.layouts.default')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Dashboard </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-6">
               <div class="small-box bg-info">
                  <div class="inner">
                     <h3>{{$member}}</h3>
                     <p>Registered Members</p>
                  </div>
                  <div class="icon"><i class="ion ion-person-add"></i></div>
                  <a href="{{route('registerusers.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>

            <div class="col-lg-4 col-6">
               <div class="small-box bg-success">
                  <div class="inner">
                     <h3>{{$partner}}</h3>
                     <p>Registered Sponsors</p>
                  </div>
                  <div class="icon"><i class="ion ion-person-add"></i></div>
                  <a href="{{route('registerusers.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>

            <div class="col-lg-4 col-6">
               <div class="small-box bg-warning">
                  <div class="inner">
                     <h3>{{$sponsor}}</h3>
                     <p>Registered Partners</p>
                  </div>
                  <div class="icon"><i class="ion ion-person-add"></i></div>
                  <a href="{{route('registerusers.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
         </div>
         <!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
   <!-- /.content -->

</div>
<!-- /.content-wrapper -->

@stop
