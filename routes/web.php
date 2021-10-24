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
});

Route::middleware('auth')->group(function(){
    Route::prefix('dashboard')->group(function(){
        Route::name('dashboard.')->group(function(){
            Route::get('painel/meus-emprestimos',[LoanController::class, 'index'])->name('loans.my');
            Route::get('painel/emprestimos',[LoanController::class, 'show'])->name('loans');

            Route::get('livros',[BookController::class, 'search'])->name('book.search');
            Route::get('livros/cadastrar',[BookController::class, 'create'])->name('book.create');
            Route::post('livros/cadastrar',[BookController::class, 'store'])->name('book.store');

            Route::get('{menu}/nova',[CategoryController::class, 'create'])->name('category.create');
            Route::get('{menu}/todas',[CategoryController::class, 'show'])->name('category.show');

            Route::get('{menu}/lista',[UserController::class, 'index'])->name('users');
            Route::get('{menu}/meu-perfil',[UserController::class, 'show'])->name('users.show');

        });
    });
});

require __DIR__.'/auth.php';
