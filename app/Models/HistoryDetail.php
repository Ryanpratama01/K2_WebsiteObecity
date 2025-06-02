<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryDetail extends Model
{
  protected $table ="detail_history";
    protected $primaryKey = "id_analisis";
    protected $guarded = [];
    public $timestamps = false;
}
