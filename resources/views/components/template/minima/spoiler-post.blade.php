@props(['category' => 'General', 'title' => '', 'date' => '', 'content' => '', 'url' => '', 'author' => '', 'image' => ''])
<article class="flex flex-col md:flex-row items-start">
    <img alt="Image related to the article" class="w-full md:w-1/3 h-48 object-cover"
        height="200"
        src="{{$image}}"
        width="300" />
    <div class="md:ml-8 mt-4 md:mt-0">
        <span class="text-sm text-gray-500 uppercase font-bold">
            {{$category}}
        </span>
        <h2 class="text-xl font-bold">
            {{$title}}
        </h2>
        <p class="text-gray-600">
            {{$content}}
        </p>
        <a class="inline-block mt-2 text-white bg-gray-800 hover:bg-white hover:text-black hover:outline hover:outline-black px-4 py-2 rounded"
            href="{{$url}}">
            Read more
        </a>
    </div>
</article>
