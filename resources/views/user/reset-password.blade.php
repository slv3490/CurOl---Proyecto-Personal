@extends('layouts.base')

@section('content')
    <div>
        <h1 class="mb-3 mt-3">Reestablecer Contraseña</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="formulario" method="POST" action="{{ route('password.update') }}">
            <input type="hidden" name="token" value="{{ $token }}">
            @csrf
            @method("POST")
            <div class="campo">
                <label for="email">Email</label>
                <input name="email" type="email" placeholder="Tu Email" id="email">
            </div>

            <div class="campo">
                <label for="newPassword">Nueva Contraseña</label>
                <input name="password" type="password" placeholder="Tu Contraseña" id="newPassword">
            </div>

            <div class="campo">
                <label for="passwordConfirm">Confirmar Contraseña</label>
                <input name="password_confirmation" type="password" placeholder="Tu Contraseña" id="passwordConfirm">
            </div>
            {{-- <div class="error">@error('user.email') {{ $message }} @enderror</div> --}}

            <input type="submit" value="Reestablecer Contraseña" class="boton">
        </form>
    </div>
    
@endsection