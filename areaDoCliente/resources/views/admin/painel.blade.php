{{-- resources/views/admin/painel.blade.php --}}

<head>
    <!-- Outros meta tags e declarações aqui -->

    <!-- Referência ao arquivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    <!-- Outros scripts e estilos aqui -->
</head>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Painel do Administrador
        </h2>
    </x-slot>

    <div class="py-12">
        <a href="{{ route('admin.mostrarInserirApolice') }}" class="btn">Inserir Nova Apólice</a>
    </div>

    <div class="py-12 expanded-table"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Bem-vindo ao painel do administrador!</h1>

                <!-- Tabela de apólices -->
                <!-- Tabela de apólices -->
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Tipo</th>
                            <th class="border px-4 py-2">Valor Segurado</th>
                            <th class="border px-4 py-2">Nome do Segurado</th>
                            <th class="border px-4 py-2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apolices as $apolice)
                        <tr>
    <td class="border px-4 py-2">{{ $apolice->tipo }}</td>
    <td class="border px-4 py-2">R$ {{ number_format($apolice->valor_segurado, 2, ',', '.') }}</td>
    <td class="border px-4 py-2">{{ $apolice->nome_segurado }}</td>
    <td class="border px-4 py-2">
        @if ($apolice->pdf_path)
        <a href="{{ asset('storage/' . $apolice->pdf_path) }}" target="_blank">Baixar Apólice</a>
        @else
        Nenhuma apólice encontrada
        @endif
    </td>
    <td class="border px-4 py-2">
        <a href="{{ route('admin.editarApolice', $apolice->id) }}" class="btn btn-primary">Editar</a>
        <br><br>
        <a href="{{ route('admin.mostrarUploadPdf', $apolice->id) }}" class="btn btn-secondary">Upload PDF</a>
        <br><br>
        <form action="{{ route('admin.excluirApolice', $apolice->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta apólice?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
    </td>
</tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div style="position: fixed; bottom: 0; width: 100%; height: 50px; background-color: #333; color: white; text-align: center; line-height: 50px; z-index: 999;">
    © 2024 Meet Seguros. Todos os direitos reservados.
</div>


</x-app-layout>
<!-- //C:\laragon\www\public_html\areaDoCliente\resources\views\admin\painel.blade.php -->