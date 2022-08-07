<?php

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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::resource('kriteria', 'App\Http\Controllers\KriteriaController');
Route::resource('siswa', 'App\Http\Controllers\SiswaController');
Route::get(
    'siswa/{id}/nilai',
    [
        App\Http\Controllers\SiswaController::class,
        'nilai'
    ]
)->name('siswa.nilai');

Route::get(
    'cetak-hasil',
    [
        App\Http\Controllers\CetakHasilController::class,
        'index'
    ]
)->name('cetak-hasil.index');

Route::put(
    'siswa/{id}/nilai',
    [
        App\Http\Controllers\SiswaController::class,
        'updateNilai'
    ]
)->name('siswa.updateNilai');

require __DIR__.'/auth.php';
