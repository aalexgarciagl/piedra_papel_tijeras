<?php

use App\Http\Controllers\ControllerPartida;
use App\Http\Controllers\ControllerUsuarios;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('usuarios')->group(function () {
    Route::get("",[ControllerUsuarios::class,"getUsers"]);  
    Route::get("{id}",[ControllerUsuarios::class,"getUser"]); 
    Route::post("",[ControllerUsuarios::class,"setUser"]); 
    Route::delete("{id]",[ControllerUsuarios::class,"deleteUser"]); 
    Route::put("{id}",[ControllerUsuarios::class,"updateUser"]); 
});


Route::prefix('partida')->group(function () {
    Route::get('{id}',[ControllerPartida::class,'getPartida']); 
    Route::get('ranking',[ControllerPartida::class,'showRanking']); 
    Route::get('ranking/{id}',[ControllerPartida::class,'showRankingPlayer']); 
    Route::post('crearPartida',[ControllerPartida::class,'crearPartida']); 
    Route::post('tirada',[ControllerPartida::class,'tirada']); 
});