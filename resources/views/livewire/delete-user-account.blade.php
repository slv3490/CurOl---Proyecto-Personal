<div class="delete-user-account">
    <h1 class="mb-3 mt-3">Eliminar Cuenta</h1>

    <form class="formulario" id="form-delete-user-account" method="POST" action="{{ route('delete.user.account', Auth::user()->id) }}">
        @csrf
        @method("DELETE")
        <div class="confirm-delete-user">
            <p>¿Estas seguro que deseas eliminar tu cuenta? Estos cambios no son reversibles.</p>
            <input type="submit" value="Eliminar Cuenta" class="boton">
        </div>
    </form>
</div>
