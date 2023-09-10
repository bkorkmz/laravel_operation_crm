@extends('layouts.layout-frontend')


@section('tltle')
@endsection

@section('head')
@endsection

@section('css')
<style>
    .blog .sidebar .recent-posts img {
      height: 66px;
  }
  </style>
@endsection


@section('breadcrumbs')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li>{{ $article->title }}</li>
            </ol>
            <h1>{{ $article->title }}</h1>

        </div>
    </section @endsection @section('content')><!-- End Breadcrumbs -->
    {{-- {{ dd($article) }} --}}
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">

                        <div class="entry-img">
                            <img src="{{$article->image}}" alt="{{ $article->title }}" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a>{{ $article->short_detail }}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                    <a>{{ $article->author->name }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time
                                            datetime="{{ date_format($article->created_at, 'd.m.Y') }}"></time>
                                        {{ date_format($article->created_at, 'd.m.Y') }}</a></li>
                                {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html"></a></li> --}}
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
                                    @foreach (explode(',',$article->keywords) as $keyword)
                                        <li><a href="#">{{ $keyword }}</a></li>
                                    @endforeach
                                </ul>
                            @endif

                        </div>

                    </article><!-- End blog entry -->


                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Yeni Gelen  Yazılar</h3>
                        <div class="sidebar-item recent-posts">
                          {{-- @dd($sidebar_article ) --}}
                          @foreach ($sidebar_article as $art)
                            
                          <div class="post-item clearfix">
                            <img src="{{$art->image}}" alt="{{ $art->title}}<">
                            <h4><a href="blog-single.html">{{ $art->title}}</a></h4>
                            <time datetime="{{date_format($art->created_at,('d.m.Y'))}}"> {{date_format($art->created_at,('d.m.Y'))}}</time>
                          </div>
                          @endforeach
          

                        </div><!-- End sidebar recent posts-->

                        {{-- <h3 class="sidebar-title">Tags</h3>
                        <div class="sidebar-item tags">
                            <ul>
                                <li><a href="#">App</a></li>
                                <li><a href="#">IT</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Mac</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Office</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Studio</a></li>
                                <li><a href="#">Smart</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>
                        </div><!-- End sidebar tags--> --}}

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Single Section -->

@endsection


@section('js')
@endsection
