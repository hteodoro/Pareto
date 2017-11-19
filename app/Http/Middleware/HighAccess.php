<?php

namespace App\Http\Middleware;

use Closure;

class HighAccess {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if(session('type') != 'school' && session('type') != 'teacher') {
          return redirect('/login')->with('auth_status', 'Você não tem permissão para acessar essa página');
        }

        return $next($request);
    }
}
