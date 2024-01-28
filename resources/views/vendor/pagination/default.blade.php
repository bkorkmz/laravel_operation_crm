


@if ($paginator->hasPages())

    <div class="main__pagination__wrapper" data-aos="fade-up">
        <ul class="main__page__pagination">
            @if ($paginator->onFirstPage())
                <li><a class="disable" href="#" @lang('pagination.previous')>
                        <i class="icofont-double-left"></i></a></li>
            @else          
                <li><a class="" href="{{ $paginator->previousPageUrl() }}"@lang('pagination.previous')>
                        <i class="icofont-double-left"></i></a></li>
            @endif
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                    @endif
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active" aria-current="page">{{ $page }}</li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                            <i class="icofont-double-right"></i></a></li>
                @else
                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')"><i class="icofont-double-right"></i></li>
                @endif
        </ul>
    </div>
    @endif
