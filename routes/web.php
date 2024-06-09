<?php

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

Route::resource('/produk', \App\Http\Controllers\ProdukController::class);

// membuat route diluar fitur Route::resource dengan method GET
Route::get('/produk/removephoto/{foto}/{id}', [\App\Http\Controllers\ProdukController::class, 'removePhoto']);

// cetak PDF
// name('pdf.cetak) adalah penamaan route
Route::get('pdf/cetak', [\App\Http\Controllers\PDFController::class, 'cetak'])->name('pdf.cetak');