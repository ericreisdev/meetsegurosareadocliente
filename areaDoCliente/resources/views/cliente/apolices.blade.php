{{-- resources/views/cliente/apolices.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Minhas Apólices
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @forelse ($apolices as $apolice)
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900">Apólice: {{ $apolice->tipo }}</h3>
                        <p>Valor Segurado: R$ {{ number_format($apolice->valor_segurado, 2, ',', '.') }}</p>
                        <p>Nome do Segurado: {{ $apolice->nome_segurado }}</p>
                        @if ($apolice->pdf_path)
                            <a href="{{ asset('storage/' . $apolice->pdf_path) }}" target="_blank">Baixar PDF da Apólice</a>
                        @else
                            <p>Nenhum PDF disponível</p>
                        @endif
                    </div>
                @empty
                    <p>Você não tem apólices cadastradas.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
<!-- C:\laragon\www\public_html\areaDoCliente\resources\views\cliente\cliente.apolices.blade.php -->