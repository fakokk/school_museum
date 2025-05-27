@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

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

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>


<style>
    .pagination {
    margin: 20px 0; /* Отступы вокруг пагинации */
}

.pagination .page-item .page-link {
    color: rgb(53, 73, 106); /* Цвет текста для ссылок */
    background-color: transparent; /* Фон для ссылок */
    border: 1px solid rgb(53, 73, 106); /* Цвет границы */
}

.pagination .page-item.active .page-link {
    color: white; /* Цвет текста для активной страницы */
    background-color: rgb(53, 73, 106); /* Фон для активной страницы */
    border-color: rgb(53, 73, 106); /* Цвет границы для активной страницы */
}

.pagination .page-item.disabled .page-link {
    color: #6c757d; /* Цвет текста для отключенных ссылок */
    background-color: transparent; /* Фон для отключенных ссылок */
    border-color: #dee2e6; /* Цвет границы для отключенных ссылок */
}

.pagination .page-link:hover {
    color: white; /* Цвет текста при наведении */
    background-color:rgb(157, 187, 219); /* Фон при наведении */
    border-color: #0056b3; /* Цвет границы при наведении */
}
</style>
@endif
