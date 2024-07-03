<?php
 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePenggunaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPenggunaController;
use App\Http\Controllers\ReportController;
 
Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 
Route::middleware(['auth', 'admin'])->group(function () {
 
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
 
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin/products');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin/products/create');
    Route::post('/admin/products/save', [ProductController::class, 'save'])->name('admin/products/save');
    Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('admin/products/edit');
    Route::put('/admin/products/edit/{id}', [ProductController::class, 'update'])->name('admin/products/update');
    Route::get('/admin/products/delete/{id}', [ProductController::class, 'delete'])->name('admin/products/delete');
});

Route::middleware(['auth', 'pengguna'])->group(function () {
 
    Route::get('pengguna/dashboard', [HomePenggunaController::class, 'index'])->name('pengguna/dashboard');
    Route::get('/pengguna/products', [ProductPenggunaController::class, 'index'])->name('pengguna/products');
    Route::get('/pengguna/products/create', [ProductPenggunaController::class, 'create'])->name('pengguna/products/create');
    Route::post('/pengguna/products/save', [ProductPenggunaController::class, 'save'])->name('pengguna/products/save');
    Route::get('/pengguna/products/edit/{id}', [ProductPenggunaController::class, 'edit'])->name('pengguna/products/edit');
    Route::put('/pengguna/products/edit/{id}', [ProductPenggunaController::class, 'update'])->name('pengguna/products/update');
    Route::get('/pengguna/products/delete/{id}', [ProductPenggunaController::class, 'delete'])->name('pengguna/products/delete');
    Route::get('pengguna/reports', [ReportController::class, 'index'])->name('pengguna/reports');
    Route::get('reports/create', [ReportController::class, 'create'])->name('pengguna.reports.create');
    Route::post('reports', [ReportController::class, 'save'])->name('pengguna.reports.save');
    Route::get('reports/{id}/edit', [ReportController::class, 'edit'])->name('pengguna.reports.edit');
    Route::put('reports/{id}', [ReportController::class, 'update'])->name('pengguna.reports.update');
    Route::delete('reports/{id}', [ReportController::class, 'delete'])->name('pengguna.reports.delete');
}); 
 
require __DIR__.'/auth.php';