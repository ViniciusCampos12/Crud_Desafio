
@if (isset($contato->id))
    <form action="{{ route('contato.update', [$contato->id]) }}" method="post">
        @method('PUT')
    @else
        <form method="post" action="{{ route('contato.store') }}">
@endif

@csrf

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{$slot}}</div>
            <div class="card-body">
                <div class="col-md-8 offset-md-2">

                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control"
                        @if (isset($contato->name)) value="{{ $contato->name }}"  @endif value="{{old('name')}}"  name="name"
                        aria-describedby="nome">

                    @if($errors->has('name'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('name')}}
                        </div>
                    @endif

                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control"
                        @if (isset($contato->email)) value="{{ $contato->email }}"  @endif value="{{old('email')}}" name="email"
                        aria-describedby="email">

                    @if($errors->has('email'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('email')}}
                        </div>
                    @endif

                    <label for="contact" class="form-label">Contact</label>
                    <input type="tel" class="form-control"
                        @if (isset($contato->contact)) value="{{ $contato->contact }}"  @endif  value="{{old('contact')}}" name="contact"
                        aria-describedby="number">

                    @if($errors->has('contact'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('contact')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mb-5">
                <div class="offset-md-4">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="button" class="btn btn-secondary"
                        onclick=" location.href='{{ route('contato.index') }}'">
                        {{ __('Voltar') }}</button>
                </div>
            </div>

        </div>
    </div>
</div>
</form>
