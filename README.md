

// Rotas para Empresas
Route::get('/empresa/registrar', [EmpresaController::class, 'showRegistrationForm'])->name('empresa.registrar');
Route::get('/empresa/login', [EmpresaController::class, 'showLoginForm'])->name('empresa.login');

// Rotas protegidas para Empresas
Route::middleware('auth:empresa')->group(function () {
    Route::get('/empresa/dashboard', [EmpresaController::class, 'dashboard'])->name('empresa.dashboard');
});

// Rotas para Usuários
Route::get('/usuario/registrar', [UsuarioController::class, 'showRegistrationForm'])->name('usuario.registrar');
Route::post('/usuario/registrar', [UsuarioController::class, 'register']);
Route::get('/usuario/login', [UsuarioController::class, 'showLoginForm'])->name('usuario.login');
Route::post('/usuario/login', [UsuarioController::class, 'login']);
Route::post('/usuario/logout', [UsuarioController::class, 'logout'])->name('usuario.logout');


// Rotas protegidas para Usuários
Route::middleware('auth:usuario')->group(function () {
    Route::get('/usuario/dashboard', [UsuarioController::class, 'dashboard'])->name('usuario.dashboard');
});


Configuração Inicial: Instale o Laravel e configure o PostgreSQL.

Autenticação: Crie modelos, migrations, guards e providers para empresas e usuários.

Multi-tenancy: Implemente o middleware para isolar os dados por empresa.

Funcionalidades: Desenvolva o registro, login e dashboards para empresas e usuários.

Testes: Teste o isolamento de dados e a autenticação.

Implantação: Configure o ambiente de produção e publique o projeto.




