<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1, p {
            margin: 0;
            color: white;
        }
        h1 {
            font-size: 4rem;
        }
        h1, h2 {
            text-align: center
        }
        h2 {
            font-size: 1.8rem;
        }
        .subtitle {
            text-align: center;
            font-size: 1.4rem
        }
        .container-body {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 60rem;
            margin: 2rem auto;
            width: 95%;

        }
        .container {
            background-color: #ecf2f2;
            border-radius: 2rem;
        }
        .svgComputer {
            width: 8rem;
        }
        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #007773;
            gap: 2rem;
            border-top-left-radius: 2rem;
            border-top-right-radius: 2rem;
            height: 10rem;
        }
        .title {
            padding: 0 2rem;
        }
        .paragraph {
            color: black;
            padding: 2rem;
            font-size: 1.5rem;
        }
        .span-nombre {
            color: #007773;
        }
        .span {
            color: #008783;
        }
        .bold {
            font-weight: bold;
        }
        .center {
            text-align: center;
        }
        button {
            display: block;
            margin: 0 auto;
            border: none;
            color: white;
            background-color: #007773;
            padding: 1.5rem 2.5rem;
            font-size: 2rem;
            cursor: pointer;
            box-shadow: 0px 0px 10px 1px #00000098;
        }
        button:hover {
            background-color: #006d69;
        }

        /* Media Query */
        @media(max-width: 460px) {
            h1 {
                font-size: 3rem;
            }
            .subtitle {
                text-align: center;
                font-size: 1rem
            }
            .svgComputer {
                width: 4rem;
            }
            button {
                padding: 1.3rem 2.3rem;
                font-size: 1.5rem;
            }
        }

    </style>
</head>
<body class="container-body">
    <div class="container">
        <header class="header">
            <div class="header-title">
                <h1>CurOl</h1>
                <p class="subtitle">Cursos Online</p>
            </div>
            <img class="svgComputer" src="{{ Vite::asset('resources/img/computerEmail.svg') }}" alt="">
        </header>
        <main>
            <h2 class="title">¡Hola <span class="span-nombre">(nombreUsuario)</span>! Bienvenido y gracias por registrarte en <span class="bold">CurOl</span>.</h2>
            <p class="paragraph">¿Quieres aprender una nueva profesión desde la comodidad de tu hogar? En <span class="span bold bold">CurOl</span> Cursos Online te ofrecemos una amplia variedad de cursos impartidos por profesionales expertos en su campo. Compra tus cursos favoritos en nuestra página web y empieza a aprender a tu ritmo, cuando y donde quieras.</p>
            <button>Verificar Email</button>
            <p class="paragraph center">¡Da el primer paso hacia tu futuro con <span class="span bold">CurOl</span>!</p>
        </main>
    </div>
</body>
</html>