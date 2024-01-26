<section id="services" class="services section-bg ">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>HİZMETLERİMİZ </h2>
      </div>

      <div class="row">
{{--          @dd($services_category)--}}
        @foreach ($services_category as $services)
            <div class="col-md-6">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <!-- <i class="bi bi-briefcase"></i> -->
            <img src="{{$services->image}}" alt="{{$services->name}}" title="{{$services->name}}">

            <h4><a href="#">{{$services->name}}</a></h4>
            <p>
             {{$services->description}}</p>
          </div>
        </div>
        @endforeach
        
       
      </div> 

    </div>
  </section>