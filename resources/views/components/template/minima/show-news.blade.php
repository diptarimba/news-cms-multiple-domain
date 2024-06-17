@props(['category' => 'General', 'title' => '', 'date' => ''])
<article class="bg-white p-6 rounded-lg shadow-sm mb-8">
    <h2 class="text-2xl font-bold mb-2">
        {{$title}}
    </h2>
    <div class="flex items-center text-sm text-gray-500 mb-4">
     <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded-full mr-2">
      {{$category}}
     </span>
     <span>
      | {{$date}}
     </span>
    </div>
    <div class="overflow-x-auto">
        {!! $content !!}
    </div>
    <div class="flex items-center space-x-2">
     <span class="text-gray-500">
      Share
     </span>
     <a class="text-gray-500" href="#">
      <i class="fab fa-facebook">
      </i>
     </a>
     <a class="text-gray-500" href="#">
      <i class="fab fa-twitter">
      </i>
     </a>
     <a class="text-gray-500" href="#">
      <i class="fab fa-pinterest">
      </i>
     </a>
    </div>
   </article>
