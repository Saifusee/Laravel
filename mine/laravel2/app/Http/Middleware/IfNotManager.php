<?php

namespace App\Http\Middleware;

use Closure;

class IfNotManager
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
        if(!$request->user()->isAManager()){
            return redirect(action('CrudsController@index'));
        }

        return $next($request);
    }
}
