<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutheticationController;
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

Route::view('/privada',"private")->middleware('auth')->name('privada');

Route::view('/registroProducto',"create")->middleware('auth')->name('registroProducto');
Route::view('/editarProducto',"edit")->middleware('auth')->name('editarProducto');
//middleware busca una sesion activa del usuario

//rutas para enviar la informacion o peticiones al controlador para verificar la entrada o salida de usuario
Route::post('/validarRegistro',[AutheticationController::class,'register'])->name('validarRegistro');
Route::post('/iniciaSesion',[AutheticationController::class,'login'])->name('iniciaSesion');
Route::get('/logout',[AutheticationController::class,'logout'])->name('logout');


Route::get('productos/crear', 'ProductosController@crear')->name('productos/crear');
Route::put('productos/store', 'ProductosController@store')->name('productos/store');

Route::get('productos', 'ProductosController@index')->name('productos');

Route::get('productos/actualizar/{id}', 'ProductosController@actualizar')->name('productos/actualizar');
Route::put('productos/update/{id}', 'ProductosController@update')->name('productos/update');

Route::put('productos/eliminar/{id}', 'ProductosController@eliminar')->name('productos/eliminar');

Route::get('productos/eliminarimagen/{id}{bid}', 'ProductosController@eliminarimagen')->name('productos/eliminarimagen');

Route::get('productos/detalles/{id}', ['as' => 'productos/detalles', 'uses' => 'ProductosController@detallesproducto']);


