<!--End hero slider-->
<section class="popular-categories section-padding">
    <div class="container wow animate__animated animate__fadeIn">
        <div class="section-title">
            <div class="title">
                <h3>Kategoriler</h3>
            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
        </div>
        <div class="carausel-10-columns-cover position-relative">
            <div class="carausel-10-columns" id="carausel-10-columns">

                @foreach($content['categories'] as  $category)
                    <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href=""><img src="{{asset('frontend/assets/imgs/shop/cat-1.png')}}" alt="" /></a>
                        </figure>
                        <h6><a href="">{{$category->name}}</a></h6>
                        <span>{{$category->get_product_count}} ürün</span>
                    </div>
                @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
