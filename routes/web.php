<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProductController;
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
Route::get('login', [AuthController::class, 'login'])->name('sign');
Route::post('login', [AuthController::class, 'sign'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function() {
        return view('home');
    })->name('dashboard');

    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/products/{product}/delete', [ProductController::class, 'delete'])->name('products.delete');
    Route::apiResource('products', ProductController::class)->names('products');
    Route::get('/merchants/create', [MerchantController::class, 'create'])->name('merchants.create');
    Route::get('/merchants/{merchant}/delete', [MerchantController::class, 'delete'])->name('merchants.delete');
    Route::apiResource('merchants', MerchantController::class)->names('merchants');
});
