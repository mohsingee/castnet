<!-- ************************************************************************ !-->
<!-- *****                                                              ***** !-->
<!-- *****       ¤ Designed and Developed by  LEADconcept               ***** !-->
<!-- *****               http://www.leadconcept.com                     ***** !-->
<!-- *****                                                              ***** !-->
<!-- ************************************************************************ !-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ appSetting()->title ?? '' }}</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="keywords" content="@yield('keywords')">
<link rel="stylesheet" href="{{ asset('assets/web/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/web/css/swiper-bundle.min.css') }}">
<link rel="shortcut icon" href="{{ asset('assets/web/images/favicon.png') }}">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/web/css/main.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<link class="js-stylesheet" href="{{ asset('assets/admin/sweetalert/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">