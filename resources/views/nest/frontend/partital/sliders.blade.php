@php
    $sliders = $content['sliders'];
    $banners = $content['banners'];

 @endphp
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
                                        <a href=" {{$banners[0]->link}}" class="btn btn-xs">Linke git <i class="fi-rs-arrow-small-right"></i></a>
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
                    <div class="banner-img style-3 animated animated" style="background-image: url({{asset($banners[0]->image)}})">
                        <div class="banner-text mt-50">
                            @if(!blank($banners[0]->name))
                            <h2 class="mb-50">
                               {{$banners[0]->name}}
                                <span class="text-brand"> {{$banners[0]->value}}</span>
                            </h2>
                            @endif
                            @if($banners[0]->link)
                                    <a href=" {{$banners[0]->link}}" class="btn btn-xs">Linke git <i class="fi-rs-arrow-small-right"></i></a>
                            @endif
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>
</section>
