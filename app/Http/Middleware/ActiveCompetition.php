<?php

namespace App\Http\Middleware;

use Closure;
use App\Competition;

class ActiveCompetition
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
        $active = Competition::where('active', 'active')->first();
        if ($active) {
            $request->activeCompetition = $active->id;
        }
        return $next($request);
    }
}
