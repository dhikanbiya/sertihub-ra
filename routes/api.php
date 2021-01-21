<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/cities', [App\Http\Controllers\IndonesiaAdministrationController::class,'getCity'])->middleware(['auth','verified'])->name('cities');
Route::post('/districts', [App\Http\Controllers\IndonesiaAdministrationController::class,'getDistrict'])->middleware(['auth','verified'])->name('districts');
Route::post('/villages', [App\Http\Controllers\IndonesiaAdministrationController::class,'getVillage'])->middleware(['auth','verified'])->name('villages');
