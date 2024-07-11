<?php
 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;

 
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('/login');
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
    Route::get('/laporan', [LaporanController::class, 'laporanindex'])->name('laporan.index');
    Route::get('/bacalaporan/{id}', [LaporanController::class, 'bacalaporanindex'])->name('bacalaporan.index');
    Route::get('/proses/{id}', [LaporanController::class, 'prosesLaporan'])->name('laporan.proses');
    Route::get('/selesai/{id}', [LaporanController::class, 'selesaiLaporan'])->name('laporan.selesai');
    Route::get('/user', [HomeController::class, 'userindex'])->name('user');
    Route::get('/user', [HomeController::class, 'usershow'])->name('user');
    Route::get('/users', [HomeController::class, 'usershow'])->name('users.show');
    Route::post('/laporan/{id}/selesai', [LaporanController::class, 'selesaiLaporan'])->name('laporan.selesai');

});
require __DIR__.'/auth.php';