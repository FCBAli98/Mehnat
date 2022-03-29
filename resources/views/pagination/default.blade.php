@if ($paginator->hasPages())
<div class="pagination1">
    <ul>
      @if ($paginator->onFirstPage())
      <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')"><a><i class="icon-duble-arrow-left"></i></a></li>
      @else
      <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="icon-duble-arrow-left"></i></a></li>
      @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><a><span>{{ $page }}</span></a></li>
                    @else
                        <li><a href="{{ $url }}"><span>{{ $page }}</span></a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

      @if ($paginator->hasMorePages())
      <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="icon-duble-arrow-right"></i></a></li>
      @else
      <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')"><a><i class="icon-duble-arrow-right"></i></a></li>
      @endif
    </ul>
</div>
@endif
