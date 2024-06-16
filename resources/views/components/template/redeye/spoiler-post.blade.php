@props(['category' => '', 'title' => '', 'date' => '', 'content' => '', 'url' => '', 'image' => ''])
<div class="flex flex-col md:flex-row">
    <img alt="Kini Bisa Live Streaming di Dunia Games, Dapat Cuan dari Gifting!" class="w-full md:w-24 h-24 object-cover"
        height="100"
        src="{{$image}}"
        width="100" />
    <a href="{{ $url }}"><div class="ml-0 md:ml-4 mt-4 md:mt-0">
        <h3 class="font-bold">
            {{ $title }}
        </h3>
        <p class="text-gray-600">
            {{ $content }}
        </p>
        <div class="flex items-center text-gray-500 mt-2">
            <span>
                {{ $category }}
            </span>
            <span class="mx-2">
                •
            </span>
            <span>
                {{ $date }}
            </span>
        </div>
    </div></a>
</div>
