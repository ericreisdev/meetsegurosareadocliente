<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Inserir Nova Apólice
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <form action="{{ route('admin.inserirApolice') }}" method="POST">
                    @csrf
                    <!-- Campos do formulário -->
                    <input type="text" name="tipo" placeholder="Tipo de Seguro" required>
<input type="text" name="risco_segurado" placeholder="Risco Segurado" required>
<input type="date" name="vigencia" placeholder="Vigência" required>
<input type="text" name="segurado" placeholder="Segurado" required>

                    <select name="user_id">
       @foreach ($users as $user)
           <option value="{{ $user->id }}">{{ $user->full_name }}</option>
       @endforeach
   </select>
                    <button type="submit" class="btn btn-primary">Salvar Apólice</button>
                </form>
            </div>

         
   
        </div>
    </div>
</x-app-layout>
<!-- C:\laragon\www\public_html\areaDoCliente\resources\views\admin\inserirApolice.blade.php -->