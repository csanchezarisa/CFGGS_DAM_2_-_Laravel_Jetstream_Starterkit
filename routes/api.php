<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ApioController;

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

Route::get('/prueba', function() {
    return response('ok', 200, array());
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/test', function (Request $request) {
    if ($request->user()->tokenCan('base')) {
        return response('El token tiene permisos');
    }
    else {
        return response('El token no tiene premisos');
    }
});

// Conexión con la tabla apios para todo el mundo
Route::get('/apios', [ApioController::class, 'index']);
Route::get('/apios/{apio}', [ApioController::class, 'show']);

// Conexión con la tabla apios para tokens
Route::middleware('auth:sanctum')->post('/apios', function (Request $request) {
    if ($request->user()->tokenCan('escribir')) {
        return ApioController::store($request);
    }
    else {
        return response('No tienes permisos');
    }
});

Route::middleware('auth:sanctum')->put('/apios/{id}', function ($id, Request $request) {
    if ($request->user()->tokenCan('actualizar')) {
        return ApioController::update($request, $id);
    }
    else {
        return response('No tienes permisos');
    }
});

Route::middleware('auth:sanctum')->delete('/apios/{id}', function ($id, Request $request) {
    if ($request->user()->tokenCan('eliminar')) {
        return ApioController::destroy($id);
    }
    else {
        return response('No tienes permisos');
    }
});