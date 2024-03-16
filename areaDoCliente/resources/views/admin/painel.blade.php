<head>
    <!-- Outros meta tags e declarações aqui -->

    <!-- Referência ao arquivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    <!-- Outros scripts e estilos aqui -->
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 20px;">
            Painel do Administrador
        </h2>
    </x-slot>

    <div class="py-12">
        <a href="{{ route('admin.mostrarInserirApolice') }}" class="btn">Inserir Nova Apólice</a>
    </div>

    @foreach ($apolicesPorUsuario as $userId => $apolices)
        <div class="py-12 expanded-table"> 
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Titular: {{ $apolices->first()->user->full_name ?? 'Não definido' }} ({{ $apolices->first()->user->username ?? 'Não definido' }})</h1>


                    <!-- Tabela de apólices para esse usuário -->
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th>Tipo de Seguro</th>
                                <th>Risco Segurado</th>
                                <th>Vigência</th>
                                <th>Segurado</th>
                                <th>Apólice (PDF)</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($apolices as $apolice)
                                <tr>
                                    <td>{{ $apolice->tipo }}</td>
                                    <td>{{ $apolice->risco_segurado }}</td>
                                    <td>{{ \Carbon\Carbon::parse($apolice->vigencia)->format('d/m/Y') }}</td>
                                    <td>{{ $apolice->segurado }}</td>
                                    <td>
                                        @if ($apolice->pdf_path)
                                            <a href="{{ asset('storage/' . $apolice->pdf_path) }}" target="_blank">Apólice</a>
                                        @else
                                            Sem documento
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.editarApolice', $apolice->id) }}" class="btn btn-primary btn-acao">Editar</a>
                                        <br>
                                        <a href="{{ route('admin.mostrarUploadPdf', $apolice->id) }}" class="btn btn-secondary btn-acao">PDF</a>
                                        <br>
                                        <form action="{{ route('admin.excluirApolice', $apolice->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta apólice?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-acao">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach

    <div style="position: fixed; bottom: 0; width: 100%; height: 50px; background-color: #333; color: white; text-align: center; line-height: 50px; z-index: 999;">
        © 2024 Meet Seguros. Todos os direitos reservados.
    </div>
</x-app-layout>



//C:\laragon\www\public_html\areaDoCliente\resources\views\admin\painel.blade.php