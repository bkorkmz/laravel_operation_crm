@extends('nest.frontend.layout.layout')
@section('css')
    <style>
        .custom-modal .modal-dialog {
            border-radius: 10%;
        }
        .custom-modal .modal-content {
            min-height: 100%;
            height: auto;
            border-radius: 0;
            background: transparent;
            display: contents;

        }

        .custom-modal .modal-body .deal img {
            width:-webkit-fill-available;
        }
    </style>

@endsection
@section('title')
    {{config('settings.site_title') }}
@endsection

@section('head')
    <meta name="description" content="{{ config('settings.site_description') }}">
    <meta name="title" content="{{ config('settings.site_title') }}">
    <meta name="Author" content="{{ config('settings.site_url') }}">
    <meta name="keywords" content="{{ config('settings.site_keywords') }}">

    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebPage",
            "@id": "#WebPage",
             "url": "{{ request()->url() }}",
             "name": "{{ config('settings.site_title') }}"
         }
    </script>
@endsection

@section('content')

    @foreach ($contents as $key => $value)
      @include(config('app.CURRENT_THEME').'.frontend.partital.' . $key, ['content' => $value])
    @endforeach


{{--    @include('nest.frontend.partital.sliders')--}}

{{--    @include('nest.frontend.partital.featuredCategories')--}}
{{--    @include('nest.frontend.partital.popular_product')--}}
{{--    @include('nest.frontend.partital.products')--}}
{{--    @include('nest.frontend.partital.end_deals')--}}
{{--    @include('nest.frontend.partital.category_sliders')--}}
{{--    @include('nest.frontend.partital.best_sales')--}}


    <!-- Modal -->
    <div class="modal fade custom-modal" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="deal p-0">
                        <img src="{{asset('images/popup-image.jpg')}}" alt="popup image" title="Herbalife Turkey">



                        {{--                    <div class="deal-top">--}}
                        {{--                        <h6 class="mb-10 text-brand-2">Deal of the Day</h6>--}}
                        {{--                    </div>--}}
                        {{--                    <div class="deal-content detail-info">--}}
                        {{--                        <h4 class="product-title"><a href="javascript:void(0)" class="text-heading">Organic fruit for--}}
                        {{--                                your family's--}}
                        {{--                                health</a></h4>--}}
                        {{--                        <div class="clearfix product-price-cover">--}}
                        {{--                            <div class="product-price primary-color float-left">--}}
                        {{--                                <span class="current-price text-brand"></span>--}}
                        {{--                                <span>--}}
                        {{--                                        <span class="save-price font-md color3 ml-15">26% Off</span>--}}
                        {{--                                        <span class="old-price font-md ml-15">$52</span>--}}
                        {{--                                    </span>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        {{--                    <div class="deal-bottom">--}}
                        {{--                        <p class="mb-20">Hurry Up! Offer End In:</p>--}}
                        {{--                        <div class="deals-countdown pl-5" data-countdown="2025/03/25 00:00:00">--}}
                        {{--                            <span class="countdown-section"><span class="countdown-amount hover-up">03</span><span--}}
                        {{--                                    class="countdown-period"> days </span></span><span class="countdown-section"><span--}}
                        {{--                                    class="countdown-amount hover-up">02</span><span--}}
                        {{--                                    class="countdown-period"> hours </span></span><span class="countdown-section"><span--}}
                        {{--                                    class="countdown-amount hover-up">43</span><span--}}
                        {{--                                    class="countdown-period"> mins </span></span><span class="countdown-section"><span--}}
                        {{--                                    class="countdown-amount hover-up">29</span><span--}}
                        {{--                                    class="countdown-period"> sec </span></span>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="product-detail-rating">--}}
                        {{--                            <div class="product-rate-cover text-end">--}}
                        {{--                                <div class="product-rate d-inline-block">--}}
                        {{--                                    <div class="product-rating" style="width: 90%"></div>--}}
                        {{--                                </div>--}}
                        {{--                                <span class="font-small ml-5 text-muted"> (32 rates)</span>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <a href="javascript:void(0)" class="btn hover-up">Shop Now <i class="fi-rs-arrow-right"></i></a>--}}
                        {{--                    </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(window).on("load", function () {
            // $("#preloader-active").delay(450).fadeOut("slow");
            $("body").delay(450).css({
                overflow: "visible"
            });
            $("#onloadModal").modal("show");
        });
    </script>
@endsection


@section('after-js')
@endsection
