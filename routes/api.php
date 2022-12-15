<?php

use App\Http\Controllers\Api\v1\AuthAndRegister\AuthController;
use App\Http\Controllers\Api\v1\AuthAndRegister\RegisterController;
use App\Http\Controllers\Api\v1\Managment\CategoryController;
use App\Http\Controllers\Api\v1\Managment\DishController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ReportController;

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

        Route::get('user', [UserController::class, 'index'])->name('user.index');

        Route::group(['prefix'=>'category'], function () {
            Route::get('all', [CategoryController::class, 'index'])->name('category.all');
            Route::post('show', [CategoryController::class, 'show'])->name('category.show');
            Route::post('create', [CategoryController::class, 'store'])->name('category.create');
            Route::post('update', [CategoryController::class, 'update'])->name('category.update');
            Route::post('delete', [CategoryController::class, 'destroy'])->name('category.delete');
        });

        Route::group(['prefix'=>'dish'], function () {
            Route::get('all', [DishController::class, 'index'])->name('dish.all');
            Route::post('show', [DishController::class, 'show'])->name('dish.show');
            Route::post('create', [DishController::class, 'store'])->name('dish.create');
            Route::post('update', [DishController::class, 'update'])->name('dish.update');
            Route::post('delete', [DishController::class, 'destroy'])->name('dish.delete');
        });

        Route::group(['prefix'=>'report'], function () {
            Route::get('totalCost', [ReportController::class, 'totalCost'])->name('report.totalCost');
        });

        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
});

