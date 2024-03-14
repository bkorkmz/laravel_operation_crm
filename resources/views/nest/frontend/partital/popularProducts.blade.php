<!--End banners-->
@php
    $popularProducts = !blank($contents['popularProducts']) ? $contents['popularProducts'] : [];
    $categories =    !blank($popularProducts['categoriesWithPopularProducts']) ? $popularProducts['categoriesWithPopularProducts'] : [];
    $allProducts = !blank($popularProducts['allProduct']) ? $popularProducts['allProduct'] : [];
@endphp
@if(!blank($popularProducts['categoriesWithPopularProducts']))
<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>Popüler Ürünler</h3>

            <ul class="nav nav-tabs links" id="myTab" role="tablist">

                <li class="nav-item" role="presentation" data-filter="*">
                    <button class="nav-link active" id="nav-tab-all" data-bs-toggle="tab" data-bs-target="#tab-all"
                            type="button" role="tab" aria-controls="tab-all" aria-selected="true">Tümü
                    </button>
                </li>
                @foreach($categories as $category)

                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="nav-tab-{{$category->id}}" data-bs-toggle="tab"
                                data-bs-target="#tab-{{$category->id}}"
                                data-filter=".filter-{{$category->id}}"
                                type="button" role="tab" aria-controls="tab-{{$category->id}}"
                                aria-selected="true">{{$category->name}}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">

            <!--En tab one-->
                <div class="tab-pane fade  show active" id="tab-all" role="tabpanel"
                     aria-labelledby="tab-all">
                    <div class="row product-grid-4">
                        @foreach($allProducts as $productOne)
                            <div class="col-lg-1-5 col-md-4  col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('frontend.product_detail',['slug'=>$productOne['slug']])}}">
                                                <img class="default-img"
                                                     src="{{$productOne['photo']}}"
                                                     alt="{{$productOne['name']}}" title="{{$productOne['name']}}" />
                                                <img class="hover-img"
                                                     src="{{$productOne['photo']}}"
                                                     alt="{{$productOne['name']}}" title="{{$productOne['name']}}" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Favorilere Ekle" class="action-btn d-none" href="" ><i
                                                    class="fi-rs-heart"></i></a>
                                            {{--                                            <a aria-label="Compare" class="action-btn" href=""><i--}}
                                            {{--                                                    class="fi-rs-shuffle"></i></a>--}}
                                            <a aria-label="Hızlı Göster" class="action-btn"   onclick="quickModal({{$productOne['id']}})">
                                                <i class="fi-rs-eye"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Popüler</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="javascript:void(0)">{{$productOne['category'][0]['name']}}</a>
                                        </div>
                                        <h2><a href="{{route('frontend.product_detail',['slug'=>$productOne['slug']])}}">{{$productOne['name']}}</a></h2>
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
                                            <div class="product-price">
                                                <span>{{$productOne['price'] !=0 ?$productOne['price'].' TL':"" }}</span><br>
                                                <span class="old-price">{{(!blank($productOne['old_price']) && $productOne['old_price'] !=0) ?$productOne['old_price'].' TL':"" }}</span>
                                            </div>
                                            <div class="add-cart align-self-end">

                                                <a class="add" href="{{route('frontend.product_detail',['slug'=>$productOne['slug']])}}">
                                                    {{--<i class="fi-rs-shopping-cart mr-5"></i>--}}
                                                    İncele</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--end product card-->
                    </div>
                    <!--End product-grid-4-->
                </div>
            <!--En tab two-->


            <!--En tab two-->
            @foreach($popularProducts['categoriesWithPopularProducts'] as $category)
                <div class="tab-pane fade " id="tab-{{$category->id}}" role="tabpanel"
                     aria-labelledby="tab-{{$category->id}}">
                    <div class="row product-grid-4">
                        @foreach($category['getProduct'] as $product)
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
                                            <a aria-label="Favorilere Ekle" class="action-btn d-none" href="" ><i
                                                    class="fi-rs-heart"></i></a>
{{--                                            <a aria-label="Compare" class="action-btn" href=""><i--}}
{{--                                                    class="fi-rs-shuffle"></i></a>--}}
                                            <a aria-label="Hızlı Göster" class="action-btn"   onclick="quickModal({{$product->id}})">
                                                <i class="fi-rs-eye"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Popüler</span>
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
                                                <span>{{$productOne['price'] !=0 ?$productOne['price'].' TL':"" }}</span><br>
                                                <span class="old-price">{{(!blank($productOne['old_price']) && $productOne['old_price'] !=0) ?$productOne['old_price'].' TL':"" }}</span>
                                            </div>
                                            <div class="add-cart align-self-end">

                                                <a class="add" href="{{route('frontend.product_detail',['slug'=>$productOne['slug']])}}">
                                                     {{--<i class="fi-rs-shopping-cart mr-5"></i>--}}
{{--                                                    <i class="fi-rs-info"></i>--}}
                                                    İncele</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--end product card-->
                    </div>
                    <!--End product-grid-4-->
                </div>
            @endforeach
            <!--En tab two-->

        </div>
        <!--End tab-content-->
    </div>
</section>

@endif
