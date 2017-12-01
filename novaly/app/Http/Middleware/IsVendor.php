<?php

namespace App\Http\Middleware;

use Closure;

class IsVendor
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
        if (!auth()->user()->isVendor()) {
            flash('This section is only meant for Vendors')->error();

            return back();
        }

        return $next($request);
    }
}
