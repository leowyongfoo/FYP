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

Route::get('/index', [App\Http\Controllers\MainPageController::class, 'index'])->name('main.page')->middleware('role:admin');

//status route
Route::get('/status.index', [App\Http\Controllers\StatusController::class, 'index'])->name('status.index')->middleware('role:admin');
Route::get('/status.create', [App\Http\Controllers\StatusController::class, 'create'])->name('status.create')->middleware('role:admin');
Route::post('/status', [App\Http\Controllers\StatusController::class, 'store'])->name('status.store')->middleware('role:admin');
Route::get('/deleteStatus/{id}', [App\Http\Controllers\StatusController::class, 'delete'])->name('deleteStatus')->middleware('role:admin');

//category route
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index')->middleware('role:admin');
Route::get('/category.create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create')->middleware('role:admin');
Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store')->middleware('role:admin');
Route::get('/deleteCategory/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('deleteCategory')->middleware('role:admin');
Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'changeStatus'])->name('category.changeStatus')->middleware('role:admin');

//inventory route
Route::get('/inventory', [App\Http\Controllers\InventoryController::class, 'index'])->name('inventory.index')->middleware('role:admin');
Route::get('/clientView', [App\Http\Controllers\InventoryController::class, 'clientView'])->name('inventory.clientView')->middleware('role:admin');
Route::get('/productDetail.{id}', [App\Http\Controllers\InventoryController::class, 'viewDetail'])->name('inventory.productDetail')->middleware('role:admin');
Route::get('/inventory.create', [App\Http\Controllers\InventoryController::class, 'create'])->name('inventory.create')->middleware('role:admin');
Route::post('/inventory', [App\Http\Controllers\InventoryController::class, 'store'])->name('inventory.store')->middleware('role:admin');
Route::get('/inventory.{id}.edit', [App\Http\Controllers\InventoryController::class, 'edit'])->name('inventory.edit')->middleware('role:admin');
Route::patch('/inventory/{id}', [App\Http\Controllers\InventoryController::class, 'update'])->name('inventory.update')->middleware('role:admin');
Route::get('/deleteInventory/{id}', [App\Http\Controllers\InventoryController::class, 'delete'])->name('deleteInventory')->middleware('role:admin');
Route::get('/inventory/{id}', [App\Http\Controllers\InventoryController::class, 'changeStatus'])->name('inventory.changeStatus')->middleware('role:admin');

//supplier route
Route::get('/supplier', [App\Http\Controllers\SupplierController::class, 'index'])->name('supplier.index')->middleware('role:admin');
Route::get('/supplier.create', [App\Http\Controllers\SupplierController::class, 'create'])->name('supplier.create')->middleware('role:admin');
Route::post('/supplier', [App\Http\Controllers\SupplierController::class, 'store'])->name('supplier.store')->middleware('role:admin');
Route::get('/supplier.{id}.edit', [App\Http\Controllers\SupplierController::class, 'edit'])->name('supplier.edit')->middleware('role:admin');
Route::patch('/supplier/{id}', [App\Http\Controllers\SupplierController::class, 'update'])->name('supplier.update')->middleware('role:admin');
Route::get('/deleteSupplier/{id}', [App\Http\Controllers\SupplierController::class, 'delete'])->name('deleteSupplier')->middleware('role:admin');

//delivery order route
Route::get('/deliveryOrder', [App\Http\Controllers\DeliveryOrderController::class, 'index'])->name('deliveryOrder.index')->middleware('role:admin');
Route::get('/deliveryOrder.create', [App\Http\Controllers\DeliveryOrderController::class, 'create'])->name('deliveryOrder.create')->middleware('role:admin');
Route::post('/deliveryOrder', [App\Http\Controllers\DeliveryOrderController::class, 'store'])->name('deliveryOrder.store')->middleware('role:admin');
Route::get('/deliveryOrder/{id}/restock', [App\Http\Controllers\DeliveryOrderController::class, 'restock'])->name('restock')->middleware('role:admin');
Route::get('/deliveryOrder/{id}/deleteOrder', [App\Http\Controllers\DeliveryOrderController::class, 'deleteOrder'])->name('deleteOrder')->middleware('role:admin');
Route::get('/deliveryOrder/{id}/deleteItem', [App\Http\Controllers\DeliveryOrderController::class, 'deleteItem'])->name('deleteItem')->middleware('role:admin');
Route::get('/deliveryOrder.{id}.edit', [App\Http\Controllers\DeliveryOrderController::class, 'edit'])->name('deliveryOrder.edit')->middleware('role:admin');
Route::get('/deliveryOrder.{id}', [App\Http\Controllers\DeliveryOrderController::class, 'show'])->name('deliveryOrder.show')->middleware('role:admin');
Route::patch('/deliveryOrder/{id}', [App\Http\Controllers\DeliveryOrderController::class, 'update'])->name('deliveryOrder.update')->middleware('role:admin');

//customer order route
Route::get('/customerOrder', [App\Http\Controllers\CustomerOrderController::class, 'index'])->name('customerOrder.index')->middleware('role:admin');
Route::get('/customerOrder.create', [App\Http\Controllers\CustomerOrderController::class, 'create'])->name('customerOrder.create')->middleware('role:admin');
Route::post('/customerOrder', [App\Http\Controllers\CustomerOrderController::class, 'store'])->name('customerOrder.store')->middleware('role:admin');
Route::get('/customerOrder/{id}/deleteOrder', [App\Http\Controllers\CustomerOrderController::class, 'deleteOrder'])->name('deleteOrder')->middleware('role:admin');
Route::get('/customerOrder/{id}/deleteItem', [App\Http\Controllers\CustomerOrderController::class, 'deleteItem'])->name('deleteItem')->middleware('role:admin');
Route::get('/customerOrder.{id}.edit', [App\Http\Controllers\CustomerOrderController::class, 'edit'])->name('customerOrder.edit')->middleware('role:admin');
Route::get('/customerOrder.{id}', [App\Http\Controllers\CustomerOrderController::class, 'show'])->name('customerOrder.show')->middleware('role:admin');
Route::patch('/customerOrder/{id}', [App\Http\Controllers\CustomerOrderController::class, 'update'])->name('customerOrder.update')->middleware('role:admin');

