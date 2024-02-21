<!DOCTYPE html>
<html class="no-js" lang="{{app()->getLocale()}}">

<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    @yield('head')
    {!!config('settings.site_meta_tag')!!}
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/nest/imgs/theme/favicon.svg')}}"/>
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('frontend/nest/css/plugins/animate.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/nest/css/main.css?v=5.6.css')}}"/>

    @yield('css')

</head>

<body>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img src="{{asset('frontend/nest/imgs/theme/loading.gif')}}" alt="Herballayf Turkey"/>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade custom-modal" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="deal" style="background-image: url('frontend/nest/imgs/banner/popup-1.png')">
                    <div class="deal-top">
                        <h6 class="mb-10 text-brand-2">Deal of the Day</h6>
                    </div>
                    <div class="deal-content detail-info">
                        <h4 class="product-title"><a href="" class="text-heading">Organic fruit for your family's
                                health</a></h4>
                        <div class="clearfix product-price-cover">
                            <div class="product-price primary-color float-left">
                                <span class="current-price text-brand">$38</span>
                                <span>
                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                        <span class="old-price font-md ml-15">$52</span>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="deal-bottom">
                        <p class="mb-20">Hurry Up! Offer End In:</p>
                        <div class="deals-countdown pl-5" data-countdown="2025/03/25 00:00:00">
                            <span class="countdown-section"><span class="countdown-amount hover-up">03</span><span
                                    class="countdown-period"> days </span></span><span class="countdown-section"><span
                                    class="countdown-amount hover-up">02</span><span
                                    class="countdown-period"> hours </span></span><span class="countdown-section"><span
                                    class="countdown-amount hover-up">43</span><span
                                    class="countdown-period"> mins </span></span><span class="countdown-section"><span
                                    class="countdown-amount hover-up">29</span><span
                                    class="countdown-period"> sec </span></span>
                        </div>
                        <div class="product-detail-rating">
                            <div class="product-rate-cover text-end">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (32 rates)</span>
                            </div>
                        </div>
                        <a href="" class="btn hover-up">Shop Now <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick view -->
<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Herbalife Bağımsız Distribütör - Hayri Mandollu
Telefon:  0532 637 27 52</span>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            @foreach(config('pages') as $page)
                                <li><a href="{{ route('frontend.page', $page->slug) }}">{{$page->title}}</a></li>
                            @endforeach

