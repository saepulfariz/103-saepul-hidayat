<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role = null): Response
    {
        if (session()->get('isLogged') == null && session()->get('userId') == null) {
            return redirect()->route('auth.login')->with('error', 'Perlu Login Terlebih Dahulu!!');
        }

        if ($role != null) {
            if (session()->get('role') != $role) {
                return redirect()->route('auth.login')->with('error', 'Anda tidak Memiliki Akses!!');
            }
        }

        return $next($request);
    }
}
