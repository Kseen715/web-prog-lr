<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;




Route::prefix('v1')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');


    Route::prefix('item')->group(function () {
        Route::get('', [ItemController::class, 'index']);
        Route::get('/top', [ItemController::class, 'top']);
        Route::get('/{id}', [ItemController::class, 'info']);
    });
});

// Route::prefix('catalog')->group(function () {
//     Route::get('top', [\App\Http\Controllers\CatalogController::class, 'top']);
//     Route::get('{id}', [\App\Http\Controllers\CatalogController::class, 'info']);
//     Route::get('', [\App\Http\Controllers\CatalogController::class, 'index']);
//     Route::post('', [\App\Http\Controllers\CatalogController::class, 'create']);
// });

// Route::prefix('categories')->group(function () {
//     Route::get('', [\App\Http\Controllers\CategoryController::class, 'index']);
//     Route::get('{id}', [\App\Http\Controllers\CategoryController::class, 'info']);
// });


