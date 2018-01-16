<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

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
            View::share('g_roles', array_pluck($user->roles, 'id'));
            if (! $user->can($routeName)) {
                return backendRedirect('/')->with('error', 'Unauthorized Action.');
            }
        }

        return $next($request);
    }
}
