@props(['category' => 'General', 'title' => '', 'date' => '', 'image' => ''])
<article class="bg-white p-6 rounded-lg shadow mb-6">
    <span class="bg-blue-600 text-white px-2 py-1 rounded mb-2 inline-block">
     {{$category}}
    </span>
    <h2 class="text-3xl font-bold mb-4">
     {{$title}}
    </h2>
    <div class="flex justify-between items-center mb-4">
     <div class="flex items-center">
      <img alt="Admin" class="rounded-full mr-2" height="40" src="{{$image}}" width="40"/>
      <span class="text-gray-600">
       Author
      </span>
     </div>
     <span class="text-gray-600">
      {{$date}}
     </span>
    </div>
    <div class="overflow-x-auto">
        {!! $content !!}
    </div>
   </article>
