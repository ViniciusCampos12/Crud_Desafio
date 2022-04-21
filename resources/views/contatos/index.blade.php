@extends('layouts.base')

@section('title', 'Index')

@section('conteudo')
    <main>
        <h1 style="text-align: center;">Contatos</h1>
        <div class="m-5">
            <div style="margin-bottom: 15px; text-align: right; padding: 5px; position:absolute; top:45px; right:55px;">
                <h2>Seja bem vindo(a), {{ Auth::user()->name }} </h2>
                <a href="{{ route('login.logout') }}" class="btn btn-lg btn-danger">
                    <span class="glyphicon glyphicon-log-out"></span> Log out </a>
            </div>
            <table class="table ">
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Contato</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contatos as $contato)
                        <tr>
                            <td>{{ $contato->id }}</td>
                            <td>{{ $contato->name }}</td>
                            <td>{{ $contato->email }}</td>
                            <td>{{ $contato->contact }}</td>
                            <td>
                                @component('layouts.button', ['contato' => $contato])
                                @endcomponent
                            </td>
                            <td> <button type="button" class="btn btn-info "" onclick="
                                    location.href='{{ route('contato.show', [$contato->id]) }}'">Show</button></td>
                </tr>
     @endforeach
                </tbody>
            </table>

            <button type=" button" class="btn btn-success ""  onclick=" location.href='{{ route('contato.create') }}'">Novo Contato</button>
            <button type=" button" class="btn btn-dark ""  onclick=" location.href='{{ route('contato.trash') }}'">Lixo</button>
    <main>
@endsection
