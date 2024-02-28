<!--End hero slider-->
<section class="popular-categories section-padding">
    <div class="container wow animate__animated animate__fadeIn">
        <div class="section-title">
            <div class="title">
{{--                @dd($category)--}}
                <h3>Kategoriler</h3>
{{--                <ul class="list-inline nav nav-tabs links">--}}
{{--                    <li class="list-inline-item nav-item"><a class="nav-link" href="">Cake & Milk</a></li>--}}
{{--                    <li class="list-inline-item nav-item"><a class="nav-link" href="">Coffes & Teas</a></li>--}}
{{--                    <li class="list-inline-item nav-item"><a class="nav-link active" href="">Pet Foods</a></li>--}}
{{--                    <li class="list-inline-item nav-item"><a class="nav-link" href="">Vegetables</a></li>--}}
{{--                </ul>--}}
            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
        </div>
        <div class="carausel-10-columns-cover position-relative">
            <div class="carausel-10-columns" id="carausel-10-columns">

                @foreach($content['categories'] as  $category)
                    <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href=""><img src="{{asset('frontend/assets/imgs/shop/cat-1.png')}}" alt="" /></a>
                        </figure>
                        <h6><a href="">{{$category->name}}</a></h6>
                        <span>{{$category->get_product_count}} ürün</span>
                    </div>
                @endforeach

{{--                        <a href="shop-grid-right.html"><img src="{{asset('frontend/assets/imgs/shop/cat-12.png')}}" alt="" /></a>--}}
{{--                        <a href="shop-grid-right.html"><img src="{{asset('frontend/assets/imgs/shop/cat-11.png')}}" alt="" /></a>--}}
{{--                        <a href="shop-grid-right.html"><img src="{{asset('frontend/assets/imgs/shop/cat-9.png')}}" alt="" /></a>--}}
{{--                        <a href="shop-grid-right.html"><img src="{{asset('frontend/assets/imgs/shop/cat-3.png')}}" alt="" /></a>--}}
{{--                        <a href="shop-grid-right.html"><img src="{{asset('frontend/assets/imgs/shop/cat-1.png')}}" alt="" /></a>--}}
{{--                        <a href="shop-grid-right.html"><img src="{{asset('frontend/assets/imgs/shop/cat-2.png')}}" alt="" /></a>--}}
{{--                        <a href="shop-grid-right.html"><img src="{{asset('frontend/assets/imgs/shop/cat-4.png')}}" alt="" /></a>--}}
{{--                        <a href="shop-grid-right.html"><img src="{{asset('frontend/assets/imgs/shop/cat-5.png')}}" alt="" /></a>--}}
{{--                        <a href="shop-grid-right.html"><img src="{{asset('frontend/assets/imgs/shop/cat-14.png')}}" alt="" /></a>--}}
{{--                        <a href="shop-grid-right.html"><img src="{{asset('frontend/assets/imgs/shop/cat-15.png')}}" alt="" /></a>--}}

                </div>
            </div>
        </div>
    </div>
</section>
