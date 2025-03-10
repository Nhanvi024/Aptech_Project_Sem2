<div class="row mt-3">
    <div class="col-12 d-flex justify-content-center">
        <ul class="pagination">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/chevron-left -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                            <path d="M15 6l-6 6l6 6" />
                        </svg>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                            <path d="M15 6l-6 6l6 6" />
                        </svg>
                    </a>
                </li>
            @endif

            {{-- List page --}}
            @foreach ($paginator->links()->elements[0] as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                @else
                    <li class="page-item"><a class="page-link"
                            href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endif
            @endforeach

            {{--  Next --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </span>
                </li>
            @endif
        </ul>
    </div>
</div>