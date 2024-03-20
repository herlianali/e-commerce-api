<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('auth', [App\Http\Controllers\AuthController::class, 'redirectToAuth']);
Route::get('auth/callback', [App\Http\Controllers\AuthController::class, 'handleAuthCallback']);
Route::resource('user', App\Http\Controllers\UserController::class);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
// Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

// Route::middleware('auth:api')->group(function() {
//     Route::get('/me', [App\Http\Controllers\UserController::class, 'me']);
//     Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
// });

// Route::name('.')->group(function () {
//     Route::prefix('produk')->name('produk.')->group(function () {
//         Route::resource('/', App\Http\Controllers\ProdukController::class)->parameter('', 'id');
//     });
// });