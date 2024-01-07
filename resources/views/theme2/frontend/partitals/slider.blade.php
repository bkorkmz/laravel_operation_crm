

@if(!blank($sliders))
    <style>
        .herobannerarea__ecomarece
        .swiper-slide
        .herobannerarea__img
        img {
            width: 100%;
            border-radius: 11px;
            height: 100%;
        }
                .slider__controls__wrap.slider__controls__arrows .arrow-btn {
            border: 1px solid var( --primaryColor);
            background-color: #e50662;
        }
    </style>



<!-- herobannerarea__section__start -->
<div class="herobannerarea herobannerarea__2 herobannerarea__ecomarece pt-0">
    <div class="swiper ecommerce__slider">
        <div class="herobannerarea__slider__wrap swiper-wrapper">
            @foreach($sliders as $slider)
                <div class="swiper-slide herobannerarea__single__slider" >

                    <div class="herobannerarea__img">
                        <img src="{{$slider->image}}" alt="">
                    </div>
                </div> 
            @endforeach
        </div>
    </div>
    <div class="slider__controls__wrap slider__controls__pagination slider__controls__arrows">
        <div class="swiper-button-next arrow-btn"></div>
        <div class="swiper-button-prev arrow-btn"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>


@endif