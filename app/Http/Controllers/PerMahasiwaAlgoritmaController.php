<?php

namespace App\Http\Controllers;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerMahasiwaAlgoritmaController extends Controller
{
    public function index(){
        return view ('utama.algoritma.prediksi.permahasiswa.per_mahasiswa_algoritma_c45');
    }

    public function penanggung_jawab(){
        return view ('penanggung_jawab.algoritma.prediksi.permahasiswa.per_mahasiswa_algoritma_c45');
    }
    
}
