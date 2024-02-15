<!--End banners-->
@php
    $popularProducts = !blank($contents['popularProducts']) ? $contents['popularProducts'] : "";
    $categories =    !blank($popularProducts['categoriesWithPopularProducts']) ? $popularProducts['categoriesWithPopularProducts'] : "";
    $allProducts = !blank($popularProducts['allProduct']) ? $popularProducts['allProduct'] : "";

@endphp
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
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="">
                                                <img class="default-img"
                                                     src="{{$productOne['photo']}}"
                                                     alt="{{$productOne['name']}}" title="{{$productOne['name']}}" />
                                                <img class="hover-img"
                                                     src="{{$productOne['photo']}}"
                                                     alt="{{$productOne['name']}}" title="{{$productOne['name']}}" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Favorilere Ekle" class="action-btn" href="" ><i
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
                                            <a href="">{{$productOne['category'][0]['name']}}</a>
                                        </div>
                                        <h2><a href="">{{$productOne['name']}}</a></h2>
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
                                                <span>{{$productOne['price']}} TL</span>
                                                {{--                                                <span class="old-price">$32.8</span>--}}
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href=""><i class="fi-rs-shopping-cart mr-5"></i>Ekle
                                                </a>
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
                                            <a href="">
                                                <img class="default-img"
                                                     src="{{$product->photo}}"
                                                     alt="{{$product->name}}" title="{{$product->name}}" />
                                                <img class="hover-img"
                                                     src="{{$product->photo}}"
                                                     alt="{{$product->name}}" title="{{$product->name}}" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Favorilere Ekle" class="action-btn" href="" ><i
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
                                        <h2><a href="">{{$product->name}}</a></h2>
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
                                                <span>{{$product->price}} TL</span>
{{--                                                <span class="old-price">$32.8</span>--}}
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href=""><i class="fi-rs-shopping-cart mr-5"></i>Ekle
                                                </a>
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
                                    <span class="current-price text-brand" id= "price"> 38 TL</span>
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
                                    <button type="submit" class="button button-add-to-cart"><i
                                            class="fi-rs-shopping-cart"></i>Sepete Ekle
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


<script>

    function quickModal(id) {
        let modal = $('#quickViewModal');
        $.ajax({
            url: '{{ route('product-info') }}/'+id,
            dataType: "json",
            success: function (data) {
                console.log('data',data)
                let product = data.product;
                let attributesHtml = '';
                let attributes = JSON.parse(product.attributes);

                Object.entries(attributes).map(([key, value]) => {
                    // Eğer özellik "popular" ise döngüyü atla
                    console.log(key,value)
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
                                            <img src="${product.photo ?? ""  }"
                                              alt="${product.slug}" title="${product.name}" width="77" height="77"/>
                                    </div>`);

                $('#quickViewModal .modal-body .product-title').html(`${product.name}`);
                $('#quickViewModal .modal-body .product-desc').html(`${product.description}`);
                $('#quickViewModal .modal-body .product-desc').html(`${product.description}`);
                $('#quickViewModal .modal-body #product-attributes').html(`${attributesHtml}`);
                $('#quickViewModal .modal-body #price').html(`${product.price} TL`);


                 modal.modal('show');

            },
            error:(function (error,data){
                console.error('Ajax hatası ');
            })
        });






    }


</script>


