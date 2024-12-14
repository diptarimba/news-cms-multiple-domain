@extends('layout.app')


@section('page-link', '/')
@section('page-title', 'Domain')
@section('sub-page-title', 'Index')

@section('content')
    <x-util.card title="Content List" add url="{{route('admin.domain.create')}}">
        <table id="datatable" class="table w-full pt-4 text-gray-700 dark:text-zinc-100 datatables-target-exec">
            <thead>
                <tr>
                    <th class="p-4 pr-8 border rtl:border-l-0 border-y-2 border-gray-50 dark:border-zinc-600">Id</th>
                    <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Subdomain</th>
                    <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Domain</th>
                    <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Name</th>
                    <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Code</th>
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
<x-datatables.single url="{{route('admin.domain.index')}}">
    <x-datatables.column name="sub"/>
    <x-datatables.column name="domain"/>
    <x-datatables.column name="name"/>
    <x-datatables.column name="code"/>
    <x-datatables.action />
</x-datatables.single>
@endsection
