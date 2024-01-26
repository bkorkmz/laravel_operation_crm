<style>
    .php-email-form .error-message {
        display: none;
        color: #fff;
        background: #ed3c0d;
        text-align: left;
        padding: 15px;
        font-weight: 600;
    }

    .php-email-form .error-message br + br {
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
</style>
<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <span class="logo">
            <img src="{{ asset(config('settings.site_logo')) }}" alt="logo" class="logo">

          </span>

                    <p>{!! config('settings.site_address') !!} <br><br>
                        <strong>Telefon:</strong> {{config('settings.site_phone')}}<br>
                        <strong>Email:</strong> {{config('settings.site_email')}}<br>
                    </p>
                </div>


                @php

                    $about = "/#about";
                    $services = "/#services";
                    $portfolio = "/#portfolio";
                    $contact = "/#contact";
                @endphp
                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Hakkımızda</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="/">Anasayfa</a></li>
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="{{ $about}}">Hakkımızda</a></li>--}}
                        <li><i class="bx bx-chevron-right"></i> <a href="{{$services}}">Hizmetlerimiz</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('frontend.blog')}}">Blog</a></li>
                    </ul>
                </div>


                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Hizmetlerimiz</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{$services}}">Kreatif Ajans</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{$services}}">Dijital Ajans</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{$services}}">Marka Danışmanlığı</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{$services}}">Prodüksiyon</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Kurumsal</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('frontend.aboutUs')}}">Hakkımızda </a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('frontend.kvkk')}}">KVKK Politikası</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('frontend.privacyPolicy')}}"> Çerez Politikası</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 contact">
                    <h4>Bize Katılın</h4>
                    <p>Tüm bildiklerimizi burada paylaşıyoruz</p>
                    <form action="{{route('frontend.newsletter')}}" method="post" class="php-email-form shadow-none">
                        @csrf
                        <div class="d-flex">
                            <div class="col-8 form-group ">
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <button type="submit">Katıl</button>
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
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span><a
                                href="{{config('settings.site_url')}}">{{config('settings.site_copyright')}}</a></span></strong>.
                Tüm Hakları Saklıdır
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/presento-bootstrap-corporate-template/ -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
            </div>
        </div>
        {{-- @dd(config('settings')) --}}

        <div class="social-links text-center text-md-end pt-3 pt-md-0">
            <a href="{{config('settings.site_twitter_url')}}"
               class="twitter {{config('settings.site_twitter_url') == "" ? "d-none" : ""}}"><i
                        class="bx bxl-twitter"></i></a>
            <a href="{{config('settings.site_facebook_url')}}"
               class="facebook {{config('settings.site_facebook_url') == "" ? "d-none" : ""}}"><i
                        class="bx bxl-facebook"></i></a>
            <a href="{{config('settings.site_instagram_url')}}"
               class="instagram {{config('settings.site_instagram_url') == "" ? "d-none" : ""}}"><i
                        class="bx bxl-instagram"></i></a>
            <a href="{{config('settings.site_google_plus_url')}}"
               class="google-plus {{config('settings.site_google_plus_url') == "" ? "d-none" : ""}}"><i
                        class="bx bxl-google-plus"></i></a>
            <a href="{{config('settings.site_linkedin_url')}}"
               class="linkedin {{config('settings.site_linkedin_url') == "" ? "d-none" : ""}}"><i
                        class="bx bxl-linkedin"></i></a>
            <a href="{{config('settings.site_youtube_url')}}"
               class="youtube {{config('settings.site_youtube_url') == "" ? "d-none" : ""}}"><i
                        class="bx bxl-youtube"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


<!-- Vendor JS Files -->
<script src="{{asset('/frontend/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('/frontend/vendor/aos/aos.js')}}"></script>
<script src="{{asset('/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('/frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('/frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('/frontend/vendor/php-email-form/validate.js')}}"></script>
@yield('js')

<!-- Template Main JS File -->
<script src="{{asset('frontend/js/main.js')}}"></script>