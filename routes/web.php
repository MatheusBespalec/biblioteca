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
            Route::get('meus-emprestimos',[LoanController::class, 'show'])->name('loans.my');
            Route::get('emprestimos',[LoanController::class, 'index'])->name('loans');
            Route::get('emprestimos/cadastrar',[LoanController::class, 'create'])->name('loans.create');
            Route::post('emprestimos/cadastrar',[LoanController::class, 'store'])->name('loans.store');
            Route::get('emprestimos/atualizar/{loan}',[LoanController::class, 'update'])->name('loans.update');

            Route::get('livros',[BookController::class, 'index'])->name('book.index');
            Route::post('livros',[BookController::class, 'search'])->name('book.search');
            Route::get('livros/cadastrar',[BookController::class, 'create'])->name('book.create');
            Route::post('livros/cadastrar',[BookController::class, 'store'])->name('book.store');
            Route::get('livro/{book}',[BookController::class, 'show'])->name('book.single');
            Route::get('livro/editar/{book}',[BookController::class, 'edit'])->name('book.edit');
            Route::post('atualizar/livro/{id}',[BookController::class, 'update'])->name('book.update');

            Route::get('categorias',[CategoryController::class, 'index'])->name('category.index');
            Route::get('categorias/cadastrar',[CategoryController::class, 'create'])->name('category.create');
            Route::post('categorias/cadastrar',[CategoryController::class, 'store'])->name('category.store');

            Route::get('usuarios',[UserController::class, 'index'])->name('users');
            Route::get('usuario/meu-perfil',[UserController::class, 'profile'])->name('profile');
            Route::get('meu-perfil/editar',[UserController::class, 'edit'])->name('users.edit');
            Route::post('meu-perfil/atualizar',[UserController::class, 'update'])->name('users.update');
        });
    });
});

require __DIR__.'/auth.php';
