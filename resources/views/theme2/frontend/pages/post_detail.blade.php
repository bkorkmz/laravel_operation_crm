@extends('theme2.layout')


@section('title')
{{$data['haber']['Baslik']}}
@endsection

@section('head')

    <meta property="og:locale" content="tr_TR"/>
    <meta property="og:site_name" content="{{ config('settings.site_title') }}"/>
    <meta property="og:title" content="{{ config('settings.site_title') }}i"/>
    <meta property="og:url" content="{{ config('settings.site_url') }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:description" content="{{ config('settings.site_description') }}"/>
    <meta property="og:image" content="{{config('settings.site_icon')}}"/>
    <meta property="article:publisher" content="{{config('settings.site_facebook_url') }}"/>



    <meta itemprop="name" content="{{ config('settings.site_title') }}"/>
    <meta itemprop="headline" content="{{ config('settings.site_title') }}"/>
    <meta itemprop="description" content="{{ config('settings.site_description') }}"/>
    <meta itemprop="image" content="{{config('settings.site_icon')}}"/>
    <meta itemprop="author" content="{{ config('settings.site_url') }}"/>
    <link rel="publisher" href="{{ config('settings.site_google_plus_url') }}"/>


    <meta name="twitter:title" content="{{ config('settings.site_title') }}"/>
    <meta name="twitter:url" content="{{ config('settings.site_url') }}"/>
    <meta name="twitter:description" content="{{ config('settings.site_description') }}"/>
    <meta name="twitter:image" content="{{config('settings.site_icon')}}"/>
    <meta name="twitter:site" content="{{config('settings.site_twitter_url')}}"/>


@endsection

@section('css')
<style>
    .blog .sidebar .recent-posts img {
      height: 66px;
  }
    .blogsidebar__content__wraper__2 
    .blogsidebar__content__inner__2 
    .blogsidebar__img__2 
    img{
         width: 96px;
         border-radius: 50%;
     }
  </style>
@endsection


@section('breadcrumbs')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbarea p-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h2 class="heading">Haber Detay</h2>
                        </div>
                        <div class="breadcrumb__inner">
                            <ul>
                                <li><a href="/">Anasayfa</a></li>
                                <li><a href="/#news_content">Haberler</a></li>
                                <li>{{$data['haber']['Baslik']}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

            
  @endsection
    @section('content')><!-- End Breadcrumbs -->

    <div class="blogarea__2 sp_top_100 sp_bottom_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="blog__details__content__wraper">
                        <div class="blog__details__img" data-aos="fade-up">
                            <img src="/images/default_product1.jpg" alt="{{$data['haber']['Baslik']}}" class="img-fluid">

                        </div>
                        <div class="blog__details__content">
                            <h3>{{$data['haber']['Baslik']}}</h3>
                            <p class="content__1" data-aos="fade-up">
                                {{$data['description']}}
                            </p>
                            
                        </div>
                        <div class="blog__details__tag" data-aos="fade-up">
                            <ul>
                                <li class="heading__tag">
                                    Etiket
                                </li><br>
                                    @if (!blank($data['keywords']))
                                        @foreach (explode(',',$data['keywords']) as $keyword)
                                          @if ($loop->index < 5)
                                            <li><a>{{ $keyword }}</a></li>
                                          @endif
                                        @endforeach
                                    @endif
                            </ul>
                            <ul class="share__list" data-aos="fade-up">
                                <li class="heading__tag">
                                    Paylaş:
                                </li><br>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?text={{route('frontend.post_detail',$data['haber']['Id'])}}"><i class="icofont-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{route('frontend.post_detail',$data['haber']['Id'])}}">
                                        <i class="icofont-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="whatsapp://send?t={{route('frontend.post_detail',$data['haber']['Id'])}}&text={{$data['haber']['Baslik']}}"><i class="icofont-whatsapp"></i></a>
                                </li> 
                       
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    {{--  <div class="blogsidebar__content__wraper__2" data-aos="fade-up">
                         <div class="blogsidebar__content__inner__2">
                             <div class="blogsidebar__img__2">
                                 <img src="{{ "images/default-avatar.png"}}" alt="blog">
                             </div>
                             <div class="blogsidebar__name__2">
                                 <h5>
                                     <span> </span>
 
                                 </h5>
                               <p>Blogger/Photographer</p>
                      </div>
                      <div class="blog__sidebar__text__2">
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Veritatis distinctio suscipit reprehenderit atque</p>
                      </div>
                            <div class="blogsidbar__icon__2 d-none">
                                <ul>
                                    <li>
                                        <a href="#"><i class="icofont-email"></i></a>
                                    </li>

                                    <li>
                                        <a href="#"><i class="icofont-youtube-play"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icofont-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icofont-twitter"></i></a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                                     <div class="blogsidebar__content__wraper__2" data-aos="fade-up">
                                          <h4 class="sidebar__title">Kategoriler</h4>
                                          <ul class="categorie__">
                                              
                                            @foreach($categories as $s_cat)
                                                 <li><a href="#">{{$s_cat->name}} <span>{{$s_cat->content_count}}</span></a></li>
                                             @endforeach
                                          </ul>
                  
                                      </div>--}}

                    <div class="blogsidebar__content__wraper__2" data-aos="fade-up">

                        <h4 class="sidebar__title">Benzer Yazılar </h4>
                        <ul class="recent__list">
                            @foreach($sidebar_group as $s_article)
                                <li>
                                    <div class="recent__img">
                                        <a href="{{route('frontend.post_detail',$s_article['Id'])}}">
                                            <img src="/images/default_product1.jpg" alt="{{$s_article['Baslik']}}">
                                            
                                        </a>
                                    </div>

                                    <div class="recent__text">
                                        <div class="recent__date">
                                            <a ><time datetime="2020-01-01"></time> {{date("Y-m-d", strtotime($s_article['DegisiklikTarihiString']))}}</a>
                                        </div>
                                        <h6><a href="{{route('frontend.post_detail',$s_article['Id'])}}">{{\Illuminate\Support\Str::limit($s_article['Slogan'],50,"...")}}</a></h6>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>








@endsection


@section('js')
@endsection
