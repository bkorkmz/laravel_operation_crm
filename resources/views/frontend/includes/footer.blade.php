<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
          <h3><span class="logo">
            <img src="{{ asset(config('settings.site_logo')) }}" alt="logo" class="logo">

          </span></h3>

          <p>{!! config('settings.site_address') !!} <br><br>
            <strong>Telefon:</strong> {{config('settings.site_phone')}}<br>
            <strong>Email:</strong> {{config('settings.site_email')}}<br>
          </p>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Hakkımızda</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Anasayfa</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Hakkımızda</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Hizmetlerimiz</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Blog</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Hizmetlerimiz</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Kreatif Ajans</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Dijital Ajans</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Marka Danışmanlığı</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">prodüksiyon</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-newsletter">
          <h4>Bize Katılın</h4>
          <p>Tüm bildiklerimizi burada paylaşıyoruz</p>
          <form action="" method="post">
            <input type="email" name="email"><input type="submit" value="Abone Ol">
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="container d-md-flex py-4">

    <div class="me-md-auto text-center text-md-start">
      <div class="copyright">
        &copy; Copyright <strong><span><a href="{{config('settings.site_url')}}">{{config('settings.site_copyright')}}</a></span></strong>. Tüm Hakları Saklıdır
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
      <a href="{{config('settings.site_twitter_url')}}" class="twitter {{config('settings.site_twitter_url') == "" ? "d-none" : ""}}"><i class="bx bxl-twitter"></i></a>
      <a href="{{config('settings.site_facebook_url')}}" class="facebook {{config('settings.site_facebook_url') == "" ? "d-none" : ""}}"><i class="bx bxl-facebook"></i></a>
      <a href="{{config('settings.site_instagram_url')}}" class="instagram {{config('settings.site_instagram_url') == "" ? "d-none" : ""}}"><i class="bx bxl-instagram"></i></a>
      <a href="{{config('settings.site_google_plus_url')}}" class="google-plus {{config('settings.site_google_plus_url') == "" ? "d-none" : ""}}"><i class="bx bxl-google-plus"></i></a>
      <a href="{{config('settings.site_linkedin_url')}}" class="linkedin {{config('settings.site_linkedin_url') == "" ? "d-none" : ""}}"><i class="bx bxl-linkedin"></i></a>
      <a href="{{config('settings.site_youtube_url')}}" class="youtube {{config('settings.site_youtube_url') == "" ? "d-none" : ""}}"><i class="bx bxl-youtube"></i></a>
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