@props(['category' => 'General', 'title' => '', 'date' => ''])
<article class="bg-white p-6 rounded-lg shadow mb-6">
    <span class="bg-blue-600 text-white px-2 py-1 rounded mb-2 inline-block">
     {{$category}}
    </span>
    <h2 class="text-3xl font-bold mb-4">
     {{$title}}
    </h2>
    <div class="flex justify-between items-center mb-4">
     <div class="flex items-center">
      <img alt="Admin" class="rounded-full mr-2" height="40" src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-EpAov7aTUy4BCYmD6GKTjpvO/user-JR3sZQpahJls32fj7ZDxreYz/img-uXgpBNsICukhfYtdipLIZ3Zd.png?st=2024-06-16T02%3A35%3A54Z&amp;se=2024-06-16T04%3A35%3A54Z&amp;sp=r&amp;sv=2023-11-03&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=6aaadede-4fb3-4698-a8f6-684d7786b067&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-06-15T19%3A05%3A38Z&amp;ske=2024-06-16T19%3A05%3A38Z&amp;sks=b&amp;skv=2023-11-03&amp;sig=xOTZteoIPD0I8/JSWnogNcrNlMCdo5a1DgtzD%2Bj27Xs%3D" width="40"/>
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
