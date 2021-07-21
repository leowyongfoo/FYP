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

Route::post('/insertStatus/store', [App\Http\Controllers\StatusController::class, 'store'])->name('addStatus');
Route::get('/insertStatus', [App\Http\Controllers\StatusController::class, 'create'])->name('insertStatus');
Route::get('/viewStatus', [App\Http\Controllers\StatusController::class, 'show'])->name('viewStatus');
Route::get('/deleteStatus/{id}', [App\Http\Controllers\StatusController::class, 'delete'])->name('deleteStatus');

Route::get('/insertCategory', [App\Http\Controllers\CategoryController::class, 'create'])->name('insertCategory');
Route::post('/insertCategory/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('addCategory');
Route::get('/viewCategory', [App\Http\Controllers\CategoryController::class, 'show'])->name('viewCategory');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

