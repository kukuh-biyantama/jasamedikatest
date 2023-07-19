<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\DatapasienController;
use App\Http\Controllers\PDFController;
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
    return view('layout.pages.home');
});

//input data kelurahan
Route::get('/input-data-kelurahan', [KelurahanController::class, 'create'])->name('input_kelurahan');
Route::get('/index_datakelurahan', [KelurahanController::class, 'index'])->name('index_datakelurahan');
Route::post('/store_kelurahan', [KelurahanController::class, 'store'])->name('store_kelurahan');
Route::delete('/deletekelurahan/{id}', [KelurahanController::class, 'destroy'])->name('delete_datakelurahan');
Route::get('/datakelurahan/{id}/edit', [KelurahanController::class, 'edit'])->name('datakelurahan.edit');
Route::put('/dataupdatekelurahan/{id}', [KelurahanController::class, 'update'])->name('data.updatekelurahan');



//input data pasien
Route::get('/registerdatapasien', [DatapasienController::class, 'create'])->name('register_datapasien');
Route::get('/index_datapasien', [DatapasienController::class, 'index'])->name('index_datapasien');
Route::post('/store_datapasien', [DatapasienController::class, 'store'])->name('store_datapasien');
Route::get('/datapasien/{id}/edit', [DatapasienController::class, 'edit'])->name('datapasien.edit');
Route::put('/dataupdatepasien/{id}', [DatapasienController::class, 'update'])->name('data.update');
Route::delete('/deletepasien/{id}', [DatapasienController::class, 'destroy'])->name('delete_datapasien');

//pdf
Route::post('/generate_pdf', [PDFController::class, 'generatePDF'])->name('generate_pdf');
