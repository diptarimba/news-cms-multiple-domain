@props(['image' => '', 'title' => '', 'url' => ''])
<article class="flex flex-col">
    <a href="{{$url}}"><img alt="Image related to the article" class="w-full h-48 object-cover"
        height="200"
        src="{{$image}}"
        width="300" />
    <h2 class="text-lg font-bold mt-4">
        {{$title}}
    </h2>
    <p class="text-gray-600">
        By Author - 5 minutes read
    </p></a>
</article>
