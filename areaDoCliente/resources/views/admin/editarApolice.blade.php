{{-- resources/views/admin/editarApolice.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Apólice
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('admin.atualizarApolice', $apolice->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Campos do formulário -->
                    <input type="text" name="tipo" value="{{ $apolice->tipo }}">
                    <input type="number" name="valor_segurado" value="{{ $apolice->valor_segurado }}">
                    <input type="text" name="nome_segurado" value="{{ $apolice->nome_segurado }}">
                    <button type="submit" class="btn btn-primary">Atualizar Apólice</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>



<!-- C:\laragon\www\public_html\areaDoCliente\resources\views\admin\editarApolice.blade.php -->