<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginAttempt extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $dates = [
        'created_at',
    ];

    const UPDATED_AT = null;


    public function ipAddress()
    {
        return $this->belongsTo(IpAddress::class);
    }
}
