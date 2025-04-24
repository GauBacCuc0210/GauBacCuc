<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'numberhouse',
        'user_id',
        'datestart',
        'dateend',
        'type',
        'price',
        'idRoom',
        'extend_time_use',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function room()
    {
        return $this->hasOne(Room::class, 'id_order', 'id');
    }
    public function zoomAccount() {
        return $this->belongsTo(ZoomAccount::class, 'idRoom');
    }
}
