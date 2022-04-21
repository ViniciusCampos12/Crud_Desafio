@extends('layouts.base')

@section('title', 'Editar')

@section('conteudo')

        @component('layouts.form', ['contato' => $contato])
            Preencha os dados para editar o contato
        @endcomponent

@endsection
