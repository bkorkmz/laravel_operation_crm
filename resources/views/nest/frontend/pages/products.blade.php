@extends('nest.frontend.layout.layout')
@section('css')

@endsection
@section('title')
    {{config('settings.site_title') }}
@endsection
@section('head')
    <meta name="description" content="{{ config('settings.site_description') }}">
    <meta name="title" content="{{ config('settings.site_title') }}">
    <meta name="Author" content="{{ config('settings.site_url') }}">

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "BreadcrumbList",
          "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Anasayfa",
            "item": "{{route('frontend.index')}}"
          },{
            "@type": "ListItem",
            "position": 2,
            "name": "Ürünler",
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
                <span> Ürünler</span>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <div class="container mb-30 mt-30">
        <div class="row flex-row-reverse">
            <div class="col-lg-4-5">
                <div class="row product-grid">


                    @foreach($products as $product)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{route('frontend.product_detail',['slug'=>$product['slug']])}}">
                                            <img class="default-img"
                                                 src="{{$product->photo}}"
                                                 alt="{{$product->name}}" title="{{$product->name}}"/>
                                            <img class="hover-img"
                                                 src="{{$product->photo}}"
                                                 alt="{{$product->name}}" title="{{$product->name}}"/>
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Favorilere Ekle" class="action-btn d-none" href=""><i
                                                class="fi-rs-heart"></i></a>
                                        {{--                                            <a aria-label="Compare" class="action-btn" href=""><i--}}
                                        {{--                                                    class="fi-rs-shuffle"></i></a>--}}
                                        <a aria-label="Hızlı Göster" class="action-btn"
                                           onclick="quickModal({{$product->id}})">
                                            <i class="fi-rs-eye"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        @php $attributes = json_decode($product->attributes, true); @endphp
                                        @if (isset($attributes['popular']) && $attributes['popular'] == 1)
                                            <span class="hot">Popüler</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="">{{$product['category'][0]->name}}</a>
                                    </div>
                                    <h2>
                                        <a href="{{route('frontend.product_detail',['slug'=>$product['slug']])}}">{{$product->name}}</a>
                                    </h2>
                                    <div class="product-rate-cover">
                                        {{--     <div class="product-rate d-inline-block">
                                                 <div class="product-rating" style="width: 90%"></div>
                                             </div>
                                                 <span class="font-small ml-5 text-muted"> (4.0)</span>--}}
                                    </div>
                                    <div>
                                        {{--                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>--}}
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>{{$product['price'] !=0 ?$product['price'].' TL':"" }}</span><br>
                                            <span
                                                class="old-price">{{ $product['old_price'] !=0 ?$product['old_price'].' TL':"" }}</span>
                                        </div>
                                        <div class="add-cart align-self-end">
                                            <a class="add" target="_blank"
                                               href="{{route('frontend.product_detail',['slug'=>$product['slug']])}}">{{--<i class="fi-rs-shopping-cart mr-5"></i>--}}İncele</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!--end product card-->
                </div>
                <!--product grid-->
                <div class="pagination-area mt-20 mb-20">
                    {!! $products->links('vendor.pagination.bootstrap-4') !!}

                </div>
                <section class="section-padding pb-5 d-none">
                    <div class="section-title">
                        <h3 class="">Deals Of The Day</h3>
                        <a class="show-all" href="shop-grid-right.html">
                            All Deals
                            <i class="fi-rs-angle-right"></i>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="product-cart-wrap style-2">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="shop-product-right.html">
                                            <img src="assets/imgs/banner/banner-5.png" alt=""/>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown</a>
                                        </h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="product-cart-wrap style-2">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="shop-product-right.html">
                                            <img src="assets/imgs/banner/banner-6.png" alt=""/>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2026/04/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="shop-product-right.html">Perdue Simply Smart Organics Gluten</a>
                                        </h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">Old El Paso</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>$24.85</span>
                                                <span class="old-price">$26.8</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 d-none d-lg-block">
                            <div class="product-cart-wrap style-2">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="shop-product-right.html">
                                            <img src="assets/imgs/banner/banner-7.png" alt=""/>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2027/03/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="shop-product-right.html">Signature Wood-Fired Mushroom</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (3.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">Progresso</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>$12.85</span>
                                                <span class="old-price">$13.8</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 d-none d-xl-block">
                            <div class="product-cart-wrap style-2">
                                <div class="product-img-action-wrap">
                                    <div class="product-img">
                                        <a href="shop-product-right.html">
                                            <img src="assets/imgs/banner/banner-8.png" alt=""/>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="deals-countdown-wrap">
                                        <div class="deals-countdown" data-countdown="2025/02/25 00:00:00"></div>
                                    </div>
                                    <div class="deals-content">
                                        <h2><a href="shop-product-right.html">Simply Lemonade with Raspberry Juice</a>
                                        </h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (3.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">Yoplait</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>$15.85</span>
                                                <span class="old-price">$16.8</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--End Deals-->
            </div>
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                <div class="sidebar-widget widget-category-2 mb-30">
                    <h5 class="section-title style-1 mb-30">Kategoriler</h5>
                    <ul>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('frontend.page', $category->slug) }}"> <img src="{{$category->image}}"
                                                                                              alt=""/>{{$category->name}}
                                </a><span class="count">{{$category->get_product_count}}</span>
                            </li>
                        @endforeach

                    </ul>
                </div>

                <!-- Product sidebar Widget -->
                <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10  d-none">
                    <h5 class="section-title style-1 mb-30 ">Popüler Ürünler</h5>

                </div>
                <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                    <img src="assets/imgs/banner/banner-11.png" alt=""/>
                    <div class="banner-text">
                        {{--                    <span>Oganic</span>--}}
                        {{--                    <h4>--}}
                        {{--                        Save 17% <br />--}}
                        {{--                        on <span class="text-brand">Oganic</span><br />--}}
                        {{--                        Juice--}}
                        {{--                    </h4>--}}
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
