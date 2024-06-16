@props(['category' => 'General', 'title' => '', 'date' => ''])
<article class="mb-8">
    <h1 class="text-3xl font-bold mb-4">{{$title}}</h1>
    <div class="flex items-center text-gray-500 mb-4">
        <span>{{$category}}</span>
        <span class="mx-2">•</span>
        <span>{{$date}}</span>
    </div>
    <div class="overflow-x-auto">
        {!! $content !!}
    </div>
</article>
