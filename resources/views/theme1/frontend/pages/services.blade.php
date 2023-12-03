<section id="services" class="services section-bg ">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>HİZMETLERİMİZ </h2>
      </div>

      <div class="row">
        @foreach ($services_category as $services)
            <div class="col-md-6">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <!-- <i class="bi bi-briefcase"></i> -->
            <img src="{{$services->image}}" alt="">

            <h4><a href="#">{{$services->name}}</a></h4>
            <p>
             {{$services->description}}</p>
          </div>
        </div>
        @endforeach
        
        {{-- <div class="col-md-6 mt-4 mt-md-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <!-- <i class="bi bi-card-checklist"></i> -->
            <img src="{{asset('frontend/images/services/kreatif-ajans-icon.png')}}" alt="">

            <h4><a href="#">Kreatif Ajans Hizmetleri</a></h4>
            <p>
              Kurumsal Kimlik Tasarımı,Şirket Tanıtım Sunumu, Logo Tasarımı, Katalog ve Broşür Tasarımı, Menü
              Tasarımı, Ambalaj ve Etiket Tasarımı </p>
          </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-bar-chart"></i>
            <h4><a href="#">Marka Danışmanlığı Hizmetleri</a></h4>
            <p>
              Katalog Çekimi, Yemek Fotoğrafçılığı, Ürün Video Çekimi, Ürün Fotoğraf Çekimi, Tanıtım Filmi Çekimi,
              Video Prodüksiyon </p>
          </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-binoculars"></i>
            <h4><a href="#">Prodülsiyon Hizmetleri</a></h4>
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
              laborum</p>
          </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="500">
            <i class="bi bi-brightness-high"></i>
            <h4><a href="#">Magni Dolore</a></h4>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
              deleniti atque</p>
          </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="600">
            <i class="bi bi-calendar4-week"></i>
            <h4><a href="#">Eiusmod Tempor</a></h4>
            <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est
              eligendi</p>
          </div>
        </div>--}}
      </div> 

    </div>
  </section>