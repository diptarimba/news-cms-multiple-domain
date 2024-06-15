@if ($templateCode == 'greymilk')
    @extends('layout.template.greymilk.base')
    @section('nav')
        @foreach ($category as $each)
        <x-template.greymilk.category-head title="{{$each}}" />
        @endforeach
    @endsection

    @section('content')
        @foreach ($news as $each)
        <x-template.greymilk.spoiler-post category="{{$each->category->name}}" title="{{$each->title}}" date="{{$each->created_at}}" content="{{$each->spoiler}}" url="{{route('news.show', ['slug' => $each->slug])}}" />
        @endforeach
    @endsection

    @section('pagination')
    <x-template.greymilk.paginate :news="$news" />
    @endsection
@endif
