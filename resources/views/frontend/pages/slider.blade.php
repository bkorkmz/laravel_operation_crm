<style>
  .swiper-slide {
    width: 263px!important;
}
</style>

<section id="clients" class="clients">
    <div class="container" data-aos="zoom-in">

      <div class="clients-slider swiper">
        <div class="swiper-wrapper align-items-center">
          @foreach ($slider as $slide)
          <div class="swiper-slide"><img src="{{$slide->image}}" class="img-fluid" alt="{{$slide->name}}" title="{{$slide->name}}"></div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Clients Section -->
