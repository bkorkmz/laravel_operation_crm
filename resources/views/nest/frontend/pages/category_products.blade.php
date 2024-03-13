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
                                        <a class="add" target="_blank" href="{{route('frontend.product_detail',['slug'=>$product['slug']])}}"><i class="fi-rs-shopping-cart mr-5"></i> Ekle</a>
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


{{--<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"--}}
{{--     aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--            <div class="modal-body">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">--}}
{{--                        <div class="detail-gallery">--}}
{{--                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>--}}
{{--                            <!-- MAIN SLIDES -->--}}
{{--                            <div class="product-image-slider" id="slider">--}}

{{--                            </div>--}}
{{--                            <!-- THUMBNAILS -->--}}
{{--                            <div class="slider-nav-thumbnails" id="slider-thumbnails">--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- End Gallery -->--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 col-sm-12 col-xs-12">--}}
{{--                        <div class="detail-info pr-30 pl-30">--}}
{{--                            <span class="stock-status out-stock"> Popüler </span>--}}
{{--                            <h3 class="title-detail"><a href="" class="text-heading product-title"></a></h3>--}}
{{--                            <div class="product-detail-rating">--}}
{{--                                <div class="product-rate-cover product-desc" >--}}

{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <div class="font-xs">--}}
{{--                                <ul id="product-attributes">--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="clearfix product-price-cover">--}}
{{--                                <div class="product-price primary-color float-left">--}}
{{--                                    <span class="current-price text-brand" id= "price"> </span>--}}
{{--                                      <span>--}}
{{--                                         <span class="save-price font-md color3 ml-15"> </span>--}}
{{--                                         <span class="old-price font-md ml-15"></span>--}}
{{--                                      </span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="detail-extralink mb-30">--}}
{{--                                <form class="add-to-cart-form" method="POST" action="">--}}
{{--                                    @csrf--}}
{{--                                    <input type="hidden" name="id" class="hidden-product-id" value="37">--}}
{{--                                    <div class="detail-extralink mb-50">--}}
{{--                                        <div class="detail-qty border radius">--}}
{{--                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>--}}
{{--                                            <input type="number" min="1" value="1" name="qty" class="qty-val qty-input">--}}
{{--                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>--}}
{{--                                        </div>--}}

{{--                                        <div class="product-extra-link2  has-buy-now-button ">--}}
{{--                                            <button type="submit" class="button button-add-to-cart">--}}
{{--                                                --}}{{--<i class="fi-rs-shopping-cart"></i>--}}{{--Sepete Ekle</button>--}}

{{--                                            <a aria-label="Favoriye Ekle" class="action-btn hover-up js-add-to-wishlist-button" data-url="" href="#"><i class="fi-rs-heart"></i></a>--}}
{{--                                            --}}{{--                                            <a aria-label="Add To Compare" href="#" class="action-btn hover-up js-add-to-compare-button" data-url="https://nest.botble.com/compare/4"><i class="fi-rs-shuffle"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Detail Info -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}



@endsection


@section('js')
@endsection


@section('after-js')
    <script>

        {{--function quickModal(id) {--}}
        {{--    let modal = $('#quickViewModal');--}}
        {{--    $.ajax({--}}
        {{--        url: '{{ route('product-info') }}/'+id,--}}
        {{--        dataType: "json",--}}
        {{--        success: function (data) {--}}
        {{--            let product = data.product;--}}
        {{--            let attributesHtml = '';--}}
        {{--            let attributes = JSON.parse(product.attributes);--}}


        {{--            Object.entries(attributes).map(([key, value]) => {--}}

        {{--                if (key === 'popular') {--}}
        {{--                    return;--}}
        {{--                }--}}
        {{--                attributesHtml += `<li class="mb-5">${key}: <span class="text-brand">${value}</span></li>`;--}}
        {{--            });--}}


        {{--            $('#quickViewModal .modal-body #slider').html(`<figure class="border-radius-10">--}}
        {{--                                <img src="${product.photo}"--}}
        {{--                                      alt="${product.slug}" title="${product.name}"/>--}}
        {{--                            </figure>`);--}}

        {{--            $('#quickViewModal .modal-body #slider-thumbnails').html(`--}}
        {{--                             <div>--}}
        {{--                                    <img src="${product.photo ?? ""  }"--}}
        {{--                                      alt="${product.slug}" title="${product.name}" width="77" height="77"/>--}}
        {{--                            </div>`);--}}

        {{--            $('#quickViewModal .modal-body .product-title').html(`${product.name}`);--}}
        {{--            $('#quickViewModal .modal-body .product-desc').html(`${product.short_detail? product.short_detail : ""}`);--}}
        {{--            $('#quickViewModal .modal-body #product-attributes').html(`${attributesHtml?attributesHtml:""}`);--}}
        {{--            modal.find('.modal-body #price').html(`${product.price != null ? product.price + 'TL' : "" }`);--}}
        {{--            modal.find('.modal-body .old-price ').html(`${product.old_price != null ? product.old_price + 'TL' : "" }`);--}}



        {{--            modal.modal('show');--}}

        {{--        },--}}
        {{--        error:(function (error,data){--}}
        {{--            console.error('Ajax hatası ');--}}
        {{--        })--}}
        {{--    });--}}


        {{--}--}}

        const button = document.getElementById('whatsapp_share');

        button.addEventListener('click', function() {
            const whatsapp_number= "{{config('settings.site_whatsapp_phone')}}";
            const productName = $('#quickViewModal .modal-body .product-title')[0].text;
            const whatsappUrl = `https://wa.me/${whatsapp_number}?text=${productName}`;
            window.open(whatsappUrl, '_blank');
        });
    </script>
@endsection
