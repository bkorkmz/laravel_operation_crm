@extends('nest.frontend.layout.layout')
@section('css')

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




@endsection


@section('js')
@endsection


@section('after-js')
@endsection
