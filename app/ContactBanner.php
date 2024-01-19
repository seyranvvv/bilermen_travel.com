<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactBanner extends Model
{
    public function getImage()
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case 'tm':
                return $this->img;
                break;
            case 'ru':
                return $this->img_ru ?: $this->img;
                break;
            case 'en':
                return $this->img_en ?: $this->img;
                break;
            default:
                return $this->img;
        }
    }
}
