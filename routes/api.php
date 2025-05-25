<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

// Mặc định apiResource sẽ trỏ tới 5 phương thức mắc định ở controlle api
// nếu muốn tạo thêm phức thức mới conv=troller
// thì taijcaanf 
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
// Route::apiResource('products', ProductController::class);
Route::apiResource('products', ProductController::class)->middleware('auth:sanctum');
