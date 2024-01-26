<style>
    @media screen and (min-width: 769px) {



        .read-more a {
            display: inline-block;
            background: var(--current-color);
            color: #fff;
            padding: 6px 20px;
            transition: 0.3s;
            font-size: 14px;
            border-radius: 4px;
            visibility: visible;
        }


    }


    @media screen and (max-width: 768px) {
        .read-more a {
            visibility: hidden;
            display: none;
            background: var(--current-color);
            color: #fff;
            padding: 6px 20px;
            transition: 0.3s;
            font-size: 14px;
            border-radius: 4px;
        }
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
                        <a class="nav-link {{ $loop->iteration == 1 ? 'active show' : '' }} rounded-3"
                            data-bs-toggle="tab" data-bs-target="#tab-{{ $loop->iteration }}">
                            <i class="{{ $icons[$loop->iteration] }}"></i>
                            <h4 class="d-none d-lg-block">{{ $data->title }}</h4>
                        </a>
                    </li>
                @endforeach

            </ul>

            <div class="tab-content">
                @foreach ($article as $data)
                    <div class="tab-pane {{ $loop->iteration == 1 ? 'active show' : '' }}"
                        id="tab-{{ $loop->iteration }}">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up"
                                data-aos-delay="100" style="max-height: 200px">
                                <h2>{!! $data->title !!}</h2>
                                <p class="fst-italic">
                                    {!! $data->short_detail !!}
                                </p>
                                <p>
                                    {{ Str::limit(strip_tags($data->detail), 800, '...') }}
                                </p>

                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 " data-aos="fade-up" data-aos-delay="200">
                               <a href="{{ route('frontend.blog_detail', $data->slug) }}">
                                    <img src="{{ $data->image }}" alt="{{ $data->title }}" class="img-fluid">
                                </a>
                                
                            </div>
                            <div class="read-more mt-5 order-3 ">
                                <a class="position-absolute mt-4"
                                    href="{{ route('frontend.blog_detail', $data->slug) }}">Daha fazla oku </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </section>

@endif
