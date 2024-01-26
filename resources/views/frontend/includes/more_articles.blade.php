{{--@if(!blank($all_article))--}}
@foreach ($all_article as  $article)
    <article class="entry col-md-6 col-sm-12">
        <div class="entry-img">
            <a href="{{route('frontend.blog_detail', $article->slug) }}">
                <img src="{{$article->image}}" alt="{{ $article->title}}" title="{{ $article->title}}" class="img-fluid" >
            </a>
        </div>

        <h2 class="entry-title height123" >
            <a href="{{route('frontend.blog_detail', $article->slug) }}" style="font-size: 1.7rem;">{{Str::limit($article->title,60,'...')}}</a>
        </h2>

        <div class="entry-meta">
            <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                    <a>{{$article->author->name}}</a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a>
                        <time datetime="2020-01-01"></time> {{date_format($article->created_at,('d.m.Y'))}}
                    </a>
                </li>
            </ul>
        </div>

        <div class="entry-content">
            <p>
                {!! Str::limit(strip_tags($article->detail),100,'...') !!}
            </p>
            <div class="read-more">
                <a href="{{route('frontend.blog_detail', $article->slug) }}">Daha fazla </a>
            </div>
        </div>

    </article><!-- End blog entry -->


@endforeach



{{--@else--}}
{{--    <article class="entry  col-sm-12 mt-4 text-center">--}}
{{--        <h4 class="entry-title " >--}}
{{--            İçerik Bulunamadı ! <br> Sayfayı yenilemek için  --}}
{{--            <a href="{{route('frontend.blog') }}" style="font-size: 1.4rem;"> <span class="text-danger">buraya</span>  </a>tıklayın--}}
{{--        </h4>--}}
{{--    </article>--}}
{{--@endif--}}

