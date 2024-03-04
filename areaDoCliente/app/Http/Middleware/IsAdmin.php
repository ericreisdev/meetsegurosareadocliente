<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::user() || !Auth::user()->roles->contains('name', 'admin')) {
            // Redirecionar para a página inicial se não for admin
            return redirect('/');
        }

        return $next($request);
    }
}

//C:\laragon\www\public_html\areaDoCliente\app\Http\Middleware\IsAdmin.php