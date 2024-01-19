<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $dates = [
        'created_at', 'updated_at',
    ];


    public function scopeRobot($query)
    {
        return $query->where('robot', 1);
    }


    public function scopeHuman($query)
    {
        return $query->where('robot', 0);
    }


    public function scopeApi($query)
    {
        return $query->where('api', 1);
    }


    public function scopeWeb($query)
    {
        return $query->where('api', 0);
    }


    public function ipAddress()
    {
        return $this->belongsTo(IpAddress::class);
    }


    public function userAgent()
    {
        return $this->belongsTo(UserAgent::class);
    }


    public function getMonth($id)
    {
        switch ($id) {
            case 1:
                return trans('transFront.jan');
            case 2:
                return trans('transFront.feb');
            case 3:
                return trans('transFront.mar');
            case 4:
                return trans('transFront.apr');
            case 5:
                return trans('transFront.may');
            case 6:
                return trans('transFront.jun');
            case 7:
                return trans('transFront.jul');
            case 8:
                return trans('transFront.aug');
            case 9:
                return trans('transFront.sep');
            case 10:
                return trans('transFront.oct');
            case 11:
                return trans('transFront.nov');
            case 12:
                return trans('transFront.dec');
            default:
                return null;
        }
    }
}
