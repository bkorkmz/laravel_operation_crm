@php
    $sliders = !blank($content['sliders']) ? $content['sliders'] : [];
    $banners = $content['banners'];

@endphp

<style>
    .banner-img.style-3 .banner-text {
        bottom: 0px;
        align-self: self-end;
        margin-bottom: 30px;
        width: 100%;
        text-align: center;
    }

    .banner-img.style-3 {
        border-radius: 15px;
        overflow: hidden;
        height: 100%;
        background: url({{asset($banners->image ?? "")}}) no-repeat center bottom;
        background-size: cover;
        width: 100%;
        cursor:{{ !empty($banners->link)? 'pointer': "" }}
}
</style>
<section class="home-slider style-2 position-relative mb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-12">
                <div class="home-slide-cover">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                        @foreach($sliders as $slider)
                            <div class="single-hero-slider single-animation-wrap" style="background-image: url({{asset($slider->image)}})">
                                <div class="slider-content">
                                    @if(!blank($slider->name ))
                                        <h1 class="display-2 mb-40">
                                            {{ $slider->name}}
                                        </h1>
                                    @endif
                                    @if(!blank($slider->value ))
                                        <p class="mb-65">{{$slider->value}}</p>
                                    @endif
                                    @if($slider->link)
                                        <div class="form-subcriber d-flex">
                                            <a href="{{$slider->link}}" class="btn btn-xs">Linke git <i class="fi-rs-arrow-small-right"></i></a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </div>
            <div class="col-lg-4 d-none d-xl-block">
                @if(!blank($banners))
                    <div class="banner-img style-3 animated animated"
                         onclick="return window.location.href = '{{$banners->link??"javascript:void(0)"}}'" >
                        <div class="banner-text mt-50">
                            @if(!blank($banners->name))
                                <h2 class="mb-50">
                                    {{$banners->name}}
                                    <span class="text-brand"> {{$banners->value}}</span>
                                </h2>
                            @endif
                            {{--   @if($banners->link)--}}
                            {{--           <a href=" {{$banners->link}}" class="btn btn-xs">Linke git <i class="fi-rs-arrow-small-right"></i></a>--}}
                            {{--  @endif--}}
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>
</section>
