@php
    $bestSalesProduct = !blank($contents['bestSalesProduct']) ? $contents['bestSalesProduct'] : [];
    $treeSliders   = !blank($bestSalesProduct['treeSlider']) ? $bestSalesProduct['treeSlider'] : [];
@endphp
@if(!blank($treeSliders))
    <section class="banners mb-25">
        <div class="container">
            <div class="row">
                @foreach($treeSliders as $slider)
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{$slider->link ?? 'javascript:void(0)'}}" class="btn btn-xs p-0">
                                <img src="{{asset($slider->image)}}" alt="{{$slider->name}}" title="{{$slider->name}}"/>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endif

