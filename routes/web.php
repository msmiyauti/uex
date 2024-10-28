<?php

use App\Http\Controllers\ContatosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',  [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    /**
     * Rota para lista de contatos
     */
    Route::get('/contatos', [ContatosController::class, 'index'])->name('contatos');

    /**
     * Rota para formulario de criar de um contato.
     */
    Route::get('/contatos/create', [ContatosController::class, 'create'])->name('contatos.create');

    /**
     * Rota para formulario de atualização de um contato.
     */
    Route::get('/contatos/edit/{id}', [ContatosController::class, 'edit'])->name('contatos.edit');

    /** 
     * Rota atualizar um contato
     */
    Route::patch('/contatos', [ContatosController::class, 'update'])->name('contatos.update');

    /** 
     * Rota salvar um contato
     */
    Route::patch('/contatos/save', [ContatosController::class, 'save'])->name('contatos.save');

    /**
     * Rota para excluir um contato
     */
    Route::delete('/contatos/{id}', [ContatosController::class, 'destroy'])->name('contatos.destroy');

});

require __DIR__.'/auth.php';
