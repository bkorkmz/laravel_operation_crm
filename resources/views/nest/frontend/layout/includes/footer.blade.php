<style>
    .hotline p {
        font-size: 18px;
    }

</style>

<footer class="main">
    <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="position-relative newsletter-inner" onclick="sendWhatsApp('Ürünler hakkında bilgi almak istiyorum')"
                         style="background: url({{asset('images/banner-img-info.jpg')}}) no-repeat center; cursor: pointer;">
{{--                        <div class="newsletter-content text-center">--}}
{{--                            <h2 class="mb-20">--}}
{{--                                Hemen Bültene Abone oldun!--}}
{{--                            </h2>--}}
{{--                            <p class="mb-45"> Sağlığınızı korumak için ihtiyacınız olan tüm takviye edici gıdalar mağazamızda.</p>--}}
{{--                            <form class="form-subcriber d-inline-flex">--}}
{{--                                <input type="email" placeholder="Email adresi giriniz" />--}}
{{--                                <button class="btn" type="submit">Katıl</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <img src="{{asset('frontend/assets/imgs/banner/banner-9.png')}}" alt="newsletter" />--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="banner-icon">
                            <img src="{{asset('frontend/assets/imgs/theme/icons/icon-1.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Güvenli Sipariş</h3>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <div class="banner-icon">
                            <img src="{{asset('frontend/assets/imgs/theme/icons/icon-2.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">%100 Müşteri Memnuniyeti</h3>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <div class="banner-icon">
                            <img src="{{asset('frontend/assets/imgs/theme/icons/icon-3.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Paranız Güvende</h3>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <div class="banner-icon">
                            <img src="{{asset('frontend/assets/imgs/theme/icons/icon-4.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Ücretsiz Ürün Koçluğu</h3>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <div class="banner-icon">
                            <img src="{{asset('frontend/assets/imgs/theme/icons/icon-5.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Dünyanın Bir  Çok <br>Ülkesine  Güvenli Kargo Hizmeti</h3>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="logo mb-30">
                            <a href="/" class="text-left"><img src="{{config('settings.site_logo')}}" width="" height="" title="Logo" alt="logo" /></a>
                            <p class="font-lg text-heading">{{config('settings.site_description')}}</p>
                        </div>
                        <ul class="contact-infor">
                            <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-location.svg')}}" alt="Adres" /><strong>Adres: </strong> <span>{!! config('settings.site_address') !!}</span></li>
                            <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-contact.svg')}}" alt="Telefon" /><strong>Telefon: </strong><span>{{config('settings.site_phone')}}</span></li>
                            <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-email-2.svg')}}" alt="Email" /><strong>Email: </strong><span>{{config('settings.site_email')}}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <h4 class="widget-title">Kurumsal</h4>
                <ul class="footer-list mb-sm-5 mb-md-0">
                    @foreach(config('pages') as $page)
                        <li><a href="{{ route('frontend.page', $page->slug) }}">{{$page->title}}</a></li>
                    @endforeach
{{--                    <li><a href="#">İletişim</a></li>--}}

                </ul>
            </div>
                @php $categories = categories('product'); $totalCategories = count($categories); $half = ceil($totalCategories / 2); @endphp


                <div class="footer-link-widget col">
                    <h4 class="widget-title">Kategoriler</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        @foreach($categories as $key => $category)
                            @if($key < $half)
                                <li>
                                    <a href="{{ route('frontend.page', $category->slug) }}">{{$category->name}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="footer-link-widget col">
                    <h4 class="widget-title">Kategoriler</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        @foreach($categories as $key => $category_two)
                            @if($key >= $half)
                                <li>
                                    <a href="{{ route('frontend.page', $category_two->slug) }}">{{$category_two->name}}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

            <div class="footer-link-widget widget-install-app col wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                <h4 class="widget-title">Ödeme Yöntemleri</h4>
                <p class="mb-20">Güvenle ödeme yapın</p>
{{--                <img class="" src="{{asset('frontend/assets/imgs/theme/payment-method.png')}}" alt="" />--}}
                <img class="" src="{{asset('images/payment-method2.png')}}" alt="" />
            </div>
        </div>
    </section>
    <div class="container pb-30">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <p class="font-sm mb-0">{!! config('settings.site_copyright') !!}</p>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                <div class="hotline d-lg-inline-flex mr-30">
                    <img src="/frontend/assets/imgs/theme/icons/phone-call.svg" alt="hotline" />
                    <p>Çalışma Saatlari:<span> 8:00 - 22:00</span></p>
                </div>
                <div class="hotline d-lg-inline-flex">
                    <img src="/frontend/assets/imgs/theme/icons/phone-call.svg" alt="hotline" />
                    <p>{{config('settings.site_phone')}}<span>7/24 İletişim </span></p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>Bizi Takip Edin</h6>
                    <a {{config('settings.site_facebook_url') ? "" : "d-none"}} href="{{config('settings.site_facebook_url')}}"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg')}}" alt="Sosyal Facebook Link" /></a>
                    <a {{config('settings.site_twitter_url') ?"" : "d-none"}} href="{{config('settings.site_twitter_url')}}"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg')}}" alt="Sosyal Twitter Link" /></a>
                    <a {{config('settings.site_instagram_url') ?"" : "d-none"}} href="{{config('settings.site_instagram_url')}}"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-instagram-white.svg')}}" alt="Sosyal Instagram Link" /></a>
                    <a {{config('settings.site_linkedin_url') ?"" : "d-none"}} href="{{config('settings.site_linkedin_url')}}"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-pinterest-white.svg')}}" alt="Sosyal Pinterest Link" /></a>
                    <a {{config('settings.site_youtube_url') ?"" : "d-none"}} href="{{config('settings.site_youtube_url')}}"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg')}}" alt="Sosyal Youtube Link" /></a>
                </div>
{{--                <p class="font-sm">Up to 15% discount on your first subscribe</p>--}}
            </div>
        </div>
    </div>





</footer>
