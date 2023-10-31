<!-- .about__tap__section__end -->
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
    .gridarea__content .gridarea__heading{
        height: 80px;
    }
</style>

@if($newsList)
    <div class="gridarea__2 sp_bottom_100" data-aos="fade-up" id="news_content">
        <div class="container-fluid container">
            <div class="section__title">
                <div class="section__title__heading text-center">
                    <h2>Mezuat Haberleri</h2>
                </div>
            </div>
            <div class="row row__custom__class"  >
                @foreach($newsList as $news)

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item ">
                        <div class="gridarea__wraper">
                            <div class="gridarea__img">
                                <a href="{{route('frontend.post_detail',$news['Id'])}}"><img src="{{$news['Resim']}}" alt="grid"></a>
                                <div class="gridarea__small__button gridarea__small__button__1">
                                    <div class="grid__badge">{{$news['Konu']}}</div>
                                </div>
                            </div>
                            <div class="gridarea__content">
                                <div class="gridarea__heading">
                                    <h3><a href="{{route('frontend.post_detail',$news['Id'])}}">{{\Illuminate\Support\Str::limit($news['Baslik'],70,"...")}}</a></h3>
                                </div>
                                <div class="gridarea__bottom">
                                    <div class="gridarea__bottom__left">
                                        <a href="">
                                            <div class="gridarea__small__img">
                                                <div class="gridarea__small__content">
                                                    <h6> {{date("Y-m-d", strtotime($news['DegisiklikTarihiString']))}}</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="gridarea__details">
                                        <a href="{{route('frontend.post_detail',$news['Id'])}}">İncele
                                            <i class="icofont-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>


@endif
