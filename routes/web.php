<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HistoriProductController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');
Route::get('/', function () {
    return redirect('/login');
});

Route::resource('gudang', GudangController::class)->middleware(['auth', 'role:distributor']);
Route::get('/get-kabupaten/{id_provinsi}', [GudangController::class, 'getKabupaten'])->middleware(['auth', 'role:distributor']); 
Route::resource('category', CategoriesController::class)->middleware(['auth', 'role:operator']);
Route::resource('product', ProductController::class)->middleware(['auth', 'role:distributor']);
Route::resource('pemesanan', PemesananController::class)->middleware(['auth', 'role:customer']);
Route::resource('history', HistoriController::class)->middleware(['auth', 'role:distributor']);
Route::resource('produkReffling', HistoriProductController::class)->middleware(['auth', 'role:distributor|customer|operator']);
Route::get('/access-denied', function () { return view('auth.access_denied');})->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth']); 



