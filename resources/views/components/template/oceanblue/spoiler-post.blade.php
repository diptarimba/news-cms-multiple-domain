@props(['category' => 'General', 'title' => '', 'date' => '', 'content' => '', 'url' => ''])
<article class="bg-white p-6 rounded-lg shadow mb-6 relative">
    <span class="bg-blue-600 text-white px-2 py-1 rounded mb-4 inline-block">
        {{$category}}
    </span>
    <h2 class="text-xl font-bold mb-4">
        {{$title}}
    </h2>
    <p class="text-gray-600 mb-4">
        {{$content}}
    </p>
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <img alt="Author" class="h-10 w-10 rounded-full" height="40"
                src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-EpAov7aTUy4BCYmD6GKTjpvO/user-JR3sZQpahJls32fj7ZDxreYz/img-h2l0T443LS44Ibf5gKVBcSY4.png?st=2024-06-15T19%3A10%3A33Z&amp;se=2024-06-15T21%3A10%3A33Z&amp;sp=r&amp;sv=2023-11-03&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=6aaadede-4fb3-4698-a8f6-684d7786b067&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-06-15T19%3A24%3A31Z&amp;ske=2024-06-16T19%3A24%3A31Z&amp;sks=b&amp;skv=2023-11-03&amp;sig=LB4CiXccE/pzNhD0cZQYbmTcB675hzEmN/IAdlSZUxI%3D"
                width="40" />
            <span class="ml-2 text-gray-600">
                Author
            </span>
        </div>
        <span class="text-gray-600">
            {{$date}}
        </span>
    </div>
    <a class="read-more-btn absolute top-6 right-6 text-blue-600 hover:bg-blue-600" href="{{$url}}">
        Read More
    </a>
</article>
