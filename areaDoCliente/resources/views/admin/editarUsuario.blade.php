<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Área do Administrador - Editar Perfil do Cliente
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <!-- Formulário de edição de perfil -->
                <form action="{{ route('admin.atualizarUsuario', $user->id) }}" method="POST" class="px-4 py-5 sm:p-6">
                    @csrf
                    @method('PUT')
                    <!-- Campos do formulário aqui -->
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


<!-- C:\laragon\www\public_html\areaDoCliente\resources\views\admin\editarUsuario.blade.php -->