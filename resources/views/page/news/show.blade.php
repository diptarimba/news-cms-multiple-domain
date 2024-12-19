@extends('layout.template.'.$templateCode.'.base')
@section('nav')
    @foreach ($category as $each)
        @include(
            'components.template.'.$templateCode.'.category-head',
            ['title' => $each]
        )
    @endforeach
@endsection

@section('webname', $templateName)

@section('content')
    @include(
        'components.template.'.$templateCode.'.show-news',
        [
            'category' => $news->category->name,
            'title' => $news->title,
            'date' => $news->posted_at,
            'content' => $news->content,
            'image' => $news->author->picture,
        ]
    )
@endsection
