<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    protected $table = 'hasil_perhitungan';
    protected $foreignKey = 'user_id';
    protected $fillable = [
        'user_id',
        'hasil_data',
        'hasil_perhitungan',
        'total_harta',
    ];
}
