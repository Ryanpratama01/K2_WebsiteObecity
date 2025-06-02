<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryPrediction extends Model
{
    protected $table ="history_prediction";
    protected $primaryKey = "id_analisis";
    protected $guarded = [];
    public $timestamps = false;
}
