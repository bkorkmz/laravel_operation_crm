@extends('layouts.layout-frontend')
@section('css')

@endsection
@section('title')
    {{config('settings.site_title') }}
@endsection
@section('head')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/", 
            "@type": "WebPage",
            "@id": "#WebPage",
             "url": "{{ request()->url() }}", 
             "name": "{{ config('settings.site_title') }}"
         }
    </script>

@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row">
                <div class="col-xl-6">
                    <h1>{{config('settings.landing_slider_title')}}</h1>
                    <h2>{{config('settings.landing_slider_slogan')}}
                    </h2>
                    <a href="#about" class="{{config('settings.landing_slider_button_title') == "" ?"d-none" :""}}btn-get-started scrollto">{{config('settings.landing_slider_button_title')}}</a>
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Clients Section ======= -->

        @include('frontend.pages.slider')
        <!-- End Clients Section -->
        <!-- ======= About Section ======= -->

        
        @include('frontend.pages.about_us',['data' =>$about_page])
        <!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <!-- TODO:kaldırılacak -->

        {{-- <section id="counts" class="counts ">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Happy Clients</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Projects</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-headset"></i>
                            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Hours Of Support</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Hard Workers</p>
                        </div>
                    </div>

                </div>

            </div>
        </section> --}}
        <!-- End Counts Section -->

        <!-- ======= Tabs Section ======= -->
        @include('frontend.pages.article',['data' =>$article])
        <!-- End Tabs Section -->

        <!-- ======= Services Section ======= -->
        @include('frontend.pages.services')
        <!-- End Services Section -->

        <!-- ======= Portfolio Section ======= -->
        @include('frontend.pages.portfolio',['data'=>$portfolio])
        <!-- End Portfolio Section -->

 
        <!-- ======= Frequently Asked Questions Section ======= -->
        @include('frontend.pages.sss',['data'=>$faq_sss])
        <!-- End Frequently Asked Questions Section -->

        <!-- ======= Team Section ======= -->
        <!-- TODO:kaldırılacak -->

        @include('frontend.pages.teams')
        <!-- End Team Section -->

        <!-- ======= Contact Section ======= -->
        @include('frontend.pages.contact')
        <!-- End Contact Section -->

    </main><!-- End #main -->
@endsection


@section('js')
@endsection