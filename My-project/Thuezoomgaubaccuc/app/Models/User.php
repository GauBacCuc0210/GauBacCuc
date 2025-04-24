<?php

namespace App\Models;
use App\Models\History;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class User extends Authenticatable
{
    use HasFactory, Notifiable; 
    protected $fillable = [
        'name',
        'email',
        'phone',
        'avatar',
        'coin',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function findForPassport($phone)
    {
        return $this->where('phone', $phone)->first();
    }
    public function histories()
{
    return $this->hasMany(History::class);
}
}
