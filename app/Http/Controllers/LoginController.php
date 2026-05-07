<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Matakuliah; 
use App\Models\Pekerja; 
use App\Models\Dosen; 
use illuminate\support\facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    protected $redirectTo = '/dashboard'; // Redirect setelah login

    // Menampilkan halaman login
    public function index()
    {
        return view('auth.login'); // Jika belum login, tampilkan halaman login
    }
    public function loginaa(Request $request)
    {
        $credentials = $request->validate([
            'nim' => ['required', 'string'],
            'password' => ['required'],
        ]);

        $user = User::where('nim', $credentials['nim'])->first();

        if (!$user) {
            return back()->withErrors([
                'nim' => 'NIM tidak terdaftar.',
            ])->onlyInput('nim');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Ambil data matakuliah berdasarkan NIM
            $matakuliah = Matakuliah::where('nim', $credentials['nim'])->first();

            if ($matakuliah) {
                $jurusan = $matakuliah->jurusan;
                switch ($jurusan) {
                    case 'Agribisnis':
                        return redirect()->route('dashboard_agribisnis');
                    case 'Biologi':
                        return redirect()->route('dashboard_biologi');
                    case 'Fisika':
                        return redirect()->route('dashboard_fisika');
                    case 'Kimia':
                        return redirect()->route('dashboard_kimia');
                    case 'matematika':
                        return redirect()->route('dashboard_matematika');
                    case 'Sistem Informasi':
                        return redirect()->route('dashboard_sistem_informasi');
                    case 'Teknik Informatika':
                        return redirect()->route('dashboard_teknik_informatika');
                    case 'Teknik Pertambangan':
                        return redirect()->route('dashboard_teknik_tambang');
                    default:
                        return redirect()->route('dashboard');
                }
            } else {
                return redirect()->route('dashboard');
            }
        }

        return back()->withErrors([
            'password' => 'Password salah.',
        ])->onlyInput('nim');
    }

    public function loginaaa(Request $request)
    {
        $credentials = $request->validate([
            'nim' => ['required', 'string'],
            'password' => ['required'],
        ]);

        $user = User::where('nim', $credentials['nim'])->first();

        if (!$user) {
            return back()->withErrors([
                'nim' => 'NIM tidak terdaftar.',
            ])->onlyInput('nim');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $pekerja = Pekerja::where('ni', $credentials['nim'])->first();

            if ($pekerja && in_array($pekerja->role, ['Prodi', 'Dosen'])) {
                $jurusan = $pekerja->jurusan;
            } elseif ($pekerja && !in_array($pekerja->role, ['Prodi', 'Dosen'])) {
                return redirect()->route('dashboard_pekerja');
            } else {
                $matakuliah = Matakuliah::where('nim', $credentials['nim'])->first();
                $jurusan = $matakuliah->jurusan;
            }

            switch ($jurusan) {
                case 'Agribisnis':
                    return redirect()->route('dashboard_agribisnis');
                case 'Biologi':
                    return redirect()->route('dashboard_biologi');
                case 'Fisika':
                    return redirect()->route('dashboard_fisika');
                case 'Kimia':
                    return redirect()->route('dashboard_kimia');
                case 'Matematika':
                    return redirect()->route('dashboard_matematika');
                case 'Sistem Informasi':
                    return redirect()->route('dashboard_sistem_informasi');
                case 'Teknik Informatika':
                    return redirect()->route('dashboard_teknik_informatika');
                case 'Teknik Pertambangan':
                    return redirect()->route('dashboard_teknik_tambang');
                default:
                    return redirect()->route('dashboard');
            }
        }

        return back()->withErrors([
            'password' => 'Password salah.',
        ])->onlyInput('nim');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nim' => ['required', 'string'],
            'password' => ['required'],
        ]);

        $user = User::where('nim', $credentials['nim'])->first();

        if (!$user) {
            return back()->withErrors([
                'nim' => 'NIM tidak terdaftar.',
            ])->onlyInput('nim');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Ambil data Pekerja
            $pekerja = Pekerja::where('ni', $credentials['nim'])->first();

            // Ambil data Dosen
            $utama = Dosen::where('nidn', $credentials['nim'])->first();

            // Ambil data Dosen
            $dosen = Dosen::where('nidn', $credentials['nim'])->first();
            
            $jurusan = null;
            $prodi = null;


            // List jabatan yang diizinkan
            $jabatan = [
                'Guru Besar/Dekan',
                'Guru Besar/Wakil Dekan Bidang Akademik',
                'Guru Besar/Wakil Dekan Bidang Administrasi Umum',
                'Lektor Kepala/Wakil Dekan Bidang Kemahasiswaan Alumni dan',
                'Lektor/Kepala Pusat Penelitian LP2M',
                'Lektor/Kepala Pusat Laboratorium Terpadu',
                'Guru Besar/Kepala Pusat Pengembangan Green Campus',
            ];

            // Logika akses mirip Pekerja
            if ($pekerja && in_array($pekerja->role, ['Dekan', 'Admin', 'admin'])) {
                return redirect()->route('penanggung_jawab_dashboard');
            } elseif ($pekerja && in_array($pekerja->role, ['Prodi', 'Dosen'])) {
                $jurusan = $pekerja->jurusan;
            } elseif ($utama && in_array($utama->jabatan, $jabatan)) {
                return redirect()->route('dashboard');
            } elseif ($dosen && !in_array($dosen->jabatan, $jabatan)) {
        //              dd([
        //     'nidn' => $dosen->nidn,
        //     'jabatan' => $dosen->jabatan,
        //     'masuk_list_jabatan' => in_array($dosen->jabatan, $jabatan),
        //     'prodi' => $dosen->prodi ?? null,
        // ]);
                    // Masuk ke logika dosen
                    $prodi = $dosen->prodi;
                    // Redirect sesuai prodi
            } else {
                $matakuliah = Matakuliah::where('nim', $credentials['nim'])->first();
                $jurusan = $matakuliah->jurusan ?? null;
            }

            



            // Redirect sesuai prodi dosen
            if ($dosen) {
                switch ($prodi) {
                    case 'Agribisnis':
                        return redirect()->route('dosen_dashboard_agribisnis');
                    case 'Biologi':
                        return redirect()->route('dosen_dashboard_biologi');
                    case 'Fisika':
                        return redirect()->route('dosen_dashboard_fisika');
                    case 'Kimia':
                        return redirect()->route('dosen_dashboard_kimia');
                    case 'Matematika':
                        return redirect()->route('dosen_dashboard_matematika');
                    case 'Sistem Informasi':
                        return redirect()->route('dosen_dashboard_sistem_informasi');
                    case 'Teknik Informatika':
                        return redirect()->route('dosen_dashboard_teknik_informatika');
                    case 'Teknik Pertambangan':
                        return redirect()->route('dosen_dashboard_teknik_tambang');
                    default:
                        return redirect()->route('dosen_dashboard');
                }
            }

            // Redirect sesuai jurusan
            switch ($jurusan) {
                case 'Agribisnis':
                    return redirect()->route('dashboard_agribisnis');
                case 'Biologi':
                    return redirect()->route('dashboard_biologi');
                case 'Fisika':
                    return redirect()->route('dashboard_fisika');
                case 'Kimia':
                    return redirect()->route('dashboard_kimia');
                case 'Matematika':
                    return redirect()->route('dashboard_matematika');
                case 'Sistem Informasi':
                    return redirect()->route('dashboard_sistem_informasi');
                case 'Teknik Informatika':
                    return redirect()->route('dashboard_teknik_informatika');
                case 'Teknik Pertambangan':
                    return redirect()->route('dashboard_teknik_tambang');
                default:
                    return redirect()->route('dashboard');
            }
        }
        

        return back()->withErrors([
            'password' => 'Password salah.',
        ])->onlyInput('nim');

        //dd($utama);
    }


        public function logout(Request $request)
    {
        // Tentukan guard berdasarkan pengguna
        $guard = auth()->user()->jurusan;

        // Log informasi bahwa proses logout dimulai
        Log::info('User logout initiated.', ['user_id' => Auth::id()]);

        // Mengeluarkan pengguna berdasarkan guard
        Auth::guard($guard)->logout();

        // Log informasi bahwa pengguna berhasil logout
        Log::info('User successfully logged out.', ['user_id' => Auth::id()]);

        // Menghapus session pengguna
        $request->session()->invalidate();

        // Menghasilkan token CSRF baru
        $request->session()->regenerateToken();

        // Log informasi bahwa session telah diinvalidasi dan token dihasilkan ulang
        Log::info('Session invalidated and token regenerated.');

        // Mengarahkan kembali ke halaman utama
        return redirect('/')->with('status', 'Anda telah logout berhasil.');
    }
    
}
