@props(['news' => null])

@isset($news)
<div class="mt-6 flex justify-center">
    <nav class="inline-flex rounded-md shadow pagination">
        @if ($news->onFirstPage())
            <button class="px-4 py-2 border border-gray-300 text-red-700 bg-white hover:bg-red-400" disabled>
                Previous
            </button>
        @else
            <a class="px-4 py-2 border border-gray-300 text-red-700 bg-white hover:bg-red-400" href="{{ $news->previousPageUrl() }}">
                Previous
            </a>
        @endif

        @foreach (range(1, $news->lastPage()) as $page)
            @if ($page == $news->currentPage())
                <button class="px-4 py-2 border-t border-b border-gray-300 text-red-700 bg-white hover:bg-red-400" disabled>
                    {{ $page }}
                </button>
            @elseif ($page <= 3 || $page >= $news->lastPage() - 2 || ($news->currentPage() - 2 <= $page && $page <= $news->currentPage() + 2))
                <a class="px-4 py-2 border-t border-b border-gray-300 text-red-700 bg-white hover:bg-red-400" href="{{ $news->url($page) }}">
                    {{ $page }}
                </a>
            @elseif ($page == 4 || $page == $news->lastPage() - 3)
                <span class="px-4 py-2 border-t border-b border-gray-300 text-gray-700 bg-white">
                    ...
                </span>
            @endif
        @endforeach

        @if ($news->hasMorePages())
            <a class="px-4 py-2 border border-gray-300 text-red-700 bg-white hover:bg-red-400" href="{{ $news->nextPageUrl() }}">
                Next
            </a>
        @else
            <button class="px-4 py-2 border border-gray-300 text-red-700 bg-white hover:bg-red-400" disabled>
                Next
            </button>
        @endif
    </nav>
</div>
@endisset


