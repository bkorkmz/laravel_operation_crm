@extends('theme2.layout')


@section('title')
{{$product->name}}
@endsection

@section('head')
    <meta property="og:locale" content="tr_TR"/>
    <meta property="og:site_name" content="{{ config('settings.site_title') }}"/>
    <meta property="og:title" content="{{ $product->name }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ config('settings.site_url') }}"/>

    <meta property="og:description" content="{{ $product->name }}"/>
    <meta property="og:image" content="{{ $product->image }}"/>
    <meta property="article:publisher" content="{{config('settings.site_facebook_url') }}"/>

    <meta itemprop="name" content="{{ config('settings.site_title') }}"/>
    <meta itemprop="headline" content="{{ config('settings.site_title') }}"/>
    <meta itemprop="description" content="{{ config('settings.site_description') }}"/>
    <meta itemprop="image" content="{{config('settings.site_icon')}}"/>
    <meta itemprop="author" content="{{ config('settings.site_url') }}"/>
    <link rel="publisher" href="{{ config('settings.site_google_plus_url') }}"/>


    <meta name="twitter:title" content="{{ $product->name }}"/>
    <meta name="twitter:url" content="{{ config('settings.site_url') }}"/>
    <meta name="twitter:description" content="{{ $product->name }}"/>
    <meta name="twitter:image" content="{{ $product->image }}"/>
    <meta name="twitter:card" content="{{ $product->image }}"/>
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
                            <h2 class="heading">Ürün Detay</h2>
                        </div>
                        <div class="breadcrumb__inner">
                            <ul>
                                <li><a href="/">Anasayfa</a></li>
                                <li><a href="{{route('frontend.products')}}">Ürünler</a></li>
                                <li>{{$product->name}}</li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

            
  @endsection
    @section('content')><!-- End Breadcrumbs -->
    
    <!-- feature__section__start -->
    <div class="featurearea featurearea--2 sp_top_100 sp_bottom_100">
        <div class="">
            <div class="container">
                <div class="row">

                    <div class="col-xl-6 col-lg-6 col-md-6">

                        <div class="featurearea__details__img">
                            <div class="swiper details__gallery__big">
                                <div class="featurearea__big__img swiper-wrapper">
                                    <div class="featurearea__single__big__img swiper-slide">
                                        <img src="{{$product->photo}}" alt="Product Big Img" >
                                    </div>
{{--                                    <div class="featurearea__single__big__img swiper-slide">--}}
{{--                                        <img src="../img/products/2.jpg" alt="Product Big Img">--}}
{{--                                    </div>--}}
{{--                                    <div class="featurearea__single__big__img swiper-slide">--}}
{{--                                        <img src="../img/products/3.jpg" alt="Product Big Img">--}}
{{--                                    </div>--}}
{{--                                    <div class="featurearea__single__big__img swiper-slide">--}}
{{--                                        <img src="../img/products/4.jpg" alt="Product Big Img">--}}
{{--                                    </div>--}}
{{--                                    <div class="featurearea__single__big__img swiper-slide">--}}
{{--                                        <img src="../img/products/5.jpg" alt="Product Big Img">--}}
{{--                                    </div>--}}
{{--                                    <div class="featurearea__single__big__img swiper-slide">--}}
{{--                                        <img src="../img/products/6.jpg" alt="Product Big Img">--}}
{{--                                    </div>--}}
{{--                                    <div class="featurearea__single__big__img swiper-slide">--}}
{{--                                        <img src="../img/products/7.jpg" alt="Product Big Img">--}}
{{--                                    </div>--}}
                                </div>
                            </div>

