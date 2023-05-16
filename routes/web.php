<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Barang;
use App\Models\BarangMasuk;
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
    return view('login.index');
});
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('akun', AkunController::class)->middleware('auth');
Route::resource('barang', BarangController::class)->middleware('auth');

// Dropdown Dynamic
Route::get('/findNama', [BarangController::class, 'findNama'])->name('findNama');

Route::resource('barangMasuk', BarangMasukController::class)->middleware('auth');

Route::resource('kategori', CategoryController::class)->middleware('auth');
// Route::get('/akun', [AkunController::class, 'index'])->middleware('auth');
// Route::get('/akun/create', [AkunController::class, 'create']);


