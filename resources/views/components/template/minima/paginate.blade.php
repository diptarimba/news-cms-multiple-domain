@props(['news' => null])

@isset($news)
<div class="flex justify-center space-x-2 mt-8 mb-4">
    @if ($news->onFirstPage())
        <button class="bg-gray-200 text-gray-700 py-2 px-4 rounded hover:brightness-90">Previous</button>
    @else
        <a href="{{ $news->previousPageUrl() }}" class="bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-white py-2 px-4 rounded">Previous</a>
    @endif

    @if ($news->lastPage() > 1)
        @if ($news->currentPage() == 1)
            <button class="bg-gray-700 text-white py-2 px-4 rounded hover:brightness-110">1</button>
        @else
            <a href="{{ $news->url(1) }}" class="bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-white py-2 px-4 rounded">1</a>
        @endif

        @if ($news->currentPage() > 3)
            <span class="py-2 px-4">...</span>
        @endif

        @foreach (range(max(2, $news->currentPage() - 1), min($news->lastPage() - 1, $news->currentPage() + 1)) as $page)
            @if ($page == $news->currentPage())
                <button class="bg-gray-700 text-white py-2 px-4 rounded hover:brightness-110">{{ $page }}</button>
            @else
                <a href="{{ $news->url($page) }}" class="bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-white py-2 px-4 rounded">{{ $page }}</a>
            @endif
        @endforeach

        @if ($news->currentPage() < $news->lastPage() - 2)
            <span class="py-2 px-4">...</span>
        @endif
        @if ($news->currentPage() == $news->lastPage())
        <a href="{{ $news->url($news->lastPage()) }}" class="bg-gray-700 text-white py-2 px-4 rounded hover:brightness-90">{{ $news->lastPage() }}</a>
        @else
        <a href="{{ $news->url($news->lastPage()) }}" class="bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-white py-2 px-4 rounded">{{ $news->lastPage() }}</a>
        @endif
    @endif

    @if ($news->hasMorePages())
        <a href="{{ $news->nextPageUrl() }}" class="bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-white py-2 px-4 rounded">Next</a>
    @else
        <button class="bg-gray-200 text-gray-700 py-2 px-4 rounded hover:brightness-90">Next</button>
    @endif
</div>
@endisset
