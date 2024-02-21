@extends('nest.frontend.layout.layout')
@section('css')

@endsection
@section('title')
    {{config('settings.site_title') }}
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
                                    <a aria-label="Favorilere Ekle" class="action-btn d-none" href="" ><i
                                            class="fi-rs-heart"></i></a>
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
                                    <a href="">{{$product['category'][0]->name}}</a>
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
                                        <a class="add" target="_blank" href="https://wa.me/{{config('settings.site_whatsapp_phone')}}?text={{$product->name}}">{{--<i class="fi-rs-shopping-cart mr-5"></i>--}}Whatsapp
                                        </a>
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
{{--                <nav aria-label="Page navigation example">--}}
{{--                    <ul class="pagination justify-content-start">--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                        <li class="page-item active"><a class="page-link" href="#">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                        <li class="page-item"><a class="page-link dot" href="#">...</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">6</a></li>--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}
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
                                        <img src="assets/imgs/banner/banner-5.png" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="deals-countdown-wrap">
                                    <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                                </div>
                                <div class="deals-content">
                                    <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown</a></h2>
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
                                            <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
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
                                        <img src="assets/imgs/banner/banner-6.png" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="deals-countdown-wrap">
                                    <div class="deals-countdown" data-countdown="2026/04/25 00:00:00"></div>
                                </div>
                                <div class="deals-content">
                                    <h2><a href="shop-product-right.html">Perdue Simply Smart Organics Gluten</a></h2>
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
                                            <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
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
                                        <img src="assets/imgs/banner/banner-7.png" alt="" />
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
                                            <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
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
                                        <img src="assets/imgs/banner/banner-8.png" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="deals-countdown-wrap">
                                    <div class="deals-countdown" data-countdown="2025/02/25 00:00:00"></div>
                                </div>
                                <div class="deals-content">
                                    <h2><a href="shop-product-right.html">Simply Lemonade with Raspberry Juice</a></h2>
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
                                            <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
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
                        <a href=""> <img src="{{$category->image}}" alt="" />{{$category->name}}</a><span class="count">{{$category->get_product_count}}</span>
                    </li>
                    @endforeach

                </ul>
            </div>
            <!-- Fillter By Price -->
            <div class="sidebar-widget price_range range mb-30 d-none">
                <h5 class="section-title style-1 mb-30">Fill by price</h5>
                <div class="price-filter">
                    <div class="price-filter-inner">
                        <div id="slider-range" class="mb-20"></div>
                        <div class="d-flex justify-content-between">
                            <div class="caption">From: <strong id="slider-range-value1" class="text-brand"></strong></div>
                            <div class="caption">To: <strong id="slider-range-value2" class="text-brand"></strong></div>
                        </div>
                    </div>
                </div>
                <div class="list-group">
                    <div class="list-group-item mb-10 mt-10">
                        <label class="fw-900">Color</label>
                        <div class="custome-checkbox">
                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                            <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>
                            <br />
                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="" />
                            <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>
                            <br />
                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="" />
                            <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label>
                        </div>
                        <label class="fw-900 mt-15">Item Condition</label>
                        <div class="custome-checkbox">
                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                            <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                            <br />
                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="" />
                            <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished (27)</span></label>
                            <br />
                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="" />
                            <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>
                        </div>
                    </div>
                </div>
                <a href="shop-grid-right.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
            </div>
            <!-- Product sidebar Widget -->
            <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                <h5 class="section-title style-1 mb-30 d-none">Popüler Ürünler</h5>
{{--                <div class="single-post clearfix">--}}
{{--                    <div class="image">--}}
{{--                        <img src="assets/imgs/shop/thumbnail-3.jpg" alt="#" />--}}
{{--                    </div>--}}
{{--                    <div class="content pt-10">--}}
{{--                        <h5><a href="shop-product-detail.html">Chen Cardigan</a></h5>--}}
{{--                        <p class="price mb-0 mt-5">$99.50</p>--}}
{{--                        <div class="product-rate">--}}
{{--                            <div class="product-rating" style="width: 90%"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="single-post clearfix">--}}
{{--                    <div class="image">--}}
{{--                        <img src="assets/imgs/shop/thumbnail-4.jpg" alt="#" />--}}
{{--                    </div>--}}
{{--                    <div class="content pt-10">--}}
{{--                        <h6><a href="shop-product-detail.html">Chen Sweater</a></h6>--}}
{{--                        <p class="price mb-0 mt-5">$89.50</p>--}}
{{--                        <div class="product-rate">--}}
{{--                            <div class="product-rating" style="width: 80%"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="single-post clearfix">--}}
{{--                    <div class="image">--}}
{{--                        <img src="assets/imgs/shop/thumbnail-5.jpg" alt="#" />--}}
{{--                    </div>--}}
{{--                    <div class="content pt-10">--}}
{{--                        <h6><a href="shop-product-detail.html">Colorful Jacket</a></h6>--}}
{{--                        <p class="price mb-0 mt-5">$25</p>--}}
{{--                        <div class="product-rate">--}}
{{--                            <div class="product-rating" style="width: 60%"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                <img src="assets/imgs/banner/banner-11.png" alt="" />
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
                                                                        <button id="whatsapp_share" type="submit" class="button button-add-to-cart">
                                                                           {{-- <i class="fi-rs-shopping-cart"></i>--}}Whatsapp
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
                url: '{{ route('product-info') }}/'+id,
                dataType: "json",
                success: function (data) {
                    console.log('data',data)
                    let whatsapp_number= "{{config('settings.site_whatsapp_phone')}}";
                    let product = data.product;
                    let attributesHtml = '';
                    let attributes = JSON.parse(product.attributes);
                    // let whatsapp_button = $('#whatsapp_share');
                    // const whatsappUrl = `https://wa.me/${whatsapp_number}?text=${product.name}`;


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

                    // $('#whatsapp_share').attr('href', whatsappUrl);

                    modal.modal('show');

                },
                error:(function (error,data){
                    console.error('Ajax hatası ');
                })
            });


        }

        const button = document.getElementById('whatsapp_share');

        button.addEventListener('click', function() {
            const whatsapp_number= "{{config('settings.site_whatsapp_phone')}}";
            const productName = $('#quickViewModal .modal-body .product-title')[0].text;
            const whatsappUrl = `https://wa.me/${whatsapp_number}?text=${productName}`;
            window.open(whatsappUrl, '_blank');
        });
    </script>
@endsection
