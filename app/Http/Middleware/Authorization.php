<?php

namespace App\Http\Middleware;

use Closure;

class Authorization
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
        $routeName = $request->route()->getName();
        $user = $request->user();
        if (! $user) {
            abort(403, 'Unauthorized user');
        } else {
            if (! $user->can($routeName)) {
                abort(403, 'Unauthorized action');
            }
        }

        return $next($request);
    }
}
