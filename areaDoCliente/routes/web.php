<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController; // Lembre-se de importar o controlador

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar as rotas web para sua aplicação.
| Estas rotas são carregadas pelo RouteServiceProvider e todas elas
| serão atribuídas ao grupo de middleware "web". Faça algo ótimo!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rotas protegidas por autenticação
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Dashboard do cliente
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rota para o perfil do cliente
    Route::get('/area-do-cliente/perfil', [ClienteController::class, 'perfil'])->name('cliente.perfil');
    Route::post('/area-do-cliente/atualizar-perfil', [ClienteController::class, 'atualizarPerfil'])->name('cliente.atualizarPerfil');
    Route::get('/area-do-cliente/editar-perfil', [ClienteController::class, 'editarPerfil'])->name('cliente.editarPerfil');


    // Outras rotas da área do cliente podem ser adicionadas aqui
    // Por exemplo: Route::get('/area-do-cliente/minhas-compras', [ClienteController::class, 'minhasCompras'])->name('cliente.minhasCompras');
});

// Você pode adicionar outras rotas web gerais aqui, se necessário
// C:\laragon\www\public_html\areaDoCliente\routes\web.php