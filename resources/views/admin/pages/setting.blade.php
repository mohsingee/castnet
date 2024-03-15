@extends('admin.layouts.default')
@section('title', 'Web Setting')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Web Setting</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                      <li class="breadcrumb-item active">Setting</li>
                  </ol>
              </div>
          </div>
      </div>
  </div>
  <div class="content">
      <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                  <form id="webSetting" action="{{ route('setting.update',$setting->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <div class="form-group errorshow">
                                <label for="prin_title">Web title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Website Title..." value="{{ $setting->title }}">

                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="prin_title">Header Logo</label>
                                <input type="file" name="header_logo" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <img src="{{ asset('assets/web/images/'.$setting->header_logo) }}" alt="Header Logo" width="50" height="50">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="prin_title">Popup Logo</label>
                                <input type="file" name="popup_logo" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <img src="{{ asset('assets/web/images/'.$setting->popup_logo) }}" alt="Popup Logo" width="50" height="50">
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="prin_title">Footer Logo</label>
                                <input type="file" name="footer_logo" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <img src="{{ asset('assets/web/images/'.$setting->footer_logo) }}" alt="Footer Logo" width="50" height="50">
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group errorshow">
                                <label>Popup Description:</label>
                                <textarea name="description" class="summernote form-control">{!! $setting->popup_description !!}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group errorshow">
                                <label>Footer Description:</label>
                                <textarea name="footerDescription" rows="4" class="form-control">{{ $setting->footer_description }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group errorshow">
                                <label>Email:</label>
                                <input type="text" name="email" placeholder="Enter Email..." class="form-control" value="{{ $setting->email }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group errorshow">
                                <label>Phone:</label>
                                <input type="text" name="phone" placeholder="Enter Phone..." class="form-control" value="{{ $setting->phone }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="form-group errorshow">
                                <label>Address:</label>
                                <input type="text" name="address" placeholder="Enter Address..." class="form-control" value="{{ $setting->address }}">
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
</div>
@stop
@push('scripts')
<script>
  $('#webSetting').validate({
        rules: {
            title: {
                 required: true,
            },
            email: {
                 required: true,
            },
            phone: {
                 required: true,
            },
            address: {
                 required: true,
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.errorshow').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
     });
</script>
@endpush
