<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function getTitle()
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case 'tm':
                return $this->title_tm;
                break;
            case 'ru':
                return $this->title_ru ?: $this->title_tm;
                break;
            case 'en':
                return $this->title_en ?: $this->title_tm;
                break;
            default:
                return $this->title_tm;
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

    public function getImage()
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case 'tm':
                return $this->image_banner;
                break;
            case 'ru':
                return $this->image_banner_ru ?: $this->image_banner;
                break;
            case 'en':
                return $this->image_banner_en ?: $this->image_banner;
                break;
            default:
                return $this->image_banner;
        }
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
