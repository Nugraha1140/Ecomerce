<?php
use App\Models\Admin\Produk;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SubKategoriController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\VoucherUserController;
use App\Http\Controllers\FrontController;

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
    return view('template.user.keranjang');
});
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', function () {
        return view('layouts.admin');
    });
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/subkategori', SubKategoriController::class);
    Route::resource('/produk', ProdukController::class);
    Route::resource('/image', ImageController::class);
    Route::resource('/stok', StokController::class);
    Route::resource('/payment', PaymentController::class);
    Route::resource('/transaksi', TransaksiController::class);
    Route::resource('/voucher',VoucherController::class);
    Route::resource('/voucheruser',VoucherUserController::class);
    Route::get('getSub_kategori/{id}', [SubKategoriController::class, 'getSubKategori']);

});
Auth::routes();
Route::group(['prefix' => '/'], function () {
Route::get('/produk', [FrontController::class, 'produkuser']);
Route::get('/detailproduk/{id}', [FrontController::class, 'produkdetail']);
Route::resource('/keranjang', App\Http\Controllers\KeranjangController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [App\Http\Controllers\HomeController::class, 'user'])->name('user');
