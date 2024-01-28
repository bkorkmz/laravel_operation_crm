<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Portfolyo</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">Tümü</li>
                    {{-- @dd($portfolio->groupBy('category')) --}}
                    @foreach ($portfolio->groupBy('category') as $key => $category)
                        @php
                            $keyData = json_decode($key, true);
                            $id = $keyData['id'];
                            $name = $keyData['name'];
                            $slug = $keyData['slug'];
                        @endphp

                        <li data-filter=".filter-{{$slug}}">{{ $name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($portfolio as $img)
                @php
                    $keyData =$img['category'];
                    $cat_id = $keyData->id;
                    $cat_name = $keyData->name;
                    $cat_slug = $keyData->slug;
                @endphp

                <div class="col-lg-4 col-md-6 portfolio-item filter-{{$cat_slug}}">
                  <div class="portfolio-wrap">
                      <img src="{{ $img->image }}" class="img-fluid" alt="{{$cat_slug}}" title="{{$cat_slug}}">
                      <div class="portfolio-info">
                          <h4>{{$img->name}}</h4>
                          <p>{{ $cat_name}}</p>
                          <div class="portfolio-links">
                              <a href="{{ $img->image }}"
                                  data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$img->name}}"><i
                                      class="bx bx-plus"></i></a>
                              <a target="_blank" href="{{$img->link}}" title="Daha Fazla ... "><i class="bx bx-link"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
  
            @endforeach

          

        </div>

    </div>
</section>
