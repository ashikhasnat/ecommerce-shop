@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center">
    <div class="flex justify-between flex-1 sm:hidden">
        @if ($paginator->onFirstPage())
        <span
            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
            {!! __('pagination.previous') !!}
        </span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}"
            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
            {!! __('pagination.previous') !!}
        </a>
        @endif

        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"
            class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
            {!! __('pagination.next') !!}
        </a>
        @else
        <span
            class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
            {!! __('pagination.next') !!}
        </span>
        @endif
    </div>

    <div class="flex items-center justify-between">
        <div>
            <span class="relative z-0 inline-flex rounded-md">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    class="relative inline-flex items-center border px-2 py-2 text-sm font-medium bg-white leading-5 hover:opacity-75 focus:z-10 focus:outline-none hover:bg-teal-400 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 mr-2 hover:text-white"
                    aria-label="{{ __('pagination.previous') }}">
                    <i class="fas fa-long-arrow-alt-left text-lg"></i>
                </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <span aria-disabled="true">
                    <span
                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <span aria-current="page">
                    <span
                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium mx-2 text-gray-100 bg-teal-400 border border-gray-300 cursor-default leading-5">{{ $page }}</span>
                </span>
                @else
                <a href="{{ $url }}"
                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium mx-2 text-gray-700 hover:bg-teal-400 border border-gray-300 leading-5 hover:text-gray-100 focus:z-10 focus:outline-none  active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                    {{ $page }}
                </a>
                @endif
                @endforeach
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                    class="relative border inline-flex items-center px-2 py-2 -ml-px text-sm font-medium bg-white leading-5 hover:opacity-75 focus:z-10 hover:bg-teal-400 focus:outline-none active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 hover:text-white"
                    aria-label="{{ __('pagination.next') }}">
                    <i class="fas fa-long-arrow-alt-right text-lg"></i>
                </a>
                @endif
            </span>
        </div>
    </div>
</nav>
@endif