<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $rol): Response
    {
        if (!auth()->check()) {
            return redirect()->route('auth.showLogin');
        }

        if (auth()->user()->rol !== $rol) {
            return redirect()->route('home')->with('feedback.message', 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}
