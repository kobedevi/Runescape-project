<?php

namespace App\Http\Middleware;

use Closure;

class SetLanguage
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
        if($request->language == 'nl' || $request->language == 'en'){
            \App::setLocale($request->language);
        }
        return $next($request);
    }
}
