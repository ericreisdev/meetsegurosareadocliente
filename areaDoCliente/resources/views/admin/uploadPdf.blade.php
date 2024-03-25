<head>
    <!-- Outros meta tags e declarações aqui -->

    <!-- Referência ao arquivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Outros scripts e estilos aqui -->
</head>

<x-app-layout>
    <x-slot name="header">
        <div class="cabecalho">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: var(--athens-gray);">
                Upload de PDF da Apólice
            </h2>
        </div>
    </x-slot>

    <div class="container" style="background-color: var(--ziggurat-light); border: 1px solid var(--bali-hai);">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                <form action="{{ route('admin.uploadPdf', ['apoliceId' => $apolice->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="pdf" style="font-size: 1.1em; font-weight: bold;">Insira o PDF da Apólice:</label>
                        <input type="file" id="pdf" name="pdf" class="input-form" required style="padding: 12px; border: 1px solid var(--bali-hai); border-radius: 4px;">
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: var(--jaffa); border-color: var(--gold-sand);">
                        <i class="fas fa-upload"></i> Enviar PDF
                    </button>
                </form>
                <div style="margin-top: 20px;">
                    <p style="color: var(--bali-hai);">Certifique-se de que o arquivo está no formato correto e legível.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="rodape" style="background-color: var(--bali-hai); color: white;">
        © 2024 Meet Seguros. Todos os direitos reservados.
    </div>
</x-app-layout>


<!-- C:\laragon\www\public_html\areaDoCliente\resources\views\admin\uploadPdf.blade.php -->