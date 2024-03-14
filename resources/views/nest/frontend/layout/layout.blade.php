<!DOCTYPE html>
<html class="no-js" lang="{{app()->getLocale()}}">

<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('head')
    {!!config('settings.site_meta_tag')!!}
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/imgs/theme/favicon.svg')}}"/>
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/animate.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css?v=5.6.css')}}"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css?v=1.0" rel="stylesheet"/>

    <style>
        .header-action-2 .header-action-icon-2 > a img {
            max-width: 25px;
        }

        .product-cart-wrap .product-content-wrap .product-price span.old-price {
            font-size: 10px;
        }

        .cart-dropdown-wrap .shopping-cart-footer .shopping-cart-total h5 {
            color: #9b9b9b;
            font-weight: 400;
            font-size: 15px;
            margin: 0;
        }

        .cart-dropdown-wrap .shopping-cart-footer .shopping-cart-total h5 span {
            font-size: 16px;
            float: right;
            color: #3BB77E;
        }
    </style>
    @yield('css')

</head>

<body>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img src="{{asset('frontend/assets/imgs/theme/loading.gif')}}" alt="Herballayf Turkey"/>
            </div>
        </div>
    </div>
</div>
@php
    $cart_count =  Cart::count();
    $cart_total =  Cart::total();
    $tax =Cart::tax();
    $sub_total =  $cart_total -  $tax;

@endphp
    <!-- Modal -->
<div class="modal fade custom-modal" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="deal" style="background-image: url('frontend/assets/imgs/banner/popup-1.png')">
                    <div class="deal-top">
                        <h6 class="mb-10 text-brand-2">Deal of the Day</h6>
                    </div>
                    <div class="deal-content detail-info">
                        <h4 class="product-title"><a href="javascript:void(0)" class="text-heading">Organic fruit for
                                your family's
                                health</a></h4>
                        <div class="clearfix product-price-cover">
                            <div class="product-price primary-color float-left">
                                <span class="current-price text-brand"></span>
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
                        <a href="javascript:void(0)" class="btn hover-up">Shop Now <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick view -->
<header class="header-area header-style-1 header-style-5 header-height-2">
    {{--<header class="header-area header-style-1 header-height-2">--}}
    <div class="mobile-promotion">
        <span>Herbalife Bağımsız Distribütör - Hayri Mandollu
Telefon:  0532 637 27 52</span>
    </div>

    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="/"><img src="{{config('settings.site_logo')}}" alt="logo"/></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="#">
                            <select class="select-active">
                                <option>Tüm Kategoriler</option>
                                @foreach(categories('product') as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <input type="text" placeholder="Ürün ara"/>
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="search-location">
                                <form action="#">
                                    <select class="select-active">
                                        <option value="tr">Türkçe</option>
                                        {{--                                        <option value="en">English</option>--}}
                                    </select>
                                </form>
                            </div>

                            <div class="header-action-icon-2">
                                <a href="https://wa.me/{{config('settings.site_whatsapp_phone')}}?text=Bilgi almak istiyorum">
                                    <img class="svgInject" alt="Whatsapp"
                                         src="{{asset('frontend/assets/imgs/theme/icons/icon-whatsapp.svg')}}"/>

                                    <span class="lable m-0">Whatsapp</span></a>
                            </div>

                            <div class="header-action-icon-2">
                                <a href="{{config('settings.site_instagram_url')}}">
                                    <img class="svgInject" alt="İnstagram"
                                         src="{{asset('frontend/assets/imgs/theme/icons/icon-instagram.svg')}}"/>
                                    <span class="lable m-0">İnstagram</span></a>
                            </div>

                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{route('frontend.cart')}}">
                                    <img alt="Sepet" src="{{asset('frontend/assets/imgs/theme/icons/icon-cart.svg')}}"/>
                                    <span class="pro-count blue">{{$cart_count}}</span>
                                </a>
                                <a href="{{route('frontend.cart')}}"><span class="lable">Sepet</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>

                                        <li>
                                            <div class="shopping-cart-title">
                                                <h4><a href="javascript:void(0)">Sepetteki Ürün Sayısı: </a> <span
                                                        class="pro-count">{{$cart_count}}</span></h4>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h5><strong class="d-inline-block">Ara Toplam:</strong>
                                                <span id="cart-sub-total">{{$sub_total}}</span>
                                            </h5>
                                            <div class="clearfix"></div>
                                            <h5><strong class="d-inline-block">Vergi:</strong>
                                                <span id="cart-tax">  {{$tax}}</span></h5>
                                            <div class="clearfix"></div>
                                            <h4><strong class="d-inline-block">Toplam:</strong>
                                                <span id="cart-total">{{ $cart_total }} TL</span>
                                            </h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{route('frontend.cart')}}" class="outline">Sepeti Göster</a>
                                            <a href="{{route('paytrOdeme')}}">Kasaya Git</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="javascript:void(0)">
                                    <img class="svgInject" alt="Nest"
                                         src="{{asset('frontend/assets/imgs/theme/icons/icon-user.svg')}}"/>
                                </a>
                                <a href="{{route('frontend.myaccount')}}"><span class="lable ml-0">Hesabım</span></a>
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
                                                    <a href="{{ route('register') }}"><i
                                                            class="fi fi-rs-user-add mr-10"></i>{{ __('auth.register') }}
                                                    </a>
                                                </li>
                                            @endif
                                        @else

                                            @if(auth()->user()->hasAnyRole(['super admin','admin']))
                                            <li>
                                                <a href="{{route('admin.index')}}"><i
                                                        class="fi fi-rs-bank mr-10"></i>{{ __('Yönetim Paneli') }}
                                                </a>
                                            </li>
                                            @endif

                                            <li>
                                            <a href="{{ route('frontend.myaccount') }}"><i
                                                            class="fi fi-rs-user mr-10"></i>Hesabım</a>
                                            </li>
                                            <li><a href="{{ route('frontend.myaccount') }}"><i class="fi fi-rs-location-alt mr-10"></i>Siparişlerim</a>
                                            </li>

