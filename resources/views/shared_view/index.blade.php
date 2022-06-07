@extends('admin.layouts.main')

@section('admin-content')
    @if (isset($data['no_create']) &&$data['no_create'] == true)
        <x-card.card :title="['title' => $data['title']]">
            {{-- start card --}}
            {{-- start table --}}
            <x-table.table :tableHeaders="$data['table_headers']" />

            {{-- end table --}}
        </x-card.card>
        {{-- end of card --}}
    @else
        <x-card.card :title="['title' => $data['title'], 'route' => route($data['route_name'] . '.create')]">
            {{-- start card --}}
            {{-- start table --}}
            <x-table.table :tableHeaders="$data['table_headers']" />

            {{-- end table --}}
        </x-card.card>
        {{-- end of card --}}
    @endif
@endsection
{{-- custom script start --}}
@section('admin-scripts')
    {{-- datatable --}}
    <x-script.datatable-script :options="[
        'route' => route($data['route_name'] . '.index'),
        'columns' => $data['columns'],
    ]" />
    {{-- datatable --}}
    {{-- </x-script.datatable-script> --}}
    {{-- alert --}}
    <x-script.alert></x-script.alert>
    {{-- alert --}}
    <x-script.delete-script route="{{ route($data['route_name'] . '.destroy', '') }}" />
@endsection
{{-- custom script ends --}}
