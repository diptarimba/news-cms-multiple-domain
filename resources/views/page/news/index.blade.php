@extends($templateCode == 'greymilk' ? 'layout.template.greymilk.base' : 'layout.template.oceanblue.base')

@section('nav')
    @foreach ($category as $each)
        @include(
            $templateCode == 'greymilk'
                ? 'components.template.greymilk.category-head'
                : 'components.template.oceanblue.category-head',
            ['title' => $each]
        )
    @endforeach
@endsection

@section('content')
    @foreach ($news as $each)
        @include(
            $templateCode == 'greymilk'
                ? 'components.template.greymilk.spoiler-post'
                : 'components.template.oceanblue.spoiler-post',
            [
                'category' => $each->category->name,
                'title' => $each->title,
                'date' => $templateCode == 'greymilk' ? $each->created_at : $each->posted_at,
                'content' => $each->spoiler,
                'url' => route('news.show', ['slug' => $each->slug]),
            ]
        )
    @endforeach
@endsection

@section('pagination')
    @include(
        $templateCode == 'greymilk'
            ? 'components.template.greymilk.paginate'
            : 'components.template.oceanblue.paginate',
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
                'category' => $each->category->name
            ])
        @endforeach
    @endsection
@endif
