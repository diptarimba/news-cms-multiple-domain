@props(['category' => 'General', 'title' => '', 'date' => '', 'content' => '', 'url' => ''])
<div class="bg-white shadow p-6 mb-6">
    <span class="text-yellow-600 font-bold">{{$category}}</span>
    <h2 class="text-2xl font-bold mt-2">{{$title}}</h2>
    <p class="text-gray-600 mt-2">{{$date}} by Author</p>
    <p class="mt-4">{{strlen($content) >= 200 ? substr($content, 0, 200) . ' [...]' : $content}}</p>
    <a href="{{$url}}"><button class="mt-4 bg-yellow-600 text-white py-2 px-4 rounded">Discover</button></a>
</div>
