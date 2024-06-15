@props(['category' => 'General', 'title' => '', 'date' => ''])
<div class="bg-white shadow p-6 mb-6 content">
    <span class="text-yellow-600 font-bold">{{$category}}</span>
    <h2 class="text-2xl font-bold mt-2">{{$title}}</h2>
    <p class="text-gray-600 mt-2">{{$date}} by Author</p>
    <div class="overflow-x-auto">
        {!! $content !!}
    </div>
</div>
