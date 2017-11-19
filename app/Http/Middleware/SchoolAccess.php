<?php

namespace App\Http\Middleware;

use Closure;

class SchoolAccess {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if(session('type') != 'school') {
          return redirect('/login')->with('auth_status', 'É necessário um perfil de escola para acessar esta página');
        }

        return $next($request);
    }
}
