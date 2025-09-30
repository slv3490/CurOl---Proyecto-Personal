<div class="delete-user-account">
    <h1 class="mb-3 mt-3">Eliminar Cuenta</h1>

    <form class="formulario" id="form-delete-user-account" method="POST" action="{{ route('delete.user.account', Auth::user()->id) }}">
        @csrf
        @method("DELETE")
        <div class="confirm-delete-user">
            <p>¿Estas seguro que deseas eliminar tu cuenta? Estos cambios no son reversibles.</p>
            <input type={{ Auth::user()->hasPermissionTo('spectator') ? 'button' : 'submit' }} value="Eliminar Cuenta" class="boton {{ Auth::user()->hasPermissionTo('spectator') ? 'not-allowed' : 'allowed' }}">
        </div>
    </form>
</div>
