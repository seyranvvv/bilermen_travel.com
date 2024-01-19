<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $guarded = [
        'id',
    ];
    public $timestamps = false;
}
