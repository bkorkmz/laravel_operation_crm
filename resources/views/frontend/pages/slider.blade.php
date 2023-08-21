<section id="clients" class="clients">
    <div class="container" data-aos="zoom-in">

      <div class="clients-slider swiper">
        <div class="swiper-wrapper align-items-center">
            @foreach ($slider as $slide)
            <div class="swiper-slide"><img src="{{$slide->image}}" class="img-fluid" alt="{{$slide->name}}"></div>

            @endforeach
{{-- 
          <div class="swiper-slide"><img src="/frontend/img/clients/refereans (1).jpg" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="{{asset('frontend/img/clients/refereans (2).jpg')}}" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="{{asset('frontend/img/clients/refereans (3).jpg')}}" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="{{asset('frontend/img/clients/refereans (4).jpg')}}" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="{{asset('frontend/img/clients/client-5.png')}}" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="{{asset('frontend/img/clients/client-6.png')}}" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="{{asset('frontend/img/clients/client-7.png')}}" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="{{asset('frontend/img/clients/client-8.png')}}" class="img-fluid" alt=""></div> --}}
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>

  </section>