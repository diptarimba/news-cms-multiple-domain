@extends(($templateCode == 'greymilk' ? 'layout.template.greymilk' : ($templateCode == 'oceanblue' ? 'layout.template.oceanblue' : 'layout.template.redeye')) . '.base')

@section('nav')
    @foreach ($category as $each)
        @include(
            ($templateCode == 'greymilk'
                ? 'components.template.greymilk'
                : ($templateCode == 'oceanblue'
                    ? 'components.template.oceanblue'
                    : 'components.template.redeye')) . '.category-head',
            ['title' => $each]
        )
    @endforeach
@endsection

@section('content')
    @if (in_array($templateCode, ['greymilk', 'oceanblue']))
        @foreach ($news as $each)
            @include(
                ($templateCode == 'greymilk'
                    ? 'components.template.greymilk'
                    : ($templateCode == 'oceanblue'
                        ? 'components.template.oceanblue'
                        : 'components.template.redeye')) . '.spoiler-post',
                [
                    'category' => $each->category->name,
                    'title' => $each->title,
                    'date' => $each->posted_at,
                    'content' => $each->spoiler,
                    'url' => route('news.show', ['slug' => $each->slug]),
                ]
            )
        @endforeach
    @elseif (in_array($templateCode, ['redeye']))
        @include('components.template.redeye.card-news', [
            'content' => $news,
        ])
    @endif
@endsection

@section('pagination')
    @include(
        ($templateCode == 'greymilk'
            ? 'components.template.greymilk'
            : ($templateCode == 'oceanblue'
                ? 'components.template.oceanblue'
                : 'components.template.redeye')) . '.paginate',
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
