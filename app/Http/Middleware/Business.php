<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Business
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
        $echalo = false;
        if (Auth::guest() || Auth::user()->user_type_id != 2) {
            $echalo = true;
        }

        if ($echalo) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
