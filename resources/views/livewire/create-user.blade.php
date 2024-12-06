<div class="create-user">
    
    <h1 class="mb-3 mt-3">Crear Cuenta</h1>

    <form id="yourForm" class="formulario" wire:submit="create">
        @csrf
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input wire:model.live="user.name" type="text" placeholder="Martin" id="nombre">
        </div>
        <div class="error">@error('user.name') {{ $message }} @enderror</div>

        <div class="campo">
            <label for="apellido">Apellido</label>
            <input wire:model.live="user.last_name" type="text" placeholder="Silva" id="apellido">
        </div>
        <div class="error">@error('user.last_name') {{ $message }} @enderror</div>

        <div class="campo">
            <label for="email">Email</label>
            <input wire:model.live="user.email" type="email" placeholder="Martin19@gmail.com" id="email">
        </div>
        <div class="error">@error('user.email') {{ $message }} @enderror</div>

        <div class="campo">
            <label for="password">Contraseña</label>
            <input wire:model.live="user.password" type="password" placeholder="123456" id="password">
        </div>
        <div class="error">@error('user.password') {{ $message }} @enderror</div>

        <input type="submit" value="Crear Cuenta" class="boton" wire:loading.attr="disabled">
        
        <span wire:loading wire:target="submit">
            Registrando usuario, por favor espera...
        </span>
    </form>

    <div class="rutas-user">
        <a href="{{ route("iniciar-session") }}">¿Ya tienes una cuenta? Iniciar Sesion.</a>
        <a class="right" href="{{ route("password.request") }}">¿Olvidaste tu contraseña? Recuperar Cuenta.</a>
    </div>
</div>