{{--                            <li><a href="">Favoriler</a></li>--}}
{{--                            <li><a href="">Order Tracking</a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>100% güvenli teslimat</li>
                                <li>Son moda ürünler için takipte kalın</li>
{{--                                <li>Trend ürünleri kupon kullanarak daha ucuza alın</li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>Yardım mı lazım : <strong class="text-brand">{{config('settings.site_phone')}} </strong></li>
                            <li>
                                <a class="language-dropdown-active" href="#">{!! trans('Türkçe') !!}</a>
{{--                                <ul class="language-dropdown">--}}
{{--                                    <li>--}}
{{--                                        <a href="#"><img src="{{asset('frontend/nest/imgs/theme/flag-fr.png')}}"--}}
{{--                                                         alt="Herballayf Turkey"/>Français</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#"><img src="{{asset('frontend/nest/imgs/theme/flag-dt.png')}}"--}}
{{--                                                         alt="Herballayf Turkey"/>Deutsch</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#"><img src="{{asset('frontend/nest/imgs/theme/flag-ru.png')}}"--}}
{{--                                                         alt="Herballayf Turkey"/>Pусский</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                            </li>
                            <li>
                                <a class="language-dropdown-active" href="#">TRY <i class="fi-rs-angle-small-down"></i></a>
{{--                                <ul class="language-dropdown">--}}
{{--                                    <li>--}}
{{--                                        <a href="#"><img src="{{asset('frontend/nest/imgs/theme/flag-fr.png')}}"--}}
{{--                                                         alt="Herballayf Turkey"/>INR</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#"><img src="{{asset('frontend/nest/imgs/theme/flag-dt.png')}}"--}}
{{--                                                         alt="Herballayf Turkey"/>MBP</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#"><img src="{{asset('frontend/nest/imgs/theme/flag-ru.png')}}"--}}
{{--                                                         alt="Herballayf Turkey"/>EU</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">

            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="/"><img src="{{config('settings.site_logo')}}" alt="logo"/></a>
                </div>


                <div class="header-right">
                    <div class="search-style-2">
                        <form action="#" class="float-end mr-100">
                            <select class="select-active">
                                <option>Tüm Kategoriler</option>
                                @foreach(categories('product') as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <input type="text" placeholder="Bİr şeyler arayın ..."/>
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            {{--                            <div class="search-location d-none">--}}
                            {{--                                <form action="#">--}}
                            {{--                                    <select class="select-active">--}}
                            {{--                                        <option>Your Location</option>--}}
                            {{--                                        <option>Alabama</option>--}}
                            {{--                                        <option>Alaska</option>--}}
                            {{--                                        <option>Arizona</option>--}}
                            {{--                                        <option>Delaware</option>--}}
                            {{--                                        <option>Florida</option>--}}
                            {{--                                        <option>Georgia</option>--}}
                            {{--                                        <option>Hawaii</option>--}}
                            {{--                                        <option>Indiana</option>--}}
                            {{--                                        <option>Maryland</option>--}}
                            {{--                                        <option>Nevada</option>--}}
                            {{--                                        <option>New Jersey</option>--}}
                            {{--                                        <option>New Mexico</option>--}}
                            {{--                                        <option>New York</option>--}}
                            {{--                                    </select>--}}
                            {{--                                </form>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="header-action-icon-2">--}}
                            {{--                                <a href="">--}}
                            {{--                                    <img class="svgInject" alt="Herballayf Turkey"--}}
                            {{--                                         src="{{asset('frontend/nest/imgs/theme/icons/icon-compare.svg')}}"/>--}}
                            {{--                                    <span class="pro-count blue">3</span>--}}
                            {{--                                </a>--}}
                            {{--                                <a href=""><span class="lable ml-0">Compare</span></a>--}}
                            {{--                            </div>--}}
                            <div class="header-action-icon-2">
                                <a href="https://wa.me/{{config('settings.site_whatsapp_phone')}}?text=Bilgi almak istiyorum">
                                    <img class="svgInject" alt="Herballayf Turkey"
                                         src="{{asset('frontend/nest/imgs/theme/whatsapp.png')}}"/>
{{--                                    <span class="pro-count blue">0</span>--}}
                                </a>
                                <a href="https://wa.me/{{config('settings.site_whatsapp_phone')}}?text=Bilgi almak istiyorum">
                                    <span class="lable">İletişim</span></a>
                            </div>
                            <div class="header-action-icon-2 d-none">
                                <a class="mini-cart-icon" href="">
                                    <img alt="Herballayf Turkey"
                                         src="{{asset('frontend/nest/imgs/theme/icons/icon-cart.svg')}}"/>
                                    <span class="pro-count blue">0</span>
                                </a>
                                <a href=""><span class="lable">Sepet</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 d-none">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href=""><img alt="Herballayf Turkey"
                                                                src="{{asset('frontend/nest/imgs/shop/thumbnail-3.jpg')}}"/></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="">Daisy Casual Bag</a></h4>
                                                <h4><span>1 × </span>$800.00</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href=""><img alt="Herballayf Turkey"
                                                                src="{{asset('frontend/nest/imgs/shop/thumbnail-2.jpg')}}"/></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="">Corduroy Shirts</a></h4>
                                                <h4><span>1 × </span>$3200.00</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Toplam <span>0</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="" class="outline">Sepeti Göster</a>
                                            <a href="">Kasaya Git</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="">
                                    <img class="svgInject" alt="Herballayf Turkey"
                                         src="{{asset('frontend/nest/imgs/theme/icons/icon-user.svg')}}"/>
                                </a>
                                <a href=""><span class="lable ml-0">Hesap</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        @guest
                                            @if (Route::has('login'))
                                                <li>
                                                    <a href="{{ route('login') }}"><i
                                                            class="fi fi-rs-user mr-10"></i>{{ __('auth.login') }}</a>
                                                </li>
                                            @endif

                                            @if (Route::has('register'))
                                                <li>
                                                    <a href=""><i
                                                            class="fi fi-rs-user-add mr-10"></i>{{ __('auth.register') }}
                                                    </a>
                                                </li>
                                            @endif
                                        @else
                                            <li>
                                                @if(auth()->user()->hasAnyRole(['super admin','admin']))
                                                    <a href="{{route('admin.index')}}"><i
                                                            class="fi fi-rs-bank mr-10"></i>{{ __('Yönetim Paneli') }}
                                                    </a>
                                                @else
                                                    <a href=""><i class="fi fi-rs-user mr-10"></i>Hesabım</a>
                                                @endif
                                            </li>
                                            <li>
                                                <a href=""><i class="fi fi-rs-location-alt mr-10"></i>Siparişlerim</a>
                                            </li>
                                            <li>
                                                <a href=""><i class="fi fi-rs-label mr-10"></i>Kuponlarım</a>
                                            </li>
                                            <li>
                                                <a href=""><i class="fi fi-rs-heart mr-10"></i>İstek Listem</a>
                                            </li>
                                            <li>
                                                <a href=""><i class="fi fi-rs-settings-sliders mr-10"></i>Ayarlar</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                                        class="fi fi-rs-sign-out mr-10"></i>{{ __('Logout') }}</a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      class="d-none">
                                                    @csrf
                                                </form>

                                            </li>
                                        @endguest

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="/"><img src="{{config('settings.site_logo')}}" alt="logo"/></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> <span class="et"></span> Tüm Kategoriler
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>

                                    @foreach(categories('product') as $category)
                                        <li>
                                            <a href=""> <img
                                                    src="{{asset('frontend/nest/imgs/theme/icons/category-1.svg')}}"
                                                    alt="{{$category->name}}"/>{{$category->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{--                            <div class="more_slide_open" style="display: none">--}}
                            {{--                                <div class="d-flex categori-dropdown-inner">--}}
                            {{--                                    <ul>--}}
                            {{--                                        <li>--}}
                            {{--                                            <a href=""> <img--}}
                            {{--                                                    src="{{asset('frontend/nest/imgs/theme/icons/icon-1.svg')}}"--}}
                            {{--                                                    alt="Herballayf Turkey"/>Milks and Dairies</a>--}}
                            {{--                                        </li>--}}
                            {{--                                        <li>--}}
                            {{--                                            <a href=""> <img--}}
                            {{--                                                    src="{{asset('frontend/nest/imgs/theme/icons/icon-2.svg')}}"--}}
                            {{--                                                    alt="Herballayf Turkey"/>Clothing & beauty</a>--}}
                            {{--                                        </li>--}}
                            {{--                                    </ul>--}}
                            {{--                                    <ul class="end">--}}
                            {{--                                        <li>--}}
                            {{--                                            <a href=""> <img--}}
                            {{--                                                    src="{{asset('frontend/nest/imgs/theme/icons/icon-3.svg')}}"--}}
                            {{--                                                    alt="Herballayf Turkey"/>Wines & Drinks</a>--}}
                            {{--                                        </li>--}}
                            {{--                                        <li>--}}
                            {{--                                            <a href=""> <img--}}
                            {{--                                                    src="{{asset('frontend/nest/imgs/theme/icons/icon-4.svg')}}"--}}
                            {{--                                                    alt="Herballayf Turkey"/>Fresh Seafood</a>--}}
                            {{--                                        </li>--}}
                            {{--                                    </ul>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Daha fazla ...</span>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li>
                                    <a href="/" class="">Anasayfa <i class=""></i></a>
                                </li>
                                <li>
                                    <a href="{{route('frontend.products')}}" class="">Ürünler <i class=""></i></a>
                                </li>


                                {{--                                <li>--}}
                                {{--                                    <a href="">Blog <i class="fi-rs-angle-down"></i></a>--}}
                                {{--                                    <ul class="sub-menu">--}}
                                {{--                                        <li><a href="">Kategori 1</a></li>--}}
                                {{--                                        <li><a href="">Kategori 2</a></li>--}}
                                {{--                                        <li><a href="">Kategori 3</a></li>--}}
                                {{--                                        <li><a href="">Kategori 4</a></li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </li>--}}

                                <li>
                                    <a href="">İletişim </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src="{{asset('frontend/nest/imgs/theme/icons/icon-headphone.svg')}}" alt="hotline"/>
                    <p>{{config('settings.site_phone')}}
                        <span>24/7 İletişim</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
               <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="https://wa.me/{{config('settings.site_whatsapp_phone')}}?text=Bilgi almak istiyorum">
                                <img alt="Herballayf Turkey"
                                     src="{{asset('frontend/nest/imgs/theme/whatsapp.png')}}"/>
{{--                                <span class="pro-count white"></span>--}}
                            </a>
                        </div>
                        <div class="header-action-icon-2 d-none">
{{--                        <div class="header-action-icon-2 d-lg-none">--}}
                            <a class="mini-cart-icon" href="#">
                                <img alt="Herballayf Turkey"
                                     src="{{asset('frontend/nest/imgs/theme/icons/icon-cart.svg')}}"/>
                                <span class="pro-count white">0</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href=""><img alt="Herballayf Turkey"
                                                            src="{{asset('frontend/nest/imgs/shop/thumbnail-3.jpg')}}')}}"/></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href=""><img alt="Herballayf Turkey"
                                                            src="{{asset('frontend/nest/imgs/shop/thumbnail-4.jpg')}}')}}"/></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>$3500.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="">View cart</a>
                                        <a href="">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="/"><img src="{{config('settings.site_logo')}}" alt="logo"/></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="">
                    <input type="text" placeholder="Ürün ara ..."/>
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="">Anasayfa</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{route('frontend.products')}}">Ürünler</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="">İletişim</a>
                        </li>

                        {{--                        <li class="menu-item-has-children">--}}
                        {{--                            <a href="">Blog</a>--}}
                        {{--                            <ul class="dropdown">--}}
                        {{--                                <li><a href="">Kategori 1</a></li>--}}
                        {{--                                <li><a href="">Kategori 2</a></li>--}}
                        {{--                                <li><a href="">Kategori 3</a></li>--}}
                        {{--                                <li><a href="">Kategori 4</a></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </li>--}}

                        {{--                        <li class="menu-item-has-children">--}}
                        {{--                            <a href="#">Dil</a>--}}
                        {{--                            <ul class="dropdown">--}}
                        {{--                                <li><a href="#">Türkçe</a></li>--}}
                        {{--                                <li><a href="#">English</a></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </li>--}}
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Bizi Takipte Kalın</h6>
                <a {{config('settings.site_facebook_url') ?? "d-none"}} href="{{config('settings.site_facebook_url')}}"><img
                        src="{{asset('frontend/nest/imgs/theme/icons/icon-facebook-white.svg')}}"
                        alt="Sosyal Facebook Link"/></a>
                <a {{config('settings.site_twitter_url') ?? "d-none"}} href="{{config('settings.site_twitter_url')}}"><img
                        src="{{asset('frontend/nest/imgs/theme/icons/icon-twitter-white.svg')}}"
                        alt="Sosyal Twitter Link"/></a>
                <a {{config('settings.site_instagram_url') ?? "d-none"}} href="{{config('settings.site_instagram_url')}}"><img
                        src="{{asset('frontend/nest/imgs/theme/icons/icon-instagram-white.svg')}}"
                        alt="Sosyal Instagram Link"/></a>
                <a {{config('settings.site_youtube_url') ?? "d-none"}} href="{{config('settings.site_youtube_url')}}"><img
                        src="{{asset('frontend/nest/imgs/theme/icons/icon-youtube-white.svg')}}"
                        alt="Sosyal Youtube Link"/></a>
            </div>
            <div class="site-copyright">Copyright 2022 © Nest. All rights reserved. Powered by AliThemes.</div>
        </div>
    </div>
</div>
<!--End header-->
<main class="main">


</main>


@yield('content')
<!--  footer page--->
@include('nest.frontend.layout.includes.footer')


<!-- scripts JS -->
@include('nest.frontend.layout.includes.script')


@yield('js')

@yield('after-js')
</body>

</html>
