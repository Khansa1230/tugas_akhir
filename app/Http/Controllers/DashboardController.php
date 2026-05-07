<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view ('utama.dashboard.dashboard');
    }

    public function penanggung_jawab(){
        return view ('penanggung_jawab.dashboard.dashboard');
    }


    public function dosen_agribisnis(){
        return view ('dosen.agribisnis.dashboard.dashboard');
    }

    public function dosen_biologi(){
        return view ('dosen.biologi.dashboard.dashboard');
    }

    public function dosen_fisika(){
        return view ('dosen.fisika.dashboard.dashboard');
    }

    public function dosen_kimia(){
        return view ('dosen.kimia.dashboard.dashboard');
    }

    public function dosen_matematika(){
        return view ('dosen.matematika.dashboard.dashboard');
    }

    public function dosen_sistem_informasi(){
        return view ('dosen.sistem_informasi.dashboard.dashboard');
    }

    public function dosen_teknik_informatika(){
        return view ('dosen.teknik_informatika.dashboard.dashboard');
    }

    public function dosen_teknik_tambang(){
        return view ('dosen.teknik_tambang.dashboard.dashboard');
    }

    public function agribisnis(){
        return view ('agribisnis.dashboard.dashboard');
    }

    public function biologi(){
        return view ('biologi.dashboard.dashboard');
    }

    public function fisika(){
        return view ('fisika.dashboard.dashboard');
    }

    public function kimia(){
        return view ('kimia.dashboard.dashboard');
    }

    public function matematika(){
        return view ('matematika.dashboard.dashboard');
    }

    public function sistem_informasi(){
        return view ('sistem_informasi.dashboard.dashboard');
    }

    public function teknik_informatika(){
        return view ('teknik_informatika.dashboard.dashboard');
    }

    public function teknik_tambang(){
        return view ('teknik_tambang.dashboard.dashboard');
    }
}