//customer route
Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index')->middleware('role:admin');
Route::get('/customer.create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create')->middleware('role:admin');
Route::post('/customer', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store')->middleware('role:admin');
Route::get('/customer.{id}.edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit')->middleware('role:admin');
Route::patch('/customer/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update')->middleware('role:admin');
Route::get('/deleteCustomer/{id}', [App\Http\Controllers\CustomerController::class, 'delete'])->name('deleteCustomer')->middleware('role:admin');

//quotation route
Route::get('/quotation', [App\Http\Controllers\QuotationController::class, 'index'])->name('quotation.index')->middleware('role:admin');
Route::get('/quotation.create', [App\Http\Controllers\QuotationController::class, 'create'])->name('quotation.create')->middleware('role:admin');
Route::post('/quotation', [App\Http\Controllers\QuotationController::class, 'store'])->name('quotation.store')->middleware('role:admin');
Route::get('/quotation.{id}.edit', [App\Http\Controllers\QuotationController::class, 'edit'])->name('quotation.edit')->middleware('role:admin');
Route::get('/quotation.{id}', [App\Http\Controllers\QuotationController::class, 'show'])->name('quotation.show')->middleware('role:admin');
Route::get('/quotation/{id}/deleteItem', [App\Http\Controllers\QuotationController::class, 'deleteItem'])->name('deleteItem')->middleware('role:admin');
Route::patch('/quotation/{id}', [App\Http\Controllers\QuotationController::class, 'update'])->name('quotation.update')->middleware('role:admin');
Route::get('/deleteQuotation/{id}', [App\Http\Controllers\QuotationController::class, 'delete'])->name('deleteQuotation')->middleware('role:admin');

//user route
Route::get('/user', [App\Http\Controllers\AccountController::class, 'index'])->name('user.index')->middleware('role:admin');
Route::get('/user.create', [App\Http\Controllers\AccountController::class, 'create'])->name('user.create')->middleware('role:admin');
Route::post('/user', [App\Http\Controllers\AccountController::class, 'store'])->name('user.store')->middleware('role:admin');
Route::get('/user.{id}.edit', [App\Http\Controllers\AccountController::class, 'edit'])->name('user.edit')->middleware('role:admin');
Route::patch('/user/{id}', [App\Http\Controllers\AccountController::class, 'update'])->name('user.update')->middleware('role:admin');
Route::get('/deleteUser/{id}', [App\Http\Controllers\AccountController::class, 'delete'])->name('deleteUser')->middleware('role:admin');

//customer
Route::get('/customer.clientView', [App\Http\Controllers\InventoryController::class, 'customerClientView'])->name('customer.clientView')->middleware('role:customer');
Route::get('/customer.productDetail.{id}', [App\Http\Controllers\InventoryController::class, 'customerViewDetail'])->name('customer.productDetail')->middleware('role:customer');

Route::post('/addtocart', [App\Http\Controllers\CartController::class, 'add'])->name('add.to.cart')->middleware('role:admin');
Route::get('/myCart', [App\Http\Controllers\CartController::class, 'viewMyCart'])->name('view.mycart')->middleware('role:admin');
Route::get('/deleteitem/{id}', [App\Http\Controllers\CartController::class, 'delete'])->name('deleteitem')->middleware('role:admin');

//customer
Route::post('/customer.addtocart', [App\Http\Controllers\CartController::class, 'customerAdd'])->name('customer.add.to.cart')->middleware('role:customer');
Route::get('/customer.myCart', [App\Http\Controllers\CartController::class, 'customerViewMyCart'])->name('customer.view.mycart')->middleware('role:customer');
Route::get('/customer.deleteitem/{id}', [App\Http\Controllers\CartController::class, 'customerDelete'])->name('customer.deleteitem')->middleware('role:customer');

Route::post('/createorder', [App\Http\Controllers\OrderController::class, 'add'])->name('create.order')->middleware('role:admin');
Route::get('/myorder', [App\Http\Controllers\OrderController::class, 'viewMyOrder'])->name('order.viewOrder')->middleware('role:admin');

//customer
Route::post('/customer.createorder', [App\Http\Controllers\OrderController::class, 'customerAdd'])->name('customer.create.order')->middleware('role:customer');
Route::get('/customer.myorder', [App\Http\Controllers\OrderController::class, 'customerViewMyOrder'])->name('customer.order.viewOrder')->middleware('role:customer');

Route::post('/paypal', [App\Http\Controllers\PaymentController::class, 'payWithpaypal'])->name('paypal');
Route::get('/status', [App\Http\Controllers\PaymentController::class, 'getPaymentStatus'])->name('status');

Route::get('/inventory.report', [App\Http\Controllers\PDFController::class, 'print'])->name('printReport')->middleware('role:admin');
Route::get('/deliveryOrder.report/{id}', [App\Http\Controllers\PDFController::class, 'printDO'])->name('printReport.DO')->middleware('role:admin');