{{--                                            <li><a href="javascript:void(0)"><i class="fi fi-rs-heart mr-10"></i>Favori--}}
{{--                                                    Listem</a></li>--}}

                                            <li><a href="{{ route('frontend.myaccount') }}#account"><i
                                                        class="fi fi-rs-settings-sliders mr-10"></i>Ayarlar</a></li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><i
                                                        class="fi fi-rs-sign-out mr-10"></i>{{ __('auth.loguth') }}</a>
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

    <div class="header-middle header-middle-ptb-1 d-none">
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
                            <div class="header-action-icon-2">
                                <a href="https://wa.me/{{config('settings.site_whatsapp_phone')}}?text=Bilgi almak istiyorum">
                                    <img class="svgInject" alt="Herballayf Turkey"
                                         src="{{asset('frontend/assets/imgs/theme/whatsapp.png')}}"/>
                                    {{--                                    <span class="pro-count blue">0</span>--}}
                                </a>
{{--                                <a href="https://wa.me/{{config('settings.site_whatsapp_phone')}}?text=Bilgi almak istiyorum">--}}
{{--                                    <span class="lable">İletişim</span></a>--}}
                            </div>
                            <div class="header-action-icon-2 d-none">
                                <a class="mini-cart-icon" href="javascript:void(0)">
                                    <img alt="Herballayf Turkey"
                                         src="{{asset('frontend/assets/imgs/theme/icons/icon-cart.svg')}}"/>
                                    <span class="pro-count blue">3</span>
                                </a>
                                <a href="javascript:void(0)"><span class="lable">Sepet</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 d-none">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-title">
                                                <h4><a href="javascript:void(0)">Sepetteki Ürün Sayısı: </a>
                                                    <span>3</span></h4>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="javascript:void(0)"><img alt="Herballayf Turkey"
                                                                                  src="{{asset('frontend/assets/imgs/shop/thumbnail-2.jpg')}}"/></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="javascript:void(0)">Corduroy Shirts</a></h4>
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
                                            <a href="javascript:void(0)" class="outline">Sepeti Göster</a>
                                            <a href="javascript:void(0)">Kasaya Git</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="javascript:void(0)">
                                    <img class="svgInject" alt="Herballayf Turkey"
                                         src="{{asset('frontend/assets/imgs/theme/icons/icon-user.svg')}}"/>
                                </a>
                                <a href="javascript:void(0)"><span class="lable ml-0">Hesap</span></a>
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
                                                    <a href="javascript:void(0)"><i
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
                                                    <a href="javascript:void(0)"><i class="fi fi-rs-user mr-10"></i>Hesabım</a>
                                                @endif
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><i class="fi fi-rs-location-alt mr-10"></i>Siparişlerim</a>
                                            </li>
                                            <li>
                                                {{--                                                <a href="javascript:void(0)"><i class="fi fi-rs-label mr-10"></i>Kuponlarım</a>--}}
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><i class="fi fi-rs-heart mr-10"></i>Favori
                                                    Listem</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><i
                                                        class="fi fi-rs-settings-sliders mr-10"></i>Ayarlar</a>
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
                                    @php $categories = categories('product'); $totalCategories = count($categories); $half = ceil($totalCategories / 2); @endphp
                                    @foreach($categories as $key => $category)
                                        @if($key < $half)
                                            <li>
                                                <a href="{{ route('frontend.page', $category->slug) }}">
                                                    <img
                                                        src="{{asset($category->image ??'frontend/assets/imgs/theme/icons/category-1.svg')}}"
                                                        alt="{{$category->name}}"/>
                                                    {{$category->name}}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>

                                <ul>
                                    @foreach($categories as $key => $category)
                                        @if($key >= $half)
                                            <li>
                                                <a href="{{ route('frontend.page', $category->slug) }}">
                                                    <img
                                                        src="{{asset($category->image ??'frontend/assets/imgs/theme/icons/category-1.svg')}}"
                                                        alt="{{$category->name}}"/>
                                                    {{$category->name}}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>

                            </div>
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

                                <li>
                                    <a href="javascript:void(0)">İletişim </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src="{{asset('frontend/assets/imgs/theme/icons/icon-headphone.svg')}}" alt="hotline"/>
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
                                     src="{{asset('frontend/assets/imgs/theme/whatsapp.png')}}"/>
                                {{--                                <span class="pro-count white"></span>--}}
                            </a>
                        </div>
                        <div class="header-action-icon-2 d-none">
                            {{--                        <div class="header-action-icon-2 d-lg-none">--}}
                            <a class="mini-cart-icon" href="#">
                                <img alt="Herballayf Turkey"
                                     src="{{asset('frontend/assets/imgs/theme/icons/icon-cart.svg')}}"/>
                                <span class="pro-count white">0</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="javascript:void(0)"><img alt="Herballayf Turkey"
                                                                              src="{{asset('frontend/assets/imgs/shop/thumbnail-3.jpg')}}')}}"/></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="javascript:void(0)">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="javascript:void(0)"><img alt="Herballayf Turkey"
                                                                              src="{{asset('frontend/assets/imgs/shop/thumbnail-4.jpg')}}')}}"/></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="javascript:void(0)">Macbook Pro 2022</a></h4>
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
                                        <a href="javascript:void(0)">View cart</a>
                                        <a href="javascript:void(0)">Checkout</a>
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
                            <a href="/">Anasayfa</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{route('frontend.products')}}">Ürünler</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="javascript:void(0)">İletişim</a>
                        </li>

                        {{--                        <li class="menu-item-has-children">--}}
                        {{--                            <a href="javascript:void(0)">Blog</a>--}}
                        {{--                            <ul class="dropdown">--}}
                        {{--                                <li><a href="javascript:void(0)">Kategori 1</a></li>--}}
                        {{--                                <li><a href="javascript:void(0)">Kategori 2</a></li>--}}
                        {{--                                <li><a href="javascript:void(0)">Kategori 3</a></li>--}}
                        {{--                                <li><a href="javascript:void(0)">Kategori 4</a></li>--}}
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
                        src="{{asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg')}}"
                        alt="Sosyal Facebook Link"/></a>
                <a {{config('settings.site_twitter_url') ?? "d-none"}} href="{{config('settings.site_twitter_url')}}"><img
                        src="{{asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg')}}"
                        alt="Sosyal Twitter Link"/></a>
                <a {{config('settings.site_instagram_url') ?? "d-none"}} href="{{config('settings.site_instagram_url')}}"><img
                        src="{{asset('frontend/assets/imgs/theme/icons/icon-instagram-white.svg')}}"
                        alt="Sosyal Instagram Link"/></a>
                <a {{config('settings.site_youtube_url') ?? "d-none"}} href="{{config('settings.site_youtube_url')}}"><img
                        src="{{asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg')}}"
                        alt="Sosyal Youtube Link"/></a>
            </div>
            <div class="site-copyright">Copyright 2024 © HerbalifeTurkey Tüm Hakları Saklıdır</div>
        </div>
    </div>
