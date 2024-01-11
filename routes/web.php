<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrondController;
use App\Http\Controllers\KatagoriController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('layouts.main');
// })->middleware('auth');

// Authication Login Register

Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/proses', [AuthController::class, 'proseslogin'])->name('proseslogin')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('prosesregister', [AuthController::class, 'RegisterPost'])->name('prosesRegister');
// Route::get('view', [AuthController::class, 'view'])->name('frond');
Route::get('dashboard', [AuthController::class, 'dashbord'])->name('dashboard')->middleware('auth');

// table user
Route::get('user', [UserController::class, 'showdata'])->name('user');

// Route::get('user', [AuthController::class], 'User')->name('user')->middleware('auth');

// table katagori

Route::controller(KatagoriController::class)->group(function () {
    Route::get('katagori', 'index')->name('katagori')->middleware('auth');
    Route::post('store', 'store')->name('store')->middleware('auth');
    Route::put('update/{id}', 'update')->name('updatekatagori')->middleware('auth');
    Route::delete('deletekatagori/{id}', 'deletekatagori')->name('deletekatagori')->middleware('auth');
});
//Route Supplier
Route::controller(SupplierController::class)->group(function () {
    Route::get('supplier', 'index')->name('supplier')->middleware('auth');
    Route::post('tambahsupplier', 'AddSupplier')->name('AddSuplier')->middleware('auth');
    Route::put('updatesupplier/{id}', 'UpdtSupplier')->name('UpdtSuplier')->middleware('auth');
});

// route Produk
Route::controller(ProdukController::class)->group(function () {
    Route::get('produk', 'index')->name('produk')->middleware('auth');
    Route::post('Insert', 'InsertData')->name('insert')->middleware('auth');
    Route::delete('delete/produk/{id}', 'delete')->name('deleteproduk')->middleware('auth');
});

Route::controller(FrondController::class)->group(function () {
    Route::get('home', 'index')->name('frondcatagori')->middleware('auth');
    Route::get('produkCatagori/{catagori}', 'produkCatagori')->name('produkCatagori')->middleware('auth');
});
Route::controller(PembayaranController::class)->group(function () {
    Route::get('pembayaran', 'index')->name('pembayaran')->middleware('auth');
    Route::post('AddPay', 'AddPay')->name('AddPay')->middleware('auth');
});
Route::controller(KurirController::class)->group(function () {
    Route::get('kurir', 'index')->name('kurir')->middleware('auth');
    Route::post('AddKurir', 'AddKurir')->name('AddKurir')->middleware('auth');
    Route::put('/updateKurir/{id}', 'updatekurir')->name('updatekurir')->middleware('auth');
    Route::put('/deletekurir/{id}', 'deletekurir')->name('deletekurir')->middleware('auth');
});

// pesanan
Route::controller(PesananController::class)->group(function () {
    Route::get('pesanan', 'index')->name('pesanan')->middleware('auth');
    Route::post('TambahPesanan/{id}', 'Newpesanan')->name('tambahpesanan')->middleware('auth');
    Route::delete('deletepesanan/{id}', 'deletePesanan')->name('deletePesanan')->middleware('auth');
    Route::get('deletepesananfrond/{id}', 'deletePesananfrond')->name('deletePesananfrond')->middleware('auth');
    Route::get('detailpesanan', 'detailPesanan')->name('detailpes')->middleware('auth');
    Route::get('deletepesanan/{id}', 'deletePesanan')->name('deletePesanan')->middleware('auth');
    Route::get('CashOut', 'cashOut')->name('cashOut')->middleware('auth');
    Route::get('bayar', 'bayar')->name('bayar')->middleware('auth');
    Route::get('updatePembayaran/{id}', 'updtpembayaran')->name('updatePembayaran')->middleware('auth');
});
