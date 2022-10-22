<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'isActive',
        'secure_key',
        'expired_at'
    ];

    public function scopeActive()
    {
        return $this->where('isActive', true)
            ->where('expired_at', '>', now());
    }

    public function rollHistory()
    {
        return $this->hasMany(RollHistory::class);
    }
}
