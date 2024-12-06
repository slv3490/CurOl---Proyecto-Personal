<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#007773">
    <meta name="robots" content="index, follow">
    <meta name="description" content="CurOl es una plataforma de cursos online diseñada para ofrecer una experiencia de aprendizaje flexible y accesible. Encuentra una amplia gama de cursos en diversas áreas, desde habilidades técnicas hasta desarrollo personal, todo desde la comodidad de tu hogar. Aprende a tu propio ritmo y adquiere nuevas competencias con instructores expertos.">
    <!-- Facebook Meta Tags -->
    <meta name="og:title" content="CurOl Pagina de Cursos Online">
    <meta name="og:description" content="Plataforma de Cursos Online. Descubre una amplia variedad de cursos para mejorar tus habilidades y aprender algo nuevo desde cualquier lugar.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://i.postimg.cc/MGjd59hx/Curol-cursos-online.webp">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="zilziye.nyc.dom.my.id">
    <meta name="twitter:title" content="CurOl Pagina de Cursos Online">
    <meta name="twitter:description" content="Plataforma de Cursos Online. Descubre una amplia variedad de cursos para mejorar tus habilidades y aprender algo nuevo desde cualquier lugar.">
    <meta name="twitter:image" content="https://i.postimg.cc/MGjd59hx/Curol-cursos-online.webp">

    <link rel="cannonical" href="https://zilziye.nyc.dom.my.id">
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/img/curol.ico') }}">

    <title>@yield('title', "CurOl")</title>
    @livewireStyles
    @vite(["resources/scss/app.scss", "resources/js/app.js"])
</head>
<body>
    <header class="{{ isset($inicio) ? "inicio" : "header-nav"; }}">
        <x-nav />
        <div  class="{{ isset($mostrar) ? "mostrar" : "" }} contenedor titulo-cabecera">
            <h1>Aprende a estimular tu cerebro</h1>
            <p>Mejora y crece de forma profesional y personal.</p>
        </div>
    </header>

    @yield("content")

    <footer class="footer">
        <x-redes-sociales />
    </footer>

    @livewireScripts
</body>
</html>