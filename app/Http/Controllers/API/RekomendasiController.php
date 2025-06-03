<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HistoryDetail;
use App\Models\Rekomendasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekomendasiController extends Controller
{
  function index()
  {
    $user = Auth::guard('api')->user();
    $underweight = HistoryDetail::where('kategori_bmi', 'Underweight')->where('user_id',$user->id_User)->count();
    $normal = HistoryDetail::where('kategori_bmi', 'Normal')->where('user_id',$user->id_User)->count();
    $overweight = HistoryDetail::where('kategori_bmi', 'Overweight')->where('user_id',$user->id_User)->count();
    $obesitas = HistoryDetail::where('kategori_bmi', 'Obesitas')->where('user_id',$user->id_User)->count();
    $collection = collect(
      [
        ["status" => "Underweight", "total" => $underweight],
        ["status" => "Normal", "total" => $normal],
        ["status" => "Overweight", "total" => $overweight],
        ["status" => "Obesitas", "total" => $obesitas],]
      
    );
    // $index = $collection->filter(function($value, $key){
    //   return in_array($key,[$value->max()]);
    // });
    $maxIndex = $collection->pluck('total')->search($collection->max("total"));
    $data = Rekomendasi::where('kategori_bmi',$collection[$maxIndex]["status"])->get();
    return response()->json([
      'message'=>'success',
      "status"=>$collection[$maxIndex]["status"],
      'data' => $data
    ]);

  }
}
