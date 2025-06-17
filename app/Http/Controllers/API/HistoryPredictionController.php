<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HistoryDetail;
use App\Models\HistoryPrediction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryPredictionController extends Controller
{

  function insert(Request $request)
  {
    $user = Auth::guard('api')->user();
    $input = $request->validate(
      [
        'height' => 'required',
        'weight' => 'required',
        'family_history_with_overweight' => 'required',
        'favc' => 'required',
        'ncp' => 'required',
        'caec' => 'required',
        'faf' => 'required',
        'kategori_bmi' => 'required'
      ]
    );
    $input += array(
      "user_id" => $user->id_User,
      "tanggal_analisis" => Carbon::now(),
      'gender' => $user->Jenis_Kelamin,
      'age' => $user->Usia,
      'month' => Carbon::now()->format('m'),
      'year' => Carbon::now()->format('Y'),
    );


    if (HistoryDetail::where('month', Carbon::now()->format('m'))->where('user_id', $user->id_User)
                      ->where('year', Carbon::now()->format('Y'))->count() == 1) {
      return response()->json(['message' => 'error, data bulanan telah ada'+$user], 400);
    } else {
      HistoryPrediction::create($input);

      HistoryDetail::create(
        [
          'user_id' => $user->id_User,
          'new_weight' => $input['weight'],
          "tanggal_analisis" => Carbon::now(),
          'kategori_bmi' =>  $input['kategori_bmi'],
          'month' => Carbon::now()->format('m'),
          'year' => Carbon::now()->format('Y'),
        ]
      );
      return response()->json(['message' => 'success']);
    }
  }
}
