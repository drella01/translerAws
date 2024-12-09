<?php

namespace App\Http\Middleware;

use Closure;

class IpAccess
{
    public $ip=['95.123.28.209','81.32.115.42','127.0.0.1','2.136.176.62', '88.30.64.179'];

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
