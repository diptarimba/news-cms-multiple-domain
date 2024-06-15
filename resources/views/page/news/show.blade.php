@if ($templateCode == 'greymilk')
    @extends('layout.template.greymilk.base')
    @section('nav')
        @foreach ($category as $each)
            <x-template.greymilk.category-head title="{{ $each }}" />
        @endforeach
    @endsection

    @section('content')
        <x-template.greymilk.show-news category="{{$news->category->name}}" title="{{ $news->title }}" date="{{ $news->posted_at }}">
            <x-slot name="content">
                {!! $news->content !!}
            </x-slot>
        </x-template.greymilk.show-news>
    @endsection
@endif
