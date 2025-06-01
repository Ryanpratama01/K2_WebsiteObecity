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
}
