<?php

namespace App\Http\Middleware;

use Closure;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


       /*if ($request->ip() == ('217.174.230.90'))
            return $next($request);
        else
            return abort(404);*/


        if (session()->has('locale') and array_key_exists(session('locale'), config('language')))
            app()->setLocale(session('locale'));
        else
            app()->setLocale(config('app.fallback_locale'));
        return $next($request);
    }
}