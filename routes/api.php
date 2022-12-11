<?php

use App\Http\Controllers\CiudadController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\TiposController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [LoginController::class,'ingresoSistema']);
Route::get('departamentos-listado', [DepartamentoController::class,'listadoDepartamentos']);
Route::get('ciudad-listado/{codigoCiudad}', [CiudadController::class,'listadoCiudades']);
Route::get('tipos-productos-listado', [TiposController::class,'listadoDepartamentos']);
Route::post('productos-crear', [ProductosController::class,'registrarProductos']);

Route::post('usuarios-registrar', [UsuariosController::class,'registrarUsuario']);

