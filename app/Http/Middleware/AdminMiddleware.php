<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
       //se o usuario nao iniciar sessao, redirecionara pra login
        if(! auth()->check())
            return redirect('admin.login');
        //verifica se o usuario nao for administrador, vai ser redirecionado para a home
        if (auth()->user()->role != 0)//se nao for administrador(0) manda para home

            return redirect('admin.home');

        return $next($request);
    }
}
