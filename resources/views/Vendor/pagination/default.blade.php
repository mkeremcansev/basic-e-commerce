<div class="pagination__wrapper">
            @if ($paginator->hasPages())
                    <ul class="pagination">
                        @if ($paginator->onFirstPage())
                            <li class="disabled prev"><span>@lang('pagination.previous')</span></li>
                        @else
                            <li><a style="color: black;" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
                        @endif
                        @foreach ($elements as $element)
                            @if (is_string($element))
                                <li class="disabled"><span>{{ $element }}</span></li>
                            @endif
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li style="background-color: #004dda; border-radius: 50%;" class="active"><span style="color: white; font-weight:bold;">{{ $page }}</span></li>
                                    @else
                                        <li><a style="color: black;" href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        @if ($paginator->hasMorePages())
                            <li><a style="color: black;" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
                        @else
                            <li class="disabled next"><span>@lang('pagination.next')</span></li>
                        @endif
                    </ul>
            @endif
</div>