<div class="login">
    <h1 class="mb-3 mt-3">Iniciar Sesion</h1>

    <form class="formulario" wire:submit="login">

        <div class="campo">
            <label for="email">Email</label>
            <input wire:model.live="session.email" type="email" placeholder="Martin19@gmail.com" id="email" class="emailLogin">
        </div>
        <div class="error">@error('session.email') {{ $message }} @enderror</div>
    
        <div class="campo">
            <label for="password">Contraseña</label>
            <input wire:model.live="session.password" type="password" placeholder="123456" id="password" class="passwordLogin">
        </div>
        <div class="error">@error('session.password') {{ $message }} @enderror</div>
        <div>
            @if (session()->has("errors"))
                <p class="error">{{ session("errors") }}</p>
            @endif
        </div>

        <div class="flex">
            <div class="campo spectator">
                <label for="">Espectador</label>
                <input type="checkbox" id="checkboxSpectator" wire:model="spectator">
            </div>
            <input type="submit" value="Iniciar Sesion" class="boton">
        </div>
        <p class="text-spectator display-none">El modo espectador te permitira simular ser un administrador pero sin los permisos necesarios para realizar cambios.</p>
    </form>

    <div class="rutas-user">
        <a href="{{ route("user.create") }}">¿No tienes cuenta? Crear Cuenta.</a>
        <a class="right" href="{{ route("password.request") }}">¿Olvidaste tu contraseña? Recuperar Cuenta.</a>
    </div>
</div>
