<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [
        'id',
    ];
    public $timestamps = false;
    public function getName()
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case 'tm':
                return $this->adress_tm;
                break;
            case 'ru':
                return $this->adress_ru ?: $this->adress_tm;
                break;
            case 'en':
                return $this->adress_en ?: $this->adress_tm;
                break;
            default:
                return $this->adress_tm;
        }
    }
    public function getSlogan()
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case 'tm':
                return $this->slogan_tm;
                break;
            case 'ru':
                return $this->slogan_ru ?: $this->slogan_tm;
                break;
            case 'en':
                return $this->slogan_en ?: $this->slogan_tm;
                break;
            default:
                return $this->slogan_tm;
        }
    }
}
