<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class ZoomAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'user',
        'pass',
        'key_host',
        'id_order',
        'zoom_user_id',
        'zoom_client_secret',
        'zoom_access_token',
        'zoom_refresh_token',
        'zoom_client_id',
        'zoom_account_id',
        'deadline',
        'type',
        'status',
    ];
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'idRoom');
    }
}

