<?php

use App\Http\Controllers\KitController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\PartKitController;
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
Route::get('/parts_kits/{part}/{kit}/edit',[PartKitController::class,'edit']);