</div>
<!--End header-->
<main class="main">
    @yield('breadcrumb')




    @yield('content')

    <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider" id="slider">

                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails" id="slider-thumbnails">

                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <div class="popular_attribute">
                                    {{--                                    <span class="stock-status out-stock"> Popüler </span>--}}
                                    {{--                                    <span class="stock-status out-stock"> Çok satan </span>--}}
                                </div>

                                <h3 class="title-detail"><a href="javascript:void(0)"
                                                            class="text-heading product-title">Ürün adı</a></h3>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover product-desc">

                                    </div>

                                </div>
                                <div class="font-xs">
                                    <ul id="product-attributes">
                                    </ul>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand" id="price"> </span>
                                        <span>
                                       <span class="old-price font-md ml-15" id="old-price"></span>
                                    </span>
                                    </div>
                                </div>
                                <div class="detail-extralink mb-30">
                                    {{--                                    <form class="add-to-cart-form" method="POST" action="">--}}
                                    {{--                                        @csrf--}}
                                    {{--                                        <input type="hidden" name="id" class="hidden-product-id" value="">--}}
                                    <div class="detail-extralink mb-50">
                                        {{--                                            <div class="detail-qty border radius">--}}
                                        {{--                                                <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>--}}
                                        {{--                                                <input type="number" min="1" value="1" name="qty" class="qty-val qty-input">--}}
                                        {{--                                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>--}}
                                        {{--                                            </div>--}}

                                        <div class="product-extra-link2  has-buy-now-button ">
                                            <button type="button" class="button button-add-to-cart" id="modal_addto_cart">
                                                <i class="fi-rs-shopping-cart"></i>Sepete Ekle
                                            </button>

                                            <a aria-label="Favoriye Ekle"
                                               class="action-btn hover-up js-add-to-wishlist-button" data-url=""
                                               href="#"><i class="fi-rs-heart"></i></a>
                                            {{--                                            <a aria-label="Add To Compare" href="#" class="action-btn hover-up js-add-to-compare-button" data-url="https://nest.botble.com/compare/4"><i class="fi-rs-shuffle"></i></a>--}}
                                        </div>

                                        <input type="hidden" name="slug" id="product_slug" value="">
                                    </div>
                                    {{--                                    </form>--}}
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>


