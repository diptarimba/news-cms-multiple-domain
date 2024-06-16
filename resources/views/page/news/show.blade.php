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
    @include(
        ($templateCode == 'oceanblue' ? 'components.template.oceanblue' : 'components.template.greymilk').'.show-news',
        [
            'category' => $news->category->name,
            'title' => $news->title,
            'date' => $news->posted_at,
            'content' => $news->content,
        ]
    )
@endsection
