<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class ChartController extends Controller
{
    public function getUserData(): JsonResponse
    {
        $data = array_fill(0, 12, 0); // Inisialisasi 12 bulan

        $result = DB::table('users')
            ->selectRaw('MONTH(`Date`) as bulan, COUNT(*) as jumlah')
            ->whereYear('Date', now()->year)
            ->groupBy(DB::raw('MONTH(`Date`)'))
            ->pluck('jumlah', 'bulan');

        foreach ($result as $bulan => $jumlah) {
            $data[$bulan - 1] = $jumlah;
        }

        return response()->json($data);
    }
}
