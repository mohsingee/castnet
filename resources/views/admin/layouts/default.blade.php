<!DOCTYPE html>
<!-- here basic three files header footer and content and head contain link and scripts contain js scripts-->
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title' , 'Castnet')</title>
    @include('admin.includes.head')
    <style>
        .message {
            align-items: center !important;
            justify-content: center !important;
            position: absolute;
            width: 100%;
            z-index: 99;
            display: flex;
            top: 50px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini" style="background-color: #f4f6f9;">
    @include('admin.includes.header')
    <div class="message">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ strtoupper(session()->get('success')) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ strtoupper(session()->get('error')) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif
    </div>
    @yield('content')
    @include('admin.includes.footer')
    @include('admin.includes.script')
    @stack('scripts')
</body>
</html>
