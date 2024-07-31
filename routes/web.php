<?php

use App\Http\Controllers\BuahController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;
use App\Models\Karyawan;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;




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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',[LoginController::class,'login1'])->name('login');
Route::post('proseslogin',[LoginController::class,'login'])->name('proseslogin');
Route::post('logout',[LoginController::class,'logout'])->name('logout');

Route::middleware(['HakAdmin'])->group(function () {
    
    Route::get('buah',[BuahController::class,'index'])->name('buah');
    Route::get('adbuah',[BuahController::class,'create'])->name('adbuah');
    Route::post('addbuah',[BuahController::class,'store'])->name('addbuah');
    Route::get('editbuah/{id}',[BuahController::class,'edit'])->name('editbuah');
    Route::put('updatebuah/{id}',[BuahController::class,'update'])->name('updatebuah');
    Route::delete('deletebuah/{id}',[BuahController::class,'destroy'])->name('deletebuah');
    
    Route::get('karyawan',[KaryawanController::class,'index'])->name('karyawan');
    Route::get('adkaryawan',[KaryawanController::class,'create'])->name('adkaryawan');
    Route::post('addkaryawan',[KaryawanController::class,'store'])->name('addkaryawan');
    Route::get('editkaryawan/{id}',[KaryawanController::class,'edit'])->name('editkaryawan');
    Route::put('updatekaryawan/{id}',[KaryawanController::class,'update'])->name('updatekaryawan');
    Route::delete('deletekaryawan/{id}',[KaryawanController::class,'destroy'])->name('deletekaryawan');
    
    Route::get('transaksi',[TransaksiController::class,'index'])->name('transaksi');
    Route::get('adtransaksi',[TransaksiController::class,'create'])->name('adtransaksi');
    Route::post('addtransaksi',[TransaksiController::class,'store'])->name('addtransaksi');
    Route::get('edittransaksi/{id}',[TransaksiController::class,'edit'])->name('edittransaksi');
    Route::post('canceltransaksi/{id}',[TransaksiController::class,'cancel'])->name('canceltransaksi');
    Route::put('updatetransaksi/{id}',[TransaksiController::class,'update'])->name('updatetransaksi');
    Route::delete('deletetransaksi/{id}',[TransaksiController::class,'cancel'])->name('deletetransaksi');

    Route::get('struk',[TransaksiController::class,'cetakStruk'])->name('struk');
    Route::get('selesai',[TransaksiController::class,'selesaikan'])->name('selesai');
});


//PUNYA ILHAM 12 RPL ABSEN 25