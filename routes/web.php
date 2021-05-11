<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ObjetoController;
use App\Http\Controllers\FaseController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\TipoPericiaController;

Route::match(['get', 'post'], '/', [LoginController::class, 'index'])->name("home");
Route::match(['get', 'post'], '/esqueceu-senha', [LoginController::class, 'esqueceuSenha'])->name("esqueceu-senha");


Route::prefix('admin')->name("admin.")->group(function () {
    
    Route::match(['get', 'post'], '/', [AdminController::class, 'index'])->name("home");

    Route::prefix('tipo/documento')->name("tipo_documento.")->group(function () {
        Route::match(['get', 'post'], '/', [TipoDocumentoController::class, 'index'])->name("index");
        Route::match(['get', 'post'], '/{id}', [TipoDocumentoController::class, 'index'])->name("edit");
        Route::match(['get', 'post'], '/delete/{id}', [TipoDocumentoController::class, 'delete'])->name("delete");
    });

    Route::prefix('tipo/pericia')->name("tipo_pericia.")->group(function () {
        Route::match(['get', 'post'], '/', [TipoPericiaController::class, 'index'])->name("index");
        Route::match(['get', 'post'], '/{id}', [TipoPericiaController::class, 'index'])->name("edit");
        Route::match(['get', 'post'], '/delete/{id}', [TipoPericiaController::class, 'delete'])->name("delete");
    });

    Route::prefix('objeto')->name("objeto.")->group(function () {
        Route::match(['get', 'post'], '/', [ObjetoController::class, 'index'])->name("index");
        Route::match(['get', 'post'], '/{id}', [ObjetoController::class, 'index'])->name("edit");
        Route::match(['get', 'post'], '/delete/{id}', [ObjetoController::class, 'delete'])->name("delete");
    });
    Route::prefix('fases')->name("fases.")->group(function () {
        Route::match(['get', 'post'], '/', [FaseController::class, 'index'])->name("index");
        Route::match(['get', 'post'], '/{id}', [FaseController::class, 'index'])->name("edit");
        Route::match(['get', 'post'], '/delete/{id}', [FaseController::class, 'delete'])->name("delete");
    });
    Route::prefix('tag')->name("tag.")->group(function () {
        Route::match(['get', 'post'], '/', [TagController::class, 'index'])->name("index");
        Route::match(['get', 'post'], '/{id}', [TagController::class, 'index'])->name("edit");
        Route::match(['get', 'post'], '/delete/{id}', [TagController::class, 'delete'])->name("delete");
    });
});

