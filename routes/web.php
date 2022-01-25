<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IdosoController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\MinistracaoController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
})->name('index');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('dashboard/idosos/form', [IdosoController::class, 'form'])->name('form-idoso');
    Route::post('dashboard/idosos/create', [IdosoController::class, 'create'])->name('create-idoso');
    Route::get('dashboard/idosos/', [IdosoController::class, 'show'])->name('list-idosos');
    Route::get('dashboard/idosos/delete/{id}', [IdosoController::class, 'destroy'])->name('delete-idoso');
    Route::get('dashboard/idosos/edit/{id}', [IdosoController::class, 'edit'])->name('editar-idoso');
    Route::post('dashboard/idosos/update/{id}', [IdosoController::class, 'update'])->name('update-idoso');

    Route::get('dashboard/medicamentos/form', [MedicamentoController::class, 'form'])->name('form-med');
    Route::post('dashboard/medicamentos/create', [MedicamentoController::class, 'create'])->name('create-med');
    Route::get('dashboard/medicamentos/', [MedicamentoController::class, 'show'])->name('list-meds');
    Route::get('dashboard/medicamentos/delete/{id}', [MedicamentoController::class, 'destroy'])->name('delete-med');
    Route::get('dashboard/medicamentos/edit/{id}', [MedicamentoController::class, 'edit'])->name('editar-med');
    Route::post('dashboard/medicamentos/update/{id}', [MedicamentoController::class, 'update'])->name('update-med');

    Route::get('dashboard/estoque/form', [EstoqueController::class, 'form'])->name('form-estoque');
    Route::post('dashboard/estoque/create', [EstoqueController::class, 'create'])->name('create-estoque');
    Route::get('dashboard/estoque/', [EstoqueController::class, 'show'])->name('list-estoque');
    Route::get('dashboard/estoque/delete/{id}', [EstoqueController::class, 'destroy'])->name('delete-estoque');
    Route::get('dashboard/estoque/edit/{id}', [EstoqueController::class, 'edit'])->name('editar-estoque');
    Route::post('dashboard/estoque/update/{id}', [EstoqueController::class, 'update'])->name('update-estoque');

    Route::get('dashboard/ministracao/form', [MinistracaoController::class, 'form'])->name('form-ministracao');
    Route::post('dashboard/ministracao/create', [MinistracaoController::class, 'create'])->name('create-ministracao');
    Route::get('dashboard/ministracao/', [MinistracaoController::class, 'show'])->name('list-ministracao');
    Route::get('dashboard/ministracao/delete/{id}', [MinistracaoController::class, 'destroy'])->name('delete-ministracao');
    Route::get('dashboard/ministracao/edit/{id}', [MinistracaoController::class, 'edit'])->name('editar-ministracao');
    Route::post('dashboard/ministracao/update/{id}', [MinistracaoController::class, 'update'])->name('update-ministracao');

    Route::get('/perfil', [UserController::class, 'perfil'])->name('perfil');
    Route::post('/perfil/update', [UserController::class, 'update'])->name('update-perfil');

});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('dashboard/users', [AdminController::class, 'listUsers'])->name('list-users');
    Route::get('dashboard/users/edit/{id}', [AdminController::class, 'editUser'])->name('editar-user');
    Route::post('dashboard/users/update/{id}', [AdminController::class, 'updateUser'])->name('update-user');
    Route::get('dashboard/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete-user');
});

require __DIR__.'/auth.php';
