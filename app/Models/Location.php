<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function orders()
    {
        return $this->hasMany(Order::class)
            ->orderBy('created_at', 'desc');
    }


    public function getName()
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case 'tm':
                return $this->name_tm;
                break;
            case 'ru':
                return $this->name_ru ?: $this->name_tm;
                break;
            case 'en':
                return $this->name_en ?: $this->name_tm;
                break;
            default:
                return $this->name_tm;
        }
    }


    public function page() {
        return (int) (self::orderBy('sort_order')->pluck('id')->search($this->id) / 10) + 1;
    }
}
