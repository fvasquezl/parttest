<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\FillController;
use App\Http\Controllers\KitController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\PartKitController;
use App\Http\Controllers\PrintController;
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

Route::resource('/kits', KitController::class);
Route::resource('/parts', PartController::class);
Route::resource('/box', BoxController::class);
Route::get('/parts_kits/{part}/{kit}/edit',[PartKitController::class,'edit']);

Route::get('/print/{kit}', [PrintController::class,'show'])->name('print');

Route::resource('/fill', FillController::class);
