@php
    $current_many = "TL";
@endphp

@section('head')



@endsection

<style>
    .gridarea__img_two img {
        width: 100%;
        border-radius: var(--borderRadius);
        height: 100%;
    }

    .gridarea__wraper .gridarea__img_product img {
        width: 100%;
        border-radius: var(--borderRadius);
        height: 100%!important;
    }
    .featurearea__bottom__button_2 a {
        background: var(--primaryColor);
        padding: 15px 110px;
        border-radius: 30px;
        display: inline-block;


        color: var(--whiteColor);
        background-color: var(--primaryColor);
        border-color: var(--primaryColor);
        border: 1px solid var(--primaryColor);
    }
</style>
<!-- .about__tap__section__end -->
<div class="gridarea__2 sp_bottom_100 " data-aos="fade-up">
    <div class="container-fluid full__width__padding">

        <div class="section__title">

            <div class="section__title__heading text-center">
                <h2>Eğitim Kitaplarımız</h2>
            </div>
        </div>
        <div class="row row__custom__class">
            <div class="swiper featured__course">
                <div class="swiper-wrapper">
                    @foreach($products as $product)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class  swiper-slide">
                            <div class="gridarea__wraper product__grid">
                                <div class="gridarea__img gridarea__img_product">
{{--                                    <a href="{{route('frontend.product_detail',['slug'=>$product->slug])}}"> </a>--}}
                                    <img src="{{$product->photo}}"  alt="grid">
                                    <div class="gridarea__small__button gridarea__small__button__1">
{{--                                        <div class="grid__badge">Eğitim Kitaplarımız</div>--}}
                                    </div>

                                </div>
                                <div class="gridarea__content">
                                    <div class="gridarea__heading">
                                        <h3><a data-bs-toggle="tooltip" data-bs-placement="top" tabindex="0" class="small"
                                               data-bs-original-title="{{$product->name}}">{{\Illuminate\Support\Str::limit($product->name,70,"...")}}</a></h3>
                                    </div>
                                    <div class="align-items-center d-flex gridarea__price justify-content-between m-0">
                                        @if($product->price > 0 )
                                            {{$product->price ." ".$current_many}}
                                        @else
                                            {{$product->price ." ".$current_many}}
                                        @endif

                                               <a class="btn btn-primary default__button p-2 float-end " target="_blank"
                                               href="https://wa.me/{{trim(config('settings.site_whatsapp_phone'))}}?text={{$product->name}}">
                                                Whatsapp İletişim
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

                <div class="slider__controls__wrap slider__controls__arrows">
                    <div class="swiper-button-next arrow-btn"></div>
                    <div class="swiper-button-prev arrow-btn"></div>
                </div>

            </div>
        </div>
    </div>
