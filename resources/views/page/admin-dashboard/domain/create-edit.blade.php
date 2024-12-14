@extends('layout.app')

@section('page-link', $data['home'])
@section('page-title', 'Domain')
@section('sub-page-title', 'List')

@section('content')
    <x-util.card title="{{ $data['title'] }}">
        <x-form.base url="{{ $data['url'] }}" method="POST">
            <x-form.input name="domain" label="Domain" value="" placeholder="masukan domain"/>
            <x-form.input name="name" label="Name Web" placeholder="masukan nama domain"
                value="" />
            <x-form.select name="code" title="Template Code" value="" data="{!! $code !!}"/>
            <x-button.submit />
            <x-button.cancel url="{{ $data['home'] }}" />
        </x-form.base>
    </x-util.card>
@endsection

@section('custom-footer')
@endsection
