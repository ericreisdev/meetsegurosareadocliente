<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Área do Cliente - Perfil
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Informações Pessoais</h3>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500">Nome completo:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ Auth::user()->full_name }}</dd>
                        <dt class="text-sm font-medium text-gray-500">CPF/CNPJ:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ Auth::user()->username }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



<!-- C:\laragon\www\public_html\areaDoCliente\resources\views\cliente\perfil.blade.php -->