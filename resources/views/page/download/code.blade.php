@extends('layout.app')

@section('page-link', '')
@section('page-title', 'Download News')
@section('sub-page-title', 'Data')

@section('content')
    <x-util.card title="Download Form">
        <x-form.base url="{{route('news.code.download')}}" method="POST">
            <x-form.input name="code" label="Batch Code" placeholder="input your batch code" value="" />
            <x-button.submit label="Download"/>
        </x-form.base>
    </x-util.card>
@endsection

@section('custom-footer')
@endsection
