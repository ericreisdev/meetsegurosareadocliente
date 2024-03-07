<x-app-layout>
    <x-slot name="header">
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
    </x-slot>

    <div class="container max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <img src="{{ asset('images/meet_marca.png') }}" alt="Meet Seguros Logo" class="h-16 w-auto">
        </div>

        <div class="container max-w-7xl mx-auto p-6 lg:p-8">
            <div class="mt-16 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 wrapper">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-lg text-dark-orange">Olá, {{ Auth::user()->full_name }}</h3>
                    <p class="text-grey-500">CPF/CNPJ: {{ Auth::user()->username }}</p>
                    @if(Auth::user()->roles->contains('name', 'admin'))
                    <h3 class="text-lg">Painel de Controle do Administrador</h3>
                    <a href="{{ route('admin.painel') }}" class="btn btn-primary-orange">Gerenciar Apólices</a>
                    @else
                    <h3 class="text-lg">Bem-vindo à sua Área de Cliente</h3>
                    <a href="{{ route('cliente.apolices') }}" class="btn btn-primary-orange">Ver Minhas Apólices</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div style="position: fixed; bottom: 0; width: 100%; height: 50px; background-color: #333; color: white; text-align: center; line-height: 50px; z-index: 999;">
    © 2024 Meet Seguros. Todos os direitos reservados.
</div>
</x-app-layout>



<!-- C:\laragon\www\public_html\areaDoCliente\resources\views\dashboard.blade.php -->