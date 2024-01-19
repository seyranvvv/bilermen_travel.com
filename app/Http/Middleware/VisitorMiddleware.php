<?php

namespace App\Http\Middleware;

use App\Models\IpAddress;
use App\Models\UserAgent;
use App\Models\Visitor;
use Closure;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use GeoIp2\Database\Reader;
use GeoIp2\Exception\AddressNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class VisitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // IP ADDRESS
        // https://packagist.org/packages/geoip2/geoip2
        $reader = new Reader(dirname(__FILE__).'/../../../database/GeoLite2-City.mmdb');
        $ip = request()->ip();
        try {
            $record = $reader->city($ip);
            $ip_address = IpAddress::firstOrCreate([
                'ip_address' => $ip,
                'country_code' => $record->country->isoCode == Null ? '':utf8_encode($record->country->isoCode),
                'country_name' => $record->country->name == Null ? '':utf8_encode($record->country->name),
                'city_name' => $record->city->name == Null ? '':utf8_encode($record->city->name),
            ]);
        } catch (AddressNotFoundException $ex) {
            $ip_address = IpAddress::firstOrCreate([
                'ip_address' => $ip,
            ]);
        }
        if ($ip_address->disabled) {
            return abort(404);
        }

        // USER AGENT
        // https://github.com/jenssegers/agent
        $ua = request()->userAgent();
        $agent = new Agent();
        $agent->setUserAgent($ua);
        $user_agent = UserAgent::firstOrCreate([
            'device' => $agent->device() ? substr($agent->device(), 0, 255) : null,
            'platform' => $agent->platform() ? substr($agent->platform(), 0, 255) : null,
            'browser' => $agent->browser() ? substr($agent->browser(), 0, 255) : null,
            'robot' => $agent->robot() ? substr($agent->robot(), 0, 255) : null,
        ]);

        $uah = $agent->robot() ? 0 : 1;
        $request->merge(compact('uah'));

        if ($user_agent->disabled) {
            return abort(404);
        }
        $robot = $user_agent->robot == null ? 0 : 1;

        // VISITOR
        try {
            $v = Visitor::where('ip_address_id', $ip_address->id)
                ->where('user_agent_id', $user_agent->id)
                ->where('updated_at', '>=', Carbon::today()->toDateString())
                ->whereApi(0)
                ->whereRobot($robot)
                ->firstOrFail();
            if (50 < $v->suspect_hits) {
                if (!$ip_address->disabled) {
                    $ip_address->disabled = 1;
                    $ip_address->update();
                }
                return abort(404);
            }
            if ($v->updated_at == Carbon::now()->toDateTimeString()) {
                $v->increment('suspect_hits');
            }
            if (Auth::guest() && 50 >= $v->suspect_hits) {
                $v->increment('hits');
            }
        } catch (ModelNotFoundException $ex) {
            $obj = new Visitor();
            $obj->ip_address_id = $ip_address->id;
            $obj->user_agent_id = $user_agent->id;
            $obj->api = 0;
            $obj->robot = $robot;
            $obj->save();
        }
        return $next($request);
    }
}
