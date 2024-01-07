
@extends('theme2.layout')


@section('title')
    Sınav Listesi |
@endsection

@section('head')


@endsection

@section('css')
   
@endsection


@section('breadcrumbs')

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbarea p-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h2 class="heading">Kendini Testet </h2>
                        </div>
                        <div class="breadcrumb__inner">
                            <ul>
                                <li><a href="/">Anasayfa</a></li>
                                <li>Testler</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')><!-- End Breadcrumbs -->

{{--@dd($tests)--}}
<!-- course__section__start   -->
<div class="coursearea sp_top_100 sp_bottom_100">
    <div class="container">

        <div class="row">
            <div class="col-xl-12">
                <div class="course__text__wraper" data-aos="fade-up">
                    <div class="course__text">
                        @if($tests )
                            <span>İçerikler arasından birini  seçerek soruları çözmeye başlayabilirsiniz. </span>
                        @else
                            <span> Test bulunamadı.  </span>
                        @endif
                        
                    </div>

                </div>
            </div>

            <div class="col-xl-12">
                <div class="row">
                    @foreach($tests as $test)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 {{$test->wage_status}}" data-aos="fade-up" >
                            <div class="gridarea__wraper gridarea__wraper__2">
                                <div class="gridarea__img">
                                    <a href=""><img src="{{config('settings.site_logo')}}" alt="grid"></a>
                                </div>
                                <div class="gridarea__content">
                                    <div class="gridarea__list">
                                        <ul>
                                            <li>
                                                <i class="icofont-book-alt"></i> {{$test['questionBank']->questions_count}} Soru
                                            </li>
                                            <li class="text-end">
                                                <i class="icofont-clock-time"></i> {{$test['questionBank']->questions_count * 2 }} dk
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="gridarea__heading" style="word-break: break-word;">
                                        <h3><a href="{{route('frontend.test',['slug'=>$test->slug,'id'=>$test->id])}}">{{$test->name}}</a></h3>
                                    </div>
                                    <div class="gridarea__price">
                                        {!! $test->wage_status == 'free' ?  '<del>Ücretsiz</del>'  : 'Üyelere Özel' !!} 
                                        {{-- $32.00 <del>/ $67.00</del> <span></span>  --}}
                                       

                                    </div>
                                    <div class="gridarea__bottom">
                                        <div class="gridarea__bottom__left">
                                        </div>

                                        <div class="gridarea__details">
                                            <a class="btn btn-primary default__button  float-end " href="{{route('frontend.test',['slug'=>$test->slug,'id'=>$test->id])}}">Teste Git
{{--                                                <i class="icofont-arrow-right"></i>--}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
            
             {!! $tests->links() !!}
        </div>

    </div>
</div>
<!-- course__section__end   -->

    
@endsection