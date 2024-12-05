<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ShelfController;
use App\Http\Controllers\WarehouseController;




Route::prefix('v1')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');


    Route::prefix('item')->group(function () {
        Route::get('', [ItemController::class, 'index']);
        Route::get('/top', [ItemController::class, 'top']);
        Route::get('/{id}', [ItemController::class, 'info']);
    });

    Route::prefix('shelf')->group(function () {
        Route::get('', [ShelfController::class,'index']);
        Route::get('/top', [ShelfController::class,'top']);
        Route::get('/{id}', [ShelfController::class,'info']);
    });

    Route::prefix('warehouse')->group(function () {
        Route::get('', [WarehouseController::class,'index']);
        Route::get('/top', [WarehouseController::class,'top']);
        Route::get('/{id}', [WarehouseController::class,'info']);
    });
});
