<style>
.read-more a {
    display: inline-block;
    background: var(--current-color);
    color: #fff;
    padding: 6px 20px;
    transition: 0.3s;
    font-size: 14px;
    border-radius: 4px;
}
</style>


@if (!blank($article))
    <section id="tabs" class="tabs">
        <div class="container" data-aos="fade-up">

            <ul class="nav nav-tabs row d-flex">
                @php
                    $icons = ['ri-gps-line', 'ri-body-scan-line', 'ri-sun-line', 'ri-store-line', 'ri-wireless-charging-fill', 'ri-24-hours-line', 'ri-align-right'];
                @endphp
                @foreach ($article as $data)
                    <li class="nav-item col-3">
                        <a  class="nav-link {{ $loop->iteration == 1 ? 'active show' : '' }} rounded-3"
                            data-bs-toggle="tab" data-bs-target="#tab-{{ $loop->iteration }}">
                            <i class="{{ $icons[$loop->iteration] }}"></i>
                            <h4 class="d-none d-lg-block">{{ $data->title }}</h4>
                        </a>
                    </li>
                @endforeach
                {{-- <li class="nav-item col-3">
          <a class="nav-link active show rounded-3" data-bs-toggle="tab" data-bs-target="#tab-1">
            <i class="ri-gps-line"></i>
            <h4 class="d-none d-lg-block">Modi sit est dela pireda nest</h4>
          </a>
        </li>
        <li class="nav-item col-3">
          <a class="nav-link rounded-3" data-bs-toggle="tab" data-bs-target="#tab-2">
            <i class="ri-body-scan-line"></i>
            <h4 class="d-none d-lg-block">Unde praesenti mara setra le</h4>
          </a>
        </li>
        <li class="nav-item col-3">
          <a class="nav-link rounded-3" data-bs-toggle="tab" data-bs-target="#tab-3">
            <i class="ri-sun-line"></i>
            <h4 class="d-none d-lg-block">Pariatur explica nitro dela</h4>
          </a>
        </li>
        <li class="nav-item col-3">
          <a class="nav-link rounded-3" data-bs-toggle="tab" data-bs-target="#tab-4">
            <i class="ri-store-line"></i>
            <h4 class="d-none d-lg-block">Nostrum qui dile node</h4>
          </a>
        </li> --}}
            </ul>

            <div class="tab-content">
                @foreach ($article as $data)
                    <div class="tab-pane {{ $loop->iteration == 1 ? 'active show' : '' }}"
                        id="tab-{{ $loop->iteration }}">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up"
                                data-aos-delay="100" style="max-height: 200px">
                                <h1>{!! $data->title !!}</h1>
                                <p class="fst-italic">
                                    {!! $data->short_detail !!}
                                </p>
                                {!! $data->detail !!}
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up"
                                data-aos-delay="200">
                                <img src="{{ $data->image }}" alt="" class="img-fluid">
                            
                            </div>
                            <div class="read-more mt-5 order-3">
                              <a class="position-absolute mt-4" href="{{route('frontend.blog_detail', $data->slug) }}">Daha fazla oku </a>
                            </div>
                            
                            
                            
                        </div>

                   
                    </div>
              

                @endforeach
                <div class="tab-pane" id="tab-2">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>Neque exercitationem debitis soluta quos debitis quo mollitia officia est</h3>
                            <p>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in
                                voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident,
                                sunt in
                                culpa qui officia deserunt mollit anim id est laborum
                            </p>
                            <p class="fst-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et
                                dolore
                                magna aliqua.
                            </p>
                            <ul>
                                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</li>
                                <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in
                                    voluptate
                                    velit.
                                </li>
                                <li><i class="ri-check-double-line"></i> Provident mollitia neque rerum asperiores
                                    dolores
                                    quos qui a.
                                    Ipsum neque dolor voluptate nisi sed.</li>
                                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis
                                    aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore
                                    eu
                                    fugiat nulla
                                    pariatur.</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ asset('frontend/img/tabs-2.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                {{-- <div class="tab-pane" id="tab-3">
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
              <h3>Voluptatibus commodi ut accusamus ea repudiandae ut autem dolor ut assumenda</h3>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                sunt in
                culpa qui officia deserunt mollit anim id est laborum
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit.
                </li>
                <li><i class="ri-check-double-line"></i> Provident mollitia neque rerum asperiores dolores quos qui a.
                  Ipsum neque dolor voluptate nisi sed.</li>
              </ul>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore
                magna aliqua.
              </p>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="{{asset('frontend/img/tabs-3.jpg')}}" alt="" class="img-fluid">
            </div>
          </div>
        </div> --}}
                {{-- <div class="tab-pane" id="tab-4">
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
              <h3>Omnis fugiat ea explicabo sunt dolorum asperiores sequi inventore rerum</h3>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                sunt in
                culpa qui officia deserunt mollit anim id est laborum
              </p>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit.
                </li>
                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                  aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla
                  pariatur.</li>
              </ul>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="{{asset('frontend/img/tabs-4.jpg')}}" alt="" class="img-fluid">
            </div>
          </div>
        </div>  --}}
            </div>

        </div>
    </section>

@endif
