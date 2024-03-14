@extends('nest.frontend.layout.layout')
@section('css')

@endsection
@section('title')
    {{config('settings.site_title') }}
@endsection
@section('head')

    <meta name="keywords" content="{{ $product->name}} "/>
    <meta name="description" content="{{ $product->detail }}">
    <meta name="datePublished" content="{{ $product->created_at }}">
    <meta name="dateModified" content="{{ $product->updated_at }}">

    {{--    <meta property="product:price:amount" content="{{ $product->price }}" />--}}
    <meta property="product:price:currency" content="TRY"/>
    <meta property="product:availability" content="instock"/>





    <meta itemprop="name" content="{{ config('settings.site_title') }}"/>
    <meta itemprop="headline" content="{{ $product->name }}"/>
    <meta itemprop="image" content="{{"https://".request()->host()."".$product->photo }}"/>
    <link rel="publisher" href="{{ config('settings.site_google_plus_url') }}"/>
    <link rel="canonical" href="{{request()->url()}}">

    <meta property="og:locale" content="tr"/>
    <meta property="og:site_name" content="{{ config('settings.site_title') }}"/>
    <meta property="og:title" content="{{ $product->name }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ request()->url() }}"/>
    <meta property="og:description" content="{{ $product->detail }}"/>
    <meta property="og:image" content="{{route('frontend.index').$product->photo }}"/>
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">
    <meta property="og:image:alt" content="{{ $product->name }}">
    <meta property="article:publisher" content="{{config('settings.site_facebook_url') }}"/>

    <meta name="twitter:title" content="{{ $product->name }}"/>
    <meta name="twitter:url" content="{{ request()->url() }}"/>
    <meta name="twitter:description" content="{{ $product->detail }}"/>
    <meta property="twitter:image" content="{{route('frontend.index').$product->photo }}"/>
    <meta property="twitter:image:width" content="1200">
    <meta property="twitter:image:height" content="675">
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@herbalifeturkey"/>

    <script type="application/ld+json">
        {

              "@context": "https://schema.org",
              "@type": "Product",
              "@id": "{{ $product->id }}",
              "name": "{{ $product->name }}",
              "image": "{{ $product->photo }}",
              "description": "{{ $product->description }}",
              "brand": {
                "@type": "Brand",
                "name": "{{ $product->name }}"
              },
              "offers": {
                "@type": "Offer",
                        "priceCurrency": "{{ $product->price }}",
                        "price": "{{ $product->price }}",
                    "availability": "{{ $product->stock > 0 ? 'InStock' : 'SoldOut'}}"
              },
              "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "5.0"

            }
    </script>

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "BreadcrumbList",
          "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Ürünler",
            "item": "{{route('frontend.products')}}"
          },{
            "@type": "ListItem",
            "position": 2,
            "name": "{{ $product->name}}",
            "item": " {{request()->fullUrl()}} "
          }]
        }
    </script>

@endsection
@section('breadcrumb')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Anasayfa</a>
                <span></span> <a href="{{route('frontend.products')}}">Ürünler</a> <span></span> {{$product->name}}
            </div>
        </div>
    </div>
