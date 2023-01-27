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
    return view('welcome');
});
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/home', function () {
        return view('layouts.admin');
    });
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/subkategori', SubKategoriController::class);
    Route::resource('/produk', ProdukController::class);
    Route::resource('/image', ImageController::class);
    Route::resource('/keranjang', KeranjangController::class);
    Route::resource('/stok', StokController::class);
    Route::get('getSub_kategori/{id}', [SubKategoriController::class, 'getSubKategori']);

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
