<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtamaKlasifikasiC45FisikaController extends Controller
{ 
    public function klasifikasi_mahasiswa_jurusan_fisika(Request $request)
    {
        // Ambil input dari pengguna
        $predictedLulus = $request->input('predicted_lulus');
        // Hitung test_size
        $testSize = 100 - $predictedLulus; // Menghitung test_size
        // Inisialisasi variabel untuk hasil query dan perhitungan entropi
        $result1 = [];
        $totalMahasiswa = 0;
        $entropyTotal1 = 0;
        // Menjalankan query untuk mengambil data dari database
       $query11 = DB::table('matakuliah as mk')
            ->join('mahasiswa as m', 'm.nim', '=', 'mk.nim')
            ->join('jurusan as j', 'mk.kd_jurusan', '=', 'j.kd_jurusan')
            ->join('jenis_sekolah_mahasiswa_baru as js', 'js.kd_jenis_sekolah', '=', 'm.kd_jenis_sekolah')
            ->select(
                'm.nim AS nim', 
                DB::raw("CASE 
                    WHEN (js.jenis_sekolah IS NULL OR js.jenis_sekolah = '') THEN 
                        CASE 
                            WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                            ELSE 'Belum Daftar'
                        END
                    ELSE js.jenis_sekolah
                END AS jenis_sekolah"),
                DB::raw("CASE 
                    WHEN mk.sks >= 144 THEN 'Memenuhi'
                    ELSE 'Belum Memenuhi'
                END AS kategori_sks"),
                DB::raw("CASE 
                    WHEN REPLACE(mk.ipk, ',', '.') >= 2.75 AND REPLACE(mk.ipk, ',', '.') < 3.00 THEN 'Memuaskan'
                    WHEN REPLACE(mk.ipk, ',', '.') >= 3.00 AND REPLACE(mk.ipk, ',', '.') < 3.50 THEN 'Sangat Memuaskan'
                    WHEN REPLACE(mk.ipk, ',', '.') >= 3.50 THEN 'Pujian'
                    WHEN REPLACE(mk.ipk, ',', '.') < 2.75 THEN 'Perbaiki'
                END AS kategori_ipk"),
               DB::raw("CASE 
                    WHEN (mk.ipsmt_1 IS NULL OR mk.ipsmt_1 = '') THEN 
                    CASE
                        WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                        ELSE 'Belum Daftar'
                    END
                    WHEN REPLACE(mk.ipsmt_1, ',', '.') >= 3.50 THEN 'Pujian'
                    WHEN REPLACE(mk.ipsmt_1, ',', '.') >= 3.00 AND REPLACE(mk.ipsmt_1, ',', '.') < 3.50 THEN 'Sangat Memuaskan'
                    WHEN REPLACE(mk.ipsmt_1, ',', '.') >= 2.75 AND REPLACE(mk.ipsmt_1, ',', '.') < 3.00 THEN 'Memuaskan'
                    WHEN REPLACE(mk.ipsmt_1, ',', '.') < 2.75 THEN 'Perbaiki'
                END AS ipsmt_1"),

                DB::raw("CASE 
                    WHEN (mk.ipsmt_2 IS NULL OR mk.ipsmt_2 = '') THEN 
                    CASE
                        WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                        ELSE 'Belum Daftar'
                    END
                    WHEN REPLACE(mk.ipsmt_2, ',', '.') >= 3.50 THEN 'Pujian'
                    WHEN REPLACE(mk.ipsmt_2, ',', '.') >= 3.00 AND REPLACE(mk.ipsmt_2, ',', '.') < 3.50 THEN 'Sangat Memuaskan'
                    WHEN REPLACE(mk.ipsmt_2, ',', '.') >= 2.75 AND REPLACE(mk.ipsmt_2, ',', '.') < 3.00 THEN 'Memuaskan'
                    WHEN REPLACE(mk.ipsmt_2, ',', '.') < 2.75 THEN 'Perbaiki'
                END AS ipsmt_2"),

                DB::raw("CASE 
                    WHEN (mk.ipsmt_3 IS NULL OR mk.ipsmt_3 = '') THEN 
                    CASE
                        WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                        ELSE 'Belum Daftar'
                    END
                    WHEN REPLACE(mk.ipsmt_3, ',', '.') >= 3.50 THEN 'Pujian'
                    WHEN REPLACE(mk.ipsmt_3, ',', '.') >= 3.00 AND REPLACE(mk.ipsmt_3, ',', '.') < 3.50 THEN 'Sangat Memuaskan'
                    WHEN REPLACE(mk.ipsmt_3, ',', '.') >= 2.75 AND REPLACE(mk.ipsmt_3, ',', '.') < 3.00 THEN 'Memuaskan'
                    WHEN REPLACE(mk.ipsmt_3, ',', '.') < 2.75 THEN 'Perbaiki'
                END AS ipsmt_3"),

                DB::raw("CASE 
                    WHEN (mk.ipsmt_4 IS NULL OR mk.ipsmt_4 = '') THEN 
                    CASE
                        WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                        ELSE 'Belum Daftar'
                    END
                    WHEN REPLACE(mk.ipsmt_4, ',', '.') >= 3.50 THEN 'Pujian'
                    WHEN REPLACE(mk.ipsmt_4, ',', '.') >= 3.00 AND REPLACE(mk.ipsmt_4, ',', '.') < 3.50 THEN 'Sangat Memuaskan'
                    WHEN REPLACE(mk.ipsmt_4, ',', '.') >= 2.75 AND REPLACE(mk.ipsmt_4, ',', '.') < 3.00 THEN 'Memuaskan'
                    WHEN REPLACE(mk.ipsmt_4, ',', '.') < 2.75 THEN 'Perbaiki'
                END AS ipsmt_4"),

                DB::raw("CASE 
                    WHEN (mk.ipsmt_5 IS NULL OR mk.ipsmt_5 = '') THEN 
                    CASE
                        WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                        ELSE 'Belum Daftar'
                    END
                    WHEN REPLACE(mk.ipsmt_5, ',', '.') >= 3.50 THEN 'Pujian'
                    WHEN REPLACE(mk.ipsmt_5, ',', '.') >= 3.00 AND REPLACE(mk.ipsmt_5, ',', '.') < 3.50 THEN 'Sangat Memuaskan'
                    WHEN REPLACE(mk.ipsmt_5, ',', '.') >= 2.75 AND REPLACE(mk.ipsmt_5, ',', '.') < 3.00 THEN 'Memuaskan'
                    WHEN REPLACE(mk.ipsmt_5, ',', '.') < 2.75 THEN 'Perbaiki'
                END AS ipsmt_5"),

                DB::raw("CASE 
                    WHEN (mk.ipsmt_6 IS NULL OR mk.ipsmt_6 = '') THEN 
                    CASE
                        WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                        ELSE 'Belum Daftar'
                    END
                    WHEN REPLACE(mk.ipsmt_6, ',', '.') >= 3.50 THEN 'Pujian'
                    WHEN REPLACE(mk.ipsmt_6, ',', '.') >= 3.00 AND REPLACE(mk.ipsmt_6, ',', '.') < 3.50 THEN 'Sangat Memuaskan'
                    WHEN REPLACE(mk.ipsmt_6, ',', '.') >= 2.75 AND REPLACE(mk.ipsmt_6, ',', '.') < 3.00 THEN 'Memuaskan'
                    WHEN REPLACE(mk.ipsmt_6, ',', '.') < 2.75 THEN 'Perbaiki'
                END AS ipsmt_6"),

                DB::raw("CASE 
                    WHEN (mk.ipsmt_7 IS NULL OR mk.ipsmt_7 = '') THEN 
                    CASE
                        WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                        ELSE 'Belum Daftar'
                    END
                    WHEN REPLACE(mk.ipsmt_7, ',', '.') >= 3.50 THEN 'Pujian'
                    WHEN REPLACE(mk.ipsmt_7, ',', '.') >= 3.00 AND REPLACE(mk.ipsmt_7, ',', '.') < 3.50 THEN 'Sangat Memuaskan'
                    WHEN REPLACE(mk.ipsmt_7, ',', '.') >= 2.75 AND REPLACE(mk.ipsmt_7, ',', '.') < 3.00 THEN 'Memuaskan'
                    WHEN REPLACE(mk.ipsmt_7, ',', '.') < 2.75 THEN 'Perbaiki'
                END AS ipsmt_7"),
                DB::raw("
                    CASE 
                        WHEN mk.judisium IS NULL OR TRIM(REPLACE(REPLACE(mk.judisium, '\r', ''), '\n', '')) IN ('', 'NULL') THEN 
                            CASE 
                                WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                                ELSE 'Belum Daftar'
                            END
                        ELSE TRIM(REPLACE(REPLACE(mk.judisium, '\r', ''), '\n', ''))
                    END AS judisium
                "),
                DB::raw("CASE 
                    WHEN mk.praktek_kerja_lapangan IS NOT NULL AND mk.praktek_kerja_lapangan != '' 
                        THEN CONCAT('Semester ', mk.praktek_kerja_lapangan)
                    WHEN mk.kuliah_kerja_lapangan IS NOT NULL AND mk.kuliah_kerja_lapangan != '' 
                        THEN CONCAT('Semester ', mk.kuliah_kerja_lapangan)
                    WHEN mk.praktek_kerja_lapangan IS NULL AND mk.kuliah_kerja_lapangan IS NULL 
                        THEN NULL
                    ELSE 
                        CASE 
                            WHEN mk.status = 'Lulus' THEN 'Lulus Tidak Terdata'
                            ELSE 'Belum Daftar'
                        END
                END AS kategori_pkl"),
                DB::raw("CASE 
                    WHEN mk.kuliah_kerja_nyata IS NOT NULL AND mk.kuliah_kerja_nyata != '' 
                        THEN CONCAT('Semester ', mk.kuliah_kerja_nyata)
                    WHEN mk.kuliah_kerja_nyata_kkn IS NOT NULL AND mk.kuliah_kerja_nyata_kkn != '' 
                        THEN CONCAT('Semester ', mk.kuliah_kerja_nyata_kkn)
                    WHEN mk.kuliah_kerja_nyata IS NULL AND mk.kuliah_kerja_nyata_kkn IS NULL 
                        THEN NULL
                    ELSE 
                        CASE 
                            WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                            ELSE 'Belum Daftar'
                        END
                END AS kategori_kkn"),
                DB::raw("CASE 
                    WHEN mk.seminar_skripsi IS NOT NULL AND TRIM(REPLACE(REPLACE(mk.seminar_skripsi, '\r', ''), '\n', '')) != '' 
                        THEN CONCAT('Semester ', TRIM(REPLACE(REPLACE(mk.seminar_skripsi, '\r', ''), '\n', '')))
                    WHEN mk.seminar IS NOT NULL AND TRIM(REPLACE(REPLACE(mk.seminar, '\r', ''), '\n', '')) != '' 
                        THEN CONCAT('Semester ', TRIM(REPLACE(REPLACE(mk.seminar, '\r', ''), '\n', '')))
                    WHEN mk.seminar_skripsi IS NULL AND (mk.seminar IS NULL OR TRIM(REPLACE(REPLACE(mk.seminar, '\r', ''), '\n', '')) = '') 
                        THEN 'Belum Daftar'
                    ELSE 
                        CASE 
                            WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                            ELSE 'Belum Daftar'
                        END
                END AS kategori_seminar"),
                DB::raw("
                CASE 
                    WHEN mk.status IN ('Aktif', 'Cuti', 'Drop Out', 'Mengundurkan Diri') THEN 'Belum Lulus'
                    WHEN mk.status = 'Lulus' THEN 'Lulus'
                    ELSE 'Belum Lulus'
                END AS kategori
                "),
            )
            ->where('j.jurusan', '=', 'Fisika');
           

        // Eksekusi query untuk mengambil hasil
        $query11 = $query11->get();
        
         // Hitung test_size
         $testSize = 100 - $predictedLulus; // Menghitung test_size

        // Simpan test_size ke file JSON untuk digunakan di Python
        $testSizeFilePath = 'C:\\xampp\\htdocs\\skripsi\\app\\python_scripts\\fisika\\test_size.json';
        file_put_contents($testSizeFilePath, json_encode(['test_size' => $testSize]));
        // Mengonversi hasil query menjadi format yang bisa digunakan oleh Python
        $data = [];
        foreach ($query11 as $row) {
            $data[] = [
                'jenis_sekolah' => $row-> jenis_sekolah,
                'kategori_sks' => $row->kategori_sks,
                'kategori_ipk' => $row->kategori_ipk,
                'ipsmt_1' => $row->ipsmt_1,
                'ipsmt_2' => $row->ipsmt_2,
                'ipsmt_3' => $row->ipsmt_3,
                'ipsmt_4' => $row->ipsmt_4,
                'ipsmt_5' => $row->ipsmt_5,
                'ipsmt_6' => $row->ipsmt_6,
                'ipsmt_7' => $row->ipsmt_7,
                'kategori_pkl' => $row->kategori_pkl,
                'kategori_kkn' => $row->kategori_kkn,
                'kategori_seminar' => $row->kategori_seminar,
                'judisium' => $row->judisium,
                'kategori' => $row->kategori,
            ];
        }

        //dd($query10, $data);
        // Menyimpan data ke file JSON untuk digunakan di Python
        $jsonFilePath = 'C:\\xampp\\htdocs\\skripsi\\app\\python_scripts\\fisika\\data.json';
        file_put_contents($jsonFilePath, json_encode($data));
        // Menyimpan informasi kol om yang terkait dengan setiap kategori
        $columnMapping = [
        'jenis_sekolah' => 'Jenis Sekolah',
        'kategori_sks' => 'Satuan Kredit Semester',
        'kategori_ipk' => 'Indeks Prestasi Kumulatif',
        'ipsmt_1' => 'Indeks Prestasi Semester 1',
        'ipsmt_2' => 'Indeks Prestasi Semester 2',
        'ipsmt_3' => 'Indeks Prestasi Semester 3',
        'ipsmt_4' => 'Indeks Prestasi Semester 4',
        'ipsmt_5' => 'Indeks Prestasi Semester 5',
        'ipsmt_6' => 'Indeks Prestasi Semester 6',
        'ipsmt_7' => 'Indeks Prestasi Semester 7',
        'kategori_pkl' => 'Praktek Kerja Lapangan', // atau kolom lain yang relevan
        'kategori_kkn' => 'Kuliah Kerja Nyata',
        'kategori_seminar' => 'Seminar',
        'judisium' => 'Yudisium',
        ];


        $jsonFilePath = 'C:\\xampp\\htdocs\\skripsi\\app\\python_scripts\\fisika\\data.json';
        file_put_contents($jsonFilePath, json_encode($data));

        $pythonScriptPath = 'C:\\xampp\\htdocs\\skripsi\\app\\python_scripts\\fisika\\umum_decision_tree_visualization.py';
        $output = shell_exec("python \"$pythonScriptPath\"");

        $outputData = [
            'entropy_gain' => [],
            'train_df' => []
        ];

        if ($output !== null) {
            $result = json_decode($output, true);

            // Pertahankan pola array dari Python
            $outputData['entropy_gain'] = $result['entropy_gain'] ?? [];
            $outputData['train_df'] = $result['train_df'] ?? [];
        }

        // Debug di Controller, full HTML tetap di array
        //dd($outputData); // semua item html tetap di array, ga dirusak



        // Kembalikan ke view (jika tidak pakai DD)
        return view('utama.algoritma.klasifikasi_c45_matakuliah_fisika_mahasiswa', compact('outputData', 'columnMapping', 'predictedLulus'));

    }
    
    public function prediksi_mahasiswa_jurusan_fisika(Request $request)
    {
        // Ambil input dari pengguna
        $predictedLulus = $request->input('predicted_lulus');
        // Hitung test_size
        $testSize = 100 - $predictedLulus; // Menghitung test_size
        // Inisialisasi variabel untuk hasil query dan perhitungan entropi
        $result1 = [];
        $totalMahasiswa = 0;
        $entropyTotal1 = 0;
        // Menjalankan query untuk mengambil data dari database
       $query11 = DB::table('matakuliah as mk')
            ->join('mahasiswa as m', 'm.nim', '=', 'mk.nim')
            ->join('jurusan as j', 'mk.kd_jurusan', '=', 'j.kd_jurusan')
            ->join('jenis_sekolah_mahasiswa_baru as js', 'js.kd_jenis_sekolah', '=', 'm.kd_jenis_sekolah')
            ->select(
                'm.nim AS nim', 
                DB::raw("CASE 
                    WHEN (js.jenis_sekolah IS NULL OR js.jenis_sekolah = '') THEN 
                        CASE 
                            WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                            ELSE 'Belum Daftar'
                        END
                    ELSE js.jenis_sekolah
                END AS jenis_sekolah"),
                DB::raw("CASE 
                    WHEN mk.sks >= 144 THEN 'Memenuhi'
                    ELSE 'Belum Memenuhi'
                END AS kategori_sks"),
                DB::raw("CASE 
                    WHEN REPLACE(mk.ipk, ',', '.') >= 2.75 AND REPLACE(mk.ipk, ',', '.') < 3.00 THEN 'Memuaskan'
                    WHEN REPLACE(mk.ipk, ',', '.') >= 3.00 AND REPLACE(mk.ipk, ',', '.') < 3.50 THEN 'Sangat Memuaskan'
                    WHEN REPLACE(mk.ipk, ',', '.') >= 3.50 THEN 'Pujian'
                    WHEN REPLACE(mk.ipk, ',', '.') < 2.75 THEN 'Perbaiki'
                END AS kategori_ipk"),
                DB::raw("CASE 
                    WHEN (mk.ipsmt_1 IS NULL OR mk.ipsmt_1 = '') THEN 
                    CASE
                        WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                        ELSE 'Belum Daftar'
                    END
                    WHEN REPLACE(mk.ipsmt_1, ',', '.') >= 3.50 THEN 'Pujian'
                    WHEN REPLACE(mk.ipsmt_1, ',', '.') >= 3.00 AND REPLACE(mk.ipsmt_1, ',', '.') < 3.50 THEN 'Sangat Memuaskan'
                    WHEN REPLACE(mk.ipsmt_1, ',', '.') >= 2.75 AND REPLACE(mk.ipsmt_1, ',', '.') < 3.00 THEN 'Memuaskan'
                    WHEN REPLACE(mk.ipsmt_1, ',', '.') < 2.75 THEN 'Perbaiki'
                END AS ipsmt_1"),

                DB::raw("CASE 
                    WHEN (mk.ipsmt_2 IS NULL OR mk.ipsmt_2 = '') THEN 
                    CASE
                        WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                        ELSE 'Belum Daftar'
                    END
                    WHEN REPLACE(mk.ipsmt_2, ',', '.') >= 3.50 THEN 'Pujian'
                    WHEN REPLACE(mk.ipsmt_2, ',', '.') >= 3.00 AND REPLACE(mk.ipsmt_2, ',', '.') < 3.50 THEN 'Sangat Memuaskan'
                    WHEN REPLACE(mk.ipsmt_2, ',', '.') >= 2.75 AND REPLACE(mk.ipsmt_2, ',', '.') < 3.00 THEN 'Memuaskan'
                    WHEN REPLACE(mk.ipsmt_2, ',', '.') < 2.75 THEN 'Perbaiki'
                END AS ipsmt_2"),

                DB::raw("CASE 
                    WHEN (mk.ipsmt_3 IS NULL OR mk.ipsmt_3 = '') THEN 
                    CASE
                        WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                        ELSE 'Belum Daftar'
                    END
                    WHEN REPLACE(mk.ipsmt_3, ',', '.') >= 3.50 THEN 'Pujian'
                    WHEN REPLACE(mk.ipsmt_3, ',', '.') >= 3.00 AND REPLACE(mk.ipsmt_3, ',', '.') < 3.50 THEN 'Sangat Memuaskan'
                    WHEN REPLACE(mk.ipsmt_3, ',', '.') >= 2.75 AND REPLACE(mk.ipsmt_3, ',', '.') < 3.00 THEN 'Memuaskan'
                    WHEN REPLACE(mk.ipsmt_3, ',', '.') < 2.75 THEN 'Perbaiki'
                END AS ipsmt_3"),

                DB::raw("CASE 
                    WHEN (mk.ipsmt_4 IS NULL OR mk.ipsmt_4 = '') THEN 
                    CASE
                        WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                        ELSE 'Belum Daftar'
                    END
                    WHEN REPLACE(mk.ipsmt_4, ',', '.') >= 3.50 THEN 'Pujian'
                    WHEN REPLACE(mk.ipsmt_4, ',', '.') >= 3.00 AND REPLACE(mk.ipsmt_4, ',', '.') < 3.50 THEN 'Sangat Memuaskan'
                    WHEN REPLACE(mk.ipsmt_4, ',', '.') >= 2.75 AND REPLACE(mk.ipsmt_4, ',', '.') < 3.00 THEN 'Memuaskan'
                    WHEN REPLACE(mk.ipsmt_4, ',', '.') < 2.75 THEN 'Perbaiki'
                END AS ipsmt_4"),

                DB::raw("CASE 
                    WHEN (mk.ipsmt_5 IS NULL OR mk.ipsmt_5 = '') THEN 
                    CASE
                        WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                        ELSE 'Belum Daftar'
                    END
                    WHEN REPLACE(mk.ipsmt_5, ',', '.') >= 3.50 THEN 'Pujian'
                    WHEN REPLACE(mk.ipsmt_5, ',', '.') >= 3.00 AND REPLACE(mk.ipsmt_5, ',', '.') < 3.50 THEN 'Sangat Memuaskan'
                    WHEN REPLACE(mk.ipsmt_5, ',', '.') >= 2.75 AND REPLACE(mk.ipsmt_5, ',', '.') < 3.00 THEN 'Memuaskan'
                    WHEN REPLACE(mk.ipsmt_5, ',', '.') < 2.75 THEN 'Perbaiki'
                END AS ipsmt_5"),

                DB::raw("CASE 
                    WHEN (mk.ipsmt_6 IS NULL OR mk.ipsmt_6 = '') THEN 
                    CASE
                        WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                        ELSE 'Belum Daftar'
                    END
                    WHEN REPLACE(mk.ipsmt_6, ',', '.') >= 3.50 THEN 'Pujian'
                    WHEN REPLACE(mk.ipsmt_6, ',', '.') >= 3.00 AND REPLACE(mk.ipsmt_6, ',', '.') < 3.50 THEN 'Sangat Memuaskan'
                    WHEN REPLACE(mk.ipsmt_6, ',', '.') >= 2.75 AND REPLACE(mk.ipsmt_6, ',', '.') < 3.00 THEN 'Memuaskan'
                    WHEN REPLACE(mk.ipsmt_6, ',', '.') < 2.75 THEN 'Perbaiki'
                END AS ipsmt_6"),

                DB::raw("CASE 
                    WHEN (mk.ipsmt_7 IS NULL OR mk.ipsmt_7 = '') THEN 
                    CASE
                        WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                        ELSE 'Belum Daftar'
                    END
                    WHEN REPLACE(mk.ipsmt_7, ',', '.') >= 3.50 THEN 'Pujian'
                    WHEN REPLACE(mk.ipsmt_7, ',', '.') >= 3.00 AND REPLACE(mk.ipsmt_7, ',', '.') < 3.50 THEN 'Sangat Memuaskan'
                    WHEN REPLACE(mk.ipsmt_7, ',', '.') >= 2.75 AND REPLACE(mk.ipsmt_7, ',', '.') < 3.00 THEN 'Memuaskan'
                    WHEN REPLACE(mk.ipsmt_7, ',', '.') < 2.75 THEN 'Perbaiki'
                END AS ipsmt_7"),
                DB::raw("
                    CASE 
                        WHEN mk.judisium IS NULL OR TRIM(REPLACE(REPLACE(mk.judisium, '\r', ''), '\n', '')) IN ('', 'NULL') THEN 
                            CASE 
                                WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                                ELSE 'Belum Daftar'
                            END
                        ELSE TRIM(REPLACE(REPLACE(mk.judisium, '\r', ''), '\n', ''))
                    END AS judisium
                "),
                DB::raw("CASE 
                    WHEN mk.praktek_kerja_lapangan IS NOT NULL AND mk.praktek_kerja_lapangan != '' 
                        THEN CONCAT('Semester ', mk.praktek_kerja_lapangan)
                    WHEN mk.kuliah_kerja_lapangan IS NOT NULL AND mk.kuliah_kerja_lapangan != '' 
                        THEN CONCAT('Semester ', mk.kuliah_kerja_lapangan)
                    WHEN mk.praktek_kerja_lapangan IS NULL AND mk.kuliah_kerja_lapangan IS NULL 
                        THEN NULL
                    ELSE 
                        CASE 
                            WHEN mk.status = 'Lulus' THEN 'Lulus Tidak Terdata'
                            ELSE 'Belum Daftar'
                        END
                END AS kategori_pkl"),
                DB::raw("CASE 
                    WHEN mk.kuliah_kerja_nyata IS NOT NULL AND mk.kuliah_kerja_nyata != '' 
                        THEN CONCAT('Semester ', mk.kuliah_kerja_nyata)
                    WHEN mk.kuliah_kerja_nyata_kkn IS NOT NULL AND mk.kuliah_kerja_nyata_kkn != '' 
                        THEN CONCAT('Semester ', mk.kuliah_kerja_nyata_kkn)
                    WHEN mk.kuliah_kerja_nyata IS NULL AND mk.kuliah_kerja_nyata_kkn IS NULL 
                        THEN NULL
                    ELSE 
                        CASE 
                            WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                            ELSE 'Belum Daftar'
                        END
                END AS kategori_kkn"),
                DB::raw("CASE 
                    WHEN mk.seminar_skripsi IS NOT NULL AND TRIM(REPLACE(REPLACE(mk.seminar_skripsi, '\r', ''), '\n', '')) != '' 
                        THEN CONCAT('Semester ', TRIM(REPLACE(REPLACE(mk.seminar_skripsi, '\r', ''), '\n', '')))
                    WHEN mk.seminar IS NOT NULL AND TRIM(REPLACE(REPLACE(mk.seminar, '\r', ''), '\n', '')) != '' 
                        THEN CONCAT('Semester ', TRIM(REPLACE(REPLACE(mk.seminar, '\r', ''), '\n', '')))
                    WHEN mk.seminar_skripsi IS NULL AND (mk.seminar IS NULL OR TRIM(REPLACE(REPLACE(mk.seminar, '\r', ''), '\n', '')) = '') 
                        THEN 'Belum Daftar'
                    ELSE 
                        CASE 
                            WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                            ELSE 'Belum Daftar'
                        END
                END AS kategori_seminar"),
                DB::raw("
                CASE 
                    WHEN mk.status IN ('Aktif', 'Cuti', 'Drop Out', 'Mengundurkan Diri') THEN 'Belum Lulus'
                    WHEN mk.status = 'Lulus' THEN 'Lulus'
                    ELSE 'Belum Lulus'
                END AS kategori
                "),
            )
            ->where('j.jurusan', '=', 'Fisika');
           
           
        // Eksekusi query untuk mengambil hasil
        $query11 = $query11->get();
        
         // Hitung test_size
         $testSize = 100 - $predictedLulus; // Menghitung test_size

        // Simpan test_size ke file JSON untuk digunakan di Python
        $testSizeFilePath = 'C:\\xampp\\htdocs\\skripsi\\app\\python_scripts\\fisika\\test_size.json';
        file_put_contents($testSizeFilePath, json_encode(['test_size' => $testSize]));
        // Mengonversi hasil query menjadi format yang bisa digunakan oleh Python
        $data = [];
        foreach ($query11 as $row) {
            $data[] = [
                'jenis_sekolah' => $row-> jenis_sekolah,
                'kategori_sks' => $row->kategori_sks,
                'kategori_ipk' => $row->kategori_ipk,
                'ipsmt_1' => $row->ipsmt_1,
                'ipsmt_2' => $row->ipsmt_2,
                'ipsmt_3' => $row->ipsmt_3,
                'ipsmt_4' => $row->ipsmt_4,
                'ipsmt_5' => $row->ipsmt_5,
                'ipsmt_6' => $row->ipsmt_6,
                'ipsmt_7' => $row->ipsmt_7,
                'kategori_pkl' => $row->kategori_pkl,
                'kategori_kkn' => $row->kategori_kkn,
                'kategori_seminar' => $row->kategori_seminar,
                'judisium' => $row->judisium,
                'kategori' => $row->kategori,
            ];
        }

        //dd($query10, $data);

        // Menyimpan data ke file JSON untuk digunakan di Python
        $jsonFilePath = 'C:\\xampp\\htdocs\\skripsi\\app\\python_scripts\\fisika\\data.json';
        file_put_contents($jsonFilePath, json_encode($data));
        // Menyimpan informasi kol om yang terkait dengan setiap kategori
        $columnMapping = [
        'jenis_sekolah' => 'Jenis Sekolah',
        'kategori_sks' => 'Satuan Kredit Semester',
        'kategori_ipk' => 'Indeks Prestasi Kumulatif',
        'ipsmt_1' => 'Indeks Prestasi Semester 1',
        'ipsmt_2' => 'Indeks Prestasi Semester 2',
        'ipsmt_3' => 'Indeks Prestasi Semester 3',
        'ipsmt_4' => 'Indeks Prestasi Semester 4',
        'ipsmt_5' => 'Indeks Prestasi Semester 5',
        'ipsmt_6' => 'Indeks Prestasi Semester 6',
        'ipsmt_7' => 'Indeks Prestasi Semester 7',
        'kategori_pkl' => 'Praktek Kerja Lapangan', // atau kolom lain yang relevan
        'kategori_kkn' => 'Kuliah Kerja Nyata',
        'kategori_seminar' => 'Seminar',
        'judisium' => 'Yudisium',
        ];

        // Menjalankan skrip Python
        $pythonScriptPath = 'C:\\xampp\\htdocs\\skripsi\\app\\python_scripts\\fisika\\umum_decision_tree_visualization.py';
        $output = shell_exec("python \"$pythonScriptPath\"");

        // Decode output JSON
        $result = json_decode($output, true);

        // Pastikan hasilnya adalah array dan memiliki kunci yang benar
        if (json_last_error() !== JSON_ERROR_NONE) {
            // Jika terjadi kesalahan saat decoding JSON
            $outputData = [
                'tree_text' => 'Gagal mengurai output dari skrip Python.',
                'first_true_path' => [],
                'accuracy' => null,
                'image_path' => null,  // Tambahkan agar tetap ada key meski error
            ];
        } else {
            // Ambil data dari hasil
            $treeText = isset($result['tree_text']) ? $result['tree_text'] : 'Tidak ada teks pohon keputusan.';
            //$firstTruePath = isset($result['first_true_path']) ? $result['first_true_path'] : [];
            $rulesLulus = isset($result['rules_lulus']) ? $result['rules_lulus'] : [];
            $rulesBelumLulus = isset($result['rules_belum_lulus']) ? $result['rules_belum_lulus'] : [];
            $accuracy = isset($result['accuracy']) ? $result['accuracy'] : null;
            $testSize = isset($result['test_size']) ? $result['test_size'] : null;
            $precision = isset($result['precision']) ? $result['precision'] : null;
            $recall = isset($result['recall']) ? $result['recall'] : null;
            $f1Score = isset($result['f1_score']) ? $result['f1_score'] : null;
            $confusionMatrix = isset($result['confusion_matrix']) ? $result['confusion_matrix'] : [];
            $imagePath = isset($result['image_path']) ? $result['image_path'] : null;
            $entropyGain = isset($result['entropy_gain']) ? $result['entropy_gain'] : [];


            // Ambil nilai dari confusion matrix jika tersedia
            if (count($confusionMatrix) > 0) {
                $TN = $confusionMatrix[0][0] ?? 0;
                $FP = $confusionMatrix[0][1] ?? 0;
                $FN = $confusionMatrix[1][0] ?? 0;
                $TP = $confusionMatrix[1][1] ?? 0;
            } else {
                $TP = $FP = $TN = $FN = 0;
            }

            // Susun output data untuk dikirim ke view
            $outputData = [
                'tree_text' => $treeText,               // ✅ Seluruh teks pohon keputusan
                'image_path' => $imagePath,             // ✅ Gambar PNG hasil visualisasi pohon
                'rules_lulus' => $rulesLulus,            // ✅ Aturan untuk kelas Lulus
                'rules_belum_lulus' => $rulesBelumLulus, // ✅ Aturan untuk kelas Belum Lulus
                //'first_true_path' => $firstTruePath,
                'accuracy' => $accuracy,
                'test_size' => $testSize,
                'precision' => $precision,
                'recall' => $recall,
                'f1_score' => $f1Score,
                'TP' => $TP,
                'FP' => $FP,
                'TN' => $TN,
                'FN' => $FN,
                'confusion_matrix' => $confusionMatrix,
                'entropy_gain' => $entropyGain
            ];

            // Tampilkan sementara hasil untuk debugging
         //DD($outputData);
        }

        // Kembalikan ke view (jika tidak pakai DD)
        return view('utama.algoritma.prediksi.prediksi_matakuliah_fisika_mahasiswa', compact('outputData', 'columnMapping', 'predictedLulus'));

    }

    

}
