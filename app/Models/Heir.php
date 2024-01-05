<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heir extends Model
{
    use HasFactory;

    protected $fillable = [
        'gender',
        'status',
        'inheritance',
        'total_inheritance',
        'type_of_business',
        'month',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}