@extends('layouts.base')

@section('title', 'Cadastro')

@section('conteudo')

    <div style="margin: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card border-primary mb-3"">
                    <div class=" card-header">Preencha os dados para se cadastar</div>
                <div class="card-body">
                    <div class="col-md-8 offset-md-2">
                        <form action="{{ route('login.register') }}" method="post">
                            @csrf

                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                aria-describedby="name">

                            @if ($errors->has('name'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif

                            <label for="email" class="form-label">E-mail</label>
                            <input type="text" class="form-control" value="{{ old('email') }}" name="email"
                                aria-describedby="email">

                            @if ($errors->has('email'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif

                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" value="{{ old('contact') }}" name="password"
                                aria-describedby="number">

                            @if ($errors->has('password'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="offset-md-6">
                        <button type="submit" class="btn btn-outline-primary">Registrar</button>
                        <button type="button" class="btn btn-secondary"onclick=" location.href='{{ route('login.index') }}'">Voltar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </form>
@endsection
