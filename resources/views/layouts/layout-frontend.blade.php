<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
      
        
    <title>@yield('title','Index')  | Presento Bootstrap Template</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
      
        <!-- Favicons -->
        <link href="{{ asset(config('settings.site_icon')) }}" rel="icon">
        <link href="{{asset('frontent/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
      
        <!-- Google Fonts -->
        <link
          href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">
      
        <!-- Vendor CSS Files -->
        <link href="{{asset('frontend/vendor/aos/aos.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
      
        <!-- Template Main CSS File -->
        <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
        <style>
            :root {
                /* --current-color:#1f5cf5; */
                --current-color:{{ config('settings.frontend_color') }};

            }   


        </style>

        @yield('css')
      
        <!-- =======================================================
        * Template Name: Presento
        * Updated: Jul 27 2023 with Bootstrap v5.3.1
        * Template URL: https://bootstrapmade.com/presento-bootstrap-corporate-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    @yield('css')
</head>
<body>
    @include('frontend.includes.header')


    

            @yield('content')





  @include('frontend.includes.footer')




</body>
</html>
