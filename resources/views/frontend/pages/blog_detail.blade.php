@extends('layouts.layout-frontend')


@section('title')
    {{ $article->title }} |
@endsection

@section('head')    
    <meta name="keywords" content="{{ $article->keywords }} - {{ $article->meta_keywords }}" />
    <meta name="description" content="{{ $article->short_detail }}">
    <meta name="articleSection" content="article">
    <meta name="datePublished" content="{{ $article->created_at }}">
    <meta name="dateModified" content="{{ $article->updated_at }}">
    <meta name="articleAuthor" content="{{ $article->author->name }}">
    <meta itemprop="name" content="{{ config('settings.site_title') }}"/>
    <meta itemprop="headline" content="{{ $article->title }}"/>
    <meta itemprop="image" content="{{"https://".request()->host()."".$article->image }}"/>
    <link rel="publisher" href="{{ config('settings.site_google_plus_url') }}"/>


    <meta property="og:locale" content="tr_TR"/>
    <meta property="og:site_name" content="{{ config('settings.site_title') }}"/>
{{--    <meta property="og:title" content="{{ $article->title }}"/>--}}
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ config('settings.site_url') }}"/>
    <meta property="og:description" content="{{ $article->short_detail }}"/>
    <meta property="og:image" content="{{route('frontend.index').$article->image }}"/>
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">
    <meta property="og:image:alt" content="{{ $article->title }}">
    <meta property="article:publisher" content="{{config('settings.site_facebook_url') }}"/>

    <meta name="twitter:title" content="{{ $article->title }}"/>
    <meta name="twitter:url" content="{{ config('settings.site_url') }}"/>
    <meta name="twitter:description" content="{{ $article->short_detail }}"/>
    <meta property="twitter:image" content="{{route('frontend.index').$article->image }}"/>
    <meta property="twitter:image:width" content="1200">
    <meta property="twitter:image:height" content="675">
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@hellonewmedia"/>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Article",
            "@id": "#Article",
            "mainEntityOfPage": {
                  "@type": "WebPage",
                  "@id": "#webpage",
                  "url": "{{request()->fullUrl()}}"
                },
            "name": "{{ $article->title }}",
            "description": "{{ $article->short_detail }}",
            "image": " {{route('frontend.index').$article->image }} ",
            "datePublished": "{{$article->created_at->format('d-m-Y H:i')}}",
            "dateModified": "{{$article->updated_at->format('d-m-Y H:i')}}",
            "author": " {{ $article->author->name }}",
            "publisher": {
                "@type": "Organization",
                "name": "{{ config('settings.site_title') }}",
                "logo": {
                  "@type": "ImageObject",
                  "url": "{{route('frontend.index').config('settings.site_logo')}}"
                }
            }
        }
    </script>

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "BreadcrumbList",
          "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Blog Yazıları",
            "item": "{{route('frontend.blog')}}"
          },{
            "@type": "ListItem",
            "position": 2,
            "name": "{{ $article->title }}",
            "item": " {{request()->fullUrl()}} "
          }]
        }
    </script>

@endsection

@section('css')
    <style>
        .blog .sidebar .recent-posts img {
            height: 66px;
        }
        .blog .entry .entry-img-recent {
            max-height: 440px;
            margin: -17px 1px 7px -11px;
            overflow: hidden;
        }
        .blog .entry {
            padding: 30px;
            margin-bottom: 60px;
            box-shadow:0 0px 0px rgba(0, 0, 0, 0.1)!important;
        }
    </style>
@endsection


