<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebUserController;
use App\Http\Controllers\RecommendController;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\PieController;
use App\Http\Controllers\ChartController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('landing_page.index');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('/forgot-password', )->name('password.request');

    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('web_admin.dashboard');
    })->name('dashboard.index');

    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('', 'index')->name('users');
        Route::get('create', 'create')->name('users.create');
        Route::post('store', 'store')->name('users.store');
        Route::get('show/{id}', 'show')->name('users.show');
        Route::get('edit/{id}', 'edit')->name('users.edit');
        Route::put('edit/{id}', 'update')->name('users.update');
        Route::delete('destroy/{id}', 'destroy')->name('users.destroy');
    });

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});

Route::get('/hash/{text}', function ($text) {
    return Hash::make($text);
});

Route::controller(RecommendController::class)->prefix('recommends')->group(function () {
    Route::get('', 'index')->name('recommends');
    Route::get('create', 'create')->name('recommends.create');
    Route::post('store', 'store')->name('recommends.store');
    Route::get('show/{id}', 'show')->name('recommends.show');
    Route::get('edit/{id}', 'edit')->name('recommends.edit');
    Route::put('edit/{id}', 'update')->name('recommends.update');
    Route::delete('destroy/{id}', 'destroy')->name('recommends.destroy');
});
Route::get('/bmi-data', [PieController::class, 'getBMIData']);

Route::get('/get-user-data', [ChartController::class, 'getUserData']);

// Route::controller(WebUserController::class)->group(function () {
//     Route::get('beranda', function () {
//         return view('web_user.beranda');
//     });
//     Route::get('history', function () {
//         return view('web_user.history');
//     });
//     Route::get('rekomendasi', function () {
//         return view('web_user.rekomendasi');
//     });
// });

Route::get('/user', [UserController::class, 'index'])->middleware('role:admin,superadmin');


Route::middleware([RoleMiddleware::class])->group(function () {
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});