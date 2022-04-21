@extends('layouts.base')

@section('title', 'Lixo')

@section('conteudo')
<h1 align="center">Lixo</h1>
<h4 style="text-align: center; color: #808080">Registros deletados.</h4>
<div style="margin: 100px;">
<table class="table table-dark">

        <thead>
            <tr class="bg-dark">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Contato</th>
                <th scope="col"></th>
                </tr>
        </thead>
        <tbody>
        @foreach ($contatos as $contato )
            <tr>
                <td class="bg-primary">{{$contato->id}}</td>
                <td>{{$contato->name}}</td>
                <td>{{$contato->email}}</td>
                <td>{{$contato->contact}}</td>
                <td><button type="button" class="btn btn-secondary"onclick=" location.href='{{ route('contato.restore', [$contato->id]) }}'">Restaurar</button></td>
            </tr>
        @endforeach
        </tbody>
</table>
        <button type="button" class="btn btn-secondary"onclick=" location.href='{{ route('contato.index') }}'">Voltar</button>
</div>
@endsection
