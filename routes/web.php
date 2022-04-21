<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfflineController;
use App\Models\Contato;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')
    ->get('/login', [LoginController::class,'Index'])->name('login.index');

Route::middleware('guest')
    ->post('/login', [LoginController::class,'Login'])->name('login.logar');

Route::get('/logout', [LoginController::class,'logout'])->name('login.logout');

Route::middleware('guest')
    ->get('/register', [LoginController::class,'create'])->name('login.create');

Route::middleware('guest')
    ->post('/register', [LoginController::class,'register'])->name('login.register');

Route::resource('contato', ContatoController::class);

Route::middleware('guest')
    ->get('/', [OfflineController::class,'index'])->name('offline.index');

Route::get('/lixo', [ContatoController::class,'trashed'])->name('contato.trash');

Route::get('/restore/{id}', [ContatoController::class,'restaurar'])->name('contato.restore');
