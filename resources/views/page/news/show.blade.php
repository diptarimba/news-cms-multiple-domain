{{-- @extends(($templateCode == 'greymilk'
? 'layout.template.greymilk'
: ($templateCode == 'oceanblue' ? 'layout.template.oceanblue' : 'layout.template.redeye')).'.base') --}}
@extends('layout.template.'.$templateCode.'.base')
@section('nav')
    @foreach ($category as $each)
        @include(
            // ($templateCode == 'greymilk'
            //     ? 'components.template.greymilk'
            //     : ($templateCode == 'oceanblue' ? 'components.template.oceanblue' : 'components.template.redeye')).'.category-head',
            'components.template.'.$templateCode.'.category-head',
            ['title' => $each]
        )
    @endforeach
@endsection

@section('content')
    @include(
        // ($templateCode == 'greymilk'
        //         ? 'components.template.greymilk'
        //         : ($templateCode == 'oceanblue' ? 'components.template.oceanblue' : 'components.template.redeye')).'.show-news',
        'components.template.'.$templateCode.'.show-news',
        [
            'category' => $news->category->name,
            'title' => $news->title,
            'date' => $news->posted_at,
            'content' => $news->content,
        ]
    )
@endsection
