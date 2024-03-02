<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meet Seguros') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: var(--15-grey);">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Seção de perfil resumido -->
                <div class="perfil-resumido mb-8 border-b pb-5">
                    <h3 class="text-2xl font-semibold mb-2" style="color: var(--dark-orange);">
                        Olá, {{ Auth::user()->full_name }}
                    </h3>
                    <p class="text-gray-600">Seu ID de cliente: <span class="font-semibold">{{ Auth::user()->id }}</span></p>
                    <p class="text-gray-600">CPF/CNPJ: <span class="font-semibold">{{ Auth::user()->username }}</span></p>
                    <a href="{{ route('cliente.perfil') }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Editar Perfil</a>
                </div>

                <!-- Espaço reservado para listagem de apólices -->
                <div class="apolices mt-8">
                    <h3 class="text-xl font-semibold mb-4">Suas Apólices</h3>
                    <p class="text-gray-600 mb-4">Informações sobre suas apólices serão exibidas aqui.</p>
                    <!-- Aqui você pode inserir uma tabela ou lista estática como exemplo ou deixar apenas o texto informativo -->
                    <!-- Exemplo de tabela -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Número da Apólice</th>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Tipo de Seguro</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Data de Vencimento</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <tr>
                                    <td class="w-1/3 text-left py-3 px-4">Exemplo 12345</td>
                                    <td class="w-1/3 text-left py-3 px-4">Seguro de Vida</td>
                                    <td class="text-left py-3 px-4">31/12/2024</td>
                                    <td class="text-left py-3 px-4"><a href="#" class="text-blue-500 hover:text-blue-800">Ver Detalhes</a></td>
                                </tr>
                                <!-- Repetir para mais apólices -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<!-- C:\laragon\www\public_html\areaDoCliente\resources\views\dashboard.blade.php -->