<?php

use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('/products', ProductController::class);
Route::apiResource('/stores', StoreController::class);
Route::apiResource('/productions', ProductController::class);
Route::apiResource('/warehouses', WarehouseController::class);
Route::apiResource('/incomes', IncomeController::class);
Route::apiResource('/sells', SellController::class);