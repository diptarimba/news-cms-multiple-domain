@props(['category' => 'General', 'title' => '', 'date' => '', 'content' => '', 'url' => '', 'image' => ''])
<div class="flex">
    <a href="{{$url}}"><img alt="Main news image" class="w-1/3 h-auto object-cover" height="100"
        src="{{$image}}"
        width="300" />
    <div class="w-2/3 bg-white p-4">
        <h2 class="text-xl font-bold">
            {{$title}}
        </h2>
        <p class="text-sm mt-2">
            {{$content}}
        </p>
    </div></a>
</div>
