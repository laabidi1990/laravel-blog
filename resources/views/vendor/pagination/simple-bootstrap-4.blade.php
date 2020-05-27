
@if ($paginator->hasPages())

    @if ($paginator->onFirstPage())
        <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
    @else
        <a class="btn btn-white" href="{{ $paginator->previousPageUrl() }}"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
    @endif

    @if ($paginator->hasMorePages())
        <a class="btn btn-white" href="{{ $paginator->nextPageUrl() }}">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
    @else
        <a class="btn btn-white diabled">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
    @endif

@endif
