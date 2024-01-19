<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Greet extends Model
{
    protected $guarded = [
        'id',
    ];
    public $timestamps = false;

}
