@extends('layout.template.'.$templateCode.'.base')

@section('nav')
    @foreach ($category as $key => $each)
        @include(
            'components.template.'.$templateCode.'.category-head',
            [
                'title' => $each,
                'hide' => $key < 3 ? false : true,
            ]
        )
    @endforeach
@endsection

@section('webname', $template->name)

@if ($templateCode == 'minima')
@section('second-nav')
    @foreach ($category as $key => $each)
        @if ($key >= 3)
        @include(
            'components.template.'.$templateCode.'.category-head',
            [
                'title' => $each,
            ]
        )
        @endif
    @endforeach
@endsection
@endif

@section('content')
    @if (in_array($templateCode, ['greymilk', 'oceanblue', 'minima']))
        @foreach ($news as $each)
            @include(
                'components.template.'.$templateCode.'.spoiler-post',
                [
                    'category' => $each->category->name,
                    'title' => $each->title,
                    'date' => date('d F Y', strtotime($each->posted_at)),
                    'content' => $each->spoiler,
                    'author' => $each->author,
                    'image' => $each->image,
                    'url' => route('news.show', ['slug' => $each->slug]),
                ]
            )
        @endforeach
    @elseif (in_array($templateCode, ['redeye', 'antara']))
        @include('components.template.'.$templateCode.'.card-news', [
            'content' => $news,
        ])
    @endif
@endsection

@section('pagination')
    @include(
        'components.template.'.$templateCode.'.paginate',
        ['news' => $news]
    )
@endsection

@if ($templateCode == 'oceanblue')
    @section('category-sidebar')
        @foreach ($category as $each)
            @include('components.template.oceanblue.category-sidebar', ['category' => $category])
        @endforeach
    @endsection
    @section('head-carousel')
        @foreach ($news as $each)
            @include('components.template.oceanblue.carousel-recent', [
                'title' => $each->title,
                'category' => $each->category->name,
            ])
        @endforeach
    @endsection
@endif
