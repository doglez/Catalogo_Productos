<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/**
 * --------------------------------------------------------------------------
 * Crud de Marcas
 * --------------------------------------------------------------------------
 * 
 */
Route::middleware(['auth:sanctum', 'verified'])->get('/adminMarcas', [MarcaController::class, 'index'])->name('adminMarcas');
Route::middleware(['auth:sanctum', 'verified'])->get('/agregarMarca', [ MarcaController::class, 'create'])->name('agregarMarca');
Route::middleware(['auth:sanctum', 'verified'])->post('/agregarMarca', [MarcaController::class, 'store'])->name('agregarMarca');
Route::middleware(['auth:sanctum', 'verified'])->get('/modificarMarca/{id}', [MarcaController::class, 'edit'])->name('modificarMarca');
Route::middleware(['auth:sanctum', 'verified'])->put('/modificarMarca', [MarcaController::class, 'update'])->name('modificarMarca');
Route::middleware(['auth:sanctum', 'verified'])->get('/eliminarMarca/{id}', [MarcaController::class, 'confirmarBaja'])->name('eliminarMarca');
Route::middleware(['auth:sanctum', 'verified'])->delete('/eliminarMarca', [MarcaController::class, 'destroy'])->name('eliminarMarca');

/**
 * --------------------------------------------------------------------------
 * Crud de Categorias
 * --------------------------------------------------------------------------
 * 
 */
Route::middleware(['auth:sanctum', 'verified'])->get('/adminCategorias', [CategoriaController::class, 'index'])->name('adminCategorias');