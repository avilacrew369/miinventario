<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PurchaseOrderController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\WarehouseController;
use Illuminate\Support\Facades\Route;




Route::get('/', function(){
    return view('admin.dashboard');
})->name('dashboard');

// Inventario

Route::resource('categories', CategoryController::class);

Route::resource('products', ProductController::class);
Route::post('products/{product}/dropzone', [ProductController::class, 'dropzone'])
    ->name('products.dropzone');

    
    
    Route::resource('warehouses', WarehouseController::class);
    
    // Compras
    Route::resource('suppliers', SupplierController::class);
    Route::resource('purchase-orders', PurchaseOrderController::class)->only('index', 'create');
    
    // Ventas
    Route::resource('customers', CustomerController::class);

    Route::delete('images/{image}', [ImageController::class, 'destroy'])
    ->name('images.destroy');