@section('breadcrumbs')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Anasayfa</a></li>
                <li><a href="/blog">Blog</a></li>
                <li>{{ $article->title ??'' }}</li>
            </ol>
            <h1>{{ $article->title ?? '' }}</h1>

        </div>
    </section
    
    @endsection 
    @section('content')><!-- End Breadcrumbs -->
{{--     {{ dd($article) }} --}}
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">

                        <div class="entry-img">
                            <img src="{{ $article->image }}" alt="{{ $article->title  }}"
                              title="{{ $article->title }}"  class="img-fluid" style="border-radius: 2%;">
                        </div>

                        <h2 class="entry-title">
                            <a>{{ $article->short_detail }}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                    <a>{{ $article->author->name }}</a>
                                </li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time
                                            datetime="{{ date_format($article->created_at, 'd.m.Y') }}"></time>
                                        {{ date_format($article->created_at, 'd.m.Y') }}</a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            {!! $article->detail !!}

                        </div>


                        <div class="entry-footer">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li><a>{{ $article->category->name }}</a></li>
                            </ul>


                            @if ($article->keywords != null)
                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    @foreach (explode(',', $article->keywords) as $keyword)
                                        <li><a>{{ $keyword }}</a></li>
                                    @endforeach
                                </ul>
                            @endif

                        </div>

                    </article><!-- End blog entry -->
                     
                  


                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">


                        <h3 class="sidebar-title">Diğer Yazılar</h3> <br>
                        <div class="sidebar-item">
                            {{-- @dd($sidebar_article ) --}}
                            @foreach ($sidebar_article as $art)
                            <article class="entry col-12 p-0">
                                <div class="entry-img-recent">
                                  <img src="{{$art->image}}" alt="{{ $art->title ? $art->title :""  }}" title="{{ $art->title}}" class="img-fluid" style="width: 337px;border-radius: 5%;">
                                </div>
                  
                                <h4 class="entry-title" >
                                  <a href="{{route('frontend.blog_detail', $art->slug) }}" style="font-size: 20px;">{{$art->title}}</a>
                                </h4>
                                <div class="entry-content my-2">
                                  <p>
                                    {!! Str::limit($art->detail,250,'...')  !!}
                                  </p>

                                </div>
                                <div class="entry-meta">
                                    <ul class="pb-1">
{{--                                      <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a>{{$art->author->name}}</a></li>--}}
                                      <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time datetime="2020-01-01"></time> {{date_format($art->created_at,('d.m.Y'))}}</a></li>
                                      <li class="d-flex align-items-center"><a class="entry-title mb-2" href="{{route('frontend.blog_detail', $art->slug) }}">Yazının devamı <i class="bi bi-arrow-right-circle"></i></a></li>
                                    </ul>
                                 </div>
                  
                              </article>
                            @endforeach


                        </div>


                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->
                <div class="blog-author d-flex align-items-center">
                    <div class="col-md-6 col-sm-12" >
                        <h4>Sosyal Linkler</h4>
                        <div class="social-links mt-2">
                            <a href="https://twitter.com/intent/tweet?text={{route('frontend.blog_detail', $article->slug) }}"><i class="bi bi-twitter" style='font-size:26px;'></i></a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{route('frontend.blog_detail', $article->slug) }}"><i class="bi bi-facebook" style='font-size:26px;'></i></a>
                            <a href=" https://t.me/share/url?url={{{route('frontend.blog_detail', $article->slug) }}}&text={{ $article->title}}"><i class="bi bi-telegram" style='font-size:26px;'></i></a>
                           

                            <a href="whatsapp://send?t={{ $article->title}}&text={{route('frontend.blog_detail', $article->slug) }}" 
                                data-action="share/whatsapp/share" 
                                target="blank"><i class="bi bi-whatsapp" style='font-size:26px;'></i></a>
                        </div>
                      
                    </div>
                    <div class="col-md-6 col-sm-12" >
                        
                    <div class="reply-form">
                        <h4>Bize Katılın</h4>
                        <form class="mt-2" action="">
                            <div class="row">
                              <div class="col-8 form-group">
                                  <input name="email" type="text" class="form-control"
                                      placeholder="Email Adresi">
                              </div>
                              <div class="col-4">
                                  <button type="submit" class="btn btn-primary">Abone Ol</button>
                              </div>
                          </div>
                        </form>

                    </div>
                    </div>
                    
                </div><!-- End blog author bio --> 
            </div>

        </div>
    </section><!-- End Blog Single Section -->

@endsection


@section('js')
@endsection
