<?php

namespace App\Http\Middleware;

use Closure;

class StudentAccess {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if(session('type') != 'student') {
          return redirect('/login')->with('auth_status', 'É necessário um perfil de aluno para acessar esta página');
        }

        return $next($request);
    }
}
