{{-- resources/views/admin/painel.blade.php --}}


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Painel do Administrador
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- ... Conteúdo ... -->
        <a href="{{ route('admin.mostrarInserirApolice') }}" class="btn btn-primary">Inserir Nova Apólice</a>




        <!-- Outros botões conforme necessário -->
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p>Bem-vindo ao painel do administrador!</p>

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
                            <td class="border px-4 py-2">{{ $apolice->valor_segurado }}</td>
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
                                <a href="{{ route('admin.mostrarUploadPdf', $apolice->id) }}" class="btn btn-secondary">Upload PDF</a>
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



</x-app-layout>
<!-- //C:\laragon\www\public_html\areaDoCliente\resources\views\admin\painel.blade.php -->