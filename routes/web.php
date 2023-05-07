<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\TrainerController;
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

Route::get('/test', function () {
    return view('test');
});


// Member Gym
Route::get('/beranda', [MemberController::class, 'beranda'])->name('beranda');
Route::get('/jadwal', [MemberController::class, 'jadwal'])->name('jadwal');
Route::get('/biodata', [MemberController::class, 'biodata'])->name('biodata');

// Trainer Gym
Route::get('/berandaTrainer', [TrainerController::class, 'beranda'])->name('beranda');
Route::get('/jadwalTrainer', [TrainerController::class, 'jadwal'])->name('jadwal');
Route::get('/createKegiatan', [TrainerController::class, 'create_kegiatan'])->name('createKegiatan');
Route::get('/hasilCapaian', [TrainerController::class, 'hasil_capaian'])->name('hasilCapaian');