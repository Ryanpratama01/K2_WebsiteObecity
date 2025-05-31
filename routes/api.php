<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('auth/register', [AuthController::class, 'apiRegister']);
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    // Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});
Route::get('get_user', [AuthController::class, 'get_user']);
Route::post("login", [AuthController::class, 'login']);

Route::post('/predict', function (Request $request) {
    // Hitung BMI sederhana
    $weight = $request->weight;
    $height = $request->height;
    $bmi = $weight / (($height / 100) * ($height / 100));

    if ($bmi < 18.5) {
        $category = 'Underweight';
    } elseif ($bmi < 25) {
        $category = 'Normal';
    } elseif ($bmi < 30) {
        $category = 'Overweight';
    } else {
        $category = 'Obesitas';
    }

    return response()->json([
        'bmi' => round($bmi, 2),
        'category' => $category,
        'prediction' => "BMI Anda: " . round($bmi, 2) . " ($category)"
    ]);
});
