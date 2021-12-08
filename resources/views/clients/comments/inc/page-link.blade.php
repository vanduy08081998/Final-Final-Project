@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination d-flex justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled move-top" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </span>
                </li>
            @else
                <li class="page-item move-top">
                    <button type="button" class="page-link" wire:click="previousPage" rel="prev"
                        aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </button>
                </li>
            @endif
            <!-- Number-->
            @foreach ($elements as $element)
                {{-- <li class="page-item"><button class="page-link" href="#">1</button></li> --}}
                @if (is_string($element))
                    <li class="page-item disabled d-none d-md-block move-top" aria-disabled="true"><span
                            class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active d-none d-md-block move-top" aria-current="page"><span
                                    class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item d-none d-md-block move-top"><button type="button"
                                    class="page-link"
                                    wire:click="gotoPage({{ $page }})">{{ $page }}</button></li>
                        @endif
                    @endforeach
                @endif
            @endforeach



            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item move-top">
                    <button type="button" class="page-link" wire:click="nextPage" rel="next"
                        aria-label="@lang('pagination.next')">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </button>
                </li>
            @else
                <li class="page-item disabled move-top" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">
                        {{-- <span class="d-block d-md-none">@lang('pagination.next')</span>
                        <span class="d-none d-md-block">&rsaquo;</span> --}}
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
