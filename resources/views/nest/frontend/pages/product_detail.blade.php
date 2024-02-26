@extends('nest.frontend.layout.layout')
@section('css')

@endsection
@section('title')
    {{config('settings.site_title') }}
@endsection
@section('head')


    <meta name="keywords" content="{{ $product->name}} " />
    <meta name="description" content="{{ $product->detail }}">
    <meta name="datePublished" content="{{ $product->created_at }}">
    <meta name="dateModified" content="{{ $product->updated_at }}">

{{--    <meta property="product:price:amount" content="{{ $product->price }}" />--}}
    <meta property="product:price:currency" content="TRY" />
    <meta property="product:availability" content="instock" />





    <meta itemprop="name" content="{{ config('settings.site_title') }}"/>
    <meta itemprop="headline" content="{{ $product->name }}"/>
    <meta itemprop="image" content="{{"https://".request()->host()."".$product->photo }}"/>
    <link rel="publisher" href="{{ config('settings.site_google_plus_url') }}"/>
    <link rel="canonical" href="{{request()->url()}}">

    <meta property="og:locale" content="tr_TR"/>
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
{{--    "priceCurrency": "{{ $product->price }}",--}}
{{--    "price": "{{ $product->price }}",--}}
    "availability": "{{ $product->stock > 0 ? 'InStock' : 'SoldOut'}}"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5.0"
  }
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
                                {{--                                @dd($product)--}}
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info pr-30 pl-30">
                                        @if($product->stock <= 20)
                                            <span class="stock-status out-stock">{{$product->stock <= 20 ? 'Sınırlı Stok':""}} </span>
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
                                                <span>
{{--                                                        <span class="save-price font-md color3 ml-15">26% Off</span>--}}
                                                    @if($product->old_price)
                                                        <span
                                                            class="old-price font-md ml-15">{{$product->old_price." Tl"}}</span>

                                                    @endif
                                                    </span>
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
                                        {{--                                        <div class="detail-extralink mb-50">--}}
                                        {{--                                            <div class="detail-qty border radius">--}}
                                        {{--                                                <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>--}}
                                        {{--                                                <span class="qty-val">1</span>--}}
                                        {{--                                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>--}}
                                        {{--                                            </div>--}}
                                                                                    <div class="product-extra-link2">
                                                                                        <button onclick="sendWhatsApp('{{$product->name}}')" type="button" class="button button-add-to-cart"  ><i class="fi-rs-shopping-cart"></i>Fityat Al</button>
{{--                                                                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>--}}
{{--                                                                                        <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>--}}
                                                                                    </div>
                                        {{--                                        </div>--}}
                                        <div class="font-xs">
                                            <ul class="mr-50 float-start">

                                                @php $attributes = json_validate($product->attributes)? json_decode($product->attributes,true) : []; @endphp
                                                @forelse($attributes as $key => $attr)
                                                    @if($key != 'popular')
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
                                        {{--                                        <div class="tab-pane fade" id="Additional-info">--}}
                                        {{--                                            <table class="font-md">--}}
                                        {{--                                                <tbody>--}}
                                        {{--                                                <tr class="stand-up">--}}
                                        {{--                                                    <th>Stand Up</th>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        <p>35″L x 24″W x 37-45″H(front to back wheel)</p>--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                <tr class="folded-wo-wheels">--}}
                                        {{--                                                    <th>Folded (w/o wheels)</th>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        <p>32.5″L x 18.5″W x 16.5″H</p>--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                <tr class="folded-w-wheels">--}}
                                        {{--                                                    <th>Folded (w/ wheels)</th>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        <p>32.5″L x 24″W x 18.5″H</p>--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                <tr class="door-pass-through">--}}
                                        {{--                                                    <th>Door Pass Through</th>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        <p>24</p>--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                <tr class="frame">--}}
                                        {{--                                                    <th>Frame</th>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        <p>Aluminum</p>--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                <tr class="weight-wo-wheels">--}}
                                        {{--                                                    <th>Weight (w/o wheels)</th>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        <p>20 LBS</p>--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                <tr class="weight-capacity">--}}
                                        {{--                                                    <th>Weight Capacity</th>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        <p>60 LBS</p>--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                <tr class="width">--}}
                                        {{--                                                    <th>Width</th>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        <p>24″</p>--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                <tr class="handle-height-ground-to-handle">--}}
                                        {{--                                                    <th>Handle height (ground to handle)</th>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        <p>37-45″</p>--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                <tr class="wheels">--}}
                                        {{--                                                    <th>Wheels</th>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        <p>12″ air / wide track slick tread</p>--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                <tr class="seat-back-height">--}}
                                        {{--                                                    <th>Seat back height</th>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        <p>21.5″</p>--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                <tr class="head-room-inside-canopy">--}}
                                        {{--                                                    <th>Head room (inside canopy)</th>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        <p>25″</p>--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                <tr class="pa_color">--}}
                                        {{--                                                    <th>Color</th>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        <p>Black, Blue, Red, White</p>--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                <tr class="pa_size">--}}
                                        {{--                                                    <th>Size</th>--}}
                                        {{--                                                    <td>--}}
                                        {{--                                                        <p>M, S</p>--}}
                                        {{--                                                    </td>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                </tbody>--}}
                                        {{--                                            </table>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="tab-pane fade" id="Vendor-info">--}}
                                        {{--                                   --}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="tab-pane fade" id="Reviews">--}}
                                        {{--                                            <!--Comments-->--}}
                                        {{--                                            <div class="comments-area">--}}
                                        {{--                                                <div class="row">--}}
                                        {{--                                                    <div class="col-lg-8">--}}
                                        {{--                                                        <h4 class="mb-30">Customer questions & answers</h4>--}}
                                        {{--                                                        <div class="comment-list">--}}
                                        {{--                                                            <div class="single-comment justify-content-between d-flex mb-30">--}}
                                        {{--                                                                <div class="user justify-content-between d-flex">--}}
                                        {{--                                                                    <div class="thumb text-center">--}}
                                        {{--                                                                        <img src="assets/imgs/blog/author-2.png" alt="" />--}}
                                        {{--                                                                        <a href="#" class="font-heading text-brand">Sienna</a>--}}
                                        {{--                                                                    </div>--}}
                                        {{--                                                                    <div class="desc">--}}
                                        {{--                                                                        <div class="d-flex justify-content-between mb-10">--}}
                                        {{--                                                                            <div class="d-flex align-items-center">--}}
                                        {{--                                                                                <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>--}}
                                        {{--                                                                            </div>--}}
                                        {{--                                                                            <div class="product-rate d-inline-block">--}}
                                        {{--                                                                                <div class="product-rating" style="width: 100%"></div>--}}
                                        {{--                                                                            </div>--}}
                                        {{--                                                                        </div>--}}
                                        {{--                                                                        <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>--}}
                                        {{--                                                                    </div>--}}
                                        {{--                                                                </div>--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                            <div class="single-comment justify-content-between d-flex mb-30 ml-30">--}}
                                        {{--                                                                <div class="user justify-content-between d-flex">--}}
                                        {{--                                                                    <div class="thumb text-center">--}}
                                        {{--                                                                        <img src="assets/imgs/blog/author-3.png" alt="" />--}}
                                        {{--                                                                        <a href="#" class="font-heading text-brand">Brenna</a>--}}
                                        {{--                                                                    </div>--}}
                                        {{--                                                                    <div class="desc">--}}
                                        {{--                                                                        <div class="d-flex justify-content-between mb-10">--}}
                                        {{--                                                                            <div class="d-flex align-items-center">--}}
                                        {{--                                                                                <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>--}}
                                        {{--                                                                            </div>--}}
                                        {{--                                                                            <div class="product-rate d-inline-block">--}}
                                        {{--                                                                                <div class="product-rating" style="width: 80%"></div>--}}
                                        {{--                                                                            </div>--}}
                                        {{--                                                                        </div>--}}
                                        {{--                                                                        <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>--}}
                                        {{--                                                                    </div>--}}
                                        {{--                                                                </div>--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                            <div class="single-comment justify-content-between d-flex">--}}
                                        {{--                                                                <div class="user justify-content-between d-flex">--}}
                                        {{--                                                                    <div class="thumb text-center">--}}
                                        {{--                                                                        <img src="assets/imgs/blog/author-4.png" alt="" />--}}
                                        {{--                                                                        <a href="#" class="font-heading text-brand">Gemma</a>--}}
                                        {{--                                                                    </div>--}}
                                        {{--                                                                    <div class="desc">--}}
                                        {{--                                                                        <div class="d-flex justify-content-between mb-10">--}}
                                        {{--                                                                            <div class="d-flex align-items-center">--}}
                                        {{--                                                                                <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>--}}
                                        {{--                                                                            </div>--}}
                                        {{--                                                                            <div class="product-rate d-inline-block">--}}
                                        {{--                                                                                <div class="product-rating" style="width: 80%"></div>--}}
                                        {{--                                                                            </div>--}}
                                        {{--                                                                        </div>--}}
                                        {{--                                                                        <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>--}}
                                        {{--                                                                    </div>--}}
                                        {{--                                                                </div>--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                        </div>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                    <div class="col-lg-4">--}}
                                        {{--                                                        <h4 class="mb-30">Customer reviews</h4>--}}
                                        {{--                                                        <div class="d-flex mb-30">--}}
                                        {{--                                                            <div class="product-rate d-inline-block mr-15">--}}
                                        {{--                                                                <div class="product-rating" style="width: 90%"></div>--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                            <h6>4.8 out of 5</h6>--}}
                                        {{--                                                        </div>--}}
                                        {{--                                                        <div class="progress">--}}
                                        {{--                                                            <span>5 star</span>--}}
                                        {{--                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>--}}
                                        {{--                                                        </div>--}}
                                        {{--                                                        <div class="progress">--}}
                                        {{--                                                            <span>4 star</span>--}}
                                        {{--                                                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>--}}
                                        {{--                                                        </div>--}}
                                        {{--                                                        <div class="progress">--}}
                                        {{--                                                            <span>3 star</span>--}}
                                        {{--                                                            <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>--}}
                                        {{--                                                        </div>--}}
                                        {{--                                                        <div class="progress">--}}
                                        {{--                                                            <span>2 star</span>--}}
                                        {{--                                                            <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>--}}
                                        {{--                                                        </div>--}}
                                        {{--                                                        <div class="progress mb-30">--}}
                                        {{--                                                            <span>1 star</span>--}}
                                        {{--                                                            <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>--}}
                                        {{--                                                        </div>--}}
                                        {{--                                                        <a href="#" class="font-xs text-muted">How are ratings calculated?</a>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <!--comment form-->--}}
                                        {{--                                            <div class="comment-form">--}}
                                        {{--                                                <h4 class="mb-15">Add a review</h4>--}}
                                        {{--                                                <div class="product-rate d-inline-block mb-30"></div>--}}
                                        {{--                                                <div class="row">--}}
                                        {{--                                                    <div class="col-lg-8 col-md-12">--}}
                                        {{--                                                        <form class="form-contact comment_form" action="#" id="commentForm">--}}
                                        {{--                                                            <div class="row">--}}
                                        {{--                                                                <div class="col-12">--}}
                                        {{--                                                                    <div class="form-group">--}}
                                        {{--                                                                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>--}}
                                        {{--                                                                    </div>--}}
                                        {{--                                                                </div>--}}
                                        {{--                                                                <div class="col-sm-6">--}}
                                        {{--                                                                    <div class="form-group">--}}
                                        {{--                                                                        <input class="form-control" name="name" id="name" type="text" placeholder="Name" />--}}
                                        {{--                                                                    </div>--}}
                                        {{--                                                                </div>--}}
                                        {{--                                                                <div class="col-sm-6">--}}
                                        {{--                                                                    <div class="form-group">--}}
                                        {{--                                                                        <input class="form-control" name="email" id="email" type="email" placeholder="Email" />--}}
                                        {{--                                                                    </div>--}}
                                        {{--                                                                </div>--}}
                                        {{--                                                                <div class="col-12">--}}
                                        {{--                                                                    <div class="form-group">--}}
                                        {{--                                                                        <input class="form-control" name="website" id="website" type="text" placeholder="Website" />--}}
                                        {{--                                                                    </div>--}}
                                        {{--                                                                </div>--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                            <div class="form-group">--}}
                                        {{--                                                                <button type="submit" class="button button-contactForm">Submit Review</button>--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                        </form>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
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
                                                            <a href="{{route('frontend.product_detail',['slug'=>$otherProduct->slug])}}" tabindex="0">
                                                                <img class="default-img"
                                                                     src="{{$otherProduct->photo}}" alt="{{$otherProduct->name}}"/>
                                                                <img class="hover-img"
                                                                     src="{{$otherProduct->photo}}" alt="{{$otherProduct->name}}"/>
                                                            </a>
                                                        </div>
                                                        <div class="product-action-1">
                                                            <a aria-label="Hızlı Göster" class="action-btn"   onclick="quickModal({{$otherProduct->id}})">
                                                            <i class="fi-rs-eye"></i></a>

{{--                                                            <a aria-label="Quick view" class="action-btn small hover-up"--}}
{{--                                                               data-bs-toggle="modal" data-bs-target="#quickViewModal"><i--}}
{{--                                                                    class="fi-rs-search"></i></a>--}}
{{--                                                            <a aria-label="Add To Wishlist"--}}
{{--                                                               class="action-btn small hover-up" href="shop-wishlist.html"--}}
{{--                                                               tabindex="0"><i class="fi-rs-heart"></i></a>--}}
{{--                                                            <a aria-label="Compare" class="action-btn small hover-up"--}}
{{--                                                               href="shop-compare.html" tabindex="0"><i--}}
{{--                                                                    class="fi-rs-shuffle"></i></a>--}}
                                                        </div>
{{--                                                        <div--}}
{{--                                                            class="product-badges product-badges-position product-badges-mrg">--}}
{{--                                                            <span class="hot">Hot</span>--}}
{{--                                                        </div>--}}
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <h2><a href="{{route('frontend.product_detail',['slug'=>$otherProduct->slug])}}" tabindex="0">{{$otherProduct->name}}</a></h2>
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
                                        <span  class="count">{{$category->get_product_count}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                            <h5 class="section-title style-1 mb-30">Yeni Ürünler</h5>

                             @foreach($otherProducts as $newProduct)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{$newProduct->photo}}" alt="{{$newProduct->name}}"/>
                                </div>
                                <div class="content pt-10">
                                    <h5><a class="font-xs" href="{{route('frontend.product_detail',['slug'=>$newProduct->slug])}}"> {{$newProduct->name}}</a></h5>
                                    <p class="price mb-0 mt-5">{{$newProduct->price != 0 ?$newProduct->price." TL" : ""}}</p>
{{--                                    <div class="product-rate">--}}
{{--                                        <div class="product-rating" style="width: 90%"></div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>

                            @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>




        <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    <span class="stock-status out-stock"> Popüler </span>
                                    <h3 class="title-detail"><a href="" class="text-heading product-title">Ürün adı</a></h3>
                                    <div class="product-detail-rating">
                                        <div class="product-rate-cover product-desc" >

                                        </div>

                                    </div>
                                    <div class="font-xs">
                                        <ul id="product-attributes">
                                        </ul>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <span class="current-price text-brand" id= "price"> </span>
                                            {{--                                    <span>--}}
                                            {{--                                       <span class="save-price font-md color3 ml-15">26% </span>--}}
                                            {{--                                       <span class="old-price font-md ml-15">$52</span>--}}
                                            {{--                                    </span>--}}
                                        </div>
                                    </div>
                                    <div class="detail-extralink mb-30">
                                        {{--                                <div class="detail-qty border radius" >--}}
                                        {{--                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>--}}
                                        {{--                                    <span class="qty-val">1</span>--}}
                                        {{--                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>--}}
                                        {{--                                </div>--}}
                                        <div class="product-extra-link2">
                                            <button id="whatsapp_share" type="submit" class="button button-add-to-cart">
                                                {{-- <i class="fi-rs-shopping-cart"></i>--}}Fiyat Al
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection


@section('js')
@endsection


@section('after-js')
    <script>

        function quickModal(id) {
            let modal = $('#quickViewModal');
            $.ajax({
                url: '{{ route('product-info') }}/' + id,
                dataType: "json",
                success: function (data) {
                    console.log('data', data)
                    let product = data.product;
                    let attributesHtml = '';
                    let attributes = JSON.parse(product.attributes);

                    Object.entries(attributes).map(([key, value]) => {
                        // Eğer özellik "popular" ise döngüyü atla
                        console.log(key, value)
                        if (key === 'popular') {
                            return;
                        }
                        attributesHtml += `<li class="mb-5">${key}: <span class="text-brand">${value}</span></li>`;
                    });


                    $('#quickViewModal .modal-body #slider').html(`<figure class="border-radius-10">
                                        <img src="${product.photo}"
                                              alt="${product.slug}" title="${product.name}"/>
                                    </figure>`);

                    $('#quickViewModal .modal-body #slider-thumbnails').html(`
                                     <div>
                                            <img src="${product.photo ?? ""}"
                                              alt="${product.slug}" title="${product.name}" width="77" height="77"/>
                                    </div>`);

                    $('#quickViewModal .modal-body .product-title').html(`${product.name}`);
                    $('#quickViewModal .modal-body .product-desc').html(`${product.short_detail? product.short_detail : ""}`);
                    $('#quickViewModal .modal-body #product-attributes').html(`${attributesHtml}`);
                    // $('#quickViewModal .modal-body #price').html(`${product.price} TL`);

                    // $('#whatsapp_share').attr('href', whatsappUrl);

                    modal.modal('show');

                },
                error: (function () {
                    console.error('Ajax hatası ');
                })
            });


        }

        const button = document.getElementById('whatsapp_share');

        button.addEventListener('click', function () {
            const whatsapp_number = "{{config('settings.site_whatsapp_phone')}}";
            const productName = $('#quickViewModal .modal-body .product-title')[0].text;
            const whatsappUrl = `https://wa.me/${whatsapp_number}?text=${productName}`;
            window.open(whatsappUrl, '_blank');
        });


    </script>
@endsection
