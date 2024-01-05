<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'is_admin', // Tambahkan kolom 'is_admin' ke dalam $fillable
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean', // Pastikan untuk casting 'is_admin' ke boolean
    ];

    /**
     * Set pengguna dengan username 'user01' sebagai admin.
     *
     * @return void
     */
    public static function setUserAsAdmin()
    {
        $user = self::where('username', 'user01')->first();

        if ($user) {
            $user->is_admin = true; // Atau $user->is_admin = 1;
            $user->save();
        } else {
            // Handle jika pengguna dengan username 'user01' tidak ditemukan
        }
    }

    public function heirs()
    {
        return $this->hasMany(Heir::class);
    }

    public function posts()
    {
        return $this->hasMany(post::class);
    }
}