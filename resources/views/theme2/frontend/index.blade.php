@extends('theme2.layout')


@section('css')
@endsection

@section('content')

    <!-- theme fixed shadow -->
    <div>
        <div class="theme__shadow__circle"></div>
        <div class="theme__shadow__circle shadow__right"></div>
    </div>
    <!-- theme fixed shadow -->

    <!-- herobannerarea__section__start -->
    @include('theme2.frontend.partitals.slider')
    
    
    
    @include('theme2.frontend.partitals.product')



    <!-- aboutarea__2__section__start -->
{{--    @include('theme2.frontend.partitals.about_us')--}}
    <!-- aboutarea__2__section__end -->


    <!-- News area--->

    @include('theme2.frontend.partitals.news')

    <!-- Courses area--->

    @include('theme2.frontend.partitals.artiles',['article'=>$article])



    <!-- counter__section__start -->
    <div class="counterarea sp_bottom_100 sp_top_40">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-up">
                    <div class="counterarea__text__wraper">
                        <div class="counter__img">
                            <img src="/frontend/theme2/img/counter/counter__1.png" alt="counter">
                        </div>
                        <div class="counter__content__wraper">
                            <div class="counter__number">
                                <span class="">%100</span>

                            </div>
                            <p class="text-uppercase"> Müşteri Memnuniyeti</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-up">
                    <div class="counterarea__text__wraper">
                        <div class="counter__img">
                            <img src="/frontend/theme2/img/counter/counter__2.png" alt="counter">
                        </div>
                        <div class="counter__content__wraper">
                            <div class="counter__number">
                                <span class="">15</span>+

                            </div>
                            <p class="text-uppercase"> yıllık deneyim</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-up">
                    <div class="counterarea__text__wraper">
                        <div class="counter__img">
                            <img src="/frontend/theme2/img/counter/counter__3.png" alt="counter">
                        </div>
                        <div class="counter__content__wraper">
                            <div class="counter__number">
                                <span class="">10</span>'dan

                            </div>
                            <p class="text-uppercase"> Fazla hizmet ürünü</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-up">
                    <div class="counterarea__text__wraper">
                        <div class="counter__img">
                            <img src="/frontend/theme2/img/counter/counter__4.png" alt="counter">
                        </div>
                        <div class="counter__content__wraper">
                            <div class="counter__number">
                                <span class="">DÜNYA</span>

                            </div>
                            <p class="text-uppercase"> çapında hizmet</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div  id="contact"></div>
    </div>
    <!-- counter__section__end-->




    <!-- register__section__start-->
    @include('theme2.frontend.partitals.contact')

    <!-- register__section__end-->


    <!-- .about__tap__section__end -->
    @include('theme2.frontend.partitals.teams')
    <!-- teams-->


    <!-- tution__section__start -->
    {{--@include('theme2.frontend.pages.sss')--}}
    <!-- tution__section__end -->




    @include('theme2.frontend.partitals.comments')
    <!-- brand__section__start -->
    @include('theme2.frontend.partitals.referance')
    <!-- brand__section__end -->

@endsection


@section('js')
@endsection