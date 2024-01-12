<style>
    .php-email-form .error-message {
        display: none;
        color: #fff;
        background: #ed3c0d;
        text-align: left;
        padding: 15px;
        font-weight: 600;
    }

    .php-email-form .error-message br+br {
        margin-top: 25px;
    }

    .php-email-form .sent-message {
        display: none;
        color: #fff;
        background: #18d26e;
        text-align: center;
        padding: 15px;
        font-weight: 600;
    }

    .php-email-form .loading {
        display: none;
        background: #fff;
        text-align: center;
        padding: 15px;
    }

    .php-email-form .loading:before {
        content: "";
        display: inline-block;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        margin: 0 10px -6px 0;
        border: 3px solid #18d26e;
        border-top-color: #eee;
        animation: animate-loading 1s linear infinite;
    }

    .footerarea__right__wraper .footerarea__right__list ul li a .footerarea__right__img img {
        max-width: 60px;
    }

</style>

@php
           $filePath = storage_path('app/evrimNews.json');
           if (file_exists($filePath)) {
            $jsonContent = file_get_contents($filePath);
            $newsData = json_decode($jsonContent, true);
            $footer_news = array_slice($newsData['haberlist'], 0, 3);
           }
@endphp
<!-- footer__section__start -->
<div class="footerarea">
    <div class="container">
        <div class="footerarea__newsletter__wraper">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" data-aos="fade-up">
                    <div class="footerarea__text">
                        <h3 class="h4">Haftalık <span>Bülten </span> Aboneliği </h3>
                        <p>Haftalık bültene abone olarak gelişmelerden haberdar olmak istermisiniz ?</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" data-aos="fade-up">
                    <div class="footerarea__newsletter">
                        <div class="footerarea__newsletter__input">
                            <form action="{{route('frontend.newsletter')}}" method="post"  class="php-email-form" >
                                @csrf
                                <input type="email" name="email" placeholder="E-posta Adresiniz ">
                                <div class="footerarea__newsletter__button">
                                    <button type="submit" class="subscribe__btn">Katıl</button>
                                </div>
                                <div class="my-3">
                                    <div class="loading">Gönderiliyor</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">E Posta Hesabınız Kayıt Edilmiştir. Teşekkürler. !</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footerarea__wrapper pt-4 pb-0">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 " data-aos="fade-up">
                    <div class="footerarea__inner footerarea__about__us">

                        <div class="footerarea__logo text-center position-absolute" style="top: -33px;">
                            <a  href="/"><img src="{{ asset(config('settings.site_logo')) }}" alt="logo" class="img-fluid" width="300" height="" ></a>
                        </div>
                        <div class="footerarea__icon" style="margin-top: 213px;">
                            <div class="footerarea__header text-white">Sosyal medya hesaplarımızdan bizi takip edebilirsiniz.</div>

                            <ul class="my-3">
                                <li class="{{config('settings.site_facebook_url') ?"": "d-none"}}"><a href="{{config('settings.site_facebook_url')}}"><i class="icofont-facebook"></i></a></li>
                                <li class="{{config('settings.site_twitter_url') ?"": "d-none"}}"><a href="{{config('settings.site_twitter_url')}}"><i class="icofont-twitter"></i></a></li>
                                <li class="{{config('settings.site_instagram_url') ?"": "d-none"}}"><a href="{{config('settings.site_instagram_url')}}"><i class="icofont-instagram"></i></a></li>
                                <li class="{{config('settings.site_google_plus_url') ?"": "d-none"}}"><a href="{{config('settings.site_google_plus_url')}}"><i class="icofont-google-plus"></i></a></li>
                                <li class="{{config('settings.site_linkedin_url') ?"": "d-none"}}"><a href="{{config('settings.site_linkedin_url')}}"><i class="icofont-linkedin"></i></a></li>
                                <li class="{{config('settings.site_youtube_url') ?"": "d-none"}}"><a href="{{config('settings.site_youtube_url')}}"><i class="icofont-youtube-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 " data-aos="fade-up">
                    <div class="footerarea__inner">
                        <div class="footerarea__heading">
                            <h3>Sayfalar</h3>
                        </div>
                        <div class="footerarea__list">
                            <ul>
                                <li><a href="">Anasayfa</a></li>
                                <li><a href="/#about-us">Hakkımızda</a></li>
                                <li><a href="/#blog">Blog</a></li>
                                <li><a href="/#news_content">Mevzuat Haberleri</a></li>
                                 <li><a href="/#contact">İletişim</a></li>
{{--                                <li><a  target="_blank" href="https://logi-san.com/gumruk-hizmetleri/">Logisan Lojistik</a></li>--}}


                            </ul>
                        </div>


                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 " data-aos="fade-up">
                    <div class="footerarea__inner footerarea__padding__left">
                        <div class="footerarea__heading">
                            <h3>Blog Kategorileri</h3>
                        </div>
                        <div class="footerarea__list">
                            <ul>
                                @foreach(config('allCetegories') as $category)
                                    @if($category->model == 'article')
                                        <li>
                                            <a href="#">{{$category->name}}</a>
                                        </li>
                                    @endif
                                    
                                    
                                @endforeach
                            </ul>
                        </div>


                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12" data-aos="fade-up">
                    <div class="footerarea__right__wraper footerarea__inner">
                        <div class="footerarea__heading">
                            <h3>Güncel Haberler</h3>
                        </div>
                        <div class="footerarea__right__list">
                            <ul>
                                @foreach($footer_news as $f_news)
                                <li>
                                    <a href="{{route('frontend.post_detail',$f_news['Id'])}}">
                                        <div class="footerarea__right__img">
                                            <img src="/images/default_product1.jpg" alt="footerphoto">
                                        </div>
                                        <div class="footerarea__right__content">
                                            <span><time>{{date("Y-m-d", strtotime($f_news['DegisiklikTarihiString']))}}</time></span>
                                            <h6>{{\Illuminate\Support\Str::limit($f_news['Baslik'],40,"...")}}</h6>
                                        </div>
                                    </a>
                                </li>
                                @endforeach

                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footerarea__copyright__wrapper pt-0">
            <div class="row">
{{--                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" data-aos="fade-up">--}}
                    <div class="footerarea__copyright__content">
                        <p>{!! config('settings.site_copyright') !!}</p>
                    </div>
{{--                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" data-aos="fade-up">
                    <div class="footerarea__copyright__list">
                        <ul>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>--}}
            </div>
        </div>

    </div>
</div>
<!-- footer__section__end -->



<!-- footer__section__end -->


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>



<!-- Vendor JS Files -->
    <!-- JS here -->

    <script src="{{asset('frontend/theme2/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('frontend/theme2/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/theme2/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/theme2/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/theme2/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/theme2/js/slick.min.js')}}"></script>
    <script src="{{asset('frontend/theme2/js/jquery.meanmenu.min.js')}}"></script>
    <script src="{{asset('frontend/theme2/js/ajax-form.js')}}"></script>
    <script src="{{asset('frontend/theme2/js/wow.min.js')}}"></script>
    <script src="{{asset('frontend/theme2/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/theme2/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/theme2/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/theme2/js/waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/theme2/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('frontend/theme2/js/plugins.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="{{asset('frontend/theme2/js/main.js')}}"></script>
    <script src="{{asset('/frontend/js/php-email-form/validate.js')}}"></script>
    <script src="{{asset('/frontend/js/heartbeat.js')}}"></script>


@yield('js')



<!-- Template Main JS File -->
<script src="{{asset('frontend/theme1/js/main.js')}}"></script>




<!-- Facebook Pixel Code -->
<script> !function(f,b,e,v,n,t,s) 
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}; if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window,document,'script', 'https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '266308279248661');  fbq('track', 'PageView'); </script> <noscript> <img height="1" width="1"  src="https://www.facebook.com/tr?id=266308279248661&ev=PageView &noscript=1"/> </noscript>