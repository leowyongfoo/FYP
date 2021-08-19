<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('index', function () {
    return view('index');
})->middleware('auth');


Auth::routes();

//status route
Route::get('/status', [App\Http\Controllers\StatusController::class, 'index'])->name('status.index');
Route::get('/status/create', [App\Http\Controllers\StatusController::class, 'create'])->name('status.create');
Route::post('/status', [App\Http\Controllers\StatusController::class, 'store'])->name('status.store');
Route::get('/deleteStatus/{id}', [App\Http\Controllers\StatusController::class, 'delete'])->name('deleteStatus');

//category route
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::get('/deleteCategory/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('deleteCategory');

//inventory route
Route::get('/inventory', [App\Http\Controllers\InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventory/create', [App\Http\Controllers\InventoryController::class, 'create'])->name('inventory.create');
Route::post('/inventory', [App\Http\Controllers\InventoryController::class, 'store'])->name('inventory.store');
Route::get('/inventory/{id}/edit', [App\Http\Controllers\InventoryController::class, 'edit'])->name('inventory.edit');
Route::patch('/inventory/{id}', [App\Http\Controllers\InventoryController::class, 'update'])->name('inventory.update');
Route::get('/deleteInventory/{id}', [App\Http\Controllers\InventoryController::class, 'delete'])->name('deleteInventory');

//supplier route
Route::get('/supplier', [App\Http\Controllers\SupplierController::class, 'index'])->name('supplier.index');
Route::get('/supplier/create', [App\Http\Controllers\SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier', [App\Http\Controllers\SupplierController::class, 'store'])->name('supplier.store');
Route::get('/supplier/{id}/edit', [App\Http\Controllers\SupplierController::class, 'edit'])->name('supplier.edit');
Route::patch('/supplier/{id}', [App\Http\Controllers\SupplierController::class, 'update'])->name('supplier.update');
Route::get('/deleteSupplier/{id}', [App\Http\Controllers\SupplierController::class, 'delete'])->name('deleteSupplier');

//delivery order route
Route::get('/deliveryOrder', [App\Http\Controllers\DeliveryOrderController::class, 'index'])->name('deliveryOrder.index');
Route::get('/deliveryOrder/create', [App\Http\Controllers\DeliveryOrderController::class, 'create'])->name('deliveryOrder.create');
Route::post('/deliveryOrder', [App\Http\Controllers\DeliveryOrderController::class, 'store'])->name('deliveryOrder.store');
Route::get('/deliveryOrder/{id}/deleteOrder', [App\Http\Controllers\DeliveryOrderController::class, 'deleteOrder'])->name('deleteOrder');
Route::get('/deliveryOrder/{id}/deleteItem', [App\Http\Controllers\DeliveryOrderController::class, 'deleteItem'])->name('deleteItem');
Route::get('/deliveryOrder/{id}', [App\Http\Controllers\DeliveryOrderController::class, 'show'])->name('deliveryOrder.show');

//customer route
Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
Route::get('/customer/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/{id}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
Route::patch('/customer/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
Route::get('/deleteCustomer/{id}', [App\Http\Controllers\CustomerController::class, 'delete'])->name('deleteCustomer');

Route::get('/quotation', [App\Http\Controllers\QuotationController::class, 'index'])->name('quotation.index');
Route::get('/quotation/create', [App\Http\Controllers\QuotationController::class, 'create'])->name('quotation.create');
Route::post('/quotation', [App\Http\Controllers\QuotationController::class, 'store'])->name('quotation.store');
Route::get('/quotation/{id}/edit', [App\Http\Controllers\QuotationController::class, 'edit'])->name('quotation.edit');
Route::patch('/quotation/{id}', [App\Http\Controllers\QuotationController::class, 'update'])->name('quotation.update');
Route::get('/deleteQuotation/{id}', [App\Http\Controllers\QuotationController::class, 'delete'])->name('deleteQuotation');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

