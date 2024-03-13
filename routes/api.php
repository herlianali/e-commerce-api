<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:api')->group(function() {
    Route::get('/me', [App\Http\Controllers\UserController::class, 'me']);
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
});

Route::name('.')->group(function () {
    Route::prefix('produk')->name('produk.')->group(function () {
        Route::resource('/', App\Http\Controllers\ProdukController::class)->parameter('', 'id');
    });
});

// Route::name('.')->group(function () {
//     Route::prefix('user')->name('user.')->group(function () {
//         Route::resource('/', );
//     });
// });
