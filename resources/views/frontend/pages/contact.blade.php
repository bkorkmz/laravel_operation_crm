<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>İLETİŞİM</h2>
      <p>Aklınızda ilginç bir proje varsa bizimle iletişime geçin ve size nasıl rehber olacağımızı konuşalım.</p>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">

      <div class="col-lg-6">

        <div class="row">
          <div class="col-md-12">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Ardes</h3>
              <p>{!!config('settings.site_address')!!}</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box mt-4">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>{!!config('settings.site_email')!!}</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box mt-4">
              <i class="bx bx-phone-call"></i>
              <h3>Telefon</h3>
              <p>{!! config('settings.site_phone') !!}</p>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-6">
        <form action="{{route('frontend.contactsubmit')}}" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="İsim Soyisim" required>
            </div>
            <div class="col form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="E-Mail" required>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Konu" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Mesaj" required></textarea>
          </div>

          <div class="form-group ">
            <label class="form-label" for="customFile">Dosya Yükle </label>
            <input type="file" name="resume_file" class="form-control rounded-3" id="customFile"  accept=".word,.pdf,.jpg,.jpeg,.webp">          
          </div>
          <div class="my-3">
            <div class="loading">Gönderiliyor</div>
            <div class="error-message"></div>
            <div class="sent-message">Mesajınız iletildi. Teşekkür ederiz !</div>
          </div>
          <div class="text-center "><button type="submit">Mesaj Gönder</button></div>
        </form>
      </div>

    </div>

  </div>
</section>
