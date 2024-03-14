@extends('nest.frontend.layout.layout')
@section('css')

@endsection
@section('title')
    {{$category->name}}
@endsection
@section('head')
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
@endsection

@section('breadcrumb')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Anasayfa</a>
                <span> {{$category->name}}</span>
            </div>
        </div>
    </div>

@endsection

@section('content')


<div class="container mb-30 mt-30">
    <div class="row flex-row-reverse">
        <div class="col-lg-4-5">
            <div class="row product-grid">
{{--@dd($getProduct)--}}

                @foreach($getProduct as $product)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{route('frontend.product_detail',['slug'=>$product->slug])}}">
                                        <img class="default-img"
                                             src="{{$product->photo}}"
                                             alt="{{$product->name}}" title="{{$product->name}}" />
                                        <img class="hover-img"
                                             src="{{$product->photo}}"
                                             alt="{{$product->name}}" title="{{$product->name}}" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Favorilere Ekle" class="action-btn d-none" href="" >
                                        <i class="fi-rs-heart"></i></a>
                                    {{--                                            <a aria-label="Compare" class="action-btn" href=""><i--}}
                                    {{--                                                    class="fi-rs-shuffle"></i></a>--}}
                                    <a aria-label="Hızlı Göster" class="action-btn"   onclick="quickModal({{$product->id}})">
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
                                    <a href="">{{$category->name}}</a>
                                </div>
                                <h2><a href="{{route('frontend.product_detail',['slug'=>$product->slug])}}">{{$product->name}}</a></h2>
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
                                        <span>{{$product->price != 0 ?$product->price." TL" : ""}}</span>
{{--                                                                                        <span class="old-price">{{$product->old_price != 0 ?$product->old_price." TL" : ""}}</span>--}}
                                    </div>
                                    <div class="add-cart align-self-end">
                                        <a class="add" target="_blank" href="{{route('frontend.product_detail',['slug'=>$product['slug']])}}">
                                            {{--<i class="fi-rs-shopping-cart mr-5"></i>--}} İncele</a>
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
                {!! $getProduct->links('vendor.pagination.bootstrap-4') !!}
{{--                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-start">
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                        </li>
                    </ul>
                </nav>--}}
            </div>
        </div>
        <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
            <div class="sidebar-widget widget-category-2 mb-30">
                <h5 class="section-title style-1 mb-30">Diğer Kategoriler</h5>
                <ul>
                    @foreach($categories as $bestcategory)
                    <li>
                        <a href="{{ route('frontend.page', $bestcategory->slug) }}"> <img src="{{$bestcategory->image}}" alt="" />{{$bestcategory->name}}</a><span class="count">{{$bestcategory->get_product_count}}</span>
                    </li>
                    @endforeach

                </ul>
            </div>

        </div>
    </div>
</div>


@endsection


@section('js')
@endsection


@section('after-js')

@endsection
