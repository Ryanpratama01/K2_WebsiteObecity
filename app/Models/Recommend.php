<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Recommend extends Model
{
    protected $table = 'rekomendasi'; // nama tabel
    protected $primaryKey = 'id_rekomendasi'; // primary key
    public $timestamps = false; // karena tabel tidak punya created_at/updated_at
    protected $fillable = [
        'kategori_bmi',
        'saran_makanan',
        'saran_aktivitas',
        'saran_lain',
    ];

    // Jika ingin menambahkan enum helper, bisa buat accessor
    public function getKategoriBmiLabelAttribute()
    {
        return ucfirst(str_replace('_', ' ', $this->kategori_bmi));
    }
}
