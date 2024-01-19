<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {


     /*  if ($request->ip() == ('217.174.230.90'))
            return route('login');
        else
            return abort(404);*/



        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}