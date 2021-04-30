<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::match(['get', 'post'], '/', [LoginController::class, 'index'])->name("home");
Route::match(['get', 'post'], '/esqueceu-senha', [LoginController::class, 'esqueceuSenha'])->name("esqueceu-senha");
