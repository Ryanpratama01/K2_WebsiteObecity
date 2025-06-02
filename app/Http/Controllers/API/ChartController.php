<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
  function getChartData()
  {

    $user = Auth::guard('api')->user();
    $take = 10;
    $count =  DB::table('detail_history')
      ->where('user_id', $user->id_User)->count();
    $result = DB::table('detail_history')
      ->where('user_id', $user->id_User)
      ->selectRaw("DATE(tanggal_analisis) as tanggal,new_weight,kategori_bmi")
      ->orderBy("tanggal_analisis", 'asc')
      ->latest("tanggal_analisis")
      ->offset($count - $take)
      ->take($take)
      ->get();
    return response()->json(
      [
        'message' => 'success',
        'data' => $result
      ]
    );
  }

  function latestWeigth()
  {
    $result = DB::table('detail_history')
      ->latest()
      ->first();
    return response()->json(
      [
        'message' => 'success',
        'data' => $result
      ]
    );
  }

  function healthStatus()
  {
    $user = Auth::guard('api')->user();

    $latest = DB::table('detail_history')
      ->where('user_id', $user->id_User)
      ->latest("tanggal_analisis")
      ->first();

    if (!$latest) {
      return response()->json([
        'message' => 'Belum ada data berat badan',
        'data' => null
      ]);
    }


    if (!$user || $user->Tinggi_Badan == 0) {
      return response()->json([
        'message' => 'Tinggi badan belum tersedia',
        'data' => null
      ]);
    }

    $tinggiMeter = $user->Tinggi_Badan / 100;
    $bmi = $latest->new_weight / ($tinggiMeter * $tinggiMeter);

    // if ($bmi < 18.5) {
    //   $status = "Insufficient weight";
    // } elseif ($bmi < 25) {
    //   $status = "Normal";
    // } elseif ($bmi < 30) {
    //   $status = "Obesity";
    // } else {
    //   $status = "Obesity";
    // }

    return response()->json([
      'message' => 'success',
      'data' => [
        'berat_badan_terbaru' => $latest->new_weight,
        'tinggi_badan' => $user->Tinggi_Badan,
        'bmi' => round($bmi, 2),
        'status_kesehatan' => $latest->kategori_bmi,
        'tanggal_input' => $latest->tanggal_analisis
      ]
    ]);
  }
}
