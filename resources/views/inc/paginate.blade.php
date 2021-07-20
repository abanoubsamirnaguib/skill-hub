@if ($paginator->hasPages() )
<div class="col-md-12">
    <div class="post-pagination">
        @if ($paginator->onFirstPage())
        <span class="pagination-back pull-left">Back</span>
        @else
        <a href="{{ $paginator->previousPageUrl()}}" class="pagination-back pull-left">Back</a>
        @endif
        <ul class="pages">
                        {{--    <li class="active">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li> --}}
               {{-- Pagination Elements --}}
               @foreach ($elements as $element)
               {{-- "Three Dots" Separator --}}
               @if (is_string($element))
                   <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
               @endif

               {{-- Array Of Links --}}
               @if (is_array($element))
                   @foreach ($element as $page => $url)
                       @if ($page == $paginator->currentPage())
                           <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                       @else
                           <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                       @endif
                   @endforeach
               @endif
           @endforeach
        </ul>
        @if ($paginator->hasMorePages())
        <a href="{{$paginator->nextPageUrl() }}" class="pagination-next pull-right">Next</a>
        @else
        <span class="pagination-next pull-right disabled">Next</span>
        @endif
    </div>
</div>
@endif