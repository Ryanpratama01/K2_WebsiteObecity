<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PieController extends Controller
{
    public function getBMIData()
    {
        $results = DB::table('detail_history')
            ->select('kategori_bmi', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('kategori_bmi')
            ->get();

        $kategori_list = [
            'Underweight',
            'Normal',
            'Overweight',
            'Obesitas',
        ];

        $data = array_fill_keys($kategori_list, 0);

        foreach ($results as $row) {
            if (isset($data[$row->kategori_bmi])) {
                $data[$row->kategori_bmi] = (int)$row->jumlah;
            }
        }

        return response()->json(array_values($data));
    }
}
