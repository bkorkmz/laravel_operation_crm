@extends('layouts.layout-frontend')


@section('title')
    Blog Yazıları
@endsection

@section('head')
    <meta name="Description" content="{{ config('settings.site_description') }}">
    <meta name="Author" content="{{ config('settings.site_url') }}">
    <meta name="keywords" content="{{ config('settings.site_keywords') }}" />
    <meta name="title" content="{{ config('settings.site_title') }}">

@stop

@section('css')
    <style>
        /*.blog .sidebar .recent-posts img {*/
        /*    height: 66px;*/
        /*}*/

        .blog .entry {
            padding: 30px;
            margin-bottom: 60px;
            box-shadow: 0 0px 0px rgba(0, 0, 0, 0.1) !important;
        }

        .blog .entry .entry-title {
            font-size: 21px !important;
        }


        .blog .entry .entry-img {
            max-height: 440px;
            margin: -30px 0px 20px 0px;
            overflow: hidden;
        }

        .img-fluid-first {
            height: 246px;
        }


        /*.blog .sidebar .recent-posts img {*/
        /*    height: auto;*/
        /*}*/
    </style>
@stop

@section('breadcrumbs')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="/">Anasayfa</a></li>
                <li>Blog</li>
            </ol>
            <h1>Blog Yazıları</h1>

        </div>
    </section><!-- End Breadcrumbs -->

@endsection



