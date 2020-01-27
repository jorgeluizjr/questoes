<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'prefix' => 'programa'
], function ($router) {
    Route::apiResource('banca', 'BancaController')
        ->only(['index']);
    Route::apiResource('orgao', 'OrgaoController')
        ->only(['index']);
    Route::apiResource('assunto', 'AssuntoController')
        ->only(['index']);
});

