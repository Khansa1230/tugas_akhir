<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Pekerja;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShareMahasiswaData
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

    if ($user) {
        // Ambil data mahasiswa
        $mahasiswa = DB::table('users')
            ->join('mahasiswa', 'users.nim', '=', 'mahasiswa.nim')
            ->where('users.nim', $user->nim)
            ->select('mahasiswa.nama', 'mahasiswa.nim')
            ->first();

        // Ambil data pekerja
        $pekerja = $user->pekerja;

        // Ambil data dosen/utama
        $utama = $user->dosen; // pastikan relasi User -> Dosen ada, misal hasOne

        \Log::info('Mahasiswa: ' . json_encode($mahasiswa));
        \Log::info('Pekerja: ' . json_encode($pekerja));
        \Log::info('Utama: ' . json_encode($utama));

        // Share ke semua view
        view()->share([
            'mahasiswa' => $mahasiswa,
            'pekerja' => $pekerja,
            'utama'    => $utama,
        ]);
    }

    return $next($request);
}


    }
