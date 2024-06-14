@extends('layout.app')


@section('page-link', '/')
@section('page-title', 'Content')
@section('sub-page-title', 'Index')

@section('content')
    <x-util.card title="Content List" add url="{{route('admin.content.create')}}">
        <table id="datatable" class="table w-full pt-4 text-gray-700 dark:text-zinc-100 datatables-target-exec">
            <thead>
                <tr>
                    <th class="p-4 pr-8 border rtl:border-l-0 border-y-2 border-gray-50 dark:border-zinc-600">Id</th>
                    <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Title</th>
                    <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Post Date</th>
                    <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Slug</th>
                    <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Action</th>
                    </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </x-util.card>
@endsection

@section('custom-footer')
<x-datatables.single url="{{route('admin.content.index')}}">
    <x-datatables.column name="title"/>
    <x-datatables.column name="posted_at"/>
    <x-datatables.column name="slug"/>
    <x-datatables.action />
</x-datatables.single>
@endsection
