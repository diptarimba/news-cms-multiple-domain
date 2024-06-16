{{-- @extends(($templateCode == 'greymilk' ? 'layout.template.greymilk' : ($templateCode == 'oceanblue' ? 'layout.template.oceanblue' : 'layout.template.redeye')) . '.base') --}}
@extends('layout.template.'.$templateCode.'.base')

@section('nav')
    @foreach ($category as $each)
        @include(
            // ($templateCode == 'greymilk'
            //     ? 'components.template.greymilk'
            //     : ($templateCode == 'oceanblue'
            //         ? 'components.template.oceanblue'
            //         : 'components.template.redeye')) . '.category-head',
            'components.template.'.$templateCode.'.category-head',
            ['title' => $each]
        )
    @endforeach
@endsection

@section('content')
    @if (in_array($templateCode, ['greymilk', 'oceanblue']))
        @foreach ($news as $each)
            @include(
                // ($templateCode == 'greymilk'
                //     ? 'components.template.greymilk'
                //     : ($templateCode == 'oceanblue'
                //         ? 'components.template.oceanblue'
                //         : 'components.template.redeye')) . '.spoiler-post',
                'components.template.'.$templateCode.'.spoiler-post',
                [
                    'category' => $each->category->name,
                    'title' => $each->title,
                    'date' => $each->posted_at,
                    'content' => $each->spoiler,
                    'author' => $each->author,
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
        // ($templateCode == 'greymilk'
        //     ? 'components.template.greymilk'
        //     : ($templateCode == 'oceanblue'
        //         ? 'components.template.oceanblue'
        //         : 'components.template.redeye')) . '.paginate',
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
