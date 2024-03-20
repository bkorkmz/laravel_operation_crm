
@php
    $dailyBestSells = !blank($contents['DailyBestSells']) ? $contents['DailyBestSells'] : [];
    $promotion      = !empty($dailyBestSells['promotionCategoryOne']) ? $dailyBestSells['promotionCategoryOne'] : [];
    $categories     = !empty($promotion['categories']) ? $promotion['categories'] : [];
    $firstCategory  = !empty($categories) ?$categories->first(): [];
@endphp

<style>
    .product-cart-wrap.style-2 .product-img-action-wrap {
        /*width: max-content;*/
        /*display: block;*/
        /*margin: auto;*/
    }


</style>
@if(!blank($firstCategory))
<section class="section-padding pb-5">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeIn">
            <h3>{{$firstCategory->name}}</h3>
            <ul class="nav nav-tabs links" id="myTab-2" role="tablist">
{{--                <li class="nav-item" role="presentation">--}}
{{--                    <button class="nav-link active" id="nav-tab-one-1" data-bs-toggle="tab" data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>--}}
{{--                </li>--}}
{{--                <li class="nav-item" role="presentation">--}}
{{--                    <button class="nav-link" id="nav-tab-two-1" data-bs-toggle="tab" data-bs-target="#tab-two-1" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>--}}
{{--                </li>--}}
{{--                <li class="nav-item" role="presentation">--}}
{{--                    <button class="nav-link" id="nav-tab-three-1" data-bs-toggle="tab" data-bs-target="#tab-three-1" type="button" role="tab" aria-controls="tab-three" aria-selected="false">New added</button>--}}
{{--                </li>--}}
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                <div class="banner-img style-2" style="background: url({{asset('images/banner-4.jpg')}}) no-repeat center;background-size: cover;">
                    <div class="banner-text">
{{--                        <h2 class="mb-100">Bring nature into your home</h2>--}}
{{--                        <a href="javascript:void(0)" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                @foreach($firstCategory['getProduct'] as $product)


                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('frontend.product_detail',['slug'=>$product->slug])}}">
{{--                                                    <img class="default-img" src="/frontend/assets/imgs/shop/product-1-1.jpg" alt="" />--}}
{{--                                                    <img class="hover-img" src="/frontend/assets/imgs/shop/product-1-2.jpg" alt="" />--}}
                                                    <img class="default-img"
                                                         src="{{$product->photo}}"
                                                         alt="{{$product->name}}" title="{{$product->name}}" />
                                                    <img class="hover-img"
                                                         src="{{$product->photo}}"
                                                         alt="{{$product->name}}" title="{{$product->name}}" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Favorilere Ekle" class="action-btn d-none" href="" ><i
                                                        class="fi-rs-heart"></i></a>
                                                {{--                                            <a aria-label="Compare" class="action-btn" href=""><i--}}
                                                {{--                                                    class="fi-rs-shuffle"></i></a>--}}
                                                <a aria-label="Hızlı Göster" class="action-btn"   onclick="quickModal({{$product->id}})">
                                                    <i class="fi-rs-eye"></i></a>
                                            </div>
{{--                                            @dd($product)--}}
{{--                                            <div class="product-badges product-badges-position product-badges-mrg">--}}
{{--                                                <span class="hot">Popüler</span>--}}
{{--                                            </div>--}}
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="javascript:void(0)">{{$firstCategory->name}}</a>
                                            </div>
                                            <h2><a href="{{route('frontend.product_detail',['slug'=>$product->slug])}}">{{$product->name}}</a></h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 100%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (5.0)</span>
                                            </div>
                                            <div>
                                                {{--                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>--}}
                                            </div>


                                            <div class="product-card-bottom">

                                                <div class="product-price mt-10">
                                                    <span>{{$product->price !=0 ?$product->price.' TL':"" }}</span><br>
                                                    <span class="old-price">{{(!blank($product->old_price) && $product->old_price !=0) ?$product->old_price.' TL':"" }}</span>
                                                </div>


                                                <div class="add-cart align-self-end">

                                                    <a class="add" href="{{route('frontend.product_detail',['slug'=>$product->slug])}}">
                                                        {{--<i class="fi-rs-shopping-cart mr-5"></i>--}}
                                                        İncele</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
                <!--End tab-content-->
            </div>
            <!--End Col-lg-9-->
        </div>
    </div>
</section>

@endif
