<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PhoneController;
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

Route::post('actionLogin', [LoginController::class, 'actionLogin']);
Route::post('actionRegister', [LoginController::class, 'actionRegister']);

Route::middleware('auth:api')->group( function () {
    Route::resource('phones', PhoneController::class);
    Route::post('phones/generate', [PhoneController::class, 'generateNoHandphone']);
});
