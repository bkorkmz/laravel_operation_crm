<!-- grid__section__start -->

<style>
    .gridarea__img img {
        width: 100%;
        border-radius: var(--borderRadius);
        height: 220px;
    }
</style>
<div class="gridarea" id="blog">
    <div class="container">
        <div class="row">
            <div class="section__title text-center" data-aos="fade-up">
{{--                <div class="section__title__button">--}}
{{--                    <div class="default__small__button">Course List</div>--}}
{{--                </div>--}}
                <div class="section__title__heading heading__underline">
                    <h2> <span>Blog</span>   Yazılarımız  </h2>
                </div>
            </div>
        </div>
        
        <div class="row" data-aos="fade-up">
            <div class="col-xl-12">
                <div class="gridfilter_nav grid__filter gridFilter">
                    <button class="active" data-filter="*">Tümü</button>
                    @foreach($article->groupby('category_id')->toarray() as $category)
                        <button data-filter=".{{$category[0]['category']['id']}}" class="">{{$category[0]['category']['name']}}</button>
                    @endforeach
                    <a href="{{route('frontend.blog')}}">Tüm Yazılara Git</a>
                </div>
            </div>
        </div>



        <div class="row grid" data-aos="fade-up">
            @foreach($article as $content)
               <div class="col-xl-4 col-lg-4 col-sm-6 grid-item {{$content->category_id}}">
                <div class="gridarea__wraper">
                    <div class="gridarea__img">
                        <a href="{{route('frontend.blog_detail',$content->slug)}}"><img src="{{$content->image }}" alt="grid" width="200" height=""></a>
                        <div class="gridarea__small__button">
                            <div class="grid__badge">{{$content['category']->name}}</div>
                        </div>
                    </div>
                    <div class="gridarea__content">

                        <div class="gridarea__heading">
                            <h3><a href="{{route('frontend.blog_detail',$content->slug)}}">
                                    {{$content->title}}
                                </a></h3>
                        </div>
                        <div class="gridarea__bottom">
                            <div class="gridarea__bottom__left">
                                <a href="{{route('frontend.blog_detail',$content->slug)}}">
                                  
                                    <div class="gridarea__small__img">
                                        <img src="{{ $content['author']->avatar ?? 'images/default-avatar.png'}} " alt="grid">
                                        <div class="gridarea__small__content">
                                            <h6> {{$content['author']->name}}</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="gridarea__details">
                                <a href="{{route('frontend.blog_detail',$content->slug)}}">İncele
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
<!-- grid__section__end -->