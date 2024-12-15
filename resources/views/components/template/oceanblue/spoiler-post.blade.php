@props(['category' => 'General', 'title' => '', 'date' => '', 'content' => '', 'url' => '', 'author' => ''])
<article class="bg-white p-6 rounded-lg shadow mb-6 relative">
    <span class="bg-blue-600 text-white px-2 py-1 rounded mb-4 inline-block">
        {{$category}}
    </span>
    <h2 class="text-xl font-bold mb-4">
        {{$title}}
    </h2>
    <p class="text-gray-600 mb-4">
        {{$content}}
    </p>
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <img alt="Author" class="h-10 w-10 rounded-full" height="40"
                src="{{asset('assets-dashboard/images/placeholder.png')}}"
                width="40" />
            <span class="ml-2 text-gray-600">
                Author
            </span>
        </div>
        <span class="text-gray-600">
            {{$date}}
        </span>
    </div>
    <a class="read-more-btn absolute top-6 right-6 text-blue-600 hover:bg-blue-600" href="{{$url}}">
        Read More
    </a>
</article>
