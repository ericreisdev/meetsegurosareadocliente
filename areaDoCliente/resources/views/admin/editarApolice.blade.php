<head>
    <!-- Outros meta tags e declarações aqui -->

    <!-- Referência ao arquivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    <!-- Outros scripts e estilos aqui -->
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 20px;">
            Editar Apólice
        </h2>
    </x-slot>

    <div class="container">
        <form action="{{ route('admin.atualizarApolice', $apolice->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="cpf">CPF do Usuário</label>
            <input type="text" id="cpf" name="cpf" value="{{ $user->username }}" readonly>

            <label for="nome_completo">Nome Completo do Usuário</label>
            <input type="text" id="nome_completo" name="nome_completo" value="{{ $user->full_name }}" readonly>

            <!-- Os demais campos do formulário aqui -->


    <div class="container">
        <form action="{{ route('admin.atualizarApolice', $apolice->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label for="tipo">Tipo de Seguro</label>
            <input type="text" id="tipo" name="tipo" value="{{ $apolice->tipo }}">

            <label for="risco_segurado">Risco Segurado</label>
            <input type="text" id="risco_segurado" name="risco_segurado" value="{{ $apolice->risco_segurado }}">

            <label for="vigencia">Vigência</label>
            <input type="date" id="vigencia" name="vigencia" value="{{ $apolice->vigencia }}">

            <label for="segurado">Nome do Segurado</label>
            <input type="text" id="segurado" name="segurado" value="{{ $apolice->segurado }}">

            <button type="submit">Atualizar Apólice</button>
        </form>
    </div>

    <div class="rodape" style="position: fixed; bottom: 0; left: 0; width: 100%; background-color: #333; color: white; text-align: center; padding: 15px 0;">
        © 2024 Meet Seguros. Todos os direitos reservados.
    </div>
</x-app-layout>

<!-- C:\laragon\www\public_html\areaDoCliente\resources\views\admin\editarApolice.blade.php -->