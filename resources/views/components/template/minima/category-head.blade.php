@props(['title' => '', 'url' => '', 'hide' => false])
<a class="text-gray-600 hover:text-gray-900 {{$hide ? 'hidden md:inline' : ''}}" href="{{$url}}">
    {{$title}}
</a>
