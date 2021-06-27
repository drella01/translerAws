<?php

namespace App\Http\Middleware;

use Closure;

class IpAccess
{
    public $ip=['127.0.0.1','79.159.232.41'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!in_array($request->ip(), $this->ip)) {
            //return abort(403,'No auhorized');
            return redirect()->route('type.index');
        }
        return $next($request);
    }
}
