@extends('nest.frontend.layout.layout')
@section('css')

@endsection
@section('title')
    {{config('settings.site_title') }}
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
