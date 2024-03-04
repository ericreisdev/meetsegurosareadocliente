<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meet Seguros</title>

    <!-- Estilos e Fontes -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #d8d8d8 0%, #4c4c4c 100%);
            color: white;
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .botao {
            background-color: transparent;
            color: #ef8f24;
            border: 2px solid #ef8f24;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .botao:hover {
            background-color: #ef8f24;
            color: #333;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            color: #333;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .cabecalho {
            background: rgba(255, 255, 255, 0.1);
            padding: 10px 20px;
            border-radius: 15px;
            margin-bottom: 20px;
            position: fixed;
            top: 0;
            right: 0;
            z-index: 999;
        }

        .cabecalho a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            transition: color 0.3s ease;
        }

        .cabecalho a:hover {
            color: #FFD700;
        }

        .container {
            padding-top: 50px; /* ajuste de espaço para a barra de cabeçalho fixa */
            min-height: calc(100vh - 100px); /* subtrai a altura do cabeçalho e do rodapé */
        }

        .rodape {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
    </style>
</head>
<body class="antialiased">
<div class="cabecalho">
    @if (Route::has('login'))
        <div>
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="botao">Entrar</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="botao">Registrar</a>
                @endif
            @endauth
        </div>
    @endif
</div>

<div class="container max-w-7xl mx-auto p-6 lg:p-8">
    <div class="flex justify-center">
        <img src="{{ asset('images/meet_logo.png') }}" alt="Meet Seguros Logo" class="h-16 w-auto">
    </div>

    <div class="mt-16 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
        <!-- Conteúdos e serviços da Meet Seguros -->
        <!-- Blocos de conteúdo -->
    </div>
</div>

<div class="rodape">
    © 2024 Meet Seguros. Todos os direitos reservados.
</div>
</body>
</html>


<!-- C:\laragon\www\public_html\areaDoCliente\resources\views\welcome.blade.php -->