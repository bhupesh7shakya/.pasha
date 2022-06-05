@extends('admin.layouts.main')

@section('admin-content')
    <x-card.card :title="['title' => 'Update ' . $data['title']]">
        <x-form.form :form="$data['form']"></x-form.form>
    </x-card.card>
    {{-- @foreach ($errors->all() as $error)
        {{ $error }}<br />
    @endforeach --}}
@endsection
