<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
{
    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            // Ambil halaman terakhir yang sah dari session, atau default
            $lastSafe = session()->pull('last_safe_page', route('default_after_login'));
            return redirect($lastSafe);
        }
    }

    // Simpan halaman yang user coba akses sebelum diarahkan ke login
    if ($request->method() === 'GET' && !$request->is('login')) {
        session(['last_safe_page' => $request->url()]);
    }

    return $next($request);
}
}