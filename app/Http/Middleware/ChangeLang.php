<?php

namespace App\Http\Middleware;

use Closure;

class ChangeLang
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $lang
     * @return mixed
     */
    public function handle($request, Closure $next, $lang)
    {
        if (\App::getLocale() != $lang) {
            return redirect(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($lang, null, [], true));
        }
        return $next($request);
    }

}