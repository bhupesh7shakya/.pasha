@extends('admin.layouts.main')

@section('admin-content')
    <x-card.card :title="['title' => 'Create '.$data['title']]">
        <x-form.form :form="$data['form']"></x-form.form>
    </x-card.card>
@endsection

