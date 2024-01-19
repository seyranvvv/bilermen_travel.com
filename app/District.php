<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $guarded = [
        'id',
    ];

    public function getAddress()
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case 'tm':
                return $this->address_tm;
                break;
            case 'ru':
                return $this->address_ru ?: $this->address_tm;
                break;
            case 'en':
                return $this->address_en ?: $this->address_tm;
                break;
            default:
                return $this->address_tm;
        }
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
}
