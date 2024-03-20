<style>
    .max-height{
        max-height: 2rem;
        height: 33px;
    }
    .max-height h6{
        font-size: 14px;
    }

    @media screen and (max-width: 767px) {
        .section-title {
            display: flex!important;
            margin-bottom: 15px;
        }

        .slider-arrow.slider-arrow-2.flex-right {
            display: -webkit-inline-box!important;
            margin-bottom: 14px;
        }
    }

</style>

<section class="popular-categories section-padding">
    <div class="container wow animate__animated animate__fadeIn">
        <div class="section-title">
            <div class="title">
                <h3>Kategoriler </h3>
            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
        </div>
        <div class="carausel-10-columns-cover position-relative">
            <div class="carausel-10-columns" id="carausel-10-columns">
                @foreach($content['categories'] as  $category)

                <div class="card-2 bg-{{$loop->iteration}} wow animate__animated animate__fadeInUp" data-wow-delay=".{{$loop->index}}s">
                    <figure class="img-hover-scale overflow-hidden">
                        <a href="{{ route('frontend.page', $category->slug) }}">
                            <img src="{{asset($category->image ?? 'frontend/assets/imgs/shop/cat-1.png')}}"
                                 title="{{$category->name}}"
                                 alt="{{$category->name}}" />
                        </a>
                    </figure>
                    <div class="my-2 max-height">
                        <h6><a href="{{ route('frontend.page', $category->slug) }}">{{$category->name}}</a></h6>
                    </div>
                    <span>{{$category->get_product_count}} ürün</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
