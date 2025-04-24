<?php

namespace App\Models;
use App\Models\User; 
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'user_id',
        'time',
        'numbercoin',
        'numbercoinmanager',
        'type',
        'note',
        'type_note',
    ];
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
