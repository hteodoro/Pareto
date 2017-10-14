<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if(!$request->session()->has('id')) {
          return redirect('login')->with('auth_status', 'É necessário estar logado para acessar essa página.');
        }

        return $next($request);
    }

}
