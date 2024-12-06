@extends('layouts.base')

@section('content')
    <main class="contenedor">
        {{-- Cursos --}}
        <section class="section-course-index-page">
            <h2>Cursos</h2>
            <p class="centrar-texto">¡Prueba alguno de nuestros cursos!</p>

            <div class="cursos-mostrar">
                <video muted loop autoplay src="{{ asset("videos/cocina.mp4") }}"></video>

                <div class="contenedor-art-cursos">
                    <article>
                        <a class="articulo-curso" href="{{ route('cursos', "search=curso+sobre+cocina") }}">
                            <img src="{{ Vite::asset("resources/img/curso-cocina.jpg") }}" alt=" curso de finanzas">
                            <div>
                                <h3>Cursos Sobre Cocina</h3>
                                <p>Domina el arte culinario con nuestro curso de cocina, donde aprenderás desde técnicas básicas hasta recetas gourmet.</p>
                            </div>
                        </a>
                    </article>

                    <article >
                        <a class="articulo-curso" href="{{ route('cursos', "search=curso+de+ingles") }}">
                            <img src="{{ Vite::asset("resources/img/curso-idiomas.jpg") }}" alt=" curso de finanzas">
                            <div>
                                <h3>Curso de Inglés	(Principiante a Avanzado)</h3>
                                <p>Transforma tu dominio del inglés con nuestro curso integral, diseñado para llevarte desde los fundamentos básicos hasta un nivel avanzado.</p>
                            </div>
                        </a>
                    </article>

                    <article>
                        <a class="articulo-curso" href="{{ route('cursos', "search=curso+sobre+finanzas") }}">
                            <img src="{{ Vite::asset("resources/img/curso-finanzas.jpg") }}" alt=" curso de finanzas">
                            <div>
                                <h3>Cursos Sobre Finanzas</h3>
                                <p>Aprende a gestionar tus finanzas personales e inversiones con estrategias prácticas para asegurar tu futuro financiero. </p>
                            </div>
                        </a>
                    </article>
                </div>
            </div>
        </section> {{-- Cursos --}}

        <!-- Slider main container -->
        <h3 class="mb-5">Cursos recomendados</h3>
        <div class="swiper mySwiper slider-courses">
            <div class="swiper-wrapper">
                @forelse ($courses as $course)
                    @if (!$course->lessons->isEmpty())
                        <div class="swiper-slide image">
                            <div class="swiper-center-image">
                                <a href="{{ route('cursos', "search=" . $course->title) }}">
                                    <img src="{{ asset('storage/images/'.$course->image_uri) }}">
                                    <h4 class="title-slider">{{ $course->title }}</h4>
                                    <p class="course-owner">{{ $course->user->name }}</p>
                                    <p class="course-price-slider">{{ $course->price }}$</p>
                                </a>
                            </div>
                        </div>
                    @endif
                @empty
                    <p>No se han encontrado cursos</p>
                @endforelse
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <!-- Slider Courses -->

        {{-- Articulos --}}
        <section class="articulos">
            <h2>Últimos Artículos</h2>
            <div class="cards">
                <a href="{{ route('article.meditation') }}">
                    <div class="cards-articulos">
                        <img class="card-desplegable" src="{{ Vite::asset("resources/img/meditacion.jpg") }}" alt="Imagen de una persona meditando">
                        <div class="info-card">
                            <h3 class="centrar-texto d-none titulo-card">Meditacion</h3>
                            <p class="centrar-texto d-none descripcion-card">Encuentra la paz interior a través de la meditación, despeja tu mente y encuentra claridad</p>
                        </div>
                        <div class="fondo"></div>
                    </div>
                </a>
                <a href="{{ route('article.exercise') }}">
                    <div class="cards-articulos">
                        <img class="card-desplegable" src="{{ Vite::asset("resources/img/corredor.jpg") }}" alt="Imagen de un chico corriendo">
                        <div class="info-card">
                            <h3 class="centrar-texto d-none titulo-card">Ejercicios</h3>
                            <p class="centrar-texto d-none descripcion-card">Mejora tu bienestar físico y mental con nuestra selección de ejercicios</p>
                        </div>
                        <div class="fondo"></div>
                    </div>
                </a>
                <a href="{{ route('article.hobbies') }}">
                    <div class="cards-articulos">
                        <img class="card-desplegable" src="{{ Vite::asset("resources/img/hobbies.jpg") }}" alt="Imagen de un fotografo">
                        <div class="info-card">
                            <h3 class="centrar-texto d-none titulo-card">Hobbies</h3>
                            <p class="centrar-texto d-none descripcion-card">Descubre nuevas pasiones y despierta tu creatividad con nuestros fascinantes hobbies</p>
                        </div>
                        <div class="fondo"></div>
                    </div>
                </a>
            </div>
        </section> <!-- Articulos -->

        {{-- Blogs --}}
        <section class="blogs">
            <h2 class="centrar-texto mt-5">Blogs</h2>
            <article class="contenido">
                <img src="{{ Vite::asset("resources/img/descanso.jpg") }}" alt="persona durmiendo en su cama">
                <div>
                    <h3>Duerme mejor y evita distracciones</h2>
                    <p>Descubre el camino hacia un descanso reparador con nuestra guía para dormir mejor y evitar distracciones.</p>
                    <a class="boton" href="{{ route("cursos") }}">Leer más</a>
                </div>
            </article>

            <article class="contenido">
                <img class="imagen" src="{{ Vite::asset("resources/img/ejercicio.jpg") }}" alt="persona levantando peso muerto">
                <div>
                    <h3>Haz ejercicio y mantente activo</h2>
                    <p>Descubre el poder transformador de la actividad física, con consejos prácticos y motivadores para incorporar el ejercicio a tu rutina diaria.</p>
                    <a class="boton" href="{{ route("cursos") }}">Leer más</a>
                </div>
            </article>

            <article class="contenido">
                <img class="imagen" src="{{ Vite::asset("resources/img/estudio.jpg") }}" alt="cubos con la palabra study">
                <div>
                    <h3>Estudia algo que te apacione</h2>
                    <p>Desarrolla habilidades y conocimientos mientras te sumerges en un viaje educativo personalizado, diseñado para cultivar tu amor por el tema elegido.</p>
                    <a class="boton" href="{{ route("cursos") }}">Leer más</a>
                </div>
            </article>
        </section> <!-- Blogs -->
    </main>
@endsection