{{-- resources/views/cliente/apolices.blade.php --}}

<head>
    <!-- Outros meta tags e declarações aqui -->

    <!-- Referência ao arquivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    <!-- Outros scripts e estilos aqui -->
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Minhas Apólices
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th>Tipo de Seguro</th>
                            <th>Risco Segurado</th>
                            <th>Vigência</th>
                            <th>Segurado</th>
                            <th>Apólice (PDF)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($apolices as $apolice)
                            <tr>
                                <td>{{ $apolice->tipo }}</td>
                                <td>{{ $apolice->risco_segurado }}</td>
                                <td>{{ \Carbon\Carbon::parse($apolice->vigencia)->format('d/m/Y') }}</td>
                                <td>{{ $apolice->user->full_name }}</td>
                                <td>
                                    @if ($apolice->pdf_path)
                                        <a href="{{ asset('storage/' . $apolice->pdf_path) }}" target="_blank">Baixar PDF</a>
                                    @else
                                        Sem documento
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Você não tem apólices cadastradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- C:\laragon\www\public_html\areaDoCliente\resources\views\cliente\cliente.apolices.blade.php -->