@extends('theme2.layout')
@section('title')
    Blog
@endsection

@section('head')

@endsection

@section('css')
    <style>
        .gridarea__wraper .gridarea__img img {
            max-height: 200px;
        }
    </style>
@endsection

@section('breadcrumbs')
    <div class="breadcrumbarea p-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h2 class="heading">Blog Yazıları</h2>
                        </div>
                        <div class="breadcrumb__inner">
                            <ul>
                                <li><a href="/">Anasayfa</a></li>
                                <li> Blog Yazıları</li>
                            </ul>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs d-none">
        <div class="container">

            <ol>
                <li><a href="/">Anasayfa</a></li>
                <li>Blog</li>
            </ol>
            <h2>Mevzuat Haberleri </h2>

        </div>
    </section><!-- End Breadcrumbs -->

@endsection



@section('content')



    <!-- course__section__start   -->
    <div class="coursearea sp_top_100 sp_bottom_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-4 col-12">
                   
                    <div class="course__sidebar__wraper" data-aos="fade-up">
                        <div class="categori__wraper">
                            <div class="course__heading">
                                <h5>Kategoriler</h5>
                            </div>
                            <div class="course__categories__list">
                                <ul>
                                    @foreach($categories as $category )
                                        <li>
                                            <a href="?cat={{$category->id}} ">
                                                {{$category->name}}
                                                <span>{{$category->content_count}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>


                        </div>
                    </div>

                </div>

              

{{--                    @dd($article->image)--}}
                    <div class="col-xl-9 col-lg-9 col-md-8 col-12"> 
                        @foreach($all_article as $article)
                             <div class="gridarea__wraper gridarea__wraper__2 gridarea__course__list" data-aos="fade-up">
                            <div class="gridarea__img">
                                <a href=""><img src="{{$article->image}}" alt="{{ $article->title ? $article->title :""  }}"></a>
                                <div class="gridarea__small__button">
                                    <div class="grid__badge">{{$article->category->name}}</div>
                                </div>
{{--                                <div class="gridarea__small__icon">--}}
{{--                                    <a href="#"><i class="icofont-heart-alt"></i></a>--}}
{{--                                </div>--}}
                            </div>
                            <div class="gridarea__content">
                                <div class="gridarea__list">
                                    <ul>
                                        <li>
                                            <i class="icofont-clock-time"></i> <time datetime="2020-01-01"></time> {{date_format($article->created_at,('d.m.Y'))}}
                                        </li>
                                    </ul>
                                </div>
                                <div class="gridarea__heading">
                                    <h4><a href="{{route('frontend.blog_detail', $article->slug) }}">{{ $article->title ? $article->title :""  }} </a></h4>
                                </div>

                                <div class="gridarea__bottom">
                                    <div class="gridarea__bottom__left">
                                        <a href="">
                                            <div class="gridarea__small__img">
                                                <img src="{{$article->author->avatar ?? 'images/default-avatar.png'}}" alt="grid">
                                                <div class="gridarea__small__content">
                                                    <h6>{{$article->author->name}}</h6>
                                                </div>
                                            </div>
                                        </a>


                                    </div>

                                    <div class="gridarea__details">
                                        <a href="{{route('frontend.blog_detail', $article->slug) }}">İncele
                                            <i class="icofont-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach 
                    </div>

{{--                {!!$all_article->links('vendor.pagination.bootstrap-5')!!}--}}

                

            </div>
        </div>
    </div>
    <!-- course__section__end   -->

@endsection


@section('js')
@endsection