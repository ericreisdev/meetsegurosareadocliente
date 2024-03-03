<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meet Seguros') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: var(--15-grey);">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
</x-app-layout>


<!-- C:\laragon\www\public_html\areaDoCliente\resources\views\dashboard.blade.php -->