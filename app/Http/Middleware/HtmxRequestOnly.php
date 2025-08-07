<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HtmxRequestOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $redirectRoute = null): Response
    {
        if ($request->header('HX-Request') === 'true') {
            return $next($request);
        }

        if ($redirectRoute) {
            return redirect()->route($redirectRoute);
        }

        abort(404);
    }
}
