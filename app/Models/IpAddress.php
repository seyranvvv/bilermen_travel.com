<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function contacts()
    {
        return $this->hasMany(Contact::class)
            ->orderBy('created_at', 'desc');
    }


    public function visitors()
    {
        return $this->hasMany(Visitor::class)
            ->orderBy('updated_at', 'desc');
    }


    public function loginAttempt()
    {
        return $this->hasMany(LoginAttempt::class)
            ->orderBy('created_at', 'desc');
    }
}
