<?php

use App\Http\Controllers\Api\v1\AuthAndRegister\AuthController;
use App\Http\Controllers\Api\v1\AuthAndRegister\RegisterController;
use App\Http\Controllers\Api\v1\Managment\CatalogController;
use App\Http\Controllers\Api\v1\Managment\DishController;
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


Route::group(['prefix' => 'v1'], function () {

    Route::middleware(['guest', 'throttle:60'])->group(function () {
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::post('register', [RegisterController::class, 'register'])->name('register');
    });

    Route::middleware(['auth:sanctum', 'throttle:60'])->group(function () {

        Route::resources([
            'catalogs' => CatalogController::class,
            'dishes' => DishController::class
        ]);

        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
});