{{--                            <div thumbsSlider="" class="swiper details__gallery">--}}
{{--                                <div class=" featurearea__thumb__img swiper-wrapper">--}}
{{--                                    <div class="featurearea__single__thumb__img swiper-slide">--}}
{{--                                        <img src="../img/products/1.jpg" alt="Product Big Img">--}}
{{--                                    </div>--}}
{{--                                    <div class="featurearea__single__thumb__img swiper-slide">--}}
{{--                                        <img src="../img/products/2.jpg" alt="Product Big Img">--}}
{{--                                    </div>--}}
{{--                                    <div class="featurearea__single__thumb__img swiper-slide">--}}
{{--                                        <img src="../img/products/2.jpg" alt="Product Big Img">--}}
{{--                                    </div>--}}
{{--                                    <div class="featurearea__single__thumb__img swiper-slide">--}}
{{--                                        <img src="../img/products/4.jpg" alt="Product Big Img">--}}
{{--                                    </div>--}}
{{--                                    <div class="featurearea__single__thumb__img swiper-slide">--}}
{{--                                        <img src="../img/products/5.jpg" alt="Product Big Img">--}}
{{--                                    </div>--}}
{{--                                    <div class="featurearea__single__thumb__img swiper-slide">--}}
{{--                                        <img src="../img/products/6.jpg" alt="Product Big Img">--}}
{{--                                    </div>--}}
{{--                                    <div class="featurearea__single__thumb__img swiper-slide">--}}
{{--                                        <img src="../img/products/7.jpg" alt="Product Big Img">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </div>


                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="featurearea__inner">
{{--                            <div class="featurearea__small__title">--}}
{{--                                <span>Kitaplar</span>--}}
{{--                            </div>--}}
{{--                            <div class="featurearea__main__title">--}}
{{--                                <h3>Book Lorem ipsum dolor.</h3>--}}
{{--                            </div>--}}
{{--                            <div class="featurearea__price">--}}
{{--                                <span><del> $110.00</del></span>--}}
{{--                                <span>$80.00</span>--}}
{{--                                <span class="featurearea__price__button">SALE </span>--}}
{{--                                <span class="featurearea__price__button black__color">-27%</span>--}}
{{--                            </div>--}}
{{--                            <div class="featurearea__countdown__title">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock timer__icon"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>--}}
{{--                                <h5>Hurry up! Sale ends in</h5>--}}
{{--                            </div>--}}
{{--                            <div class="featurearea__countdown" data-countdown="2025/06/01">--}}
{{--                                <div class="count"><p>00</p><span>Days</span></div>--}}
{{--                                <div class="count"><p>00</p><span>Hrs</span></div>--}}
{{--                                <div class="count"><p>00</p><span>Min</span></div>--}}
{{--                                <div class="count"><p>00</p><span>Sec</span></div>--}}
{{--                            </div>--}}
                            <div class="featurearea__progress__text">
                                <h6>{{$product->name}}</h6>
                                <hr>
{{--                                <div class="progress">--}}
{{--                                    <div role="progressbar" class="progress-bar wow fadeInLeft" data-wow-duration="0.6s" data-wow-delay=".4s" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%; visibility: visible; animation-duration: 0.6s; animation-delay: 0.4s; animation-name: fadeInLeft;"></div>--}}
{{--                                </div>--}}
                            </div>


{{--                            <div class="featurearea__size">--}}
{{--                                <span>Boyut</span>--}}
{{--                                X--}}
{{--                            </div>--}}
{{--                            <div class="featurearea__size__button">--}}
{{--                                <ul>--}}
{{--                                    <ul class="size-list">--}}
{{--                                        <li>--}}
{{--                                            <input type="radio" id="size-x" name="size" value="x">--}}
{{--                                            <label for="size-x" class="radio-label">X</label>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <input type="radio" id="size-xl" name="size" value="xl">--}}
{{--                                            <label for="size-xl" class="radio-label">XL</label>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <input type="radio" id="size-m" name="size" value="m">--}}
{{--                                            <label for="size-m" class="radio-label">M</label>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <input type="radio" id="size-s" name="size" value="s">--}}
{{--                                            <label for="size-s" class="radio-label">S</label>--}}
{{--                                        </li>--}}
{{--                                    </ul--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                            
                            <div class="featurearea__size">
                                <dt>Stok durumu  </dt>
                                 <dd>
                                    @if($product->stock == null)
                                        Sipariş için iletişime geçiniz
                                    @elseif($product->stock == 0)
                                        Stok Tükendi
                                    @elseif($product->stock > 0)
                                        Stokta {{$product->stock}} Adet var
                                    @endif
                                </dd>
                               

                            </div>
                            <div class="featurearea__quantity">

{{--                                <div class="featurearea__quantity__button cartarea__plus__minus">--}}
{{--                                    <div class="dec qtybutton">- </div>--}}
{{--                                    <input class="cartarea__plus__minus__box" type="text" value="1" name="updates[]">--}}
{{--                                    <div class="inc qtybutton">+</div>--}}
{{--                                </div>--}}

{{--                                <a class="featurearea__quantity__button" href="#">Add to cart</a>--}}



                            </div>
                            <div class="featurearea__bottom__button">
                                <a href="whatsapp://send?t={{ $product->name}}&text={{route('frontend.product_detail',['slug'=>$product->slug])}}">İletişime Geç</a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- feature__section__end -->



    <!-- description__review__start -->
    <div class="descriptionarea sp_bottom_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 descriptionarea__tab__wrapper">
                    <ul class="nav  descriptionarea__tab__button" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="descriptionarea__link active"  data-bs-toggle="tab" data-bs-target="#description" type="button">Açıklama </button>
                        </li>
{{--                        <li class="nav-item" role="presentation">--}}
{{--                            <button class="descriptionarea__link"  data-bs-toggle="tab" data-bs-target="#video" type="button">Video</button>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item" role="presentation">--}}
{{--                            <button class="descriptionarea__link"  data-bs-toggle="tab" data-bs-target="#product__Type" type="button">Product Type</button>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item" role="presentation">--}}
{{--                            <button class="descriptionarea__link"  data-bs-toggle="tab" data-bs-target="#delivery__system" type="button">Delivery system</button>--}}
{{--                        </li>--}}
                    </ul>
                    <div class="tab-content tab__content__wrapper" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description">

                            {!! $product->description !!}


                        </div>
   
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- about__tap__section__end -->
{{--    <div class="gridarea__2 sp_top_100" data-aos="fade-up">--}}
{{--        <div class="container-fluid full__width__padding">--}}

{{--            <div class="section__title">--}}

{{--                <div class="section__title__heading">--}}
{{--                    <h2>Featured Products</h2>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row row__custom__class">--}}

{{--                <div class="swiper featured__course">--}}
{{--                    <div class="swiper-wrapper">--}}

{{--                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item column__custom__class swiper-slide">--}}
{{--                            <div class="gridarea__wraper product__grid">--}}
{{--                                <div class="gridarea__img">--}}
{{--                                    <a href="../course-details.html"><img src="../img/products/1.jpg" alt="grid"></a>--}}
{{--                                    <div class="gridarea__small__button gridarea__small__button__1">--}}
{{--                                        <div class="grid__badge">Sale</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__small__icon">--}}
{{--                                        <a href="#"><i class="icofont-heart-alt"></i></a>--}}
{{--                                    </div>--}}

{{--                                    <div class="product__grid__action">--}}
{{--                                        <ul>--}}
{{--                                            <li>--}}
{{--                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>--}}
{{--                                                    </svg>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">--}}
{{--                                                    Add to cart--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <span data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>--}}
{{--                                                </a>--}}
{{--                                                </span>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                                <div class="gridarea__content">--}}

{{--                                    <div class="gridarea__heading">--}}
{{--                                        <h3><a href="product-details.html">Book stand about Software</a></h3>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__price">--}}
{{--                                        $32.00 <del>/ $67.00</del>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__bottom">--}}

{{--                                        <a href="instructor-details.html">--}}
{{--                                            Sports--}}
{{--                                        </a>--}}

{{--                                        <div class="gridarea__star">--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <span>(44)</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item column__custom__class swiper-slide">--}}
{{--                            <div class="gridarea__wraper product__grid">--}}
{{--                                <div class="gridarea__img">--}}
{{--                                    <a href="../course-details.html"><img src="../img/products/2.jpg" alt="grid"></a>--}}
{{--                                    <div class="gridarea__small__button gridarea__small__button__1">--}}
{{--                                        <div class="grid__badge blue__color">New</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__small__icon">--}}
{{--                                        <a href="#"><i class="icofont-heart-alt"></i></a>--}}
{{--                                    </div>--}}

{{--                                    <div class="product__grid__action">--}}
{{--                                        <ul>--}}
{{--                                            <li>--}}
{{--                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>--}}
{{--                                                    </svg>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">--}}
{{--                                                    Add to cart--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <span data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>--}}
{{--                                                </a>--}}
{{--                                                </span>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                                <div class="gridarea__content">--}}

{{--                                    <div class="gridarea__heading">--}}
{{--                                        <h3><a href="product-details.html">Nice stand about peek</a></h3>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__price">--}}
{{--                                        $56.00 <del>/ $99.00</del>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__bottom">--}}

{{--                                        <a href="instructor-details.html">--}}
{{--                                            Coocking--}}
{{--                                        </a>--}}

{{--                                        <div class="gridarea__star">--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <span>(98)</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item column__custom__class swiper-slide">--}}
{{--                            <div class="gridarea__wraper product__grid">--}}
{{--                                <div class="gridarea__img">--}}
{{--                                    <a href="../course-details.html"><img src="../img/products/3.jpg" alt="grid"></a>--}}
{{--                                    <div class="gridarea__small__button gridarea__small__button__1">--}}
{{--                                        <div class="grid__badge green__color">Sold Out</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__small__icon">--}}
{{--                                        <a href="#"><i class="icofont-heart-alt"></i></a>--}}
{{--                                    </div>--}}

{{--                                    <div class="product__grid__action">--}}
{{--                                        <ul>--}}
{{--                                            <li>--}}
{{--                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>--}}
{{--                                                    </svg>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">--}}
{{--                                                    Add to cart--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <span data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>--}}
{{--                                                </a>--}}
{{--                                                </span>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                                <div class="gridarea__content">--}}

{{--                                    <div class="gridarea__heading">--}}
{{--                                        <h3><a href="product-details.html">Nided minid lnided codad</a></h3>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__price">--}}
{{--                                        $57.00 <del>/ $88.00</del>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__bottom">--}}

{{--                                        <a href="instructor-details.html">--}}
{{--                                            Drama--}}
{{--                                        </a>--}}

{{--                                        <div class="gridarea__star">--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <span>(45)</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item column__custom__class swiper-slide">--}}
{{--                            <div class="gridarea__wraper product__grid">--}}
{{--                                <div class="gridarea__img">--}}
{{--                                    <a href="../course-details.html"><img src="../img/products/4.jpg" alt="grid"></a>--}}
{{--                                    <div class="gridarea__small__button gridarea__small__button__1">--}}
{{--                                        <div class="grid__badge yellow__color">20% Off</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__small__icon">--}}
{{--                                        <a href="#"><i class="icofont-heart-alt"></i></a>--}}
{{--                                    </div>--}}

{{--                                    <div class="product__grid__action">--}}
{{--                                        <ul>--}}
{{--                                            <li>--}}
{{--                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>--}}
{{--                                                    </svg>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">--}}
{{--                                                    Add to cart--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <span data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>--}}
{{--                                                </a>--}}
{{--                                                </span>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                                <div class="gridarea__content">--}}

{{--                                    <div class="gridarea__heading">--}}
{{--                                        <h3><a href="product-details.html">Pendi mandie kond maedsd</a></h3>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__price">--}}
{{--                                        $88.00 <del>/ $99.00</del>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__bottom">--}}

{{--                                        <a href="instructor-details.html">--}}
{{--                                            Design--}}
{{--                                        </a>--}}

{{--                                        <div class="gridarea__star">--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <span>(45)</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item column__custom__class swiper-slide">--}}
{{--                            <div class="gridarea__wraper product__grid">--}}
{{--                                <div class="gridarea__img">--}}
{{--                                    <a href="../course-details.html"><img src="../img/products/5.jpg" alt="grid"></a>--}}
{{--                                    <div class="gridarea__small__button gridarea__small__button__1">--}}
{{--                                        <div class="grid__badge">Sale</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__small__icon">--}}
{{--                                        <a href="#"><i class="icofont-heart-alt"></i></a>--}}
{{--                                    </div>--}}

{{--                                    <div class="product__grid__action">--}}
{{--                                        <ul>--}}
{{--                                            <li>--}}
{{--                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>--}}
{{--                                                    </svg>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">--}}
{{--                                                    Add to cart--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <span data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>--}}
{{--                                                </a>--}}
{{--                                                </span>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                                <div class="gridarea__content">--}}

{{--                                    <div class="gridarea__heading">--}}
{{--                                        <h3><a href="product-details.html">Book stand about softwere</a></h3>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__price">--}}
{{--                                        $32.00 <del>/ $67.00</del>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__bottom">--}}

{{--                                        <a href="instructor-details.html">--}}
{{--                                            Development--}}
{{--                                        </a>--}}

{{--                                        <div class="gridarea__star">--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <span>(44)</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item column__custom__class swiper-slide">--}}
{{--                            <div class="gridarea__wraper product__grid">--}}
{{--                                <div class="gridarea__img">--}}
{{--                                    <a href="../course-details.html"><img src="../img/products/6.jpg" alt="grid"></a>--}}
{{--                                    <div class="gridarea__small__button gridarea__small__button__1">--}}
{{--                                        <div class="grid__badge blue__color">New</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__small__icon">--}}
{{--                                        <a href="#"><i class="icofont-heart-alt"></i></a>--}}
{{--                                    </div>--}}

{{--                                    <div class="product__grid__action">--}}
{{--                                        <ul>--}}
{{--                                            <li>--}}
{{--                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>--}}
{{--                                                    </svg>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">--}}
{{--                                                    Add to cart--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <span data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>--}}
{{--                                                </a>--}}
{{--                                                </span>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                                <div class="gridarea__content">--}}

{{--                                    <div class="gridarea__heading">--}}
{{--                                        <h3><a href="product-details.html">Nice stand about peek</a></h3>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__price">--}}
{{--                                        $56.00 <del>/ $99.00</del>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__bottom">--}}

{{--                                        <a href="instructor-details.html">--}}
{{--                                            Business--}}
{{--                                        </a>--}}

{{--                                        <div class="gridarea__star">--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <span>(98)</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item column__custom__class swiper-slide">--}}
{{--                            <div class="gridarea__wraper product__grid">--}}
{{--                                <div class="gridarea__img">--}}
{{--                                    <a href="../course-details.html"><img src="../img/products/7.jpg" alt="grid"></a>--}}
{{--                                    <div class="gridarea__small__button gridarea__small__button__1">--}}
{{--                                        <div class="grid__badge green__color">Sold Out</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__small__icon">--}}
{{--                                        <a href="#"><i class="icofont-heart-alt"></i></a>--}}
{{--                                    </div>--}}

{{--                                    <div class="product__grid__action">--}}
{{--                                        <ul>--}}
{{--                                            <li>--}}
{{--                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>--}}
{{--                                                    </svg>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">--}}
{{--                                                    Add to cart--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <span data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>--}}
{{--                                                </a>--}}
{{--                                                </span>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                                <div class="gridarea__content">--}}

{{--                                    <div class="gridarea__heading">--}}
{{--                                        <h3><a href="product-details.html">Nided minid lnided codad</a></h3>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__price">--}}
{{--                                        $57.00 <del>/ $88.00</del>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__bottom">--}}

{{--                                        <a href="instructor-details.html">--}}
{{--                                            Affiliate--}}
{{--                                        </a>--}}

{{--                                        <div class="gridarea__star">--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <span>(45)</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item column__custom__class swiper-slide">--}}
{{--                            <div class="gridarea__wraper product__grid">--}}
{{--                                <div class="gridarea__img">--}}
{{--                                    <a href="../course-details.html"><img src="../img/products/8.jpg" alt="grid"></a>--}}
{{--                                    <div class="gridarea__small__button gridarea__small__button__1">--}}
{{--                                        <div class="grid__badge yellow__color">20% Off</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__small__icon">--}}
{{--                                        <a href="#"><i class="icofont-heart-alt"></i></a>--}}
{{--                                    </div>--}}

{{--                                    <div class="product__grid__action">--}}
{{--                                        <ul>--}}
{{--                                            <li>--}}
{{--                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>--}}
{{--                                                    </svg>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a class="grid__cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add to cart">--}}
{{--                                                    Add to cart--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <span data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>--}}
{{--                                                </a>--}}
{{--                                                </span>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                                <div class="gridarea__content">--}}

{{--                                    <div class="gridarea__heading">--}}
{{--                                        <h3><a href="product-details.html">Pendi mandie kond maedsd</a></h3>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__price">--}}
{{--                                        $88.00 <del>/ $99.00</del>--}}
{{--                                    </div>--}}
{{--                                    <div class="gridarea__bottom">--}}

{{--                                        <a href="instructor-details.html">--}}
{{--                                            Marketing--}}
{{--                                        </a>--}}
{{--                                        <div class="gridarea__star">--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <i class="icofont-star"></i>--}}
{{--                                            <span>(45)</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                    </div>--}}

{{--                    <div class="slider__controls__wrap slider__controls__arrows">--}}
{{--                        <div class="swiper-button-next arrow-btn"></div>--}}
{{--                        <div class="swiper-button-prev arrow-btn"></div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    @endsection


@section('js')
@endsection
