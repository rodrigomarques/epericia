<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ObjetoController;
use App\Http\Controllers\FaseController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\TipoPericiaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DocumentoExigidoController;
use App\Http\Controllers\ProcessoController;


Route::match(['get', 'post'], '/', [LoginController::class, 'index'])->name("home");
Route::match(['get', 'post'], '/login', [LoginController::class, 'index'])->name("login");
Route::match(['get', 'post'], '/esqueceu-senha', [LoginController::class, 'esqueceuSenha'])->name("esqueceu-senha");
Route::match(['get', 'post'], '/new-password', [LoginController::class, 'newPassword'])->name("new-password");


Route::middleware(['auth', 'validate.access'])->prefix('admin')->name("admin.")->group(function () {

    Route::match(['get', 'post'], '/naoautorizado', [AdminController::class, 'naoautorizado'])->name("naoautorizado");
    Route::match(['get', 'post'], '/', [AdminController::class, 'index'])->name("home");
    Route::match(['get', 'post'], '/sair', [AdminController::class, 'sair'])->name("sair");

    Route::prefix('documento/exigido')->name("documento_exigido.")->group(function () {
        Route::match(['get', 'post'], '/', [DocumentoExigidoController::class, 'index'])->name("index");
        Route::match(['get', 'post'], '/{id}', [DocumentoExigidoController::class, 'index'])->name("edit");
        Route::match(['get', 'post'], '/delete/{id}', [DocumentoExigidoController::class, 'delete'])->name("delete");
    });

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

    Route::prefix('usuario')->name("usuario.")->group(function () {
        Route::match(['get', 'post'], '/', [UsuarioController::class, 'index'])->name("index");
        Route::match(['get', 'post'], '/edit/{id}', [UsuarioController::class, 'index'])->name("edit");
        Route::match(['get', 'post'], '/buscar', [UsuarioController::class, 'buscar'])->name("buscar");
        Route::match(['get', 'post'], '/delete/{id}', [UsuarioController::class, 'delete'])->name("delete");
        Route::match(['get', 'post'], '/perfil', [UsuarioController::class, 'perfil'])->name("perfil");
        Route::match(['get', 'post'], '/{id}/perfil', [UsuarioController::class, 'perfil'])->name("perfil.edit");
        Route::match(['get', 'post'], '/{id}/perfil/delete', [UsuarioController::class, 'perfilDelete'])->name("perfil.delete");
        Route::match(['get', 'post'], '/{id}/perfil/access', [UsuarioController::class, 'access'])->name("perfil.access");
    });

    Route::prefix('processo')->name("processo.")->group(function () {
        Route::match(['get', 'post'], '/', [ProcessoController::class, 'index'])->name("index");
        Route::match(['get', 'post'], '/buscar', [ProcessoController::class, 'buscar'])->name("buscar");
        Route::match(['get', 'post'], '/{id}/excluir', [ProcessoController::class, 'delete'])->name("delete");
        Route::match(['get', 'post'], '/{id}/{processo}/pericia', [ProcessoController::class, 'pericia'])->name("pericia");


    });
});

