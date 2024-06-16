@props(['title' => '', 'url' => ''])
@push('category-mobile')
<a class="block hover:text-gray-700" href="{{$url}}">{{$title}}</a>
@endpush

@push('category-desktop')
<a class="hover:text-gray-300" href="{{$url}}">{{$title}}</a>
@endpush
