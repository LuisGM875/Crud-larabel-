<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutheticationController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriasController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//ruta para ventana login
Route::view('/login',"login")->name('login');
//ruta para ventana de registro
Route::view('/registro',"register")->name('registro');
//ruta para enviar a usuario a su sesion
//Route::view('/privada',[CategoriasController::class,'index'])->middleware('auth')->name('privada');

Route::view('/registroProducto',"create")->middleware('auth')->name('registroProducto');
Route::view('/editarProducto',"edit")->middleware('auth')->name('editarProducto');
//middleware busca una sesion activa del usuario

//rutas para enviar la informacion o peticiones al controlador para verificar la entrada o salida de usuario
Route::post('/validarRegistro',[AutheticationController::class,'register'])->name('validarRegistro');
Route::post('/iniciaSesion',[AutheticationController::class,'login'])->name('iniciaSesion');
Route::get('/logout',[AutheticationController::class,'logout'])->name('logout');


Route::get('/categorias/{categorias_id}/productos/crear', [ProductosController::class, 'create'])->middleware('auth')->name('productos/crear');

Route::put('/categorias/{categorias_id}/productos/store', [ProductosController::class, 'store'])->middleware('auth')->name('productos/store');

Route::get('/categorias/{categorias_id}/productos', [ProductosController::class, 'index'])->middleware('auth')->name('productos');

Route::get('/categorias/{categorias_id}/productos', [ProductosController::class, 'index'])->middleware('auth')->name('productos/index');

Route::get('/categorias/{categorias_id}/productos/actualizar/{id}', [ProductosController::class, 'actualizar'])->middleware('auth')->name('productos/actualizar');

Route::put('/categorias/{categorias_id}/productos/update/{id}', [ProductosController::class, 'update'])->middleware('auth')->name('productos/update');

Route::delete('/categorias/{categorias_id}/productos/eliminar/{id}', [ProductosController::class, 'eliminar'])->middleware('auth')->name('productos/eliminar');

Route::get('/categorias/{categorias_id}/productos/eliminarimagen/{id}/{bid}', [ProductosController::class, 'eliminarimagen'])->middleware('auth')->name('productos/eliminarimagen');

Route::get('/categorias/{categorias_id}/productos/detalles/{id}', [ProductosController::class, 'detallesproducto'])->middleware('auth')->name('productos.detalles');

//Ruta de categorias
Route::middleware(['auth'])->group(function () {
    Route::delete('categorias/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');

    // Resto de las rutas relacionadas a categorías
    Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');
    Route::post('/categorias', [CategoriasController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/{id}/edit', [CategoriasController::class, 'edit'])->name('categorias.edit');
    Route::put('/categorias/{id}', [CategoriasController::class, 'update'])->name('categorias.update');
});
