@php $sliders = $content['sliders']; @endphp


<section class="home-slider position-relative mb-30">
    <div class="container">
        <div class="home-slide-cover mt-30">
            <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                @foreach($sliders as $slider)
                    <div class="single-hero-slider single-animation-wrap" style="background-image: url({{asset($slider->image)}})">
                        <div class="slider-content">
                            <h1 class="display-2 mb-40">
                              {{$slider->name ? $slider->name : ""}}
                            </h1>
                            <p class="mb-65">{{$slider->value ? $slider->value :""}}</p>
{{--                            @if($slider->link)--}}
{{--                                <a href="{{$slider->link}}" class="btn" type="submit">İletişim</a>--}}
{{--                                @else--}}
{{--                                <form class="form-subcriber d-flex">--}}
{{--                                    <input type="email" placeholder="Eposta adresi giriniz" />--}}
{{--                                    <button class="btn" type="submit">Kayıt</button>--}}
{{--                                </form>--}}
{{--                            @endif--}}

                        </div>
                    </div>

                @endforeach
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </div>
    </div>
</section>
