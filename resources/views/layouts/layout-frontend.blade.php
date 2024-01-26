<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
{{--    @if(config('settings.site_publish') == 1 )--}}

{{--    @endif--}}

    <title>@yield('title')</title>

    @yield('head')
    @php
       $path = explode('/',request()->path());
    @endphp

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @if($path[0] != 'blog')
            <meta name="description" content="{{ config('settings.site_description') }}">
            <meta name="title" content="{{ config('settings.site_title') }}">
            <meta name="Author" content="{{ config('settings.site_url') }}">
            <meta name="keywords" content="{{ config('settings.site_keywords') }}" />
        @endif
    
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        {!! config('settings.site_meta_tag') !!}
    <!-- Favicons -->
    <link href="{{ asset(config('settings.site_icon')) }}" rel="icon">
    <link href="{{ asset(config('settings.site_icon')) }}" rel="apple-touch-icon">
    <link href="{{ asset(config('settings.site_icon')) }}" rel="shortcut icon" type="image/x-icon" >


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <style>
        #hero {
            background: url("{{ config('settings.landing_slider_img') }}") top center no-repeat;
            background-size: cover;
        }

        :root {
            /* --current-color:#1f5cf5; */
            --current-color: {{ config('settings.frontend_color') }};
        }
    </style>

    {!! config('settings.site_analytics') !!}
    
    @yield('css')


</head>

<body>
    @include('frontend.includes.header')

    
    @yield('breadcrumbs')


    @yield('content')





    @include('frontend.includes.footer')




</body>

</html>
