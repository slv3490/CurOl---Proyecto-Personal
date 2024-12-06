<div class="nav contenedor">
    <a href="{{ route("index") }}">CurOl</a>
    <div>
        <input type="checkbox" id="checkbox" class="checkbox visuallyHidden burger">
            <label for="checkbox">
                <div class="hamburger hamburger3">
                    <span class="bar bar1"></span>
                    <span class="bar bar2"></span>
                    <span class="bar bar3"></span>
                    <span class="bar bar4"></span>
                </div>
            </label>
        <nav class="enlaces">
            <a href="{{ route("cursos") }}"><p>Cursos</p></a>
            <a href="#"><p>Contacto</p></a>
            @if (Auth::user())
            <div class="user">
                <p>{{ Auth::user()->name }}</p>
                <div class="options-user hidden-options">
                    <a href="{{ route("user.profile") }}">Perfil</a>
                    <a href="{{ route("dashboard") }}">Dashboard</a>
                    <a href="{{ route("logout") }}">Cerrar Sesión</a>
                </div>
            </div>
            @else
            <a href="{{ route("iniciar-session") }}"><p>Iniciar Sesión</p></a>
            @endif
        </nav>
    </div>
</div>