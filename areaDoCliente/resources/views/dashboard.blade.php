<head>
    <!-- Outros meta tags e declarações aqui -->

    <!-- Referência ao arquivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    <!-- Outros scripts e estilos aqui -->
</head>


<x-app-layout>
    <x-slot name="header">
        <div class="cabecalho" style="background-color: #ef8f24; color: white;"> <!-- Cor do cabeçalho alinhada com a marca -->
            @if (Route::has('login'))
            <!-- <div>   
                @auth
                <a href="{{ url('/dashboard') }}" class="botao-dashboard">Dashboard</a> 
                @else
                <a href="{{ route('login') }}" class="botao">Entrar</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="botao">Registrar</a>
                @endif
                @endauth
            </div> -->
            <div> <h1 class="text-lg font-semibold mt-4">Painel do Administrador</h1> </div>
            @endif
        </div>
    </x-slot>

    <div class="container max-w-7xl mx-auto p-6 lg:p-8">
        <!-- <div class="flex justify-center">
            <img src="{{ asset('images/meet_marca.png') }}" alt="Meet Seguros Logo" class="h-16 w-auto">
        </div> -->

        <h3 class="text-xl font-semibold text-dark-orange mb-4">Olá, {{ Auth::user()->full_name }}</h3>
                    <p class="text-gray-600">CPF/CNPJ: {{ Auth::user()->username }}</p>
                    @if(Auth::user()->roles->contains('name', 'admin'))
                    
                    <a href="{{ route('admin.painel') }}" class="inline-block mt-4 py-2 px-4 bg-primary-orange text-black rounded hover:bg-orange-600 transition-colors duration-300">Gerenciar Apólices</a>
                    @else
                    <h3 class="text-lg font-semibold mt-4">Bem-vindo à sua Área de Cliente</h3>
                    <a href="{{ route('cliente.apolices') }}" class="inline-block mt-4 py-2 px-4 bg-primary-orange text-black rounded hover:bg-orange-600 transition-colors duration-300">Ver Minhas Apólices</a>
                    @endif
    </div>

    <div class="rodape" style="background-color: #333; color: white;"> <!-- Rodapé estilizado -->
        © 2024 Meet Seguros. Todos os direitos reservados.
    </div>
</x-app-layout>



<!-- C:\laragon\www\public_html\areaDoCliente\resources\views\dashboard.blade.php -->