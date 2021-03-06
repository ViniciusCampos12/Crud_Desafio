@extends('layouts.base')

@section('title', 'Show contato')

@section('conteudo')
<div style="margin: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="col-md-7 offset-md-2">
                <ul class="list-group">
                <li class="list-group-item active">Detalhes</li>
                <li class="list-group-item"><b>#</b> {{$contato->id}}</li>
                <li class="list-group-item"><b>Name:</b> {{$contato->name}}</li>
                <li class="list-group-item"><b>E-mail:</b> {{$contato->email}}</li>
                <li class="list-group-item"><b>Contact:</b> {{$contato->contact}}</li>
                <br>
                @component('layouts.button', ['contato' => $contato])

                @endcomponent
                </ul>
                <br>
                <button type="button" class="btn btn-secondary"onclick=" location.href='{{ route('contato.index') }}'">Voltar</button>
</div>
    </div>
        </div>
            </div>
@endsection
