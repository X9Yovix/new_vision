<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Request;
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
        /* if (! $request->expectsJson()) {
            return route('login');
        } */
        if (!$request->expectsJson()) {
            if (Request::is(app()->getLocale() . 'student/dashbaord')) {
                return route('selection');
            } else if (Request::is(app()->getLocale() . 'teacher/dashbaord')) {
                return route('selection');
            } else {
                return route('selection');
            }
        }
    }
}
