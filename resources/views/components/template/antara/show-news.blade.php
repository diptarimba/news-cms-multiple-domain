@props(['category' => 'General', 'title' => '', 'date' => ''])
<article class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold mb-4">
        {{$title}}
    </h1>
    <div class="flex items-center space-x-4 mb-4">
        <span class="text-gray-600">
            By Admin
        </span>
        <span class="text-gray-600">
            {{$category}}
        </span>
        <span class="text-gray-600">
            {{$date}}
        </span>
    </div>
    <div class="overflow-x-auto">
        {!! $content !!}
    </div>
</article>
