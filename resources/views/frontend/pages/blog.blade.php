@extends('layouts.layout-frontend')


@section('tltle')
Blog 
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
            <li>Blog</li>
          </ol>
          <h2>Blog</h2>
  
        </div>
      </section><!-- End Breadcrumbs -->
  
@endsection



@section('content')


    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
  
          <div class="row">
  
            <div class="col-lg-8 entries">
  
              @foreach ($all_article as  $article)
                
              <article class="entry">
                <div class="entry-img">
                  <img src="{{$article->image}}" alt="{{ $article->title }}" class="img-fluid">
                </div>
  
                <h1 class="entry-title">
                  <a href="{{route('frontend.blog_detail', $article->slug) }}">{{$article->title}}</a>
                </h1>
  
                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a>{{$article->author->name}}</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time datetime="2020-01-01"></time> {{date_format($article->created_at,('d.m.Y'))}}</a></li>
                   {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li> --}}
                  </ul>
                </div>
  
                <div class="entry-content">
                  <p>
                    {!!Str::limit($article->detail,250,'...')!!}
                  </p>
                  <div class="read-more">
                    <a href="{{route('frontend.blog_detail', $article->slug) }}">Daha fazla </a>
                  </div>
                </div>
  
              </article><!-- End blog entry -->

              @endforeach
  
              <div class="blog-pagination">
                <ul class="justify-content-center">
                {{$all_article->links()}}
                </li>
                </ul>
              </div>
  
            </div><!-- End blog entries list -->
  
            <div class="col-lg-4" style="
            position: sticky;
            top: 0;">
  
              <div class="sidebar" >
  
             
  
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
{{--   
                <h3 class="sidebar-title">Tags</h3>
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
      </section><!-- End Blog Section -->
  

@endsection


@section('js')
@endsection