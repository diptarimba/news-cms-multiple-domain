@props(['title' => '', 'category' => ''])
<div class="carousel-item bg-gray-200 p-6 rounded-lg flex flex-col justify-center items-center">
    <span class="bg-blue-600 text-white px-2 py-1 rounded mb-4">{{$category}}</span>
    <h2 class="text-xl font-bold text-center">{{$title}}</h2>
</div>
