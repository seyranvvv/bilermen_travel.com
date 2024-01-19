<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAgent extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function ua()
    {
        $ua = [];
        if ($this->device) {
            $ua[] = $this->device;
        }
        if ($this->platform) {
            $ua[] = $this->platform;
        }
        if ($this->browser) {
            $ua[] = $this->browser;
        }
        $userAgent = implode(", ", $ua) . ($this->robot ? (' (' . $this->robot . ')') : '');
        if ($userAgent == '') {
            return ucfirst(trans('transAdmin.not-found'));
        } else {
            return $userAgent;
        }
    }


    public function visitors()
    {
        return $this->hasMany(Visitor::class)
            ->orderBy('updated_at', 'desc');
    }


    public function contacts()
    {
        return $this->hasMany(Contact::class)
            ->orderBy('created_at', 'desc');
    }
}
