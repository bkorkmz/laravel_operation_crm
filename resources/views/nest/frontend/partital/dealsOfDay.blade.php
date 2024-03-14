<!--End Best Sales-->

@php
    $dealsOfDay = !blank($contents['dealsOfDay']) ? $contents['dealsOfDay'] : [];
    $promotion      = !blank($dealsOfDay['promotionCategoryTwo']) ? $dealsOfDay['promotionCategoryTwo'] : [];
    $categories     = !blank($promotion['categories']) ? $promotion['categories'] : [];
    $firstCategory  = !blank($categories) ?$categories->first(): [];

@endphp
<section class="section-padding pb-5">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
            <h3 class="">{{$firstCategory->name}}</h3>
            <a class="show-all"  href="{{ route('frontend.page', $firstCategory->slug) }}">
              Tüm Ürünler
                <i class="fi-rs-angle-right"></i>
            </a>
        </div>
        <div class="row">
            @foreach($firstCategory['getProduct'] as $product)
                <div class="col-xl-3 col-lg-4 col-md-6 {{$loop->index > 1 ? 'd-none d-lg-block':"" }}">
                    <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="product-img-action-wrap">
                            <div class="product-img">
                                <a href="javascript:void(0)">
                                    <img src="{{asset($product->photo)}}" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="deals-countdown-wrap">
{{--                                <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>--}}
                            </div>
                            <div class="deals-content">
                                <h2><a href="javascript:void(0)">{{$product->name}}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 100%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (5.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted"><a href="{{ route('frontend.page', $firstCategory->slug) }}">{{$firstCategory->name}}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>{{$product->price != 0 ?$product->price." TL" : ""}}</span><br>
                                        <span class="old-price">{{$product->old_price != 0 ?$product->old_price." TL" : ""}}</span>
                                    </div>
                                    <div class="add-cart align-self-end">
                                        <a class="add" href="{{route('frontend.product_detail',['slug'=>$product['slug']])}}">
                                            {{--<i class="fi-rs-shopping-cart mr-5"></i>--}}İncele </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            @endforeach
        </div>
    </div>
</section>
