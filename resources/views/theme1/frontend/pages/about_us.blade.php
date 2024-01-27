@php
    $page = json_decode($data->section_content);
    $data = $data;
@endphp
@if ($data->status == 1)
    <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">

            <div class="row no-gutters">
                <div class="content col-xl-5 d-flex align-items-stretch">
                    <div class="content">

                        <h3>{{ $page->header_1 }} </h3>

                        <p>{{ $page->header_2 }} </p>

                        <a href="{{ $page->button_text ?? '' }}"
                            class="about-btn btn btn-dark {{ $page->button_text == "" ? 'd-none' : '' }}"><span>{{ $page->button_text }}</span> <i
                                class="bx bx-chevron-right"></i></a>

                    </div>
                </div>
                <div class="col-xl-7 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                <!-- <i class="bx bx-receipt"></i> -->
                                <img src="{{ $page->logo_1 ?? '' }}" alt="{{ $page->service_2_title }}">

                                <h4>{{ $page->service_1_title }}
                                </h4>

                                <p>{{ $page->service_1_description }}</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                <!-- <i class="bx bx-cube-alt"></i> -->
                                <img src="{{ $page->logo_2 ?? '' }}" alt="{{ $page->service_2_title }}">



                                <h4>{{ $page->service_2_title }} </h4>

                                <p>{{ $page->service_2_description }}</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                <!-- <i class="bx bx-images"></i> -->
                                <img src="{{ $page->logo_3 ?? '' }}" alt="{{ $page->service_3_title }}">

                                <h4>{{ $page->service_3_title }}
                                </h4>

                                <p>{{ $page->service_3_description }}</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                                <!-- <i class="bx bx-shield"></i> -->
                                <img src="{{ $page->logo_4 ?? '' }}" alt="{{ $page->service_4_title }}">

                                <h4>{{ $page->service_4_title }} </h4>

                                <p>{{ $page->service_4_description }}</p>
                            </div>
                        </div>
                    </div><!-- End .content-->
                </div>
            </div>

        </div>
    </section>
@endif
