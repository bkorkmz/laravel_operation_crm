@extends('nest.frontend.layout.layout')
@section('css')

@endsection
@section('title',$page->title)

@section('head')
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:title" content=""/>
    <meta property="og:type" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/>
    <meta name="title" content="{{ $page->title}}">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Webpage",
            "url": "{{request()->fullUrl()}}"
            "name": "{{ $page->title}}",
            "inLanguage":"{{app()->getLocale()}}",

        }
    </script>
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "BreadcrumbList",
          "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Anasayfa",
            "item": "{{route('frontend.index')}}"
          },{
            "@type": "ListItem",
            "position": 2,
            "name": "{{ $page->title}}",
            "item": " {{request()->fullUrl()}} "
          }]
        }
    </script>



@endsection
@section('breadcrumb')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Anasayfa</a>
                <span>{{ $page->title}}</span>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <div class="page-content pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                                <div class="single-header style-2">
                                    <h2>{{$page->title}}</h2>
                                    <div class="entry-meta meta-1 meta-3 font-xs mt-15 mb-15">
                                        <span class="post-on has-dot">{{$page->created_at->format('d-m-Y')}}</span>
                                        <span class="time-reading has-dot"> 8 dk okuma</span>
                                        {{--                                        <span class="hit-count has-dot">29k Views</span>--}}
                                    </div>
                                </div>
                                <div class="single-content mb-50">
                                    {!! $page->detail !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 primary-sidebar sticky-sidebar">
                            <div class="widget-area">
                                <div class="sidebar-widget-2 widget_search mb-50">
                                    <div class="search-form">
                                        <form action="#">
                                            <input type="text" placeholder="Ürün Ara ..."/>
                                            <button type="submit"><i class="fi-rs-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="sidebar-widget widget-category-2 mb-30">
                                    <h5 class="section-title style-1 mb-30">Kategoriler</h5>
                                    <ul>
                                        @foreach($categories as $category)
                                            <li>
                                                <a href="{{ route('frontend.page', $category->slug) }}"> {{$category->name}}</a><span
                                                    class="count">{{$category->get_product_count}}</span>
                                            </li>
                                        @endforeach


                                    </ul>
                                </div>
                                <!-- Product sidebar Widget -->
                                <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                                    <h5 class="section-title style-1 mb-30">Popüler Ürünler</h5>
                                    @foreach($products as $product)
                                        <div class="single-post clearfix">
                                            <div class="image">
                                                <img src="{{$product->photo}}" alt="{{$product->name}}"/>
                                            </div>
                                            <div class="content pt-10">
                                                <h5><a href="">{{$product->name}}</a></h5>
                                                <p class="price mb-0 mt-5">{{ $product->price != 0 ? $product->price. 'TL'  :  ""}}</p>
{{--                                                <div class="product-rate">--}}
{{--                                                    <div class="product-rating" style="width: 90%"></div>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
@endsection


@section('after-js')

@endsection
