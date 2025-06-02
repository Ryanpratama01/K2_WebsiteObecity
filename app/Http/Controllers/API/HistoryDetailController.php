<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HistoryDetail;
use App\Models\HistoryPrediction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryDetailController extends Controller
{
  function index()
  {
    $user = Auth::guard('api')->user();
    $result =  DB::table('detail_history')
      ->where('user_id', $user->id_User)
      ->selectRaw("DATE(tanggal_analisis) as tanggal,new_weight,kategori_bmi")
      ->orderBy("tanggal_analisis", 'desc')
      ->latest("tanggal_analisis")
      ->get();
    return response()->json(
      ['message' => 'success', 'data' => $result]
    );
  }
}
