<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('/persona/{id}', [PersonaController::class, 'edit']);
Route::post('/persona/{id}', [PersonaController::class, 'update']);
Route::get('/persona/{id}', [PersonaController::class, 'get']);
Route::resource('persona', PersonaController::class);