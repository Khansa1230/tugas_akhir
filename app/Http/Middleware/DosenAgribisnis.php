<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dosen;
use Illuminate\Support\Facades\Log;

class DosenAgribisnis
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

        // Cari dosen berdasarkan NIDN, trim untuk memastikan tidak ada spasi
        $dosen = Dosen::whereRaw('TRIM(nidn) = ?', [trim($user->nim)])->first();

        // List jabatan yang DILARANG masuk
        $jabatan = [
            'Guru Besar/Dekan',
            'Guru Besar/Wakil Dekan Bidang Akademik',
            'Guru Besar/Wakil Dekan Bidang Administrasi Umum',
            'Lektor Kepala/Wakil Dekan Bidang Kemahasiswaan Alumni dan',
            'Lektor/Kepala Pusat Penelitian LP2M',
            'Lektor/Kepala Pusat Laboratorium Terpadu',
            'Guru Besar/Kepala Pusat Pengembangan Green Campus',
        ];
        $jabatan = array_map('trim', $jabatan);

        // Tahap 1: blokir dosen yang ada di list jabatan
        if ($dosen && in_array(trim($dosen->jabatan), $jabatan)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        $userProdi = trim(strtolower($dosen->prodi ?? ''));
        if ($userProdi !== 'agribisnis') {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }


                Log::info('Dosen Agribisnis masuk ke halaman');

                return $next($request);
            }
        }
