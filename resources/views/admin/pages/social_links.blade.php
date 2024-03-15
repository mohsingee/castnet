@extends('admin.layouts.default')
@section('title', 'Social links')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Update Social Links</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                      <li class="breadcrumb-item active">Social Links</li>
                  </ol>
              </div>
          </div>
      </div>
  </div>
  <!-- Main content -->
  <div class="content">
      <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                  <form method="post" action="{{ route('sociallinks.update',$links->id) }}" id="socialLiks">
                    @csrf
                    @method('PUT')
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <div class="form-group errorshow">
                                <label for="prin_title">Facebook</label>
                                <input type="text" name="facebook" id="facebookURL" class="form-control" value="{{ $links->facebook }}" placeholder="Enter URL">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group errorshow">
                                <label for="prin_title">Twitter</label>
                                <input type="text" name="twitter" id="twitterURL" class="form-control" value="{{ $links->twitter }}" placeholder="Enter URL">
                            </div>
                        </div>                        
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <div class="form-group errorshow">
                                <label for="prin_title">Instagram</label>
                                <input type="text" name="instagram" id="instagramURL" class="form-control" value="{{ $links->instagram }}" placeholder="Enter URL">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group errorshow">
                                <label for="prin_title">Linkedin</label>
                                <input type="text" name="linkedin" id="linkedinURL" class="form-control" value="{{ $links->linkedin }}" placeholder="Enter URL">
                            </div>
                        </div>                        
                    </div>                    
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="form-group errorshow">
                                <label for="prin_title">Pinterest</label>
                                <input type="text" name="pintrest" id="pinterestURL" class="form-control" value="{{ $links->pintrest }}" placeholder="Enter URL">
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
  $('#socialLiks').validate({
        rules: {
            facebook: {
                 required: true,
            },
            twitter: {
                 required: true,
            },
            instagram: {
                 required: true,
            },
            linkedin: {
                 required: true,
            },
            pintrest: {
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