@props(['news' => null])

@isset($news)
<div class="flex justify-center mt-8">
    <nav class="inline-flex rounded-md shadow space-x-2 overflow-x-auto">
        @if ($news->onFirstPage())
            <button class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50"
                disabled>
                Previous
            </button>
        @else
            <a class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50"
                href="{{ $news->previousPageUrl() }}">
                Previous
            </a>
        @endif

        @if ($news->lastPage() > 1)
            @if ($news->currentPage() == 1)
                <button class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50"
                    disabled>
                    1
                </button>
            @else
                <a class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50"
                    href="{{ $news->url(1) }}">
                    1
                </a>
            @endif

            @if ($news->currentPage() > 3)
                <span class="px-4 py-2 border border-gray-300 text-gray-700 bg-white">
                    ...
                </span>
            @endif

            @foreach (range(max(2, $news->currentPage() - 1), min($news->lastPage() - 1, $news->currentPage() + 1)) as $page)
                @if ($page == $news->currentPage())
                    <button class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50"
                        disabled>
                        {{ $page }}
                    </button>
                @else
                    <a class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50"
                        href="{{ $news->url($page) }}">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            @if ($news->currentPage() < $news->lastPage() - 2)
                <span class="px-4 py-2 border border-gray-300 text-gray-700 bg-white">
                    ...
                </span>
            @endif
            @if ($news->currentPage() == $news->lastPage())
                <button class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50"
                    disabled>
                    {{ $news->lastPage() }}
                </button>
            @else
                <a class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50"
                    href="{{ $news->url($news->lastPage()) }}">
                    {{ $news->lastPage() }}
                </a>
            @endif
        @endif

        @if ($news->hasMorePages())
            <a class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50"
                href="{{ $news->nextPageUrl() }}">
                Next
            </a>
        @else
            <button class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50"
                disabled>
                Next
            </button>
        @endif
    </nav>
</div>
@endisset

