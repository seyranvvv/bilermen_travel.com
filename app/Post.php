<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title_tm', 'title_ru','title_tm', 'img', 'body_tm', 'body_ru', 'body_en', 'datetime', 'active'
    ];

    protected $hidden = ['pivot'];



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


    public function getBody(){
        $locale = app()->getLocale();
        switch ($locale) {
            case 'tm':
                return $this->body_tm;
                break;
            case 'ru':
                return $this->body_ru ?: $this->body_tm;
                break;
            case 'en':
                return $this->body_en ?: $this->body_tm;
                break;
            default:
                return $this->body_tm;
        }
    }


    public function monthName($id) {
        switch ($id) {
            case 1: return "Ýanwar";
            case 2: return "Fewral";
            case 3: return "Mart";
            case 4: return "Aprel";
            case 5: return "Maý";
            case 6: return "Iýun";
            case 7: return "Iýul";
            case 8: return "Awgust";
            case 9: return "Sentýabr";
            case 10: return "Oktýabr";
            case 11: return "Noýabr";
            case 12: return "Dekabr";
        }
    }


    public function publishedAt()
    {
        $now = Carbon::now();
        $datetime = Carbon::parse($this->datetime);
        $lenghtSeconds = $datetime->diffInSeconds($now);
        $lengthMinutes= $datetime->diffInMinutes($now);
        $lenghtHours = $datetime->diffInHours($now);
        $lengthDay = $datetime->diffInDays($now);
        $lenghtMonths = $datetime->diffInMonths($now);


        if ($lengthDay > 3){
            return Carbon::parse($this->datetime)->format('d.m.Y');
        } else {
            if ($lengthMinutes < 5){
                return trans('translation.now');
            }
            $publishedAt = $datetime->diffForHumans();
            $publishedAt = str_replace(['s'], ' ', $publishedAt);
            $publishedAt = str_replace(['seconds', 'second'], trans_choice('translation.second',$lenghtSeconds), $publishedAt);
            $publishedAt = str_replace(['minutes', 'minute'], trans_choice('translation.minute', $lengthMinutes), $publishedAt);
            $publishedAt = str_replace(['hours', 'hour'], trans_choice('translation.hour', $lenghtHours), $publishedAt);
            $publishedAt = str_replace(['day', 'days'], trans_choice('translation.day', $lengthDay), $publishedAt);
            $publishedAt = str_replace(['months', 'month'], trans_choice('translation.month', $lenghtMonths), $publishedAt);
            $publishedAt = str_replace(['ago'], trans('translation.ago'), $publishedAt);
            $publishedAt = str_replace(['from now'],trans('translation.from_now'), $publishedAt);

            if (preg_match('(years|year)', $publishedAt)) {
                $publishedAt = $datetime->toFormattedDateString();
            }
            return $publishedAt;
        }
    }
}
