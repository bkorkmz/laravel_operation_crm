<!--End Deals-->
@php
    $dealsOfDay = !blank($contents['topSelling']) ? $contents['topSelling'] : [];
    $promotion      = !blank($dealsOfDay['promotionCategoryTree']) ? $dealsOfDay['promotionCategoryTree'] : [];
    $groupedProducts      = !blank($dealsOfDay['groupedProducts']) ? $dealsOfDay['groupedProducts'] : [];
    $categories     = !blank($promotion) ? $promotion['categories'] : "";
    $firstCategory  = !blank($categories) ?$categories->first(): [];
    if (!blank($groupedProducts)){
        $group1 = [];
        $group2 = [];
        $group3 = [];
        $group4 = [];

        if (!blank($groupedProducts) && $groupedProducts->count() > 0) {
            $group1 = collect($groupedProducts[0]->all());
        }
        if (!blank($groupedProducts) &&$groupedProducts->count() > 1) {
            $group2 = collect($groupedProducts[1]->all());
        }
        if (!blank($groupedProducts) &&$groupedProducts->count() > 2) {
            $group3 = collect($groupedProducts[2]->all());
        }
        if (!blank($groupedProducts) &&$groupedProducts->count() > 3) {
            $group4 = collect($groupedProducts[3]->all());
        }

     }
@endphp
@if (!blank($groupedProducts)){
<section class="section-padding mb-30">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                <h4 class="section-title style-1 mb-30 animated animated">{{$firstCategory ? $firstCategory->name : ""}}</h4>
                <div class="product-list-small animated animated">
                    @foreach($group1 as $product)
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{route('frontend.product_detail',['slug'=>$product->slug])}}"><img src="{{$product->photo}}"  alt="{{$product->name}}" title="{{$product->name}}" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{route('frontend.product_detail',['slug'=>$product->slug])}}">{{$product->name}}</a>
                            </h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 100%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (5.0)</span>
                            </div>
                            <div class="product-price">
                                <span>{{$product->price !=0 ?$product->price.' TL':"" }}</span><br>
                                <span class="old-price">{{(!blank($product->old_price) && $product->old_price !=0) ?$product->old_price.' TL':"" }}</span>
                            </div>
                        </div>
                    </article>

                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                <h4 class="section-title mb-65 animated animated">{{--Trending Products--}}</h4>
                <div class="product-list-small animated animated">
                    @foreach($group2 as $product)


                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{route('frontend.product_detail',['slug'=>$product->slug])}}"><img src="{{$product->photo}}"  alt="{{$product->name}}" title="{{$product->name}}" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{route('frontend.product_detail',['slug'=>$product->slug])}}">{{$product->name}}</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 100%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (5.0)</span>
                                </div>
                                <div class="product-price">
                                    <span>{{$product->price !=0 ?$product->price.' TL':"" }}</span><br>
                                    <span class="old-price">{{(!blank($product->old_price) && $product->old_price !=0) ?$product->old_price.' TL':"" }}</span>
                                </div>
                            </div>
                        </article>

                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                <h4 class="section-title  mb-65 animated animated">{{--Recently added--}}</h4>
                <div class="product-list-small animated animated">
                    @foreach($group3 as $product)


                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{route('frontend.product_detail',['slug'=>$product->slug])}}"><img src="{{$product->photo}}"  alt="{{$product->name}}" title="{{$product->name}}" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{route('frontend.product_detail',['slug'=>$product->slug])}}">{{$product->name}}</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 100%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (5.0)</span>
                                </div>
                                <div class="product-price">
                                    <span>{{$product->price !=0 ?$product->price.' TL':"" }}</span><br>
                                    <span class="old-price">{{(!blank($product->old_price) && $product->old_price !=0) ?$product->old_price.' TL':"" }}</span>
                                </div>
                            </div>
                        </article>

                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                <h4 class="section-title mb-65 animated animated">{{--Top Rated--}}</h4>
                <div class="product-list-small animated animated">
                    @foreach($group4 as $product)


                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{route('frontend.product_detail',['slug'=>$product->slug])}}"><img src="{{$product->photo}}"  alt="{{$product->name}}" title="{{$product->name}}" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{route('frontend.product_detail',['slug'=>$product->slug])}}">{{$product->name}}</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 100%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (5.0)</span>
                                </div>
                                <div class="product-price">
                                    <span>{{$product->price !=0 ?$product->price.' TL':"" }}</span><br>
                                    <span class="old-price">{{(!blank($product->old_price) && $product->old_price !=0) ?$product->old_price.' TL':"" }}</span>
                                </div>
                            </div>
                        </article>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
