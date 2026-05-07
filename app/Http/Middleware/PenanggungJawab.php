<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Pekerja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PenanggungJawab
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            abort(401, 'Anda belum login.');
        }

        $pekerja = Pekerja::where('ni', $user->nim)->first();

        if (!$pekerja || !in_array($pekerja->role, ['Dekan', 'Admin', 'admin'])) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        Log::info('Penanggung Jawab masuk ke halaman');

        return $next($request);
    }
}