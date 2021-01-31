<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Config;
use Closure;

class Admin
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
        $allow = false;
        foreach (Config::get('custom.admins') as $admin) {
            if (auth()->user()->email != $admin) {
                $allow = true;
            }
        }
        if (!$allow) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
