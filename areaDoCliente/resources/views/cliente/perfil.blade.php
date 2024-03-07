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
            <img src="{{ asset('images/meet_logo.png') }}" alt="Meet Seguros Logo" class="h-16 w-auto">
        </div>

        <div class="py-12 bg-gray-100">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Área do Cliente - Perfil</h2>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Informações Pessoais</h3>
                            </div>
                            <dt class="text-sm font-medium text-gray-500 px-4">Nome completo:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ Auth::user()->full_name }}</dd>
                            <dt class="text-sm font-medium text-gray-500 px-4">CPF/CNPJ:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ Auth::user()->username }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($apolices as $apolice)
       <!-- Exibir detalhes da apólice aqui -->
   @endforeach

    <div class="rodape">
        © 2024 Meet Seguros. Todos os direitos reservados.
    </div>
</x-app-layout>




<!-- C:\laragon\www\public_html\areaDoCliente\resources\views\cliente\perfil.blade.php -->