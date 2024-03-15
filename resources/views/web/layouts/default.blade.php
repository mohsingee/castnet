<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    @include('web.includes.head')
    <style>
        #overlay {
        background:rgba(0,0,0,0.8);
        color: #fff;
        position: fixed;
        height: 100%;
        width: 100%;
        z-index: 5000;
        top: 0;
        left: 0;
        float: left;
        text-align: center;
        padding-top: 20%;
        filter: blur(1px);
    }
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

<body class="hold-transition sidebar-mini">
    @include('web.includes.header')
    <div id="overlay" style="display: none">
        <img src="{{asset('assets/loader1.gif')}}" alt="Loading" /><br/>
     </div>
     
     <div class="message">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ strtoupper(session()->get('success')) }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ strtoupper(session()->get('error')) }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    @yield('content')
    @include('web.includes.footer')
    @stack('scripts')
</body>

</html>
