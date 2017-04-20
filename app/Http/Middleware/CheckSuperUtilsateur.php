<?php

namespace App\Http\Middleware;

use Closure;

class CheckSuperUtilsateur
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
        if ($request->user()->type != 2) {
            return redirect(url('/'));
        }

        return $next($request);
    }
}
