@php
    $bestSalesProduct = !blank($contents['bestSalesProduct']) ? $contents['bestSalesProduct'] : [];
     $products =    !blank($bestSalesProduct['products']) ? $bestSalesProduct['products'] : [];
@endphp
@if(!blank($products))
    <section class="banners mb-25">
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('frontend.product_detail',['slug'=>$product->slug])}}" class="btn btn-xs p-0">
                                <img src="{{asset($product->photo)}}" alt="{{$product->name}}" title="{{$product->name}}"/>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endif

