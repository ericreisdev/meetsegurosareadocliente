<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Upload de PDF da Apólice
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <form action="{{ route('admin.uploadPdf', ['apoliceId' => $apolice->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="pdf" required>
                    <button type="submit" class="btn btn-primary">Enviar PDF</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<!-- C:\laragon\www\public_html\areaDoCliente\resources\views\admin\uploadPdf.blade.php -->