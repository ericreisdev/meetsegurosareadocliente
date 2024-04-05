<head>
    <!-- Outros meta tags e declarações aqui -->

    <!-- Referência ao arquivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    <!-- Outros scripts e estilos aqui -->
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Inserir Nova Apólice
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="{{ route('admin.inserirApolice') }}" method="POST" class="container">
                    @csrf
                    <label for="tipo">Tipo de Seguro</label>
                    <input type="text" name="tipo" id="tipo" placeholder="Tipo de Seguro" required class="input" list="tiposDeSeguro">
                    <datalist id="tiposDeSeguro">
                        <option value="Automóvel">
                        <option value="Residencial">
                        <option value="Vida">
                        <option value="Saúde">
                        <option value="Bike">
                        <option value="Condomínio">
                        <option value="Moto">
                        <option value="Máquinas e Equipamentos">
                        <option value="Celular">
                        <option value="Equipamentos Portáteis">
                        <option value="Empresarial">
                        <option value="Fiança">
                        <option value="RC Profissional">
                        <option value="Vida Global">
                        <option value="Saúde Dental">
                        <option value="Caminhão">
                        <option value="Frota">
                        <option value="Riscos Cibernéticos">
                        <option value="Outros">
                    </datalist>
                    <label for="risco_segurado">Risco Segurado</label>
                    <input type="text" name="risco_segurado" placeholder="Risco Segurado" required class="input">
                    <label for="vigencia">Vigência</label>
                    <input type="date" name="vigencia" placeholder="Vigência" required class="input">
                  
                    
                    <label for="user_id">Nome do Segurado</label>
                    <select name="user_id" class="input">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary" style="background-color: var(--jaffa); border-color: var(--gold-sand);">Salvar Apólice</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- C:\laragon\www\public_html\areaDoCliente\resources\views\admin\inserirApolice.blade.php -->