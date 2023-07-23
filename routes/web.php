<?php

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SpendController;
use App\Http\Controllers\RetiroController;
use App\Http\Controllers\EnvaseController;
use App\Http\Controllers\SpendDebitoController;
use App\Http\Controllers\SpendCreditoController;
use App\Http\Controllers\SpendAmipassController;
use App\Http\Controllers\SpendSodexoController;
use App\Http\Controllers\SpendOtherController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\ArqueoController;
use App\Http\Controllers\TransbankController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('suppliers', SupplierController::class);
Route::resource('products', ProductController::class);
Route::resource('clients', ClientController::class);
Route::resource('workers', WorkerController::class);
Route::resource('orders', OrderController::class);
Route::resource('users', UserController::class);
Route::resource('spends', SpendController::class);
Route::resource('tarjetas', TarjetaController::class);
Route::resource('cupons', CuponController::class);
Route::resource('retiros', RetiroController::class);
Route::resource('envases', EnvaseController::class);
Route::resource('spenddebitos', SpendDebitoController::class);
Route::resource('spendcreditos', SpendCreditoController::class);
Route::resource('spendamipasss', SpendAmipassController::class);
Route::resource('spendsodexos', SpendSodexoController::class);
Route::resource('spendothers', SpendOtherController::class);
Route::resource('arqueos', ArqueoController::class);


Route::get('cart/{product}', [ProductController::class, 'cart'])->name('products.cart');
Route::post('cart/update', 'ProductController@updateCart')->name('cart.update');
Route::post('cart/decrease/{product}', 'ProductController@decrease')->name('cart.decrease');
Route::post('cart/increase/{product}', 'ProductController@increase')->name('cart.increase');
Route::get('/transbank', [TransbankController::class, 'index'])->name('transbank.index');
Route::post('/transbank/confirmar-pago', [TransbankController::class, 'confirmar_pago'])->name('transbank.confirmar_pago');





