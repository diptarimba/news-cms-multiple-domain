@extends('layout.app')

@section('page-link', $data['home'])
@section('page-title', 'Corporate')
@section('sub-page-title', 'List')

@section('content')
    <x-util.card title="{{ $data['title'] }}">
        <x-form.base url="{{ $data['url'] }}" method="POST">
            <x-form.input name="title" label="Title" placeholder="input content title" value="{{ $content->title ?? '' }}" />
            <x-form.text name="content" label="Content" value="{{ $content->content ?? '' }}"
                link_upload="{{ route('image.upload') }}" />
            <x-form.input name="posted_at" type="date" label="Date Post" placeholder="pick the date post"
                value="{{ $content->posted_at ?? '' }}" />
            <x-form.select name="category_id" title="Category" value="{{ $content->category_id ?? '' }}" data="{!! $category !!}"/>
            <x-button.submit />
            <x-button.cancel url="{{ $data['home'] }}" />
        </x-form.base>
    </x-util.card>
@endsection

@section('custom-footer')
@endsection
