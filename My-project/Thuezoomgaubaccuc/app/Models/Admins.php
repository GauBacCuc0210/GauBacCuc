<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admins extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';
    protected $fillable = [
        'username',
        'email',
        'password',
        'type',
    ];
}
