<?php

use App\Http\Controllers\WebUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing_page.index');
});
Route::get('/beranda', [WebUserController::class, 'beranda']);
Route::get('/kalkulator', [WebUserController::class, 'kalkulator']);
Route::get('/rekomendasi', [WebUserController::class, 'rekomendasi']);
Route::get('/history', [WebUserController::class, 'history']);