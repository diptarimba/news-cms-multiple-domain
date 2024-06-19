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
                value="{{ $content->posted_at ?? request()->get('posted_at') ?? '' }}" />
            <x-form.select name="category_id" title="Category" value="{{ $content->category_id ?? request()->get('category_id') ?? '' }}" data="{!! $category !!}"/>
            <x-button.button type="button" colour="yellow" url="{{ $data['url'] }}" label="Submit & Add Another" onclick="updateActionAndSubmit(event)"/>
            <x-button.submit />
            <x-button.cancel url="{{ $data['home'] }}" />
        </x-form.base>
    </x-util.card>
@endsection

@section('custom-footer')
<script type="text/javascript">
    function updateActionAndSubmit(event) {
        event.preventDefault();  // Prevent the default form submission

        var form = document.getElementById('form');
        // var categoryId = document.getElementsByName('category_id')[0].value;
        // var postedAt = document.getElementsByName('posted_at')[0].value;

        // Construct the new URL with category_id and posted_at parameters
        var newAction = '{{ $data['url'] }}';
        // newAction += '?category_id=' + encodeURIComponent(categoryId);
        // newAction += '&posted_at=' + encodeURIComponent(postedAt);
        newAction += '?&recreate=true';

        // Update the form's action attribute
        form.action = newAction;

        // Submit the form
        form.submit();
    }
</script>
@endsection
