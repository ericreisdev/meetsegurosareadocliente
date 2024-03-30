<!-- <?php

        use Illuminate\Support\Facades\Route;
        use App\Http\Controllers\ClienteController; // Lembre-se de importar o controlador
        use App\Http\Controllers\AdminController;

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


        Route::middleware(['auth:sanctum', 'verified'])->group(function () {
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->name('dashboard');

            // Rotas para clientes
            Route::get('/area-do-cliente/perfil', [ClienteController::class, 'perfil'])->name('cliente.perfil');
            Route::get('/area-do-cliente/apolices', [ClienteController::class, 'apolices'])->name('cliente.apolices');
            
           

            Route::middleware(['isAdmin'])->group(function () {
                Route::get('/admin/painel', [AdminController::class, 'painel'])->name('admin.painel');
                Route::get('/admin/editar-usuario/{id}', [AdminController::class, 'editarUsuario'])->name('admin.editarUsuario');
                Route::put('/admin/atualizar-usuario/{id}', [AdminController::class, 'atualizarUsuario'])->name('admin.atualizarUsuario');
                // Adicione aqui outras rotas de administração conforme necessário  

                Route::get('/register', function () {
                    return view('auth.register');
                })->name('register');

                // Rotas para visualização de formulários
                Route::get('/admin/inserir-apolice', [AdminController::class, 'mostrarInserirApolice'])->name('admin.mostrarInserirApolice');
                Route::get('/admin/upload-pdf/{apoliceId}', [AdminController::class, 'mostrarUploadPdf'])->name('admin.mostrarUploadPdf');

                // Rotas para ação dos formulários
                Route::post('/admin/inserir-apolice', [AdminController::class, 'inserirApolice'])->name('admin.inserirApolice');
                Route::post('/admin/upload-pdf/{apoliceId}', [AdminController::class, 'uploadPdf'])->name('admin.uploadPdf');
                Route::delete('/admin/excluir-apolice/{id}', [AdminController::class, 'excluirApolice'])->name('admin.excluirApolice');
                Route::get('/admin/editar-apolice/{id}', [AdminController::class, 'editarApolice'])->name('admin.editarApolice');

                Route::post('/admin/gerenciar-documentos/{apoliceId}', [AdminController::class, 'gerenciarDocumentos'])->name('admin.gerenciarDocumentos');

                Route::put('/admin/atualizar-apolice/{id}', [AdminController::class, 'atualizarApolice'])->name('admin.atualizarApolice');

            });
        }); 
        
        
        // Certifique-se de que esta chave fecha o grupo de middleware 'auth:sanctum', 'v;erified'
        
        // Você pode adicionar outras rotas web gerais aqui, se necessário
// C:\laragon\www\public_html\areaDoCliente\routes\web.php