<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PediksiPerMahasiswaKlasifikasiC45TeknikInformatikaController extends Controller
{

    public function prediksi_per_mahasiswa_jurusan_teknik_informatika(Request $request)
    {
 
        // Ambil input dari pengguna
        $predictedLulus = $request->input('predicted_lulus');
        $nim = Auth::user()->nim;
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
                    WHEN mk.praktek_kerja_lapangan_pkl IS NOT NULL AND mk.praktek_kerja_lapangan_pkl != '' 
                         THEN CONCAT('Semester ', mk.praktek_kerja_lapangan_pkl)
                    WHEN mk.kuliah_kerja_lapangan IS NOT NULL AND mk.kuliah_kerja_lapangan != '' 
                         THEN CONCAT('Semester ', mk.kuliah_kerja_lapangan)
                    WHEN mk.praktek_kerja_lapangan_pkl IS NULL AND mk.kuliah_kerja_lapangan IS NULL 
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
                    WHEN mk.seminar IS NULL OR mk.seminar = '' THEN 
                        CASE 
                            WHEN mk.status = 'Lulus' THEN 'lulus tidak terdata'
                            ELSE 'Belum Daftar'
                        END
                    ELSE CONCAT('Semester ', mk.seminar)
                END AS kategori_seminar"),
                
                DB::raw("
                CASE 
                    WHEN mk.status IN ('Aktif', 'Cuti', 'Drop Out', 'Mengundurkan Diri') THEN 'Belum Lulus'
                    WHEN mk.status = 'Lulus' THEN 'Lulus'
                    ELSE 'Belum Lulus'
                END AS kategori
                "),
            )
            ->where('j.jurusan', '=', 'Teknik Informatika');
           
        $query12 = DB::table('matakuliah as mk')
            ->join('mahasiswa as m', 'm.nim', '=', 'mk.nim')
            ->join('jurusan as j', 'mk.kd_jurusan', '=', 'j.kd_jurusan')
            ->join('jenis_sekolah_mahasiswa_baru as js', 'js.kd_jenis_sekolah', '=', 'm.kd_jenis_sekolah')
            ->select(
                'm.nim AS nim',
                'm.nama AS nama',
                'm.status AS status_mahasiswa',
                'mk.sks AS sks',
                'mk.ipk AS ip k',
                 DB::raw("CASE 
                    WHEN mk.ipsmt_1 IS NOT NULL AND mk.ipsmt_1 != '' 
                        THEN mk.ipsmt_1
                    ELSE NULL
                END AS ipsmt_1"),
                DB::raw("CASE 
                                    WHEN mk.ipsmt_2 IS NOT NULL AND mk.ipsmt_2 != '' 
                                        THEN mk.ipsmt_2
                                    ELSE NULL
                                END AS ipsmt_2"),
                DB::raw("CASE 
                                    WHEN mk.ipsmt_3 IS NOT NULL AND mk.ipsmt_3 != '' 
                                        THEN mk.ipsmt_3
                                    ELSE NULL
                                END AS ipsmt_3"),
                DB::raw("CASE 
                                    WHEN mk.ipsmt_4 IS NOT NULL AND mk.ipsmt_4 != '' 
                                        THEN mk.ipsmt_4
                                    ELSE NULL
                                END AS ipsmt_4"),
                DB::raw("CASE 
                                    WHEN mk.ipsmt_5 IS NOT NULL AND mk.ipsmt_5 != '' 
                                        THEN mk.ipsmt_5
                                    ELSE NULL
                                END AS ipsmt_5"),
                DB::raw("CASE 
                                    WHEN mk.ipsmt_6 IS NOT NULL AND mk.ipsmt_6 != '' 
                                        THEN mk.ipsmt_6
                                    ELSE NULL
                                END AS ipsmt_6"),
                DB::raw("CASE 
                                    WHEN mk.ipsmt_7 IS NOT NULL AND mk.ipsmt_7 != '' 
                                        THEN mk.ipsmt_7
                                    ELSE NULL
                                END AS ipsmt_7"),
                 DB::raw("
                    CASE 
                        WHEN mk.judisium IS NULL 
                            OR TRIM(REPLACE(REPLACE(mk.judisium, '\r', ''), '\n', '')) IN ('', 'NULL') 
                        THEN ''
                        ELSE TRIM(REPLACE(REPLACE(mk.judisium, '\r', ''), '\n', ''))
                    END AS judisium
                "),
                DB::raw("CASE 
                    WHEN mk.kuliah_kerja_nyata IS NOT NULL AND mk.kuliah_kerja_nyata != '' 
                        THEN CONCAT('Semester ', mk.kuliah_kerja_nyata)
                    WHEN mk.kuliah_kerja_nyata_kkn IS NOT NULL AND mk.kuliah_kerja_nyata_kkn != '' 
                        THEN CONCAT('Semester ', mk.kuliah_kerja_nyata_kkn)
                    WHEN mk.kuliah_kerja_nyata IS NULL AND mk.kuliah_kerja_nyata_kkn IS NULL 
                        THEN NULL
                END AS kategori_kkn"),

                  // pakai CASE untuk kategori_pkl
                DB::raw("CASE 
                    WHEN mk.praktek_kerja_lapangan_pkl IS NOT NULL AND mk.praktek_kerja_lapangan_pkl != '' 
                        THEN CONCAT('Semester ', mk.praktek_kerja_lapangan_pkl)
                    WHEN mk.kuliah_kerja_lapangan IS NOT NULL AND mk.kuliah_kerja_lapangan != '' 
                        THEN CONCAT('Semester ', mk.kuliah_kerja_lapangan)
                    WHEN mk.praktek_kerja_lapangan_pkl IS NULL AND mk.kuliah_kerja_lapangan IS NULL 
                        THEN NULL
                END AS kategori_pkl"),
                DB::raw("CASE 
                    WHEN mk.seminar IS NOT NULL AND mk.seminar != '' 
                        THEN CONCAT('Semester ', mk.seminar)
                    ELSE NULL
                END AS seminar"),
                'js.jenis_sekolah AS jenis_sekolah'
            )
            
            ->where('j.jurusan', '=', 'Teknik Informatika');

        $results = collect(); 
        if ($nim) { 
            $query12->where('m.nim', '=', $nim); 
        }

        

       // Eksekusi query untuk mengambil hasil
        $query11 = $query11->get();
        $results = $query12->get();
        // Hitung test_size
        $testSize = 100 - $predictedLulus;
        //dd($query12);
        // Simpan test_size ke file JSON
        $testSizeFilePath = 'C:\\xampp\\htdocs\\skripsi\\app\\python_scripts\\teknik_informatika\\test_size.json';
        file_put_contents($testSizeFilePath, json_encode([
            'test_size' => $testSize,
            'nim_target' => $nim // NIM dari input Blade
        ]));

        // Konversi hasil query ke format JSON untuk Python
        $data = [];
        foreach ($query11 as $row) {
            $data[] = [
                'nim' => $row->nim,
                'jenis_sekolah' => $row->jenis_sekolah,
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

        // Simpan data ke file JSON
        $jsonFilePath = 'C:\\xampp\\htdocs\\skripsi\\app\\python_scripts\\teknik_informatika\\data.json';
        file_put_contents($jsonFilePath, json_encode($data));

        // Mapping kolom
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
            'kategori_pkl' => 'Praktek Kerja Lapangan',
            'kategori_kkn' => 'Kuliah Kerja Nyata',
            'kategori_seminar' => 'Seminar',
            'judisium' => 'Yudisium',
        ];

        // Jalankan skrip Python
        $pythonScriptPath = 'C:\\xampp\\htdocs\\skripsi\\app\\python_scripts\\teknik_informatika\\decision_tree_visualization.py';
        $output = shell_exec("python \"$pythonScriptPath\"");

        // Decode output JSON dari Python
        $result = json_decode($output, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $outputData = [
                'tree_text' => 'Gagal mengurai output dari skrip Python.',
                'rules_lulus' => [],
                'rules_belum_lulus' => [],
                'image_path' => null,
                'test_size' => null,
            ];
        } else {
            $treeText = $result['tree_text'] ?? 'Tidak ada teks pohon keputusan.';
            $rulesLulus = $result['rules_lulus'] ?? [];
            $rulesBelumLulus = $result['rules_belum_lulus'] ?? [];
            $imagePath = $result['image_path'] ?? null;
            $testSize = $result['test_size'] ?? null;

       $outputData = [
                'tree_text' => $treeText,
                'image_path' => $imagePath,
                'rules_lulus' => $rulesLulus,
                'rules_belum_lulus' => $rulesBelumLulus,
                'test_size' => $testSize,
            ];
        }

        // ======================================================
        // 🔥 Tambahan logika: Ambil status prediksi sesuai NIM
        // ======================================================
        $statusPrediksi = null;
        $prediksiFilePath = 'C:\\xampp\\htdocs\\skripsi\\app\\python_scripts\\teknik_informatika\\prediksi_status.json';

        if (file_exists($prediksiFilePath)) {
            $prediksiData = json_decode(file_get_contents($prediksiFilePath), true);

            $nim = isset($nim) ? trim((string)$nim) : '';
            foreach ($prediksiData as $item) {
                if (trim($item['nim']) === $nim) {  // gunakan === untuk pengecekan tipe juga
                    $statusPrediksi = $item['status_prediksi'];
                    break;
                }
            }
        }

        // Return ke view
        return view(
            'teknik_informatika.algoritma.prediksi.permahasiswa.prediksi_per_mahasiswa_matakuliah_teknik_informatika_mahasiswa',
            compact('outputData', 'columnMapping', 'predictedLulus', 'statusPrediksi', 'nim', 'results')
        );
    }

}