<!--  footer page--->
@include('nest.frontend.layout.includes.footer')


<!-- scripts JS -->
@include('nest.frontend.layout.includes.script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@yield('js')

@yield('after-js')


<script>

    function quickModal(id) {
        let modal = $('#quickViewModal');
        modal.find('.modal-body .hidden-product-id').val("");

        $.ajax({
            url: '{{ route('product-info') }}/' + id,
            dataType: "json",
            success: function (data) {
                console.log('data', data)
                let product = data.product;
                let attributesHtml = '';
                let popularAttribute = '';
                let product_slug = '';

                let attributes = JSON.parse(product.attributes);
                let price = product.price;
                let old_price = product.old_price;

                Object.entries(attributes).map(([key, value]) => {
                    // Eğer özellik "popular" ise döngüyü atla
                    console.log(key, value)
                    if (key == 'popular' || key == 'best-sales') {

                        popularAttribute += `<span class="stock-status out-stock">@lang('product.')${key}</span>`;
                        return;
                    }
                    attributesHtml += `<li class="mb-5">${key}: <span class="text-brand">${value}</span></li>`;
                });


                modal.find('.modal-body #slider').html(`<figure class="border-radius-10">
                                        <img src="${product.photo}"
                                              alt="${product.slug}" title="${product.name}"/>
                                    </figure>`);

                modal.find('.modal-body #slider-thumbnails').html(`
                                     <div>
                                            <img src="${product.photo ?? ""}"
                                              alt="${product.slug}" title="${product.name}" width="77" height="77"/>
                                    </div>`);

                modal.find(' .modal-body .product-title').html(`${product.name}`);
                // modal.find(' .modal-body .hidden-product-id').val(`${product.id}`);

                modal.find(' .modal-body .product-desc').html(`${product.short_detail ? product.short_detail : ""}`);
                modal.find(' .modal-body #product-attributes').html(`${attributesHtml ? attributesHtml : ""}`);
                // modal.find(' .modal-body .popular_attribute').html(`${popularAttribute?popularAttribute:""}`);

                if (price != 0 && price != '' && price != null) {
                    modal.find('.modal-body #price').html(`${price + 'TL'}`);
                }

                if (old_price != 0 && old_price != '' && old_price != null) {
                    modal.find('.modal-body #old-price ').html(`${old_price + 'TL'}`);
                }

                modal.find('.modal-body #product_slug').val(`${product.slug}`);
                modal.modal('show');

            },
            error: (function (error, data) {
                console.error('Ajax hatası ');
            })
        });

    }


    function sendWhatsApp(name) {
        let site_whatsapp_phone = "{{ config('settings.site_whatsapp_phone') }}";
        let productName = name;
        let whatsappLink = "https://wa.me/" + site_whatsapp_phone + "?text=" + encodeURIComponent(productName);
        window.open(whatsappLink);
    }

    function addToCart(slug) {
        $.ajax({
            url: '{{ route("frontend.cart_add") }}/' + slug,
            method: 'GET',
            success: function (response) {
                updateProductCount(response.cartCount);
                toastr.success(response.message);
            },
            error: function (xhr, status, error) {
                console.log(xhr, status, error)
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    toastr.error(xhr.responseJSON.message);
                } else {
                    toastr.error('Bir hata oluştu. Lütfen daha sonra tekrar deneyin.');
                }
            }
        });

    }


    function updateProductCount(newCount) {
        $('.pro-count').text(newCount.cart_count);
        $('#cart-sub-total').text(newCount.sub_total);
        $('#cart-tax').text(newCount.tax);
        $('#cart-total').text(newCount.cart_total);
    }



    $('#modal_addto_cart').click(function (e) {
        let modal = $('#quickViewModal');
        let slug = modal.find('.modal-body #product_slug').val();
        addToCart(slug);
    });




</script>
</body>

</html>