@section('content')

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-8 entries row position-relative">
                    <div id="blog-container" class="row align-content-start">
                        @include('frontend.includes.more_articles',['all_article'=>$all_article])
                          {!! $all_article->links('vendor.pagination.blog') !!}
                    </div>
                  <div class="col-12 card text-bg-success text-center  mb-1 mt-5" >
                      <div class="card-header">
                          <h4>Bize Katılın</h4>
                      </div>
                      <div class="reply-form card-body">
                          <div class="card-title">
                              <h5>Dijital Medya konusunda en iyi ipuçlarını alan 5.000'den fazla aboneye katılın.

                                  <small>
                                      Size spam göndermeyeceğimize ve istediğiniz zaman aboneliğinizi iptal edebileceğinize söz veriyoruz.
                                  </small>
                              </h5>
                          </div>
                       <div class="mt-5">
                           <form action="{{route('frontend.newsletter')}}" method="post" class="php-email-form shadow-none float">
                               @csrf
                               <div class="row">
                                   <div class="col-8 form-group">
                                       <input type="email" name="email" class="form-control" placeholder="example@example.com" required>
                                   </div>
                                   <div class="col-4">
                                       <button type="submit" class="btn btn-primary">Abone Ol</button>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="my-3">
                                       <div class="loading">Gönderiliyor</div>
                                       <div class="error-message"></div>
                                       <div class="sent-message">E Posta Hesabınız Kayıt Edilmiştir. Teşekkürler. !</div>
                                   </div>
                               </div>
                           </form>

                       </div>

                      </div>
                     
                      {{--                        <button class="get-started-btn" id="load_button" >Daha Fazla Yükle </button>--}}
                    </div>
                     {{-- <div class="text-center" id="loader">
                        <span>İçerikler Getiriliyor ...</span>
                        <div class="spinner-border" role="status">
                            <span class="sr-only"></span>
                        </div>
                    </div>--}}
                </div>


                <div class="col-lg-4" style=" position: sticky;top: 0;">

                    <div class="sidebar">
                        <h3 class="sidebar-title">Arama </h3>

                        <div class="sidebar-item search-form">
                            <form action="?arama=" method="get">
                                <input type="text" placeholder="Arama yap..." id="search" name="arama" value="{{request()->arama}}">
                                <button type="submit" id="search_button"><i class="bi bi-search"></i></button>
                            </form>
                        </div>

                        <h3 class="sidebar-title">Kategoriler</h3>
                        <div class="sidebar-item categories">
                            <ul>
                                @foreach ($categories as $category)
                                    @php $slug = $category->slug ? $category->slug :  slug_format($category->name) @endphp
                                    <li><a href="{{route('frontend.blog_category',[$slug  ,$category->id])}} ">{{$category->name}} <span>({{$category->get_article_count}})</span></a>
                                    </li>
                                @endforeach

                            </ul>
                        </div><!-- End sidebar categories-->

                        <h3 class="sidebar-title">Çok Okunanlar</h3>
                        <div class="sidebar-item recent-posts">
                            @foreach ($sidebar_article as $art)

                                <div class="post-item clearfix">
                                    <img src="{{$art->image}}" alt="{{ $art->title}}" title="{{ $art->title}}">
                                    <h4 style="font-size: 13px;"><a href="{{route('frontend.blog_detail', $art->slug) }}"> 
                                    {{Str::limit($art->title,60,'...')}}  </a></h4>
                                    <time datetime="{{$art->created_at->format('Y-m-d')}}">{{$art->created_at->format('Y-m-d')}}</time>
                                </div>
                                
                                
{{--                                <div class="entry col-6 col-lg-12 p-2">--}}
{{--                                    <div class="entry-img-recent d-flex">--}}
{{--                                        <a href="{{route('frontend.blog_detail', $art->slug) }}">--}}
{{--                                            <img src="{{$art->image}}" alt="{{ $art->title ? $art->title :""  }}"--}}
{{--                                                 class="img-fluid-first" style="width: 13rem;border-radius: 5%;">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}

{{--                                    <h1 class="entry-title">--}}
{{--                                        <a href="{{route('frontend.blog_detail', $art->slug) }}"--}}
{{--                                           style="font-size: 20px;">{{Str::limit($art->title,60,'...')}}</a>--}}
{{--                                    </h1>--}}
{{--                                    <div class="entry-content my-2">--}}
{{--                                        {{Str::limit(strip_tags($art->detail),80,'...')}}--}}
{{--                                    </div>--}}
{{--                                    <div class="entry-meta d-flex justify-content-between">--}}
{{--                                        <dd class="align-items-center">--}}
{{--                                            <i class="bi bi-person mr-1"></i>--}}
{{--                                            <a>{{$art->author->name}}</a>--}}
{{--                                        </dd>--}}
{{--                                        <dd class="align-items-center">--}}
{{--                                            <i class="bi bi-clock mr-1"></i>--}}
{{--                                            <a>{{date_format($art->created_at,('d.m.Y'))}}</a>--}}
{{--                                        </dd>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            @endforeach
                        </div>
                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Section -->

@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous">
    </script>

    <script>
      /*  let page = 1; // Başlangıç sayfa numarası
        const perPage = 8; // Her sayfada gösterilecek blog sayısı
        let isLoading = false; // Yükleme durumunu kontrol etmek için bir flag
        let height = $(document).height();
        $(document).ready(function () {
            loadBlogPosts();
        });

        $('#load_button').on('click', function() {
            // debugger;
        // document.addEventListener('scroll', function () {
            if (isLoading === !true) {
            // if ((Math.round($(window).scrollTop()) + $(window).height()) >= height-200  && isLoading === !true) {
            
            // if ( isLoading === !true) {
                    isLoading = true;
                    showLoader();
                    let category = '{{request()->kategori}}';
                    let search = $('#search').val();
                    
                    $.ajax({
                        url: '/get-article',
                        method: 'GET',
                        data: {page: page, perPage: perPage, cat: category,search:search},
                        success: function (data) {
                            if (data == ""){
                                isLoading = true;
                                hideLoader();
                                $('#load_button').hide();
                                var newParagraph = $('<p>').text('Sayfa Sonuna Geldiniz !');
                                $('#load_button_div').append(newParagraph);
                                return false;
                            }
                            $('#blog-container').append(data);
                            isLoading = false;
                            hideLoader();
                            page++;
                        },
                        error: function () {
                            isLoading = false;
                            hideLoader();
                        }
                    });
            }
            });

        function loadBlogPosts() {
            if (page == 1) {
                let category = '{{request()->kategori}}';
                let search = '{{request()->arama}}' //$('#search').val();
                $.ajax({
                    url: '/get-article',
                    method: 'GET',
                    data: {page: page, perPage: perPage, cat: category,search:search},
                    success: function (data) {
                        $('#blog-container').append(data);
                        isLoading = false;
                        hideLoader();
                        page++;
                    },
                    error: function () {
                        isLoading = false;
                        hideLoader();
                        console.log('Blog gönderileri yüklenirken bir hata oluştu.');
                    }
                });
            }
        }

        function showLoader() {
            $('#loader').show()
            $('#load_button').hide()
        }

        function hideLoader() {
            $('#loader').hide()
            $('#load_button').show()
        }
*/

        // $('#search_button').on('click', function() {
        //     let search = $('#search');
        //
        //     if (search == ""){
        //         toastr('Arama yapmak için bir şeyler yazınız');
        //     }
        //
        //
        //
        //
        //
        //
        // });
        //
        
        
    </script>
@stop