<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $foreignKey = 'user_id';
    protected $fillable = [
        'user_id',
        'target_name',
        'will',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}