</div>
@foreach($products as $product)
    <div class="grid__quick__view__modal modalarea modal fade" id="exampleModal_{{$product->id}}" tabindex="-1"
         aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal__wraper">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="featurearea__details__img">
                                <div class="swiper modal__gallery__big">
                                    <div class="featurearea__big__img--modal swiper-wrapper ">
                                        <div class="featurearea__single__big__img swiper-slide gridarea__img_two">
                                            <img src="{{$product->photo}}" alt="Product Big Img">
                                        </div>
                                        {{--   <div class="featurearea__single__big__img swiper-slide">--}}
                                        {{--       <img src="{{$product->photo}}" alt="Product Big Img">--}}
                                        {{--   </div>--}}
                                        {{--   <div class="featurearea__single__big__img swiper-slide">--}}
                                        {{--       <img src="{{$product->photo}}" alt="Product Big Img">--}}
                                        {{--   </div>--}}
                                        {{--   <div class="featurearea__single__big__img swiper-slide">--}}
                                        {{--       <img src="{{$product->photo}}" alt="Product Big Img">--}}
                                        {{--   </div>--}}
                                        {{--   <div class="featurearea__single__big__img swiper-slide">--}}
                                        {{--       <img src="{{$product->photo}}" alt="Product Big Img">--}}
                                        {{--   </div>--}}
                                        {{--   <div class="featurearea__single__big__img swiper-slide">--}}
                                        {{--       <img src="{{$product->photo}}" alt="Product Big Img">--}}
                                        {{--   </div>--}}
                                        {{--   <div class="featurearea__single__big__img swiper-slide">--}}
                                        {{--       <img src="{{$product->photo}}" alt="Product Big Img">--}}
                                        {{--   </div>--}}
                                    </div>
                                </div>

                                <div thumbsSlider="" class="swiper modal__gallery">
                                    {{--     <div class=" featurearea__thumb__img--modal swiper-wrapper">
                                             <div class="featurearea__single__thumb__img swiper-slide">
                                                 <img src="{{$product->photo}}" alt="Product Thumb Img">
                                             </div>
                                             <div class="featurearea__single__thumb__img swiper-slide">
                                                 <img src="{{$product->photo}}" alt="Product Thumb Img">
                                             </div>
                                             <div class="featurearea__single__thumb__img swiper-slide">
                                                 <img src="{{$product->photo}}" alt="Product Thumb Img">
                                             </div>
                                             <div class="featurearea__single__thumb__img swiper-slide">
                                                 <img src="{{$product->photo}}" alt="Product Thumb Img">
                                             </div>
                                             <div class="featurearea__single__thumb__img swiper-slide">
                                                 <img src="{{$product->photo}}" alt="Product Thumb Img">
                                             </div>
                                             <div class="featurearea__single__thumb__img swiper-slide">
                                                 <img src="{{$product->photo}}" alt="Product Thumb Img">
                                             </div>
                                             <div class="featurearea__single__thumb__img swiper-slide">
                                                 <img src="{{$product->photo}}" alt="Product Thumb Img">
                                             </div>
                                         </div>
                                    --}}

                                </div>

                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="featurearea__inner">
                                <div class="featurearea__small__title">
{{--                                    <span>Kitaplar</span>--}}
                                </div>
                                <div class="featurearea__main__title">
                                    <h3><a href="">{{\Illuminate\Support\Str::limit($product->name,70,"...")}}</a></h3>
                                    <p>{!! $product->description !!}</p>
                                </div>

                                <div class="featurearea__price">
                                    {{--                                <span>{{$product->price." ".$current_many}}</span>--}}
                                    {{--                                <span>$80.00</span>--}}
                                    {{--                                <span class="featurearea__price__button">SALE </span>--}}
                                    {{--                                <span class="featurearea__price__button black__color">-27%</span>--}}
                                </div>

                                {{--                            <div class="featurearea__size">--}}
                                {{--                                <span>Size:</span>--}}
                                {{--                                X--}}
                                {{--                            </div>--}}
                                {{--                            <div class="featurearea__size__button">--}}
                                {{--                                <ul>--}}
                                {{--                                    <li><a href="#">x</a></li>--}}
                                {{--                                    <li><a href="#">xl</a></li>--}}
                                {{--                                    <li><a href="#">m</a></li>--}}
                                {{--                                    <li><a href="#">s</a></li>--}}
                                {{--                                </ul>--}}
                                {{--                            </div>--}}

                                {{--                            <div class="featurearea__size">--}}
                                {{--                                <span>Color:</span>--}}
                                {{--                                violet--}}
                                {{--                            </div>--}}
                                {{--                            <div class="featurearea__size__img">--}}
                                {{--                                <ul>--}}
                                {{--                                    <li><a href="#"><img src="../img/products/1.jpg" alt=""></a></li>--}}
                                {{--                                    <li><a href="#"><img src="../img/products/2.jpg" alt=""></a></li>--}}
                                {{--                                    <li><a href="#"><img src="../img/products/3.jpg" alt=""></a></li>--}}
                                {{--                                    <li><a href="#"><img src="../img/products/4.jpg" alt=""></a></li>--}}
                                {{--                                    <li><a href="#"><img src="../img/products/5.jpg" alt=""></a></li>--}}
                                {{--                                </ul>--}}
                                {{--                            </div>--}}

                                <div class="featurearea__size">
                                    {{--                                <span>Stok </span>--}}
                                    

                                </div>
                                {{--                            <div class="featurearea__quantity">--}}
                                {{--                                <div class="featurearea__quantity__button">--}}
                                {{--                                    <span>-</span>--}}
                                {{--                                    <span>1</span>--}}
                                {{--                                    <span>+</span>--}}
                                {{--                                </div>--}}
                                {{--                                <a class="featurearea__quantity__button" href="#">Add to cart</a>--}}


                                {{--                            </div>--}}
                                <div class="featurearea__bottom__button_2">
                                    <a href="whatsapp://send?t={{ $product->name}}&text={{route('frontend.product_detail',['slug'=>$product->slug])}}">İletişime Geç</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach


