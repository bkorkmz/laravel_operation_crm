@extends('theme2.layout')


@section('tltle')
{{ $article->title}}
@endsection

@section('head')
<meta property="og:locale" content="tr_TR"/>
<meta property="og:site_name" content="Dijital Teknoloji"/>
<meta property="og:title" content="Teknoloji Haberleri"/>
<meta property="og:url" content="http://Dijitalteknoloji.Net"/>
<meta property="og:type" content="website"/>
<meta property="og:description" content="Dijitalteknoloji.net en son çıkan teknoloji haberleri"/>
<meta property="og:image" content="https://www.dijitalteknoloji.net/favicion.png"/>
<meta property="article:publisher" content="https://www.facebook.com/DijitalTeknoloji.Net"/>

<meta itemprop="name" content="Dijital Teknoloji"/>
<meta itemprop="headline" content="Teknoloji Haberleri"/>
<meta itemprop="description" content="Dijitalteknoloji.net en son çıkan teknoloji haberleri"/>
<meta itemprop="image" content="https://www.dijitalteknoloji.net/favicion.png"/>
<meta itemprop="author" content="dijitalteknoloji"/>
<link rel="publisher" href="https://plus.google.com/105148002447364112508"/>


<meta name="twitter:title" content="Teknoloji Haberleri"/>
<meta name="twitter:url" content="https://www.dijitalteknoloji.net"/>
<meta name="twitter:description" content="dijitalteknoloji.net En son çıkan teknoloji haberleri"/>
<meta name="twitter:image" content="https://www.dijitalteknoloji.net/favicion.png"/>
<meta name="twitter:site" content="@dijitalteknoloji"/>

@endsection

@section('css')
<style>
    .blog .sidebar .recent-posts img {
      height: 66px;
  }
    .blogsidebar__content__wraper__2 
    .blogsidebar__content__inner__2 
    .blogsidebar__img__2 
    img{
         width: 96px;
         border-radius: 50%;
     }
  </style>
@endsection


@section('breadcrumbs')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbarea p-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h2 class="heading">Blog Detay</h2>
                        </div>
                        <div class="breadcrumb__inner">
                            <ul>
                                <li><a href="/">Anasayfa</a></li>
                                <li><a href="/blog">Blog</a></li>
                                <li>{{$article->title}}</li>
                            </ul>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

            
  @endsection
    @section('content')><!-- End Breadcrumbs -->
    <div class="blogarea__2 sp_top_100 sp_bottom_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="blog__details__content__wraper">
                        <div class="blog__details__img" data-aos="fade-up">
                            <img src="{{$article->image}}" alt="{{ $article->title}}" class="img-fluid">

                        </div>
                        <div class="blog__details__content">
                            <h3> {{$article->title}}</h3>
                            <p class="content__1" data-aos="fade-up">
                             {!! $article->detail !!}
                            </p>
                            
                        </div>
                        <div class="blog__details__tag" data-aos="fade-up">
                            <ul>
                                <li class="heading__tag">
                                    Etiket
                                </li><br>
                                    @if (!blank($article->keywords))
                                        @foreach (explode(',',$article->keywords) as $keyword)
                                            <li><a>{{ $keyword }}</a></li>
                                        @endforeach
                                    @endif
                            </ul>
                            <ul class="share__list" data-aos="fade-up">
                                <li class="heading__tag">
                                    Paylaş:
                                </li><br>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?text={{route('frontend.blog_detail', $article->slug) }}"><i class="icofont-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{route('frontend.blog_detail', $article->slug) }}"><i class="icofont-facebook"></i></a>
                                </li>
                                <li>
                                    <a href=" https://t.me/share/url?url={{route('frontend.blog_detail', $article->slug) }}&text={{$article->title}}"><i class="icofont-whatsapp"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="blogsidebar__content__wraper__2" data-aos="fade-up">
                        <div class="blogsidebar__content__inner__2">
                            <div class="blogsidebar__img__2">
                                <img src="{{ $article->author->avatar ?? "images/default-avatar.png"}}" alt="blog">
                            </div>
                            <div class="blogsidebar__name__2">
                                <h5>
                                    <span> {{$article->author ? $article->author->name :""}}</span>

                                </h5>
{{--                                <p>Blogger/Photographer</p>--}}
                            </div>
                            <div class="blog__sidebar__text__2">
{{--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Veritatis distinctio suscipit reprehenderit atque</p>--}}
                            </div>
                            <div class="blogsidbar__icon__2 d-none">
                                <ul>
                                    <li>
                                        <a href="#"><i class="icofont-email"></i></a>
                                    </li>

                                    <li>
                                        <a href="#"><i class="icofont-youtube-play"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icofont-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icofont-twitter"></i></a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    
                    <div class="blogsidebar__content__wraper__2" data-aos="fade-up">
                        <h4 class="sidebar__title">Kategoriler</h4>
                        <ul class="categorie__list">
                            @foreach($categories as $s_cat)
                                <li><a href="#">{{$s_cat->name}} <span>{{$s_cat->content_count}}</span></a></li>
                            @endforeach
                        </ul>

                    </div>

                    <div class="blogsidebar__content__wraper__2" data-aos="fade-up">

                        <h4 class="sidebar__title">Benzer Yazılar </h4>
                        <ul class="recent__list">
                            @foreach($sidebar_article as $s_article)
                                <li>

                                    <div class="recent__img">
                                        <a href="#">
                                            <img src="{{$s_article->image}}" alt="{{$s_article->slug}}">
                                            
                                        </a>
                                    </div>

                                    <div class="recent__text">
                                        <div class="recent__date">
                                            <a href="#"><time datetime="2020-01-01"></time> {{date_format($s_article->created_at,('d.m.Y'))}}</a>
                                        </div>
                                        <h6><a href="">{{\Illuminate\Support\Str::limit($s_article->title,50,"...")}}</a></h6>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>








    {{--    /////////////////////////////////////////////////////////////////////////////////////////////////--}}
    <section id="blog" class="blog d-none">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">

                        <div class="entry-img">
                            <img src="{{$article->image}}" alt="{{ $article->title ?$article->title :""}}" class="img-fluid">
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
                                        <li><a>{{ $keyword }}</a></li>
                                    @endforeach
                                </ul>
                            @endif

                        </div>

                    </article><!-- End blog entry -->
{{-- 
                    <div class="blog-author d-flex align-items-center">
                        <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
                        <div>
                            <h4>{{$article->author->name}}</h4>
                            <div class="social-links">
                                <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                            </div>
                            <p>
                                Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas
                                repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde
                                voluptas.
                            </p>
                        </div>
                    </div><!-- End blog author bio --> --}}

                    {{-- <div class="blog-comments">

                        <h4 class="comments-count">8 Comments</h4>

                        <div id="comment-1" class="comment">
                            <div class="d-flex">
                                <div class="comment-img"><img src="assets/img/blog/comments-1.jpg" alt=""></div>
                                <div>
                                    <h5><a href="">Georgia Reader</a> <a href="#" class="reply"><i
                                                class="bi bi-reply-fill"></i> Reply</a></h5>
                                    <time datetime="2020-01-01">01 Jan, 2020</time>
                                    <p>
                                        Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad aut
                                        sapiente quis molestiae est qui cum soluta.
                                        Vero aut rerum vel. Rerum quos laboriosam placeat ex qui. Sint qui facilis et.
                                    </p>
                                </div>
                            </div>
                        </div><!-- End comment #1 -->

                        <div id="comment-2" class="comment">
                            <div class="d-flex">
                                <div class="comment-img"><img src="assets/img/blog/comments-2.jpg" alt=""></div>
                                <div>
                                    <h5><a href="">Aron Alvarado</a> <a href="#" class="reply"><i
                                                class="bi bi-reply-fill"></i> Reply</a></h5>
                                    <time datetime="2020-01-01">01 Jan, 2020</time>
                                    <p>
                                        Ipsam tempora sequi voluptatem quis sapiente non. Autem itaque eveniet saepe.
                                        Officiis illo ut beatae.
                                    </p>
                                </div>
                            </div>

                            <div id="comment-reply-1" class="comment comment-reply">
                                <div class="d-flex">
                                    <div class="comment-img"><img src="assets/img/blog/comments-3.jpg" alt=""></div>
                                    <div>
                                        <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i
                                                    class="bi bi-reply-fill"></i> Reply</a></h5>
                                        <time datetime="2020-01-01">01 Jan, 2020</time>
                                        <p>
                                            Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam aspernatur
                                            ut vitae quia mollitia id non. Qui ad quas nostrum rerum sed necessitatibus aut
                                            est. Eum officiis sed repellat maxime vero nisi natus. Amet nesciunt nesciunt
                                            qui illum omnis est et dolor recusandae.

                                            Recusandae sit ad aut impedit et. Ipsa labore dolor impedit et natus in porro
                                            aut. Magnam qui cum. Illo similique occaecati nihil modi eligendi. Pariatur
                                            distinctio labore omnis incidunt et illum. Expedita et dignissimos distinctio
                                            laborum minima fugiat.

                                            Libero corporis qui. Nam illo odio beatae enim ducimus. Harum reiciendis error
                                            dolorum non autem quisquam vero rerum neque.
                                        </p>
                                    </div>
                                </div>

                                <div id="comment-reply-2" class="comment comment-reply">
                                    <div class="d-flex">
                                        <div class="comment-img"><img src="assets/img/blog/comments-4.jpg" alt="">
                                        </div>
                                        <div>
                                            <h5><a href="">Sianna Ramsay</a> <a href="#" class="reply"><i
                                                        class="bi bi-reply-fill"></i> Reply</a></h5>
                                            <time datetime="2020-01-01">01 Jan, 2020</time>
                                            <p>
                                                Et dignissimos impedit nulla et quo distinctio ex nemo. Omnis quia dolores
                                                cupiditate et. Ut unde qui eligendi sapiente omnis ullam. Placeat porro est
                                                commodi est officiis voluptas repellat quisquam possimus. Perferendis id
                                                consectetur necessitatibus.
                                            </p>
                                        </div>
                                    </div>

                                </div><!-- End comment reply #2-->

                            </div><!-- End comment reply #1-->

                        </div><!-- End comment #2-->

                        <div id="comment-3" class="comment">
                            <div class="d-flex">
                                <div class="comment-img"><img src="assets/img/blog/comments-5.jpg" alt=""></div>
                                <div>
                                    <h5><a href="">Nolan Davidson</a> <a href="#" class="reply"><i
                                                class="bi bi-reply-fill"></i> Reply</a></h5>
                                    <time datetime="2020-01-01">01 Jan, 2020</time>
                                    <p>
                                        Distinctio nesciunt rerum reprehenderit sed. Iste omnis eius repellendus quia nihil
                                        ut accusantium tempore. Nesciunt expedita id dolor exercitationem aspernatur aut
                                        quam ut. Voluptatem est accusamus iste at.
                                        Non aut et et esse qui sit modi neque. Exercitationem et eos aspernatur. Ea est
                                        consequuntur officia beatae ea aut eos soluta. Non qui dolorum voluptatibus et optio
                                        veniam. Quam officia sit nostrum dolorem.
                                    </p>
                                </div>
                            </div>

                        </div><!-- End comment #3 -->

                        <div id="comment-4" class="comment">
                            <div class="d-flex">
                                <div class="comment-img"><img src="assets/img/blog/comments-6.jpg" alt=""></div>
                                <div>
                                    <h5><a href="">Kay Duggan</a> <a href="#" class="reply"><i
                                                class="bi bi-reply-fill"></i> Reply</a></h5>
                                    <time datetime="2020-01-01">01 Jan, 2020</time>
                                    <p>
                                        Dolorem atque aut. Omnis doloremque blanditiis quia eum porro quis ut velit tempore.
                                        Cumque sed quia ut maxime. Est ad aut cum. Ut exercitationem non in fugiat.
                                    </p>
                                </div>
                            </div>

                        </div><!-- End comment #4 -->

                        <div class="reply-form">
                            <h4>Leave a Reply</h4>
                            <p>Your email address will not be published. Required fields are marked * </p>
                            <form action="">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input name="name" type="text" class="form-control"
                                            placeholder="Your Name*">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input name="email" type="text" class="form-control"
                                            placeholder="Your Email*">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <input name="website" type="text" class="form-control"
                                            placeholder="Your Website">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Post Comment</button>

                            </form>

                        </div>

                    </div><!-- End blog comments --> --}}

                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">


                        <h3 class="sidebar-title">Yeni Gelen  Yazılar</h3>
                        <div class="sidebar-item recent-posts">
                          {{-- @dd($sidebar_article ) --}}
                          @foreach ($sidebar_article as $art)
                            
                          <div class="post-item clearfix">
                            <img src="{{$art->image}}" alt="{{ $art->title}}<">
                            <h4><a href="{{route('frontend.blog_detail', $art->slug) }}">{{ $art->title}}</a></h4>
                            <time datetime="{{date_format($art->created_at,('d.m.Y'))}}"> {{date_format($art->created_at,('d.m.Y'))}}</time>
                          </div>
                          @endforeach
          

                        </div>
                        

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Single Section -->

@endsection


@section('js')
@endsection
