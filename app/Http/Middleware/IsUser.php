<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            if (! auth()->user()->is_admin) {
                return $next($request);
            }

            if (auth()->user()->is_admin) {

                return redirect('/admin');
            }
        } elseif (! auth()->check()) {
            return $next($request);
        }

        return abort(403);

    }
}
