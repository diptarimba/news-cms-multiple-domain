@extends('layout.app')

@section('page-link', '')
@section('page-title', 'User')
@section('sub-page-title', 'Data')

@push('additional-header')
<link href="{{ asset('assets-dashboard/css/multiple-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <x-util.card title="Download Form">
        <x-form.base url="{{route('news.form')}}" method="POST">
            <x-form.input name="start_at" label="Start Date" type="date" placeholder="input your start date" value="" />
            <x-form.input name="end_at" label="End Date" type="date" placeholder="input your end date" value="" />
            <x-form.select multiple name="website_id[]" title="Website" value="" data="{!! $website !!}"/>
            <x-button.submit label="Download"/>
        </x-form.base>
    </x-util.card>
@endsection

@push('additional-footer')
<script src="{{ asset('assets-dashboard/js/pages/multiple-select.js') }}"></script>
@endpush

@section('custom-footer')
<script>
    $(function() {
      $('.multiple-select').multipleSelect()
    })
  </script>
@endsection
