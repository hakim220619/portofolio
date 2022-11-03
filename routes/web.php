<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AplikasiController;
use App\Http\Controllers\CategoryControllers;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TahunajaranController;
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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    //sekolah
    Route::get('/Category', [CategoryControllers::class, 'index'])->name('Category');
    Route::get('/LoadData', [CategoryControllers::class, 'LoadData'])->name('LoadData');
    Route::post('/proses_add_category', [CategoryControllers::class, 'proses_add_category'])->name('proses_add_category');
    Route::post('/proses_edit_category/{id}', [CategoryControllers::class, 'proses_edit_category'])->name('proses_edit_category');
    Route::post('/DeleteCategory', [CategoryControllers::class, 'DeleteCategory'])->name('Category.DeleteCategory');
    //siswa
    Route::get('/CategoryEdit/{id}', [CategoryControllers::class, 'edit'])->name('category.edit');
});
