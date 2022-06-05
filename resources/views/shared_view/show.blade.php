@extends('yojana.index')
@section('custom-css')
    <style>
        .form-control{
            background: white!important;
        }
    </style>
@endsection
@section('yojana-content')
    <x-card.card :headers="['title' => 'अपडेट ' . $data['title']]">
        <x-form.form :form="$data['form']"></x-form.form>
    </x-card.card>
    {{-- @foreach ($errors->all() as $error)
        {{ $error }}<br />
    @endforeach --}}
@endsection
@section('custom-script')
        <script>
            // $(document).ready(function () {
                // console.log("called but ths shit didn't work");
                // document.getElementByTagName('input').disabled = true;
                // $('form *').prop('disabled', true);
            // });
        </script>
@endsection
