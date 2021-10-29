<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

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

Route::name('library.')->group(function(){
    Route::get('/',[LibraryController::class, 'index'])->name('home');
    Route::get('/sobre',[LibraryController::class, 'about'])->name('about');
    Route::get('/livro/{book}',[LibraryController::class, 'show'])->name('show');
});

Route::middleware('auth')->group(function(){
    Route::prefix('dashboard')->group(function(){
        Route::name('dashboard.')->group(function(){

            Route::name('loans.')->group(function(){
                Route::get('meus-emprestimos',[LoanController::class, 'show'])->name('my');
                Route::get('emprestimos',[LoanController::class, 'index'])->name('index')->middleware('can:create');
                Route::get('emprestimos/cadastrar',[LoanController::class, 'create'])->name('create')->middleware('can:create');
                Route::post('emprestimos/cadastrar',[LoanController::class, 'store'])->name('store')->middleware('can:create');
                Route::get('emprestimos/atualizar/{loan}',[LoanController::class, 'update'])->name('update')->middleware('can:update');
            });

            Route::name('book.')->group(function(){
                Route::get('livros',[BookController::class, 'index'])->name('index')->middleware('can:create');

                Route::get('livros/cadastrar',[BookController::class, 'create'])->name('create')->middleware('can:create');
                Route::post('livros/cadastrar',[BookController::class, 'store'])->name('store')->middleware('can:create');

                Route::get('livro/{book}',[BookController::class, 'show'])->name('single');
                Route::get('livro/editar/{book}',[BookController::class, 'edit'])->name('edit')->middleware('can:update');
                Route::post('livro/atualizar/{book}',[BookController::class, 'update'])->name('update');

                Route::delete('livro/deletar/{book}',[BookController::class, 'delete'])->name('delete');
            });

            Route::name('category.')->group(function(){
                Route::get('categorias',[CategoryController::class, 'index'])->name('index');

                Route::get('categorias/cadastrar',[CategoryController::class, 'create'])->name('create')->middleware('can:create');
                Route::post('categorias/cadastrar',[CategoryController::class, 'store'])->name('store')->middleware('can:create');

                Route::delete('categorias/deletar/{category}',[CategoryController::class, 'delete'])->name('delete')->middleware('can:delete');;
            });

            Route::name('users.')->group(function(){
                Route::get('usuarios/administradores',[UserController::class, 'admins'])->name('admins')->middleware('can:update');
                Route::get('usuarios/functionarios',[UserController::class, 'functionaries'])->name('functionaries')->middleware('can:update');
                Route::get('usuarios/leitores',[UserController::class, 'readers'])->name('readers')->middleware('can:update');

                Route::get('usuario/meu-perfil',[UserController::class, 'profile'])->name('profile');
                Route::get('meu-perfil/editar',[UserController::class, 'edit'])->name('edit');
                Route::post('meu-perfil/atualizar',[UserController::class, 'update'])->name('update');

                Route::delete('usuario/deletar/{user}',[UserController::class, 'delete'])->name('delete')->middleware('can:delete');
                Route::post('usuario/promover/{user}',[UserController::class, 'levelUp'])->name('up')->middleware('can:update-level');
            });
        });
    });
});

require __DIR__.'/auth.php';
