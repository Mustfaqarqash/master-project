<!-- resources/views/vendor/pagination/custom.blade.php -->

@if ($paginator->hasPages())
    <div class="u-s-p-y-60">
        <!--====== Pagination ======-->
        <ul class="shop-p__pagination">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"><span>1</span></li>
            @else
                <li>
                    <a class="fas fa-angle-left" href="{{ $paginator->previousPageUrl() }}" rel="prev"></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="is-active"><a>{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="fas fa-angle-right" href="{{ $paginator->nextPageUrl() }}" rel="next"></a>
                </li>
            @else
                <li class="disabled"><span><a class="fas fa-angle-right"></a></span></li>
            @endif

        </ul>
        <!--====== End - Pagination ======-->
    </div>
@endif
