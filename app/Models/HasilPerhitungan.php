<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilPerhitungan extends Model
{
    protected $table = 'hasil_perhitungan';

    protected $fillable = [
        'hasil_perhitungan',
        'total_harta',
        'hasil_data',
        'user_id', // Pastikan 'user_id' terdapat di sini karena akan dijadikan foreign key
    ];

    protected $casts = [
        'hasil_perhitungan' => 'json',
        'total_harta' => 'json',
        'hasil_data' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