@endsection
@section('content')

    @php $attributes = json_validate($product->attributes)? json_decode($product->attributes,true) : []; @endphp

    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-11 col-lg-12 m-auto">
                <div class="row flex-row-reverse">
                    <div class="col-xl-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50 mt-30">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{$product->photo}}" alt="{{$product->name}}"/>
                                            </figure>
                                            {{--                                            <figure class="border-radius-10">--}}
                                            {{--                                                <img src="assets/imgs/shop/product-16-1.jpg" alt="product image"/>--}}
                                            {{--                                            </figure>--}}
                                            {{--                                            <figure class="border-radius-10">--}}
                                            {{--                                                <img src="assets/imgs/shop/product-16-3.jpg" alt="product image"/>--}}
                                            {{--                                            </figure>--}}
                                            {{--                                            <figure class="border-radius-10">--}}
                                            {{--                                                <img src="assets/imgs/shop/product-16-4.jpg" alt="product image"/>--}}
                                            {{--                                            </figure>--}}
                                            {{--                                            <figure class="border-radius-10">--}}
                                            {{--                                                <img src="assets/imgs/shop/product-16-5.jpg" alt="product image"/>--}}
                                            {{--                                            </figure>--}}
                                            {{--                                            <figure class="border-radius-10">--}}
                                            {{--                                                <img src="assets/imgs/shop/product-16-6.jpg" alt="product image"/>--}}
                                            {{--                                            </figure>--}}
                                            {{--                                            <figure class="border-radius-10">--}}
                                            {{--                                                <img src="assets/imgs/shop/product-16-7.jpg" alt="product image"/>--}}
                                            {{--                                            </figure>--}}
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails">
                                            <div><img src="{{$product->photo}}" alt="{{$product->name}}"/></div>
                                            {{--                                            <div><img src="assets/imgs/shop/thumbnail-4.jpg" alt="product image"/></div>--}}

                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info pr-30 pl-30">
                                        @if($product->stock <= 20)
                                            <span
                                                class="stock-status out-stock">{{$product->stock <= 20 ? 'Sınırlı Stok':""}} </span>
                                        @endif
                                        <h2 class="title-detail">{{$product->name}}</h2>
                                        <br>
                                        {{--<div class="product-detail-rating">
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                            </div>
                                        </div>--}}
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <span
                                                    class="current-price text-brand">{{$product->price != 0 ?$product->price." TL" : ""}}</span>
{{--                                                        <span class="save-price font-md color3 ml-15">26% Off</span>--}}
                                                    @if($product->old_price)
                                                        <span class="old-price font-md ml-15">{{$product->old_price." TL"}}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="short-desc mb-30">
                                            <p class="font-lg">{{$product->short_detail}}</p>
                                        </div>
{{--                                        <div class="attr-detail attr-size mb-30">--}}
{{--                                            <strong class="mr-10">Size / Weight: </strong>--}}
{{--                                            <ul class="list-filter size-filter font-small">--}}
{{--                                                <li><a href="#">50g</a></li>--}}
{{--                                                <li class="active"><a href="#">60g</a></li>--}}
{{--                                                <li><a href="#">80g</a></li>--}}
{{--                                                <li><a href="#">100g</a></li>--}}
{{--                                                <li><a href="#">150g</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
                                        <div class="detail-extralink mb-50">
{{--                                            <div class="detail-qty border radius">--}}
{{--                                                <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>--}}
{{--                                                <span class="qty-val">1</span>--}}
{{--                                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>--}}
{{--                                            </div>--}}
                                            <div class="product-extra-link2">
                                                <button onclick="addToCart('{{$product->slug}}')" type="button"
                                                        class="button button-add-to-cart"><i
                                                        class="fi-rs-shopping-cart"></i>Sepete Ekle
                                                </button>
                                                  <a aria-label="Add To Wishlist" class="action-btn hover-up"href="javascript:void(0)"><i class="fi-rs-heart"></i></a>
                                                {{--  <a aria-label="Compare" class="action-btn hover-up"href="javascript:void(0)"><i class="fi-rs-shuffle"></i></a>--}}
                                            </div>
                                        </div>
                                        <div class="font-xs">
                                            <ul class="mr-50 float-start">

                                                @forelse($attributes as $key => $attr)
                                                    @if($key != 'popular' && $key != 'best-sales' )
                                                        <li class="mb-5">{{$key}}: <span
                                                                class="text-brand">{{$attr}}</span></li>
                                                    @endif
                                                @empty
                                                @endforelse

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="tab-style3">
                                    <ul class="nav nav-tabs text-uppercase">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                               href="#Description">Ürün Açıklaması</a>
                                        </li>
                                        {{--                                        <li class="nav-item">--}}
                                        {{--                                            <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>--}}
                                        {{--                                        </li>--}}
                                        {{--                                        <li class="nav-item">--}}
                                        {{--                                            <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Vendor</a>--}}
                                        {{--                                        </li>--}}
                                        {{--                                        <li class="nav-item">--}}
                                        {{--                                            <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>--}}
                                        {{--                                        </li>--}}
                                    </ul>
                                    <div class="tab-content shop_info_tab entry-main-content">
                                        <div class="tab-pane fade show active" id="Description">
                                            <div class="">
                                                {!! $product->description ?? ' Açıklama bilgisi bulunamadı ' !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-60">
                                <div class="col-12">
                                    <h2 class="section-title style-1 mb-30">Benzer Ürünler</h2>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products">
                                        @foreach($otherProducts as $otherProduct)
                                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                                <div class="product-cart-wrap hover-up">
                                                    <div class="product-img-action-wrap">
                                                        <div class="product-img product-img-zoom">
                                                            <a href="{{route('frontend.product_detail',['slug'=>$otherProduct->slug])}}"
                                                               tabindex="0">
                                                                <img class="default-img"
                                                                     src="{{$otherProduct->photo}}"
                                                                     alt="{{$otherProduct->name}}"/>
                                                                <img class="hover-img"
                                                                     src="{{$otherProduct->photo}}"
                                                                     alt="{{$otherProduct->name}}"/>
                                                            </a>
                                                        </div>
                                                        <div class="product-action-1">
                                                            <a aria-label="Hızlı Göster" class="action-btn"
                                                               onclick="quickModal({{$otherProduct->id}})">
                                                                <i class="fi-rs-eye"></i></a>

                                                            {{--                                                            <a aria-label="Quick view" class="action-btn small hover-up"--}}
                                                            {{--                                                               data-bs-toggle="modal" data-bs-target="#quickViewModal"><i--}}
                                                            {{--                                                                    class="fi-rs-search"></i></a>--}}
                                                            {{--                                                            <a aria-label="Add To Wishlist"--}}
                                                            {{--                                                               class="action-btn small hover-up"href="javascript:void(0)"--}}
                                                            {{--                                                               tabindex="0"><i class="fi-rs-heart"></i></a>--}}
                                                            {{--                                                            <a aria-label="Compare" class="action-btn small hover-up"--}}
                                                            {{--                                                              href="javascript:void(0)" tabindex="0"><i--}}
                                                            {{--                                                                    class="fi-rs-shuffle"></i></a>--}}
                                                        </div>
                                                        {{--                                                        <div--}}
                                                        {{--                                                            class="product-badges product-badges-position product-badges-mrg">--}}
                                                        {{--                                                            <span class="hot">Hot</span>--}}
                                                        {{--                                                        </div>--}}
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <h2>
                                                            <a href="{{route('frontend.product_detail',['slug'=>$otherProduct->slug])}}"
                                                               tabindex="0">{{$otherProduct->name}}</a></h2>
                                                        {{--                                                        <div class="rating-result" title="90%">--}}
                                                        {{--                                                            <span> </span>--}}
                                                        {{--                                                        </div>--}}
                                                        <div class="product-price">
                                                            <span>{{$otherProduct->price != 0 ?$otherProduct->price." TL" : ""}}</span>
                                                            {{--                                                            <span class="old-price">$245.8</span>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 primary-sidebar sticky-sidebar mt-30">
                        <div class="sidebar-widget widget-category-2 mb-30">
                            <h5 class="section-title style-1 mb-30">Kategoriler</h5>
                            <ul>
                                @foreach($categories as  $category)
                                    <li>
                                        <a href="{{ route('frontend.page', $category->slug) }}"> {{$category->name}}</a>
                                        <span class="count">{{$category->get_product_count}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                        <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                            <h5 class="section-title style-1 mb-30">Yeni Ürünler</h5>

                            @foreach($otherProducts as $newProduct)
                                <div class="single-post clearfix">
                                    <a href="{{route('frontend.product_detail',['slug'=>$newProduct->slug])}}">
                                    <div class="image">
                                        <img src="{{$newProduct->photo}}" alt="{{$newProduct->name}}"/>
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a class="font-xs"
                                               href="{{route('frontend.product_detail',['slug'=>$newProduct->slug])}}"> {{$newProduct->name}}</a>
                                        </h5>
                                        <p class="price mb-0 mt-5">{{$newProduct->price != 0 ?$newProduct->price." TL" : ""}}</p>
                                        <div class="product-rate">
                                            <div class="product-rating" style="width: 100%"></div>
                                        </div>
                                    </div>
                                    </a>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection


        @section('js')
        @endsection


        @section('after-js')

@endsection
