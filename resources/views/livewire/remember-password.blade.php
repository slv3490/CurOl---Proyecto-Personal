<div>
    <h1 class="mb-3 mt-3">Recuperar Cuenta</h1>

    <form class="formulario" action="{{ route('password.email') }}" method="POST">
        @csrf
        @method("POST")
        <div class="campo">
            <label for="email">Email</label>
            <input name="email" type="email" placeholder="Martin19@gmail.com" id="email">
        </div>

        <input type="submit" value="Enviar Solicitud" class="boton">
    </form>

    <div class="rutas-user">
        <a href="{{ route("iniciar-session") }}">¿Ya tienes una cuenta? Iniciar Sesion.</a>
        <a class="right" href="{{ route("user.create") }}">¿No tienes cuenta? Crear Cuenta.</a>
    </div>
</div>
