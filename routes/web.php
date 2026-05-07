<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UtamaController;
use App\Http\Controllers\UtamaMatakuliahController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PerMahasiwaAlgoritmaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\UtamaMahasiswaController;
use App\Http\Controllers\AlgoritmaController;
use App\Http\Controllers\UtamaAlgoritmaController;
use App\Http\Controllers\TeknikInformatikaController;
use App\Http\Controllers\KlasifikasiC45TeknikInformatikaController;
use App\Http\Controllers\KlasifikasiC45SistemInformasiController;
use App\Http\Controllers\KlasifikasiC45AgribisnisController;
use App\Http\Controllers\KlasifikasiC45FisikaController;
use App\Http\Controllers\KlasifikasiC45MatematikaController;
use App\Http\Controllers\KlasifikasiC45KimiaController;
use App\Http\Controllers\KlasifikasiC45BiologiController;
use App\Http\Controllers\KlasifikasiC45TeknikTambangController;
use App\Http\Controllers\pediksiPerMahasiswaKlasifikasiC45AgribisnisController;
use App\Http\Controllers\PediksiPerMahasiswaKlasifikasiC45BiologiController;
use App\Http\Controllers\PediksiPerMahasiswaKlasifikasiC45FisikaController;
use App\Http\Controllers\PediksiPerMahasiswaKlasifikasiC45KimiaController;
use App\Http\Controllers\PediksiPerMahasiswaKlasifikasiC45MatematikaController;
use App\Http\Controllers\PediksiPerMahasiswaKlasifikasiC45SistemInformasiController;
use App\Http\Controllers\PediksiPerMahasiswaKlasifikasiC45TeknikTambangController;
use App\Http\Controllers\PediksiPerMahasiswaKlasifikasiC45TeknikInformatikaController;
use App\Http\Controllers\UtamaKlasifikasiC45TeknikInformatikaController;
use App\Http\Controllers\UtamaKlasifikasiC45SistemInformasiController;
use App\Http\Controllers\UtamaPediksiPerMahasiswaKlasifikasiC45SistemInformasiController;
use App\Http\Controllers\UtamaKlasifikasiC45AgribisnisController;
use App\Http\Controllers\UtamaPediksiPerMahasiswaKlasifikasiC45AgribisnisController;
use App\Http\Controllers\UtamaKlasifikasiC45FisikaController;
use App\Http\Controllers\UtamaPediksiPerMahasiswaKlasifikasiC45FisikaController;
use App\Http\Controllers\UtamaKlasifikasiC45MatematikaController;
use App\Http\Controllers\UtamaPediksiPerMahasiswaKlasifikasiC45MatematikaController;
use App\Http\Controllers\UtamaPediksiPerMahasiswaKlasifikasiC45TeknikInformatikaController;
use App\Http\Controllers\UtamaKlasifikasiC45KimiaController;
use App\Http\Controllers\UtamaPediksiPerMahasiswaKlasifikasiC45KimiaController;
use App\Http\Controllers\UtamaKlasifikasiC45BiologiController;
use App\Http\Controllers\UtamaPediksiPerMahasiswaKlasifikasiC45BiologiController;
use App\Http\Controllers\UtamaKlasifikasiC45TeknikTambangController;
use App\Http\Controllers\UtamaPediksiPerMahasiswaKlasifikasiC45TeknikTambangController;
use App\Http\Controllers\MahasiswaTeknikInformatikaController;
use App\Http\Controllers\MahasiswaSistemInformasiController;
use App\Http\Controllers\MahasiswaAgribisnisController;
use App\Http\Controllers\MahasiswaBiologiController;
use App\Http\Controllers\MahasiswaFisikaController;
use App\Http\Controllers\MahasiswaKimiaController;
use App\Http\Controllers\MahasiswaMatematikaController;
use App\Http\Controllers\MahasiswaTeknikTambangController;
use App\Http\Controllers\DosenPediksiPerMahasiswaKlasifikasiC45Controller;
use App\Http\Controllers\DosenKlasifikasiC45Controller;
use App\Http\Controllers\DosenMatakuliahController;
use App\Http\Controllers\DosenMahasiswaTeknikInformatikaController;
use App\Http\Controllers\DosenMahasiswaSistemInformasiController;
use App\Http\Controllers\DosenMahasiswaAgribisnisController;
use App\Http\Controllers\DosenMahasiswaBiologiController;
use App\Http\Controllers\DosenMahasiswaFisikaController;
use App\Http\Controllers\DosenMahasiswaKimiaController;
use App\Http\Controllers\DosenMahasiswaMatematikaController;
use App\Http\Controllers\DosenMahasiswaTeknikTambangController;
use App\Http\Controllers\PenanggungJawabMatakuliahController;
use App\Http\Controllers\PenanggungJawabMahasiswaController;
use App\Http\Controllers\PenanggungJawabKlasifikasiC45Controller;
use App\Http\Controllers\PenanggungJawabPediksiPerMahasiswaKlasifikasiC45Controller;

use Illuminate\Support\Facades\Log;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('kerangka.master');
// });

// Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');
// Route::get('/utama',[UtamaController::class,'index']);

// Route::middleware(['auth', 'shareMahasiswaData'])->group(function () {
//     // Rute yang membutuhkan autentikasi dan share data mahasiswa
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     Route::get('/utama', [UtamaController::class, 'index'])->name('utama');
//     // Tambahkan rute lainnya di sini
// });



// Route::get('/',[LoginController::class,'index'])->name('login')-> middleware('guest');
// Route::post('/log',[LoginController::class,'login'])->name('login.store');

// Route::get('/register',[RegisterController::class,'register'])->name('register');
// Route::post('/regist',[RegisterController::class,'store'])->name('register.store');

// Rute yang membutuhkan autentikasi dan berbagi data mahasiswa


// Rute untuk pengguna yang sudah login dengan jurusan teknik_informatika

Route::middleware(['auth', 'shareMahasiswaData','penanggung_jawab'])->group(function () {
  Route::get('/penanggung_jawab_dashboard', [DashboardController::class, 'penanggung_jawab'])->name('penanggung_jawab_dashboard');
  Route::get('/penanggung_jawab_matakuliah', [PenanggungJawabMatakuliahController::class, 'index'])->name('penanggung_jawab_matakuliah');
  Route::get('/penanggung_jawab_algoritma', [UtamaAlgoritmaController::class, 'penanggung_jawab'])->name('penanggung_jawab_algoritma');
  Route::get('/penanggung_jawab_per_mahasiswa_algoritma_c45', [PerMahasiwaAlgoritmaController::class, 'penanggung_jawab'])->name('penanggung_jawab_per_mahasiswa_algoritma_c45');

  
  // Rute Mahasiswa dengan nama yang lebih konsisten
  Route::get('/penanggung_jawab_jumlah_mahasiswa_kelamin', [PenanggungJawabMahasiswaController::class, 'penanggung_jawab_jumlah_mahasiswa_kelamin'])->name('penanggung_jawab_jumlah_mahasiswa_kelamin');
  Route::get('/penanggung_jawab_jumlah_mahasiswa_status', [PenanggungJawabMahasiswaController::class, 'penanggung_jawab_jumlah_mahasiswa_status'])->name('penanggung_jawab_jumlah_mahasiswa_status');
  Route::get('/penanggung_jawab_jumlah_mahasiswa_jurusan', [PenanggungJawabMahasiswaController::class, 'penanggung_jawab_jumlah_mahasiswa_jurusan'])->name('penanggung_jawab_jumlah_mahasiswa_jurusan');
  Route::get('/penanggung_jawab_jumlah_mahasiswa_jenis_seleksi', [PenanggungJawabMahasiswaController::class, 'penanggung_jawab_jumlah_mahasiswa_jenis_seleksi'])->name('penanggung_jawab_jumlah_mahasiswa_jenis_seleksi');
  Route::get('/penanggung_jawab_jumlah_mahasiswa_propinsi', [PenanggungJawabMahasiswaController::class, 'penanggung_jawab_jumlah_mahasiswa_propinsi'])->name('penanggung_jawab_jumlah_mahasiswa_propinsi');
  Route::get('/penanggung_jawab_jumlah_mahasiswa_kota', [PenanggungJawabMahasiswaController::class, 'penanggung_jawab_jumlah_mahasiswa_kota'])->name('penanggung_jawab_jumlah_mahasiswa_kota');
  Route::get('/penanggung_jawab_jumlah_mahasiswa_jenis_sekolah', [PenanggungJawabMahasiswaController::class, 'penanggung_jawab_jumlah_mahasiswa_jenis_sekolah'])->name('penanggung_jawab_jumlah_mahasiswa_jenis_sekolah');
  Route::get('/penanggung_jawab_jumlah_mahasiswa_satuan_kredit_semester', [PenanggungJawabMahasiswaController::class, 'penanggung_jawab_jumlah_mahasiswa_satuan_kredit_semester'])->name('penanggung_jawab_jumlah_mahasiswa_satuan_kredit_semester');
  Route::get('/penanggung_jawab_jumlah_mahasiswa_indeks_prestasi_kumulatif', [PenanggungJawabMahasiswaController::class, 'penanggung_jawab_jumlah_mahasiswa_indeks_prestasi_kumulatif'])->name('penanggung_jawab_jumlah_mahasiswa_indeks_prestasi_kumulatif');
  
  Route::get('/penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_teknik_informatika', [PenanggungJawabMatakuliahController::class, 'penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_teknik_informatika'])->name('penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_teknik_informatika');
  Route::get('/penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_agribisnis', [PenanggungJawabMatakuliahController::class, 'penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_agribisnis'])->name('penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_agribisnis');
  Route::get('/penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_biologi', [PenanggungJawabMatakuliahController::class, 'penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_biologi'])->name('penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_biologi');
  Route::get('/penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_fisika', [PenanggungJawabMatakuliahController::class, 'penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_fisika'])->name('penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_fisika');
  Route::get('/penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_kimia', [PenanggungJawabMatakuliahController::class, 'penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_kimia'])->name('penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_kimia');
  Route::get('/penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_matematika', [PenanggungJawabMatakuliahController::class, 'penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_matematika'])->name('penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_matematika');
  Route::get('/penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_sistem_informasi', [PenanggungJawabMatakuliahController::class, 'penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_sistem_informasi'])->name('penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_sistem_informasi');
  Route::get('/penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_teknik_tambang', [PenanggungJawabMatakuliahController::class, 'penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_teknik_tambang'])->name('penanggung_jawab_jumlah_mahasiswa_matakuliah_jurusan_teknik_tambang');
  
  Route::get('/penanggung_jawab_klasifikasi_c45_mahasiswa_teknik_informatika', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_teknik_informatika'])->name('penanggung_jawab_klasifikasi_c45_mahasiswa_teknik_informatika');
  Route::get('/penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_teknik_informatika', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_teknik_informatika'])->name('penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_teknik_informatika');
  
  Route::post('/penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_teknik_informatika', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_teknik_informatika'])->name('penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_teknik_informatika');
  Route::get('/penanggung_jawab_prediksi_mahasiswa_teknik_jurusan_informatika', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_mahasiswa_jurusan_teknik_informatika'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_teknik_informatika');
  Route::post('/penanggung_jawab_prediksi_mahasiswa_teknik_jurusan_informatika', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_mahasiswa_jurusan_teknik_informatika'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_teknik_informatika');
  Route::get('/penanggung_jawab_prediksi_setiap_mahasiswa_matakuliah_teknik_informatika_mahasiswa',[PenanggungJawabPediksiPerMahasiswaKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_per_mahasiswa_jurusan_teknik_informatika'])->name('penanggung_jawab_prediksi_setiap_mahasiswa_matakuliah_teknik_informatika_mahasiswa');
  Route::get('/penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_sistem_informasi', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_sistem_informasi'])->name('penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_sistem_informasi');
  Route::post('/penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_sistem_informasi', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_sistem_informasi'])->name('penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_sistem_informasi');
  Route::get('/penanggung_jawab_prediksi_mahasiswa_jurusan_sistem_informasi', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_mahasiswa_jurusan_sistem_informasi'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_sistem_informasi');
  Route::post('/penanggung_jawab_prediksi_mahasiswa_jurusan_sistem_informasi', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_mahasiswa_jurusan_sistem_informasi'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_sistem_informasi');
  Route::get('/penanggung_jawab_prediksi_setiap_mahasiswa_matakuliah_sistem_informasi_mahasiswa',[PenanggungJawabPediksiPerMahasiswaKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_per_mahasiswa_jurusan_sistem_informasi'])->name('penanggung_jawab_prediksi_setiap_mahasiswa_matakuliah_sistem_informasi_mahasiswa');
  Route::get('/penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_agribisnis', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_agribisnis'])->name('penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_agribisnis');
  Route::post('/penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_agribisnis', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_agribisnis'])->name('penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_agribisnis');
  Route::get('/penanggung_jawab_prediksi_mahasiswa_jurusan_agribisnis', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_mahasiswa_jurusan_agribisnis'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_agribisnis');
  Route::post('/penanggung_jawab_prediksi_mahasiswa_jurusan_agribisnis', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_mahasiswa_jurusan_agribisnis'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_agribisnis');
  Route::get('/penanggung_jawab_prediksi_setiap_mahasiswa_matakuliah_agribisnis_mahasiswa',[PenanggungJawabPediksiPerMahasiswaKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_per_mahasiswa_jurusan_agribisnis'])->name('penanggung_jawab_prediksi_setiap_mahasiswa_matakuliah_agribisnis_mahasiswa');
  Route::get('/penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_fisika', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_fisika'])->name('penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_fisika');
  Route::post('/penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_fisika', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_fisika'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_fisika');
   Route::get('/penanggung_jawab_prediksi_mahasiswa_jurusan_fisika', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_mahasiswa_jurusan_fisika'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_fisika');
  Route::post('/penanggung_jawab_prediksi_mahasiswa_jurusan_fisika', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_mahasiswa_jurusan_fisika'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_fisika');
  Route::get('/penanggung_jawab_prediksi_setiap_mahasiswa_matakuliah_fisika_mahasiswa',[PenanggungJawabPediksiPerMahasiswaKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_per_mahasiswa_jurusan_fisika'])->name('penanggung_jawab_prediksi_setiap_mahasiswa_matakuliah_fisika_mahasiswa');
  Route::get('/penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_matematika', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_matematika'])->name('penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_matematika');
  Route::post('/penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_matematika', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_matematika'])->name('penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_matematika');
  Route::get('/penanggung_jawab_prediksi_mahasiswa_jurusan_matematika', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_mahasiswa_jurusan_matematika'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_matematika');
  Route::post('/penanggung_jawab_prediksi_mahasiswa_jurusan_matematika', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_mahasiswa_jurusan_matematika'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_matematika');
  Route::get('/penanggung_jawab_prediksi_setiap_mahasiswa_matakuliah_matematika_mahasiswa',[PenanggungJawabPediksiPerMahasiswaKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_per_mahasiswa_jurusan_matematika'])->name('penanggung_jawab_prediksi_setiap_mahasiswa_matakuliah_matematika_mahasiswa');
  Route::get('/penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_kimia', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_kimia'])->name('penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_kimia');
  Route::post('/penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_kimia', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_kimia'])->name('penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_kimia');
  Route::get('/penanggung_jawab_prediksi_mahasiswa_jurusan_kimia', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_mahasiswa_jurusan_kimia'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_kimia');
  Route::post('/penanggung_jawab_prediksi_mahasiswa_jurusan_kimia', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_mahasiswa_jurusan_kimia'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_kimia');
  Route::get('/penanggung_jawab_prediksi_setiap_mahasiswa_matakuliah_kimia_mahasiswa',[PenanggungJawabPediksiPerMahasiswaKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_per_mahasiswa_jurusan_kimia'])->name('penanggung_jawab_prediksi_setiap_mahasiswa_matakuliah_kimia_mahasiswa');
  Route::get('/penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_biologi', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_biologi'])->name('penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_biologi');
  Route::post('/penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_biologi', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_biologi'])->name('penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_biologi');
  Route::get('/penanggung_jawab_prediksi_mahasiswa_jurusan_biologi', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_mahasiswa_jurusan_biologi'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_biologi');
  Route::post('/penanggung_jawab_prediksi_mahasiswa_jurusan_biologi', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_mahasiswa_jurusan_biologi'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_biologi');
  Route::get('/penanggung_jawab_prediksi_setiap_mahasiswa_matakuliah_biologi_mahasiswa',[PenanggungJawabPediksiPerMahasiswaKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_per_mahasiswa_jurusan_biologi'])->name('penanggung_jawab_prediksi_setiap_mahasiswa_matakuliah_biologi_mahasiswa');
  Route::get('/penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_teknik_tambang', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_teknik_tambang'])->name('penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_teknik_tambang');
  Route::post('/penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_teknik_tambang', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_klasifikasi_mahasiswa_jurusan_teknik_tambang'])->name('penanggung_jawab_klasifikasi_c45_mahasiswa_jurusan_teknik_tambang');
  Route::get('/penanggung_jawab_prediksi_mahasiswa_jurusan_teknik_tambang', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_mahasiswa_jurusan_teknik_tambang'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_teknik_tambang');
  Route::post('/penanggung_jawab_prediksi_mahasiswa_jurusan_teknik_tambang', [PenanggungJawabKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_mahasiswa_jurusan_teknik_tambang'])->name('penanggung_jawab_prediksi_mahasiswa_jurusan_teknik_tambang');
  Route::get('/penanggung_jawab_prediksi_setiap_mahasiswa_matakuliah_teknik_tambang_mahasiswa',[PenanggungJawabPediksiPerMahasiswaKlasifikasiC45Controller::class, 'penanggung_jawab_prediksi_per_mahasiswa_jurusan_teknik_tambang'])->name('penanggung_jawab_prediksi_setiap_mahasiswa_matakuliah_teknik_tambang_mahasiswa');

});

Route::middleware(['auth', 'shareMahasiswaData','utama'])->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('/utama', [UtamaController::class, 'index'])->name('utama');
  Route::get('/matakuliah', [UtamaMatakuliahController::class, 'index'])->name('matakuliah');
  Route::get('/algoritma', [UtamaAlgoritmaController::class, 'index'])->name('algoritma');
  Route::get('/per_mahasiswa_algoritma_c45', [PerMahasiwaAlgoritmaController::class, 'index'])->name('per_mahasiswa_algoritma_c45');

  
  // Rute Mahasiswa dengan nama yang lebih konsisten
  Route::get('/jumlah_mahasiswa_kelamin', [UtamaMahasiswaController::class, 'jumlah_mahasiswa_kelamin'])->name('jumlah_mahasiswa_kelamin');
  Route::get('/jumlah_mahasiswa_status', [UtamaMahasiswaController::class, 'jumlah_mahasiswa_status'])->name('jumlah_mahasiswa_status');
  Route::get('/jumlah_mahasiswa_jurusan', [UtamaMahasiswaController::class, 'jumlah_mahasiswa_jurusan'])->name('jumlah_mahasiswa_jurusan');
  Route::get('/jumlah_mahasiswa_jenis_seleksi', [UtamaMahasiswaController::class, 'jumlah_mahasiswa_jenis_seleksi'])->name('jumlah_mahasiswa_jenis_seleksi');
  Route::get('/jumlah_mahasiswa_propinsi', [UtamaMahasiswaController::class, 'jumlah_mahasiswa_propinsi'])->name('jumlah_mahasiswa_propinsi');
  Route::get('/jumlah_mahasiswa_kota', [UtamaMahasiswaController::class, 'jumlah_mahasiswa_kota'])->name('jumlah_mahasiswa_kota');
  Route::get('/jumlah_mahasiswa_jenis_sekolah', [UtamaMahasiswaController::class, 'jumlah_mahasiswa_jenis_sekolah'])->name('jumlah_mahasiswa_jenis_sekolah');
  Route::get('/jumlah_mahasiswa_satuan_kredit_semester', [UtamaMahasiswaController::class, 'jumlah_mahasiswa_satuan_kredit_semester'])->name('jumlah_mahasiswa_satuan_kredit_semester');
  Route::get('/jumlah_mahasiswa_indeks_prestasi_kumulatif', [UtamaMahasiswaController::class, 'jumlah_mahasiswa_indeks_prestasi_kumulatif'])->name('jumlah_mahasiswa_indeks_prestasi_kumulatif');
  
  Route::get('/jumlah_mahasiswa_matakuliah_jurusan_teknik_informatika', [UtamaMatakuliahController::class, 'jumlah_mahasiswa_matakuliah_jurusan_teknik_informatika'])->name('jumlah_mahasiswa_matakuliah_jurusan_teknik_informatika');
  Route::get('/jumlah_mahasiswa_matakuliah_jurusan_agribisnis', [UtamaMatakuliahController::class, 'jumlah_mahasiswa_matakuliah_jurusan_agribisnis'])->name('jumlah_mahasiswa_matakuliah_jurusan_agribisnis');
  Route::get('/jumlah_mahasiswa_matakuliah_jurusan_biologi', [UtamaMatakuliahController::class, 'jumlah_mahasiswa_matakuliah_jurusan_biologi'])->name('jumlah_mahasiswa_matakuliah_jurusan_biologi');
  Route::get('/jumlah_mahasiswa_matakuliah_jurusan_fisika', [UtamaMatakuliahController::class, 'jumlah_mahasiswa_matakuliah_jurusan_fisika'])->name('jumlah_mahasiswa_matakuliah_jurusan_fisika');
  Route::get('/jumlah_mahasiswa_matakuliah_jurusan_kimia', [UtamaMatakuliahController::class, 'jumlah_mahasiswa_matakuliah_jurusan_kimia'])->name('jumlah_mahasiswa_matakuliah_jurusan_kimia');
  Route::get('/jumlah_mahasiswa_matakuliah_jurusan_matematika', [UtamaMatakuliahController::class, 'jumlah_mahasiswa_matakuliah_jurusan_matematika'])->name('jumlah_mahasiswa_matakuliah_jurusan_matematika');
  Route::get('/jumlah_mahasiswa_matakuliah_jurusan_sistem_informasi', [UtamaMatakuliahController::class, 'jumlah_mahasiswa_matakuliah_jurusan_sistem_informasi'])->name('jumlah_mahasiswa_matakuliah_jurusan_sistem_informasi');
  Route::get('/jumlah_mahasiswa_matakuliah_jurusan_teknik_tambang', [UtamaMatakuliahController::class, 'jumlah_mahasiswa_matakuliah_jurusan_teknik_tambang'])->name('jumlah_mahasiswa_matakuliah_jurusan_teknik_tambang');
  
  Route::get('/klasifikasi_c45_mahasiswa_jurusan_teknik_informatika', [UtamaKlasifikasiC45TeknikInformatikaController::class, 'klasifikasi_mahasiswa_jurusan_teknik_informatika'])->name('klasifikasi_c45_mahasiswa_jurusan_teknik_informatika');
  Route::post('/klasifikasi_c45_mahasiswa_jurusan_teknik_informatika', [UtamaKlasifikasiC45TeknikInformatikaController::class, 'klasifikasi_mahasiswa_jurusan_teknik_informatika'])->name('klasifikasi_c45_mahasiswa_jurusan_teknik_informatika');
  Route::get('/prediksi_mahasiswa_teknik_jurusan_informatika', [UtamaKlasifikasiC45TeknikInformatikaController::class, 'prediksi_mahasiswa_jurusan_teknik_informatika'])->name('prediksi_mahasiswa_jurusan_teknik_informatika');
  Route::post('/prediksi_mahasiswa_teknik_jurusan_informatika', [UtamaKlasifikasiC45TeknikInformatikaController::class, 'prediksi_mahasiswa_jurusan_teknik_informatika'])->name('prediksi_mahasiswa_jurusan_teknik_informatika');
  Route::get('/prediksi_setiap_mahasiswa_matakuliah_teknik_informatika_mahasiswa',[UtamaPediksiPerMahasiswaKlasifikasiC45TeknikInformatikaController::class, 'prediksi_per_mahasiswa_jurusan_teknik_informatika'])->name('prediksi_setiap_mahasiswa_matakuliah_teknik_informatika_mahasiswa');
  Route::get('/klasifikasi_c45_mahasiswa_jurusan_sistem_informasi', [UtamaKlasifikasiC45SistemInformasiController::class, 'klasifikasi_mahasiswa_jurusan_sistem_informasi'])->name('klasifikasi_c45_mahasiswa_jurusan_sistem_informasi');
  Route::post('/klasifikasi_c45_mahasiswa_jurusan_sistem_informasi', [UtamaKlasifikasiC45SistemInformasiController::class, 'klasifikasi_mahasiswa_jurusan_sistem_informasi'])->name('klasifikasi_c45_mahasiswa_jurusan_sistem_informasi');
  Route::get('/prediksi_mahasiswa_jurusan_sistem_informasi', [UtamaKlasifikasiC45SistemInformasiController::class, 'prediksi_mahasiswa_jurusan_sistem_informasi'])->name('prediksi_mahasiswa_jurusan_sistem_informasi');
  Route::post('/prediksi_mahasiswa_jurusan_sistem_informasi', [UtamaKlasifikasiC45SistemInformasiController::class, 'prediksi_mahasiswa_jurusan_sistem_informasi'])->name('prediksi_mahasiswa_jurusan_sistem_informasi');
  Route::get('/prediksi_setiap_mahasiswa_matakuliah_sistem_informasi_mahasiswa',[UtamaPediksiPerMahasiswaKlasifikasiC45SistemInformasiController::class, 'prediksi_per_mahasiswa_jurusan_sistem_informasi'])->name('prediksi_setiap_mahasiswa_matakuliah_sistem_informasi_mahasiswa');
  Route::get('/klasifikasi_c45_mahasiswa_jurusan_agribisnis', [UtamaKlasifikasiC45AgribisnisController::class, 'klasifikasi_mahasiswa_jurusan_agribisnis'])->name('klasifikasi_c45_mahasiswa_jurusan_agribisnis');
  Route::post('/klasifikasi_c45_mahasiswa_jurusan_agribisnis', [UtamaKlasifikasiC45AgribisnisController::class, 'klasifikasi_mahasiswa_jurusan_agribisnis'])->name('klasifikasi_c45_mahasiswa_jurusan_agribisnis');
  Route::get('/prediksi_mahasiswa_jurusan_agribisnis', [UtamaKlasifikasiC45AgribisnisController::class, 'prediksi_mahasiswa_jurusan_agribisnis'])->name('prediksi_mahasiswa_jurusan_agribisnis');
  Route::post('/prediksi_mahasiswa_jurusan_agribisnis', [UtamaKlasifikasiC45AgribisnisController::class, 'prediksi_mahasiswa_jurusan_agribisnis'])->name('prediksi_mahasiswa_jurusan_agribisnis');
  Route::get('/prediksi_setiap_mahasiswa_matakuliah_agribisnis_mahasiswa',[UtamaPediksiPerMahasiswaKlasifikasiC45AgribisnisController::class, 'prediksi_per_mahasiswa_jurusan_agribisnis'])->name('prediksi_setiap_mahasiswa_matakuliah_agribisnis_mahasiswa');
  Route::get('/klasifikasi_c45_mahasiswa_jurusan_fisika', [UtamaKlasifikasiC45FisikaController::class, 'klasifikasi_mahasiswa_jurusan_fisika'])->name('klasifikasi_c45_mahasiswa_jurusan_fisika');
  Route::post('/klasifikasi_c45_mahasiswa_jurusan_fisika', [UtamaKlasifikasiC45FisikaController::class, 'klasifikasi_mahasiswa_jurusan_fisika'])->name('klasifikasi_c45_mahasiswa_jurusan_fisika');
  Route::get('/prediksi_mahasiswa_jurusan_fisika', [UtamaKlasifikasiC45FisikaController::class, 'prediksi_mahasiswa_jurusan_fisika'])->name('prediksi_mahasiswa_jurusan_fisika');
  Route::post('/prediksi_mahasiswa_jurusan_fisika', [UtamaKlasifikasiC45FisikaController::class, 'prediksi_mahasiswa_jurusan_fisika'])->name('prediksi_mahasiswa_jurusan_fisika');
  Route::get('/prediksi_setiap_mahasiswa_matakuliah_fisika_mahasiswa',[UtamaPediksiPerMahasiswaKlasifikasiC45FisikaController::class, 'prediksi_per_mahasiswa_jurusan_fisika'])->name('prediksi_setiap_mahasiswa_matakuliah_fisika_mahasiswa');
  Route::get('/klasifikasi_c45_mahasiswa_jurusan_matematika', [UtamaKlasifikasiC45MatematikaController::class, 'klasifikasi_mahasiswa_jurusan_matematika'])->name('klasifikasi_c45_mahasiswa_jurusan_matematika');
  Route::post('/klasifikasi_c45_mahasiswa_jurusan_matematika', [UtamaKlasifikasiC45MatematikaController::class, 'klasifikasi_mahasiswa_jurusan_matematika'])->name('klasifikasi_c45_mahasiswa_jurusan_matematika');
  Route::get('/prediksi_mahasiswa_jurusan_matematika', [UtamaKlasifikasiC45MatematikaController::class, 'prediksi_mahasiswa_jurusan_matematika'])->name('prediksi_mahasiswa_jurusan_matematika');
  Route::post('/prediksi_mahasiswa_jurusan_matematika', [UtamaKlasifikasiC45MatematikaController::class, 'prediksi_mahasiswa_jurusan_matematika'])->name('prediksi_mahasiswa_jurusan_matematika');
  Route::get('/prediksi_setiap_mahasiswa_matakuliah_matematika_mahasiswa',[UtamaPediksiPerMahasiswaKlasifikasiC45MatematikaController::class, 'prediksi_per_mahasiswa_jurusan_matematika'])->name('prediksi_setiap_mahasiswa_matakuliah_matematika_mahasiswa');
  Route::get('/klasifikasi_c45_mahasiswa_jurusan_kimia', [UtamaKlasifikasiC45KimiaController::class, 'klasifikasi_mahasiswa_jurusan_kimia'])->name('klasifikasi_c45_mahasiswa_jurusan_kimia');
  Route::post('/klasifikasi_c45_mahasiswa_jurusan_kimia', [UtamaKlasifikasiC45KimiaController::class, 'klasifikasi_mahasiswa_jurusan_kimia'])->name('klasifikasi_c45_mahasiswa_jurusan_kimia');
  Route::get('/prediksi_mahasiswa_jurusan_kimia', [UtamaKlasifikasiC45KimiaController::class, 'prediksi_mahasiswa_jurusan_kimia'])->name('prediksi_mahasiswa_jurusan_kimia');
  Route::post('/prediksi_mahasiswa_jurusan_kimia', [UtamaKlasifikasiC45KimiaController::class, 'prediksi_mahasiswa_jurusan_kimia'])->name('prediksi_mahasiswa_jurusan_kimia');
  Route::get('/prediksi_setiap_mahasiswa_matakuliah_kimia_mahasiswa',[UtamaPediksiPerMahasiswaKlasifikasiC45KimiaController::class, 'prediksi_per_mahasiswa_jurusan_kimia'])->name('prediksi_setiap_mahasiswa_matakuliah_kimia_mahasiswa');
  Route::get('/klasifikasi_c45_mahasiswa_jurusan_biologi', [UtamaKlasifikasiC45BiologiController::class, 'klasifikasi_mahasiswa_jurusan_biologi'])->name('klasifikasi_c45_mahasiswa_jurusan_biologi');
  Route::post('/klasifikasi_c45_mahasiswa_jurusan_biologi', [UtamaKlasifikasiC45BiologiController::class, 'klasifikasi_mahasiswa_jurusan_biologi'])->name('klasifikasi_c45_mahasiswa_jurusan_biologi');
  Route::get('/prediksi_mahasiswa_jurusan_biologi', [UtamaKlasifikasiC45BiologiController::class, 'prediksi_mahasiswa_jurusan_biologi'])->name('prediksi_mahasiswa_jurusan_biologi');
  Route::post('/prediksi_mahasiswa_jurusan_biologi', [UtamaKlasifikasiC45BiologiController::class, 'prediksi_mahasiswa_jurusan_biologi'])->name('prediksi_mahasiswa_jurusan_biologi');
  Route::get('/prediksi_setiap_mahasiswa_matakuliah_biologi_mahasiswa',[UtamaPediksiPerMahasiswaKlasifikasiC45BiologiController::class, 'prediksi_per_mahasiswa_jurusan_biologi'])->name('prediksi_setiap_mahasiswa_matakuliah_biologi_mahasiswa');
  Route::get('/klasifikasi_c45_mahasiswa_jurusan_teknik_tambang', [UtamaKlasifikasiC45TeknikTambangController::class, 'klasifikasi_mahasiswa_jurusan_teknik_tambang'])->name('klasifikasi_c45_mahasiswa_jurusan_teknik_tambang');
  Route::post('/klasifikasi_c45_mahasiswa_jurusan_teknik_tambang', [UtamaKlasifikasiC45TeknikTambangController::class, 'klasifikasi_mahasiswa_jurusan_teknik_tambang'])->name('klasifikasi_c45_mahasiswa_jurusan_teknik_tambang');
  Route::get('/prediksi_mahasiswa_jurusan_teknik_tambang', [UtamaKlasifikasiC45TeknikTambangController::class, 'prediksi_mahasiswa_jurusan_teknik_tambang'])->name('prediksi_mahasiswa_jurusan_teknik_tambang');
  Route::post('/prediksi_mahasiswa_jurusan_teknik_tambang', [UtamaKlasifikasiC45TeknikTambangController::class, 'prediksi_mahasiswa_jurusan_teknik_tambang'])->name('prediksi_mahasiswa_jurusan_teknik_tambang');
  Route::get('/prediksi_setiap_mahasiswa_matakuliah_teknik_tambang_mahasiswa',[UtamaPediksiPerMahasiswaKlasifikasiC45TeknikTambangController::class, 'prediksi_per_mahasiswa_jurusan_teknik_tambang'])->name('prediksi_setiap_mahasiswa_matakuliah_teknik_tambang_mahasiswa');

});

Route::middleware(['auth', 'shareMahasiswaData','dosen_agribisnis'])->group(function () {
  Route::get('/dosen_dashboard_agribisnis', [DashboardController::class, 'dosen_agribisnis'])->name('dosen_dashboard_agribisnis');
  
  Route::get('/dosen_jumlah_mahasiswa_kelamin_agribisnis', [DosenMahasiswaAgribisnisController::class, 'dosen_jumlah_mahasiswa_kelamin_agribisnis'])->name('dosen_jumlah_mahasiswa_kelamin_agribisnis');
  Route::get('/dosen_jumlah_mahasiswa_status_agribisnis', [DosenMahasiswaAgribisnisController::class, 'dosen_jumlah_mahasiswa_status_agribisnis'])->name('dosen_jumlah_mahasiswa_status_agribisnis');
  Route::get('/dosen_jumlah_mahasiswa_jurusan_agribisnis', [DosenMahasiswaAgribisnisController::class, 'dosen_jumlah_mahasiswa_jurusan_agribisnis'])->name('dosen_jumlah_mahasiswa_jurusan_agribisnis');
  Route::get('/dosen_jumlah_mahasiswa_jenis_seleksi_agribisnis', [DosenMahasiswaAgribisnisController::class, 'dosen_jumlah_mahasiswa_jenis_seleksi_agribisnis'])->name('dosen_jumlah_mahasiswa_jenis_seleksi_agribisnis');
  Route::get('/dosen_jumlah_mahasiswa_propinsi_agribisnis', [DosenMahasiswaAgribisnisController::class, 'dosen_jumlah_mahasiswa_propinsi_agribisnis'])->name('dosen_jumlah_mahasiswa_propinsi_agribisnis');
  Route::get('/dosen_jumlah_mahasiswa_kota_agribisnis', [DosenMahasiswaAgribisnisController::class, 'dosen_jumlah_mahasiswa_kota_agribisnis'])->name('dosen_jumlah_mahasiswa_kota_agribisnis');
  Route::get('/dosen_jumlah_mahasiswa_jenis_sekolah_agribisnis', [DosenMahasiswaAgribisnisController::class, 'dosen_jumlah_mahasiswa_jenis_sekolah_agribisnis'])->name('dosen_jumlah_mahasiswa_jenis_sekolah_agribisnis');
  Route::get('/dosen_jumlah_mahasiswa_satuan_kredit_semester_agribisnis', [DosenMahasiswaAgribisnisController::class, 'dosen_jumlah_mahasiswa_satuan_kredit_semester_agribisnis'])->name('dosen_jumlah_mahasiswa_satuan_kredit_semester_agribisnis');
  Route::get('/dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_agribisnis', [DosenMahasiswaAgribisnisController::class, 'dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_agribisnis'])->name('dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_agribisnis');
  Route::get('/dosen_jumlah_mahasiswa_matakuliah_agribisnis', [DosenMatakuliahController::class, 'dosen_jumlah_mahasiswa_matakuliah_agribisnis'])->name('dosen_jumlah_mahasiswa_matakuliah_agribisnis');

  Route::get('/dosen_klasifikasi_c45_mahasiswa_agribisnis', [DosenKlasifikasiC45Controller::class, 'dosen_klasifikasi_mahasiswa_agribisnis'])->name('dosen_klasifikasi_c45_mahasiswa_agribisnis');
  Route::post('/dosen_klasifikasi_c45_mahasiswa_agribisnis', [DosenKlasifikasiC45Controller::class, 'dosen_klasifikasi_mahasiswa_agribisnis'])->name('dosen_klasifikasi_c45_mahasiswa_agribisnis');
  Route::get('/dosen_prediksi_mahasiswa_agribisnis', [DosenKlasifikasiC45Controller::class, 'dosen_prediksi_mahasiswa_agribisnis'])->name('dosen_prediksi_mahasiswa_agribisnis');
  Route::post('/dosen_prediksi_mahasiswa_agribisnis', [DosenKlasifikasiC45Controller::class, 'dosen_prediksi_mahasiswa_agribisnis'])->name('dosen_prediksi_mahasiswa_agribisnis');
  Route::get('/dosen_prediksi_per_mahasiswa_matakuliah_agribisnis_mahasiswa',[DosenPediksiPerMahasiswaKlasifikasiC45Controller::class, 'dosen_prediksi_per_mahasiswa_jurusan_agribisnis'])->name('dosen_prediksi_per_mahasiswa_matakuliah_agribisnis_mahasiswa');
  
});

Route::middleware(['auth', 'shareMahasiswaData','dosen_biologi'])->group(function () {
  Route::get('/dosen_dashboard_biologi', [DashboardController::class, 'dosen_biologi'])->name('dosen_dashboard_biologi');
  
  Route::get('/dosen_jumlah_mahasiswa_kelamin_biologi', [DosenMahasiswaBiologiController::class, 'dosen_jumlah_mahasiswa_kelamin_biologi'])->name('dosen_jumlah_mahasiswa_kelamin_biologi');
  Route::get('/dosen_jumlah_mahasiswa_status_biologi', [DosenMahasiswaBiologiController::class, 'dosen_jumlah_mahasiswa_status_biologi'])->name('dosen_jumlah_mahasiswa_status_biologi');
  Route::get('/dosen_jumlah_mahasiswa_jurusan_biologi', [DosenMahasiswaBiologiController::class, 'dosen_jumlah_mahasiswa_jurusan_biologi'])->name('dosen_jumlah_mahasiswa_jurusan_biologi');
  Route::get('/dosen_jumlah_mahasiswa_jenis_seleksi_biologi', [DosenMahasiswaBiologiController::class, 'dosen_jumlah_mahasiswa_jenis_seleksi_biologi'])->name('dosen_jumlah_mahasiswa_jenis_seleksi_biologi');
  Route::get('/dosen_jumlah_mahasiswa_propinsi_biologi', [DosenMahasiswaBiologiController::class, 'dosen_jumlah_mahasiswa_propinsi_biologi'])->name('dosen_jumlah_mahasiswa_propinsi_biologi');
  Route::get('/dosen_jumlah_mahasiswa_kota_biologi', [DosenMahasiswaBiologiController::class, 'dosen_jumlah_mahasiswa_kota_biologi'])->name('dosen_jumlah_mahasiswa_kota_biologi');
  Route::get('/dosen_jumlah_mahasiswa_jenis_sekolah_biologi', [DosenMahasiswaBiologiController::class, 'dosen_jumlah_mahasiswa_jenis_sekolah_biologi'])->name('dosen_jumlah_mahasiswa_jenis_sekolah_biologi');
  Route::get('/dosen_jumlah_mahasiswa_satuan_kredit_semester_biologi', [DosenMahasiswaBiologiController::class, 'dosen_jumlah_mahasiswa_satuan_kredit_semester_biologi'])->name('dosen_jumlah_mahasiswa_satuan_kredit_semester_biologi');
  Route::get('/dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_biologi', [DosenMahasiswaBiologiController::class, 'dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_biologi'])->name('dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_biologi');
  Route::get('/dosen_jumlah_mahasiswa_matakuliah_biologi', [DosenMatakuliahController::class, 'dosen_jumlah_mahasiswa_matakuliah_biologi'])->name('dosen_jumlah_mahasiswa_matakuliah_biologi');

  Route::get('/dosen_klasifikasi_c45_mahasiswa_biologi', [DosenKlasifikasiC45Controller::class, 'dosen_klasifikasi_mahasiswa_biologi'])->name('dosen_klasifikasi_c45_mahasiswa_biologi');
  Route::post('/dosen_klasifikasi_c45_mahasiswa_biologi', [DosenKlasifikasiC45Controller::class, 'dosen_klasifikasi_mahasiswa_biologi'])->name('dosen_klasifikasi_c45_mahasiswa_biologi');
  Route::get('/dosen_prediksi_mahasiswa_biologi', [DosenKlasifikasiC45Controller::class, 'dosen_prediksi_mahasiswa_biologi'])->name('dosen_prediksi_mahasiswa_biologi');
  Route::post('/dosen_prediksi_mahasiswa_biologi', [DosenKlasifikasiC45Controller::class, 'dosen_prediksi_mahasiswa_biologi'])->name('dosen_prediksi_mahasiswa_biologi');
  Route::get('/dosen_prediksi_per_mahasiswa_matakuliah_biologi_mahasiswa',[DosenPediksiPerMahasiswaKlasifikasiC45Controller::class, 'dosen_prediksi_per_mahasiswa_jurusan_biologi'])->name('dosen_prediksi_per_mahasiswa_matakuliah_biologi_mahasiswa');
  
});

Route::middleware(['auth', 'shareMahasiswaData','dosen_fisika'])->group(function () {
  Route::get('/dosen_dashboard_fisika', [DashboardController::class, 'dosen_fisika'])->name('dosen_dashboard_fisika');
  
  Route::get('/dosen_jumlah_mahasiswa_kelamin_fisika', [DosenMahasiswaFisikaController::class, 'dosen_jumlah_mahasiswa_kelamin_fisika'])->name('dosen_jumlah_mahasiswa_kelamin_fisika');
  Route::get('/dosen_jumlah_mahasiswa_status_fisika', [DosenMahasiswaFisikaController::class, 'dosen_jumlah_mahasiswa_status_fisika'])->name('dosen_jumlah_mahasiswa_status_fisika');
  Route::get('/dosen_jumlah_mahasiswa_jurusan_fisika', [DosenMahasiswaFisikaController::class, 'jdosen_umlah_mahasiswa_jurusan_fisika'])->name('dosen_jumlah_mahasiswa_jurusan_fisika');
  Route::get('/dosen_jumlah_mahasiswa_jenis_seleksi_fisika', [DosenMahasiswaFisikaController::class, 'dosen_jumlah_mahasiswa_jenis_seleksi_fisika'])->name('dosen_jumlah_mahasiswa_jenis_seleksi_fisika');
  Route::get('/dosen_jumlah_mahasiswa_propinsi_fisika', [DosenMahasiswaFisikaController::class, 'dosen_jumlah_mahasiswa_propinsi_fisika'])->name('dosen_jumlah_mahasiswa_propinsi_fisika');
  Route::get('/dosen_jumlah_mahasiswa_kota_fisika', [DosenMahasiswaFisikaController::class, 'dosen_jumlah_mahasiswa_kota_fisika'])->name('dosen_jumlah_mahasiswa_kota_fisika');
  Route::get('/dosen_jumlah_mahasiswa_jenis_sekolah_fisika', [DosenMahasiswaFisikaController::class, 'dosen_jumlah_mahasiswa_jenis_sekolah_fisika'])->name('dosen_jumlah_mahasiswa_jenis_sekolah_fisika');
  Route::get('/dosen_jumlah_mahasiswa_satuan_kredit_semester_fisika', [DosenMahasiswaFisikaController::class, 'dosen_jumlah_mahasiswa_satuan_kredit_semester_fisika'])->name('dosen_jumlah_mahasiswa_satuan_kredit_semester_fisika');
  Route::get('/dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_fisika', [DosenMahasiswaFisikaController::class, 'dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_fisika'])->name('dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_fisika');
  Route::get('/dosen_jumlah_mahasiswa_matakuliah_fisika', [DosenMatakuliahController::class, 'dosen_jumlah_mahasiswa_matakuliah_fisika'])->name('dosen_jumlah_mahasiswa_matakuliah_fisika');

  Route::get('/dosen_klasifikasi_c45_mahasiswa_fisika', [DosenKlasifikasiC45Controller::class, 'dosen_klasifikasi_mahasiswa_fisika'])->name('dosen_klasifikasi_c45_mahasiswa_fisika');
  Route::post('/dosen_klasifikasi_c45_mahasiswa_fisika', [DosenKlasifikasiC45Controller::class, 'dosen_klasifikasi_mahasiswa_fisika'])->name('dosen_klasifikasi_c45_mahasiswa_fisika');
  Route::get('/dosen_prediksi_mahasiswa_fisika', [DosenKlasifikasiC45Controller::class, 'dosen_prediksi_mahasiswa_fisika'])->name('dosen_prediksi_mahasiswa_fisika');
  Route::post('/dosen_prediksi_mahasiswa_fisika', [DosenKlasifikasiC45Controller::class, 'dosen_prediksi_mahasiswa_fisika'])->name('dosen_prediksi_mahasiswa_fisika');
  Route::get('/dosen_prediksi_per_mahasiswa_matakuliah_fisika_mahasiswa',[DosenPediksiPerMahasiswaKlasifikasiC45Controller::class, 'dosen_prediksi_per_mahasiswa_jurusan_fisika'])->name('dosen_prediksi_per_mahasiswa_matakuliah_fisika_mahasiswa');
  
});

Route::middleware(['auth', 'shareMahasiswaData','dosen_kimia'])->group(function () {
  Route::get('/dosen_dashboard_kimia', [DashboardController::class, 'dosen_kimia'])->name('dosen_dashboard_kimia');
 
  Route::get('/dosen_jumlah_mahasiswa_kelamin_kimia', [DosenMahasiswaKimiaController::class, 'dosen_jumlah_mahasiswa_kelamin_kimia'])->name('dosen_jumlah_mahasiswa_kelamin_kimia');
  Route::get('/dosen_jumlah_mahasiswa_status_kimia', [DosenMahasiswaKimiaController::class, 'dosen_jumlah_mahasiswa_status_kimia'])->name('dosen_jumlah_mahasiswa_status_kimia');
  Route::get('/dosen_jumlah_mahasiswa_jurusan_kimia', [DosenMahasiswaKimiaController::class, 'dosen_jumlah_mahasiswa_jurusan_kimia'])->name('dosen_jumlah_mahasiswa_jurusan_kimia');
  Route::get('/dosen_jumlah_mahasiswa_jenis_seleksi_kimia', [DosenMahasiswaKimiaController::class, 'dosen_jumlah_mahasiswa_jenis_seleksi_kimia'])->name('dosen_jumlah_mahasiswa_jenis_seleksi_kimia');
  Route::get('/dosen_jumlah_mahasiswa_propinsi_kimia', [DosenMahasiswaKimiaController::class, 'dosen_jumlah_mahasiswa_propinsi_kimia'])->name('dosen_jumlah_mahasiswa_propinsi_kimia');
  Route::get('/dosen_jumlah_mahasiswa_kota_kimia', [DosenMahasiswaKimiaController::class, 'dosen_jumlah_mahasiswa_kota_kimia'])->name('dosen_jumlah_mahasiswa_kota_kimia');
  Route::get('/dosen_jumlah_mahasiswa_jenis_sekolah_kimia', [DosenMahasiswaKimiaController::class, 'dosen_jumlah_mahasiswa_jenis_sekolah_kimia'])->name('dosen_jumlah_mahasiswa_jenis_sekolah_kimia');
  Route::get('/dosen_jumlah_mahasiswa_satuan_kredit_semester_kimia', [DosenMahasiswaKimiaController::class, 'dosen_jumlah_mahasiswa_satuan_kredit_semester_kimia'])->name('dosen_jumlah_mahasiswa_satuan_kredit_semester_kimia');
  Route::get('/dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_kimia', [DosenMahasiswaKimiaController::class, 'dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_kimia'])->name('dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_kimia');
  Route::get('/dosen_jumlah_mahasiswa_matakuliah_kimia', [DosenMatakuliahController::class, 'dosen_jumlah_mahasiswa_matakuliah_kimia'])->name('dosen_jumlah_mahasiswa_matakuliah_kimia');

  Route::get('/dosen_klasifikasi_c45_mahasiswa_kimia', [DosenKlasifikasiC45Controller::class, 'dosen_klasifikasi_mahasiswa_kimia'])->name('dosen_klasifikasi_c45_mahasiswa_kimia');
  Route::post('/dosen_klasifikasi_c45_mahasiswa_kimia', [DosenKlasifikasiC45Controller::class, 'dosen_klasifikasi_mahasiswa_kimia'])->name('dosen_klasifikasi_c45_mahasiswa_kimia');
  Route::get('/dosen_prediksi_mahasiswa_kimia', [DosenKlasifikasiC45Controller::class, 'dosen_prediksi_mahasiswa_kimia'])->name('dosen_prediksi_mahasiswa_kimia');
  Route::post('/dosen_prediksi_mahasiswa_kimia', [DosenKlasifikasiC45Controller::class, 'dosen_prediksi_mahasiswa_kimia'])->name('dosen_prediksi_mahasiswa_kimia');
  Route::get('/dosen_prediksi_per_mahasiswa_matakuliah_kimia_mahasiswa',[DosenPediksiPerMahasiswaKlasifikasiC45Controller::class, 'dosen_prediksi_per_mahasiswa_jurusan_kimia'])->name('dosen_prediksi_per_mahasiswa_matakuliah_kimia_mahasiswa');
  
});

Route::middleware(['auth', 'shareMahasiswaData','dosen_matematika'])->group(function () {
  Route::get('/dosen_dashboard_matematika', [DashboardController::class, 'dosen_matematika'])->name('dosen_dashboard_matematika');
 
  Route::get('/dosen_jumlah_mahasiswa_kelamin_matematika', [DosenMahasiswaMatematikaController::class, 'dosen_jumlah_mahasiswa_kelamin_matematika'])->name('dosen_jumlah_mahasiswa_kelamin_matematika');
  Route::get('/dosen_jumlah_mahasiswa_status_matematika', [DosenMahasiswaMatematikaController::class, 'dosen_jumlah_mahasiswa_status_matematika'])->name('dosen_jumlah_mahasiswa_status_matematika');
  Route::get('/dosen_jumlah_mahasiswa_jurusan_matematika', [DosenMahasiswaMatematikaController::class, 'dosen_jumlah_mahasiswa_jurusan_matematika'])->name('dosen_jumlah_mahasiswa_jurusan_matematika');
  Route::get('/dosen_jumlah_mahasiswa_jenis_seleksi_matematika', [DosenMahasiswaMatematikaController::class, 'dosen_jumlah_mahasiswa_jenis_seleksi_matematika'])->name('dosen_jumlah_mahasiswa_jenis_seleksi_matematika');
  Route::get('/dosen_jumlah_mahasiswa_propinsi_matematika', [DosenMahasiswaMatematikaController::class, 'dosen_jumlah_mahasiswa_propinsi_matematika'])->name('dosen_jumlah_mahasiswa_propinsi_matematika');
  Route::get('/dosen_jumlah_mahasiswa_kota_matematika', [DosenMahasiswaMatematikaController::class, 'dosen_jumlah_mahasiswa_kota_matematika'])->name('dosen_jumlah_mahasiswa_kota_matematika');
  Route::get('/dosen_jumlah_mahasiswa_jenis_sekolah_matematika', [DosenMahasiswaMatematikaController::class, 'dosen_jumlah_mahasiswa_jenis_sekolah_matematika'])->name('dosen_jumlah_mahasiswa_jenis_sekolah_matematika');
  Route::get('/dosen_jumlah_mahasiswa_satuan_kredit_semester_matematika', [DosenMahasiswaMatematikaController::class, 'dosen_jumlah_mahasiswa_satuan_kredit_semester_matematika'])->name('dosen_jumlah_mahasiswa_satuan_kredit_semester_matematika');
  Route::get('/dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_matematika', [DosenMahasiswaMatematikaController::class, 'dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_matematika'])->name('dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_matematika');
  Route::get('/dosen_jumlah_mahasiswa_matakuliah_matematika', [DosenMatakuliahController::class, 'dosen_jumlah_mahasiswa_matakuliah_matematika'])->name('dosen_jumlah_mahasiswa_matakuliah_matematika');

  Route::get('/dosen_klasifikasi_c45_mahasiswa_matematika', [DosenKlasifikasiC45Controller::class, 'dosen_klasifikasi_mahasiswa_matematika'])->name('dosen_klasifikasi_c45_mahasiswa_matematika');
  Route::post('/dosen_klasifikasi_c45_mahasiswa_matematika', [DosenKlasifikasiC45Controller::class, 'dosen_klasifikasi_mahasiswa_matematika'])->name('dosen_klasifikasi_c45_mahasiswa_matematika');
  Route::get('/dosen_prediksi_mahasiswa_matematika', [DosenKlasifikasiC45Controller::class, 'dosen_prediksi_mahasiswa_matematika'])->name('dosen_prediksi_mahasiswa_matematika');
  Route::post('/dosen_prediksi_mahasiswa_matematika', [DosenKlasifikasiC45Controller::class, 'dosen_prediksi_mahasiswa_matematika'])->name('dosen_prediksi_mahasiswa_matematika');
  Route::get('/dosen_prediksi_per_mahasiswa_matakuliah_matematika_mahasiswa',[DosenPediksiPerMahasiswaKlasifikasiC45Controller::class, 'dosen_prediksi_per_mahasiswa_jurusan_matematika'])->name('dosen_prediksi_per_mahasiswa_matakuliah_matematika_mahasiswa');
  
});

Route::middleware(['auth', 'shareMahasiswaData','dosen_sistem_informasi'])->group(function () {
  Route::get('/dosen_dashboard_sistem_informasi', [DashboardController::class, 'dosen_sistem_informasi'])->name('dosen_dashboard_sistem_informasi');
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

  Route::get('/dosen_jumlah_mahasiswa_kelamin_sistem_informasi', [DosenMahasiswaSistemInformasiController::class, 'dosen_jumlah_mahasiswa_kelamin_sistem_informasi'])->name('dosen_jumlah_mahasiswa_kelamin_sistem_informasi');
  Route::get('/dosen_jumlah_mahasiswa_status_sistem_informasi', [DosenMahasiswaSistemInformasiController::class, 'dosen_jumlah_mahasiswa_status_sistem_informasi'])->name('dosen_jumlah_mahasiswa_status_sistem_informasi');
  Route::get('/dosen_jumlah_mahasiswa_jurusan_sistem_informasi', [DosenMahasiswaSistemInformasiController::class, 'dosen_jumlah_mahasiswa_jurusan_sistem_informasi'])->name('dosen_jumlah_mahasiswa_jurusan_sistem_informasi');
  Route::get('/dosen_jumlah_mahasiswa_jenis_seleksi_sistem_informasi', [DosenMahasiswaSistemInformasiController::class, 'dosen_jumlah_mahasiswa_jenis_seleksi_sistem_informasi'])->name('dosen_jumlah_mahasiswa_jenis_seleksi_sistem_informasi');
  Route::get('/dosen_jumlah_mahasiswa_propinsi_sistem_informasi', [DosenMahasiswaSistemInformasiController::class, 'dosen_jumlah_mahasiswa_propinsi_sistem_informasi'])->name('dosen_jumlah_mahasiswa_propinsi_sistem_informasi');
  Route::get('/dosen_jumlah_mahasiswa_kota_sistem_informasi', [DosenMahasiswaSistemInformasiController::class, 'dosen_jumlah_mahasiswa_kota_sistem_informasi'])->name('dosen_jumlah_mahasiswa_kota_sistem_informasi');
  Route::get('/dosen_jumlah_mahasiswa_jenis_sekolah_sistem_informasi', [DosenMahasiswaSistemInformasiController::class, 'dosen_jumlah_mahasiswa_jenis_sekolah_sistem_informasi'])->name('dosen_jumlah_mahasiswa_jenis_sekolah_sistem_informasi');
  Route::get('/dosen_jumlah_mahasiswa_satuan_kredit_semester_sistem_informasi', [DosenMahasiswaSistemInformasiController::class, 'dosen_jumlah_mahasiswa_satuan_kredit_semester_sistem_informasi'])->name('dosen_jumlah_mahasiswa_satuan_kredit_semester_sistem_informasi');
  Route::get('/dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_sistem_informasi', [DosenMahasiswaSistemInformasiController::class, 'dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_sistem_informasi'])->name('dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_sistem_informasi');
  Route::get('/dosen_jumlah_mahasiswa_matakuliah_sistem_informasi', [DosenMatakuliahController::class, 'dosen_jumlah_mahasiswa_matakuliah_sistem_informasi'])->name('dosen_jumlah_mahasiswa_matakuliah_sistem_informasi');

  Route::get('/dosen_klasifikasi_c45_mahasiswa_sistem_informasi', [DosenKlasifikasiC45Controller::class, 'dosen_klasifikasi_mahasiswa_sistem_informasi'])->name('dosen_klasifikasi_c45_mahasiswa_sistem_informasi');
  Route::post('/dosen_klasifikasi_c45_mahasiswa_sistem_informasi', [DosenKlasifikasiC45Controller::class, 'dosen_klasifikasi_mahasiswa_sistem_informasi'])->name('dosen_klasifikasi_c45_mahasiswa_sistem_informasi');
  Route::get('/dosen_prediksi_mahasiswa_sistem_informasi', [DosenKlasifikasiC45Controller::class, 'dosen_prediksi_mahasiswa_sistem_informasi'])->name('dosen_prediksi_mahasiswa_sistem_informasi');
  Route::post('/dosen_prediksi_mahasiswa_sistem_informasi', [DosenKlasifikasiC45Controller::class, 'dosen_prediksi_mahasiswa_sistem_informasi'])->name('dosen_prediksi_mahasiswa_sistem_informasi');
  Route::get('/dosen_prediksi_per_mahasiswa_matakuliah_sistem_informasi_mahasiswa',[DosenPediksiPerMahasiswaKlasifikasiC45Controller::class, 'dosen_prediksi_per_mahasiswa_jurusan_sistem_informasi'])->name('dosen_prediksi_per_mahasiswa_matakuliah_sistem_informasi_mahasiswa');
});

Route::middleware(['auth', 'shareMahasiswaData','dosen_teknik_informatika'])->group(function () {
  Route::get('/dosen_dashboard_teknik_informatika', [DashboardController::class, 'dosen_teknik_informatika'])->name('dosen_dashboard_teknik_informatika');

  
  Route::get('/dosen_jumlah_mahasiswa_kelamin_teknik_informatika', [ DosenMahasiswaTeknikInformatikaController::class, 'dosen_jumlah_mahasiswa_kelamin_teknik_informatika'])->name('dosen_jumlah_mahasiswa_kelamin_teknik_informatika');
  Route::get('/dosen_jumlah_mahasiswa_status_teknik_informatika', [ DosenMahasiswaTeknikInformatikaController::class, 'dosen_jumlah_mahasiswa_status_teknik_informatika'])->name('dosen_jumlah_mahasiswa_status_teknik_informatika');
  Route::get('/dosen_jumlah_mahasiswa_jurusan_teknik_informatika', [ DosenMahasiswaTeknikInformatikaController::class, 'dosen_jumlah_mahasiswa_jurusan_teknik_informatika'])->name('dosen_jumlah_mahasiswa_jurusan_teknik_informatika');
  Route::get('/dosen_jumlah_mahasiswa_jenis_seleksi_teknik_informatika', [ DosenMahasiswaTeknikInformatikaController::class, 'dosen_jumlah_mahasiswa_jenis_seleksi_teknik_informatika'])->name('dosen_jumlah_mahasiswa_jenis_seleksi_teknik_informatika');
  Route::get('/dosen_jumlah_mahasiswa_propinsi_teknik_informatika', [ DosenMahasiswaTeknikInformatikaController::class, 'dosen_jumlah_mahasiswa_propinsi_teknik_informatika'])->name('dosen_jumlah_mahasiswa_propinsi_teknik_informatika');
  Route::get('/dosen_jumlah_mahasiswa_kota_teknik_informatika', [ DosenMahasiswaTeknikInformatikaController::class, 'dosen_jumlah_mahasiswa_kota_teknik_informatika'])->name('dosen_jumlah_mahasiswa_kota_teknik_informatika');
  Route::get('/dosen_jumlah_mahasiswa_jenis_sekolah_teknik_informatika', [ DosenMahasiswaTeknikInformatikaController::class, 'dosen_jumlah_mahasiswa_jenis_sekolah_teknik_informatika'])->name('dosen_jumlah_mahasiswa_jenis_sekolah_teknik_informatika');
  Route::get('/dosen_jumlah_mahasiswa_satuan_kredit_semester_teknik_informatika', [ DosenMahasiswaTeknikInformatikaController::class, 'dosen_jumlah_mahasiswa_satuan_kredit_semester_teknik_informatika'])->name('dosen_jumlah_mahasiswa_satuan_kredit_semester_teknik_informatika');
  Route::get('/dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_teknik_informatika', [ DosenMahasiswaTeknikInformatikaController::class, 'dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_teknik_informatika'])->name('dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_teknik_informatika');
  Route::get('/dosen_jumlah_mahasiswa_matakuliah_teknik_informatika', [DosenMatakuliahController::class, 'dosen_jumlah_mahasiswa_matakuliah_teknik_informatika'])->name('dosen_jumlah_mahasiswa_matakuliah_teknik_informatika');

  Route::get('/dosen_klasifikasi_c45_mahasiswa_teknik_informatika', [DosenKlasifikasiC45Controller::class, 'dosen_klasifikasi_mahasiswa_teknik_informatika'])->name('dosen_klasifikasi_c45_mahasiswa_teknik_informatika');
  Route::post('/dosen_klasifikasi_c45_mahasiswa_teknik_informatika', [DosenKlasifikasiC45Controller::class, 'dosen_klasifikasi_mahasiswa_teknik_informatika'])->name('dosen_klasifikasi_c45_mahasiswa_teknik_informatika');
  Route::get('/dosen_prediksi_mahasiswa_teknik_informatika', [DosenKlasifikasiC45Controller::class, 'dosen_prediksi_mahasiswa_teknik_informatika'])->name('dosen_prediksi_mahasiswa_teknik_informatika');
  Route::post('/dosen_prediksi_mahasiswa_teknik_informatika', [DosenKlasifikasiC45Controller::class, 'dosen_prediksi_mahasiswa_teknik_informatika'])->name('dosen_prediksi_mahasiswa_teknik_informatika');
  Route::get('/dosen_prediksi_per_mahasiswa_matakuliah_teknik_informatika_mahasiswa',[DosenPediksiPerMahasiswaKlasifikasiC45Controller::class, 'dosen_prediksi_per_mahasiswa_jurusan_teknik_informatika'])->name('dosen_prediksi_per_mahasiswa_matakuliah_teknik_informatika_mahasiswa');

});

Route::middleware(['auth', 'shareMahasiswaData','dosen_teknik_tambang'])->group(function () {
  Route::get('/dosen_dashboard_teknik_tambang', [DashboardController::class, 'dosen_teknik_tambang'])->name('dosen_dashboard_teknik_tambang');
 
  Route::get('/dosen_jumlah_mahasiswa_kelamin_teknik_tambang', [DosenMahasiswaTeknikTambangController::class, 'dosen_jumlah_mahasiswa_kelamin_teknik_tambang'])->name('dosen_jumlah_mahasiswa_kelamin_teknik_tambang');
  Route::get('/dosen_jumlah_mahasiswa_status_teknik_tambang', [DosenMahasiswaTeknikTambangController::class, 'dosen_jumlah_mahasiswa_status_teknik_tambang'])->name('dosen_jumlah_mahasiswa_status_teknik_tambang');
  Route::get('/dosen_jumlah_mahasiswa_jurusan_teknik_tambang', [DosenMahasiswaTeknikTambangController::class, 'dosen_jumlah_mahasiswa_jurusan_teknik_tambang'])->name('dosen_jumlah_mahasiswa_jurusan_teknik_tambang');
  Route::get('/dosen_jumlah_mahasiswa_jenis_seleksi_teknik_tambang', [DosenMahasiswaTeknikTambangController::class, 'dosen_jumlah_mahasiswa_jenis_seleksi_teknik_tambang'])->name('dosen_jumlah_mahasiswa_jenis_seleksi_teknik_tambang');
  Route::get('/dosen_jumlah_mahasiswa_propinsi_teknik_tambang', [DosenMahasiswaTeknikTambangController::class, 'dosen_jumlah_mahasiswa_propinsi_teknik_tambang'])->name('dosen_jumlah_mahasiswa_propinsi_teknik_tambang');
  Route::get('/dosen_jumlah_mahasiswa_kota_teknik_tambang', [DosenMahasiswaTeknikTambangController::class, 'dosen_jumlah_mahasiswa_kota_teknik_tambang'])->name('dosen_jumlah_mahasiswa_kota_teknik_tambang');
  Route::get('/dosen_jumlah_mahasiswa_jenis_sekolah_teknik_tambang', [DosenMahasiswaTeknikTambangController::class, 'dosen_jumlah_mahasiswa_jenis_sekolah_teknik_tambang'])->name('dosen_jumlah_mahasiswa_jenis_sekolah_teknik_tambang');
  Route::get('/dosen_jumlah_mahasiswa_satuan_kredit_semester_teknik_tambang', [DosenMahasiswaTeknikTambangController::class, 'dosen_jumlah_mahasiswa_satuan_kredit_semester_teknik_tambang'])->name('dosen_jumlah_mahasiswa_satuan_kredit_semester_teknik_tambang');
  Route::get('/dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_teknik_tambang', [DosenMahasiswaTeknikTambangController::class, 'dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_teknik_tambang'])->name('dosen_jumlah_mahasiswa_indeks_prestasi_kumulatif_teknik_tambang');
  Route::get('/dosen_jumlah_mahasiswa_matakuliah_teknik_tambang', [DosenMatakuliahController::class, 'dosen_jumlah_mahasiswa_matakuliah_teknik_tambang'])->name('dosen_jumlah_mahasiswa_matakuliah_teknik_tambang');

  Route::get('/dosen_klasifikasi_c45_mahasiswa_teknik_tambang', [DosenKlasifikasiC45Controller::class, 'dosen_klasifikasi_mahasiswa_teknik_tambang'])->name('dosen_klasifikasi_c45_mahasiswa_teknik_tambang');
  Route::post('/dosen_klasifikasi_c45_mahasiswa_teknik_tambang', [DosenKlasifikasiC45Controller::class, 'dosen_klasifikasi_mahasiswa_teknik_tambang'])->name('dosen_klasifikasi_c45_mahasiswa_teknik_tambang');
  Route::get('/dosen_prediksi_mahasiswa_teknik_tambang', [DosenKlasifikasiC45Controller::class, 'dosen_prediksi_mahasiswa_teknik_tambang'])->name('dosen_prediksi_mahasiswa_teknik_tambang');
  Route::post('/dosen_prediksi_mahasiswa_teknik_tambang', [DosenKlasifikasiC45Controller::class, 'dosen_prediksi_mahasiswa_teknik_tambang'])->name('dosen_prediksi_mahasiswa_teknik_tambang');
  Route::get('/dosen_prediksi_per_mahasiswa_matakuliah_teknik_tambang_mahasiswa',[DosenPediksiPerMahasiswaKlasifikasiC45Controller::class, 'dosen_prediksi_per_mahasiswa_jurusan_teknik_tambang'])->name('dosen_prediksi_per_mahasiswa_matakuliah_teknik_tambang_mahasiswa');
});

Route::middleware(['auth', 'shareMahasiswaData','sistem_informasi'])->group(function () {
  Route::get('/dashboard_sistem_informasi', [DashboardController::class, 'sistem_informasi'])->name('dashboard_sistem_informasi');
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

  Route::get('/jumlah_mahasiswa_kelamin_sistem_informasi', [MahasiswaSistemInformasiController::class, 'jumlah_mahasiswa_kelamin_sistem_informasi'])->name('jumlah_mahasiswa_kelamin_sistem_informasi');
  Route::get('/jumlah_mahasiswa_status_sistem_informasi', [MahasiswaSistemInformasiController::class, 'jumlah_mahasiswa_status_sistem_informasi'])->name('jumlah_mahasiswa_status_sistem_informasi');
  Route::get('/jumlah_mahasiswa_jurusan_sistem_informasi', [MahasiswaSistemInformasiController::class, 'jumlah_mahasiswa_jurusan_sistem_informasi'])->name('jumlah_mahasiswa_jurusan_sistem_informasi');
  Route::get('/jumlah_mahasiswa_jenis_seleksi_sistem_informasi', [MahasiswaSistemInformasiController::class, 'jumlah_mahasiswa_jenis_seleksi_sistem_informasi'])->name('jumlah_mahasiswa_jenis_seleksi_sistem_informasi');
  Route::get('/jumlah_mahasiswa_propinsi_sistem_informasi', [MahasiswaSistemInformasiController::class, 'jumlah_mahasiswa_propinsi_sistem_informasi'])->name('jumlah_mahasiswa_propinsi_sistem_informasi');
  Route::get('/jumlah_mahasiswa_kota_sistem_informasi', [MahasiswaSistemInformasiController::class, 'jumlah_mahasiswa_kota_sistem_informasi'])->name('jumlah_mahasiswa_kota_sistem_informasi');
  Route::get('/jumlah_mahasiswa_jenis_sekolah_sistem_informasi', [MahasiswaSistemInformasiController::class, 'jumlah_mahasiswa_jenis_sekolah_sistem_informasi'])->name('jumlah_mahasiswa_jenis_sekolah_sistem_informasi');
  Route::get('/jumlah_mahasiswa_satuan_kredit_semester_sistem_informasi', [MahasiswaSistemInformasiController::class, 'jumlah_mahasiswa_satuan_kredit_semester_sistem_informasi'])->name('jumlah_mahasiswa_satuan_kredit_semester_sistem_informasi');
  Route::get('/jumlah_mahasiswa_indeks_prestasi_kumulatif_sistem_informasi', [MahasiswaSistemInformasiController::class, 'jumlah_mahasiswa_indeks_prestasi_kumulatif_sistem_informasi'])->name('jumlah_mahasiswa_indeks_prestasi_kumulatif_sistem_informasi');
  Route::get('/jumlah_mahasiswa_matakuliah_sistem_informasi', [MatakuliahController::class, 'jumlah_mahasiswa_matakuliah_sistem_informasi'])->name('jumlah_mahasiswa_matakuliah_sistem_informasi');

  Route::get('/klasifikasi_c45_mahasiswa_sistem_informasi', [KlasifikasiC45SistemInformasiController::class, 'klasifikasi_mahasiswa_sistem_informasi'])->name('klasifikasi_c45_mahasiswa_sistem_informasi');
  Route::post('/klasifikasi_c45_mahasiswa_sistem_informasi', [KlasifikasiC45SistemInformasiController::class, 'klasifikasi_mahasiswa_sistem_informasi'])->name('klasifikasi_c45_mahasiswa_sistem_informasi');
  Route::get('/prediksi_mahasiswa_sistem_informasi', [KlasifikasiC45SistemInformasiController::class, 'prediksi_mahasiswa_sistem_informasi'])->name('prediksi_mahasiswa_sistem_informasi');
  Route::post('/prediksi_mahasiswa_sistem_informasi', [KlasifikasiC45SistemInformasiController::class, 'prediksi_mahasiswa_sistem_informasi'])->name('prediksi_mahasiswa_sistem_informasi');
  Route::get('/prediksi_per_mahasiswa_matakuliah_sistem_informasi_mahasiswa',[PediksiPerMahasiswaKlasifikasiC45SistemInformasiController::class, 'prediksi_per_mahasiswa_jurusan_sistem_informasi'])->name('prediksi_per_mahasiswa_matakuliah_sistem_informasi_mahasiswa');
});

Route::middleware(['auth', 'shareMahasiswaData','teknik_informatika'])->group(function () {
  Route::get('/dashboard_teknik_informatika', [DashboardController::class, 'teknik_informatika'])->name('dashboard_teknik_informatika');

  
  Route::get('/jumlah_mahasiswa_kelamin_teknik_informatika', [ MahasiswaTeknikInformatikaController::class, 'jumlah_mahasiswa_kelamin_teknik_informatika'])->name('jumlah_mahasiswa_kelamin_teknik_informatika');
  Route::get('/jumlah_mahasiswa_status_teknik_informatika', [ MahasiswaTeknikInformatikaController::class, 'jumlah_mahasiswa_status_teknik_informatika'])->name('jumlah_mahasiswa_status_teknik_informatika');
  Route::get('/jumlah_mahasiswa_jurusan_teknik_informatika', [ MahasiswaTeknikInformatikaController::class, 'jumlah_mahasiswa_jurusan_teknik_informatika'])->name('jumlah_mahasiswa_jurusan_teknik_informatika');
  Route::get('/jumlah_mahasiswa_jenis_seleksi_teknik_informatika', [ MahasiswaTeknikInformatikaController::class, 'jumlah_mahasiswa_jenis_seleksi_teknik_informatika'])->name('jumlah_mahasiswa_jenis_seleksi_teknik_informatika');
  Route::get('/jumlah_mahasiswa_propinsi_teknik_informatika', [ MahasiswaTeknikInformatikaController::class, 'jumlah_mahasiswa_propinsi_teknik_informatika'])->name('jumlah_mahasiswa_propinsi_teknik_informatika');
  Route::get('/jumlah_mahasiswa_kota_teknik_informatika', [ MahasiswaTeknikInformatikaController::class, 'jumlah_mahasiswa_kota_teknik_informatika'])->name('jumlah_mahasiswa_kota_teknik_informatika');
  Route::get('/jumlah_mahasiswa_jenis_sekolah_teknik_informatika', [ MahasiswaTeknikInformatikaController::class, 'jumlah_mahasiswa_jenis_sekolah_teknik_informatika'])->name('jumlah_mahasiswa_jenis_sekolah_teknik_informatika');
  Route::get('/jumlah_mahasiswa_satuan_kredit_semester_teknik_informatika', [ MahasiswaTeknikInformatikaController::class, 'jumlah_mahasiswa_satuan_kredit_semester_teknik_informatika'])->name('jumlah_mahasiswa_satuan_kredit_semester_teknik_informatika');
  Route::get('/jumlah_mahasiswa_indeks_prestasi_kumulatif_teknik_informatika', [ MahasiswaTeknikInformatikaController::class, 'jumlah_mahasiswa_indeks_prestasi_kumulatif_teknik_informatika'])->name('jumlah_mahasiswa_indeks_prestasi_kumulatif_teknik_informatika');
  Route::get('/jumlah_mahasiswa_matakuliah_teknik_informatika', [MatakuliahController::class, 'jumlah_mahasiswa_matakuliah_teknik_informatika'])->name('jumlah_mahasiswa_matakuliah_teknik_informatika');

  Route::get('/klasifikasi_c45_mahasiswa_teknik_informatika', [KlasifikasiC45TeknikInformatikaController::class, 'klasifikasi_mahasiswa_teknik_informatika'])->name('klasifikasi_c45_mahasiswa_teknik_informatika');
  Route::post('/klasifikasi_c45_mahasiswa_teknik_informatika', [KlasifikasiC45TeknikInformatikaController::class, 'klasifikasi_mahasiswa_teknik_informatika'])->name('klasifikasi_c45_mahasiswa_teknik_informatika');
  Route::get('/prediksi_mahasiswa_teknik_informatika', [KlasifikasiC45TeknikInformatikaController::class, 'prediksi_mahasiswa_teknik_informatika'])->name('prediksi_mahasiswa_teknik_informatika');
  Route::post('/prediksi_mahasiswa_teknik_informatika', [KlasifikasiC45TeknikInformatikaController::class, 'prediksi_mahasiswa_teknik_informatika'])->name('prediksi_mahasiswa_teknik_informatika');
  Route::get('/prediksi_per_mahasiswa_matakuliah_teknik_informatika_mahasiswa',[PediksiPerMahasiswaKlasifikasiC45TeknikInformatikaController::class, 'prediksi_per_mahasiswa_jurusan_teknik_informatika'])->name('prediksi_per_mahasiswa_matakuliah_teknik_informatika_mahasiswa');

});

Route::middleware(['auth', 'shareMahasiswaData','agribisnis'])->group(function () {
  Route::get('/dashboard_agribisnis', [DashboardController::class, 'agribisnis'])->name('dashboard_agribisnis');
  
  Route::get('/jumlah_mahasiswa_kelamin_agribisnis', [MahasiswaAgribisnisController::class, 'jumlah_mahasiswa_kelamin_agribisnis'])->name('jumlah_mahasiswa_kelamin_agribisnis');
  Route::get('/jumlah_mahasiswa_status_agribisnis', [MahasiswaAgribisnisController::class, 'jumlah_mahasiswa_status_agribisnis'])->name('jumlah_mahasiswa_status_agribisnis');
  Route::get('/jumlah_mahasiswa_jurusan_agribisnis', [MahasiswaAgribisnisController::class, 'jumlah_mahasiswa_jurusan_agribisnis'])->name('jumlah_mahasiswa_jurusan_agribisnis');
  Route::get('/jumlah_mahasiswa_jenis_seleksi_agribisnis', [MahasiswaAgribisnisController::class, 'jumlah_mahasiswa_jenis_seleksi_agribisnis'])->name('jumlah_mahasiswa_jenis_seleksi_agribisnis');
  Route::get('/jumlah_mahasiswa_propinsi_agribisnis', [MahasiswaAgribisnisController::class, 'jumlah_mahasiswa_propinsi_agribisnis'])->name('jumlah_mahasiswa_propinsi_agribisnis');
  Route::get('/jumlah_mahasiswa_kota_agribisnis', [MahasiswaAgribisnisController::class, 'jumlah_mahasiswa_kota_agribisnis'])->name('jumlah_mahasiswa_kota_agribisnis');
  Route::get('/jumlah_mahasiswa_jenis_sekolah_agribisnis', [MahasiswaAgribisnisController::class, 'jumlah_mahasiswa_jenis_sekolah_agribisnis'])->name('jumlah_mahasiswa_jenis_sekolah_agribisnis');
  Route::get('/jumlah_mahasiswa_satuan_kredit_semester_agribisnis', [MahasiswaAgribisnisController::class, 'jumlah_mahasiswa_satuan_kredit_semester_agribisnis'])->name('jumlah_mahasiswa_satuan_kredit_semester_agribisnis');
  Route::get('/jumlah_mahasiswa_indeks_prestasi_kumulatif_agribisnis', [MahasiswaAgribisnisController::class, 'jumlah_mahasiswa_indeks_prestasi_kumulatif_agribisnis'])->name('jumlah_mahasiswa_indeks_prestasi_kumulatif_agribisnis');
  Route::get('/jumlah_mahasiswa_matakuliah_agribisnis', [MatakuliahController::class, 'jumlah_mahasiswa_matakuliah_agribisnis'])->name('jumlah_mahasiswa_matakuliah_agribisnis');

  Route::get('/klasifikasi_c45_mahasiswa_agribisnis', [KlasifikasiC45AgribisnisController::class, 'klasifikasi_mahasiswa_agribisnis'])->name('klasifikasi_c45_mahasiswa_agribisnis');
  Route::post('/klasifikasi_c45_mahasiswa_agribisnis', [KlasifikasiC45AgribisnisController::class, 'klasifikasi_mahasiswa_agribisnis'])->name('klasifikasi_c45_mahasiswa_agribisnis');
  Route::get('/prediksi_mahasiswa_agribisnis', [KlasifikasiC45AgribisnisController::class, 'prediksi_mahasiswa_agribisnis'])->name('prediksi_mahasiswa_agribisnis');
  Route::post('/prediksi_mahasiswa_agribisnis', [KlasifikasiC45AgribisnisController::class, 'prediksi_mahasiswa_agribisnis'])->name('prediksi_mahasiswa_agribisnis');
  Route::get('/prediksi_per_mahasiswa_matakuliah_agribisnis_mahasiswa',[PediksiPerMahasiswaKlasifikasiC45AgribisnisController::class, 'prediksi_per_mahasiswa_jurusan_agribisnis'])->name('prediksi_per_mahasiswa_matakuliah_agribisnis_mahasiswa');
  
});

Route::middleware(['auth', 'shareMahasiswaData','biologi'])->group(function () {
  Route::get('/dashboard_biologi', [DashboardController::class, 'biologi'])->name('dashboard_biologi');
  
  Route::get('/jumlah_mahasiswa_kelamin_biologi', [MahasiswaBiologiController::class, 'jumlah_mahasiswa_kelamin_biologi'])->name('jumlah_mahasiswa_kelamin_biologi');
  Route::get('/jumlah_mahasiswa_status_biologi', [MahasiswaBiologiController::class, 'jumlah_mahasiswa_status_biologi'])->name('jumlah_mahasiswa_status_biologi');
  Route::get('/jumlah_mahasiswa_jurusan_biologi', [MahasiswaBiologiController::class, 'jumlah_mahasiswa_jurusan_biologi'])->name('jumlah_mahasiswa_jurusan_biologi');
  Route::get('/jumlah_mahasiswa_jenis_seleksi_biologi', [MahasiswaBiologiController::class, 'jumlah_mahasiswa_jenis_seleksi_biologi'])->name('jumlah_mahasiswa_jenis_seleksi_biologi');
  Route::get('/jumlah_mahasiswa_propinsi_biologi', [MahasiswaBiologiController::class, 'jumlah_mahasiswa_propinsi_biologi'])->name('jumlah_mahasiswa_propinsi_biologi');
  Route::get('/jumlah_mahasiswa_kota_biologi', [MahasiswaBiologiController::class, 'jumlah_mahasiswa_kota_biologi'])->name('jumlah_mahasiswa_kota_biologi');
  Route::get('/jumlah_mahasiswa_jenis_sekolah_biologi', [MahasiswaBiologiController::class, 'jumlah_mahasiswa_jenis_sekolah_biologi'])->name('jumlah_mahasiswa_jenis_sekolah_biologi');
  Route::get('/jumlah_mahasiswa_satuan_kredit_semester_biologi', [MahasiswaBiologiController::class, 'jumlah_mahasiswa_satuan_kredit_semester_biologi'])->name('jumlah_mahasiswa_satuan_kredit_semester_biologi');
  Route::get('/jumlah_mahasiswa_indeks_prestasi_kumulatif_biologi', [MahasiswaBiologiController::class, 'jumlah_mahasiswa_indeks_prestasi_kumulatif_biologi'])->name('jumlah_mahasiswa_indeks_prestasi_kumulatif_biologi');
  Route::get('/jumlah_mahasiswa_matakuliah_biologi', [MatakuliahController::class, 'jumlah_mahasiswa_matakuliah_biologi'])->name('jumlah_mahasiswa_matakuliah_biologi');

  Route::get('/klasifikasi_c45_mahasiswa_biologi', [KlasifikasiC45BiologiController::class, 'klasifikasi_mahasiswa_biologi'])->name('klasifikasi_c45_mahasiswa_biologi');
  Route::post('/klasifikasi_c45_mahasiswa_biologi', [KlasifikasiC45BiologiController::class, 'klasifikasi_mahasiswa_biologi'])->name('klasifikasi_c45_mahasiswa_biologi');
  Route::get('/prediksi_mahasiswa_biologi', [KlasifikasiC45BiologiController::class, 'prediksi_mahasiswa_biologi'])->name('prediksi_mahasiswa_biologi');
  Route::post('/prediksi_mahasiswa_biologi', [KlasifikasiC45BiologiController::class, 'prediksi_mahasiswa_biologi'])->name('prediksi_mahasiswa_biologi');
  Route::get('/prediksi_per_mahasiswa_matakuliah_biologi_mahasiswa',[PediksiPerMahasiswaKlasifikasiC45BiologiController::class, 'prediksi_per_mahasiswa_jurusan_biologi'])->name('prediksi_per_mahasiswa_matakuliah_biologi_mahasiswa');
  
});

Route::middleware(['auth', 'shareMahasiswaData','fisika'])->group(function () {
  Route::get('/dashboard_fisika', [DashboardController::class, 'fisika'])->name('dashboard_fisika');
  
  Route::get('/jumlah_mahasiswa_kelamin_fisika', [MahasiswaFisikaController::class, 'jumlah_mahasiswa_kelamin_fisika'])->name('jumlah_mahasiswa_kelamin_fisika');
  Route::get('/jumlah_mahasiswa_status_fisika', [MahasiswaFisikaController::class, 'jumlah_mahasiswa_status_fisika'])->name('jumlah_mahasiswa_status_fisika');
  Route::get('/jumlah_mahasiswa_jurusan_fisika', [MahasiswaFisikaController::class, 'jumlah_mahasiswa_jurusan_fisika'])->name('jumlah_mahasiswa_jurusan_fisika');
  Route::get('/jumlah_mahasiswa_jenis_seleksi_fisika', [MahasiswaFisikaController::class, 'jumlah_mahasiswa_jenis_seleksi_fisika'])->name('jumlah_mahasiswa_jenis_seleksi_fisika');
  Route::get('/jumlah_mahasiswa_propinsi_fisika', [MahasiswaFisikaController::class, 'jumlah_mahasiswa_propinsi_fisika'])->name('jumlah_mahasiswa_propinsi_fisika');
  Route::get('/jumlah_mahasiswa_kota_fisika', [MahasiswaFisikaController::class, 'jumlah_mahasiswa_kota_fisika'])->name('jumlah_mahasiswa_kota_fisika');
  Route::get('/jumlah_mahasiswa_jenis_sekolah_fisika', [MahasiswaFisikaController::class, 'jumlah_mahasiswa_jenis_sekolah_fisika'])->name('jumlah_mahasiswa_jenis_sekolah_fisika');
  Route::get('/jumlah_mahasiswa_satuan_kredit_semester_fisika', [MahasiswaFisikaController::class, 'jumlah_mahasiswa_satuan_kredit_semester_fisika'])->name('jumlah_mahasiswa_satuan_kredit_semester_fisika');
  Route::get('/jumlah_mahasiswa_indeks_prestasi_kumulatif_fisika', [MahasiswaFisikaController::class, 'jumlah_mahasiswa_indeks_prestasi_kumulatif_fisika'])->name('jumlah_mahasiswa_indeks_prestasi_kumulatif_fisika');
  Route::get('/jumlah_mahasiswa_matakuliah_fisika', [MatakuliahController::class, 'jumlah_mahasiswa_matakuliah_fisika'])->name('jumlah_mahasiswa_matakuliah_fisika');

  Route::get('/klasifikasi_c45_mahasiswa_fisika', [KlasifikasiC45FisikaController::class, 'klasifikasi_mahasiswa_fisika'])->name('klasifikasi_c45_mahasiswa_fisika');
  Route::post('/klasifikasi_c45_mahasiswa_fisika', [KlasifikasiC45FisikaController::class, 'klasifikasi_mahasiswa_fisika'])->name('klasifikasi_c45_mahasiswa_fisika');
  Route::get('/prediksi_mahasiswa_fisika', [KlasifikasiC45FisikaController::class, 'prediksi_mahasiswa_fisika'])->name('prediksi_mahasiswa_fisika');
  Route::post('/prediksi_mahasiswa_fisika', [KlasifikasiC45FisikaController::class, 'prediksi_mahasiswa_fisika'])->name('prediksi_mahasiswa_fisika');
  Route::get('/prediksi_per_mahasiswa_matakuliah_fisika_mahasiswa',[PediksiPerMahasiswaKlasifikasiC45FisikaController::class, 'prediksi_per_mahasiswa_jurusan_fisika'])->name('prediksi_per_mahasiswa_matakuliah_fisika_mahasiswa');
  
});

Route::middleware(['auth', 'shareMahasiswaData','kimia'])->group(function () {
  Route::get('/dashboard_kimia', [DashboardController::class, 'kimia'])->name('dashboard_kimia');
 
  Route::get('/jumlah_mahasiswa_kelamin_kimia', [MahasiswaKimiaController::class, 'jumlah_mahasiswa_kelamin_kimia'])->name('jumlah_mahasiswa_kelamin_kimia');
  Route::get('/jumlah_mahasiswa_status_kimia', [MahasiswaKimiaController::class, 'jumlah_mahasiswa_status_kimia'])->name('jumlah_mahasiswa_status_kimia');
  Route::get('/jumlah_mahasiswa_jurusan_kimia', [MahasiswaKimiaController::class, 'jumlah_mahasiswa_jurusan_kimia'])->name('jumlah_mahasiswa_jurusan_kimia');
  Route::get('/jumlah_mahasiswa_jenis_seleksi_kimia', [MahasiswaKimiaController::class, 'jumlah_mahasiswa_jenis_seleksi_kimia'])->name('jumlah_mahasiswa_jenis_seleksi_kimia');
  Route::get('/jumlah_mahasiswa_propinsi_kimia', [MahasiswaKimiaController::class, 'jumlah_mahasiswa_propinsi_kimia'])->name('jumlah_mahasiswa_propinsi_kimia');
  Route::get('/jumlah_mahasiswa_kota_kimia', [MahasiswaKimiaController::class, 'jumlah_mahasiswa_kota_kimia'])->name('jumlah_mahasiswa_kota_kimia');
  Route::get('/jumlah_mahasiswa_jenis_sekolah_kimia', [MahasiswaKimiaController::class, 'jumlah_mahasiswa_jenis_sekolah_kimia'])->name('jumlah_mahasiswa_jenis_sekolah_kimia');
  Route::get('/jumlah_mahasiswa_satuan_kredit_semester_kimia', [MahasiswaKimiaController::class, 'jumlah_mahasiswa_satuan_kredit_semester_kimia'])->name('jumlah_mahasiswa_satuan_kredit_semester_kimia');
  Route::get('/jumlah_mahasiswa_indeks_prestasi_kumulatif_kimia', [MahasiswaKimiaController::class, 'jumlah_mahasiswa_indeks_prestasi_kumulatif_kimia'])->name('jumlah_mahasiswa_indeks_prestasi_kumulatif_kimia');
  Route::get('/jumlah_mahasiswa_matakuliah_kimia', [MatakuliahController::class, 'jumlah_mahasiswa_matakuliah_kimia'])->name('jumlah_mahasiswa_matakuliah_kimia');

  Route::get('/klasifikasi_c45_mahasiswa_kimia', [KlasifikasiC45KimiaController::class, 'klasifikasi_mahasiswa_kimia'])->name('klasifikasi_c45_mahasiswa_kimia');
  Route::post('/klasifikasi_c45_mahasiswa_kimia', [KlasifikasiC45KimiaController::class, 'klasifikasi_mahasiswa_kimia'])->name('klasifikasi_c45_mahasiswa_kimia');
  Route::get('/prediksi_mahasiswa_kimia', [KlasifikasiC45KimiaController::class, 'prediksi_mahasiswa_kimia'])->name('prediksi_mahasiswa_kimia');
  Route::post('/prediksi_mahasiswa_kimia', [KlasifikasiC45KimiaController::class, 'prediksi_mahasiswa_kimia'])->name('prediksi_mahasiswa_kimia');
  Route::get('/prediksi_per_mahasiswa_matakuliah_kimia_mahasiswa',[PediksiPerMahasiswaKlasifikasiC45KimiaController::class, 'prediksi_per_mahasiswa_jurusan_kimia'])->name('prediksi_per_mahasiswa_matakuliah_kimia_mahasiswa');
  
});

Route::middleware(['auth', 'shareMahasiswaData','matematika'])->group(function () {
  Route::get('/dashboard_matematika', [DashboardController::class, 'matematika'])->name('dashboard_matematika');
 
  Route::get('/jumlah_mahasiswa_kelamin_matematika', [MahasiswaMatematikaController::class, 'jumlah_mahasiswa_kelamin_matematika'])->name('jumlah_mahasiswa_kelamin_matematika');
  Route::get('/jumlah_mahasiswa_status_matematika', [MahasiswaMatematikaController::class, 'jumlah_mahasiswa_status_matematika'])->name('jumlah_mahasiswa_status_matematika');
  Route::get('/jumlah_mahasiswa_jurusan_matematika', [MahasiswaMatematikaController::class, 'jumlah_mahasiswa_jurusan_matematika'])->name('jumlah_mahasiswa_jurusan_matematika');
  Route::get('/jumlah_mahasiswa_jenis_seleksi_matematika', [MahasiswaMatematikaController::class, 'jumlah_mahasiswa_jenis_seleksi_matematika'])->name('jumlah_mahasiswa_jenis_seleksi_matematika');
  Route::get('/jumlah_mahasiswa_propinsi_matematika', [MahasiswaMatematikaController::class, 'jumlah_mahasiswa_propinsi_matematika'])->name('jumlah_mahasiswa_propinsi_matematika');
  Route::get('/jumlah_mahasiswa_kota_matematika', [MahasiswaMatematikaController::class, 'jumlah_mahasiswa_kota_matematika'])->name('jumlah_mahasiswa_kota_matematika');
  Route::get('/jumlah_mahasiswa_jenis_sekolah_matematika', [MahasiswaMatematikaController::class, 'jumlah_mahasiswa_jenis_sekolah_matematika'])->name('jumlah_mahasiswa_jenis_sekolah_matematika');
  Route::get('/jumlah_mahasiswa_satuan_kredit_semester_matematika', [MahasiswaMatematikaController::class, 'jumlah_mahasiswa_satuan_kredit_semester_matematika'])->name('jumlah_mahasiswa_satuan_kredit_semester_matematika');
  Route::get('/jumlah_mahasiswa_indeks_prestasi_kumulatif_matematika', [MahasiswaMatematikaController::class, 'jumlah_mahasiswa_indeks_prestasi_kumulatif_matematika'])->name('jumlah_mahasiswa_indeks_prestasi_kumulatif_matematika');
  Route::get('/jumlah_mahasiswa_matakuliah_matematika', [MatakuliahController::class, 'jumlah_mahasiswa_matakuliah_matematika'])->name('jumlah_mahasiswa_matakuliah_matematika');

  Route::get('/klasifikasi_c45_mahasiswa_matematika', [KlasifikasiC45MatematikaController::class, 'klasifikasi_mahasiswa_matematika'])->name('klasifikasi_c45_mahasiswa_matematika');
  Route::post('/klasifikasi_c45_mahasiswa_matematika', [KlasifikasiC45MatematikaController::class, 'klasifikasi_mahasiswa_matematika'])->name('klasifikasi_c45_mahasiswa_matematika');
  Route::get('/prediksi_mahasiswa_matematika', [KlasifikasiC45MatematikaController::class, 'prediksi_mahasiswa_matematika'])->name('prediksi_mahasiswa_matematika');
  Route::post('/prediksi_mahasiswa_matematika', [KlasifikasiC45MatematikaController::class, 'prediksi_mahasiswa_matematika'])->name('prediksi_mahasiswa_matematika');
  Route::get('/prediksi_per_mahasiswa_matakuliah_matematika_mahasiswa',[PediksiPerMahasiswaKlasifikasiC45MatematikaController::class, 'prediksi_per_mahasiswa_jurusan_matematika'])->name('prediksi_per_mahasiswa_matakuliah_matematika_mahasiswa');
  
});

Route::middleware(['auth', 'shareMahasiswaData','teknik_tambang'])->group(function () {
  Route::get('/dashboard_teknik_tambang', [DashboardController::class, 'teknik_tambang'])->name('dashboard_teknik_tambang');
 
  Route::get('/jumlah_mahasiswa_kelamin_teknik_tambang', [MahasiswaTeknikTambangController::class, 'jumlah_mahasiswa_kelamin_teknik_tambang'])->name('jumlah_mahasiswa_kelamin_teknik_tambang');
  Route::get('/jumlah_mahasiswa_status_teknik_tambang', [MahasiswaTeknikTambangController::class, 'jumlah_mahasiswa_status_teknik_tambang'])->name('jumlah_mahasiswa_status_teknik_tambang');
  Route::get('/jumlah_mahasiswa_jurusan_teknik_tambang', [MahasiswaTeknikTambangController::class, 'jumlah_mahasiswa_jurusan_teknik_tambang'])->name('jumlah_mahasiswa_jurusan_teknik_tambang');
  Route::get('/jumlah_mahasiswa_jenis_seleksi_teknik_tambang', [MahasiswaTeknikTambangController::class, 'jumlah_mahasiswa_jenis_seleksi_teknik_tambang'])->name('jumlah_mahasiswa_jenis_seleksi_teknik_tambang');
  Route::get('/jumlah_mahasiswa_propinsi_teknik_tambang', [MahasiswaTeknikTambangController::class, 'jumlah_mahasiswa_propinsi_teknik_tambang'])->name('jumlah_mahasiswa_propinsi_teknik_tambang');
  Route::get('/jumlah_mahasiswa_kota_teknik_tambang', [MahasiswaTeknikTambangController::class, 'jumlah_mahasiswa_kota_teknik_tambang'])->name('jumlah_mahasiswa_kota_teknik_tambang');
  Route::get('/jumlah_mahasiswa_jenis_sekolah_teknik_tambang', [MahasiswaTeknikTambangController::class, 'jumlah_mahasiswa_jenis_sekolah_teknik_tambang'])->name('jumlah_mahasiswa_jenis_sekolah_teknik_tambang');
  Route::get('/jumlah_mahasiswa_satuan_kredit_semester_teknik_tambang', [MahasiswaTeknikTambangController::class, 'jumlah_mahasiswa_satuan_kredit_semester_teknik_tambang'])->name('jumlah_mahasiswa_satuan_kredit_semester_teknik_tambang');
  Route::get('/jumlah_mahasiswa_indeks_prestasi_kumulatif_teknik_tambang', [MahasiswaTeknikTambangController::class, 'jumlah_mahasiswa_indeks_prestasi_kumulatif_teknik_tambang'])->name('jumlah_mahasiswa_indeks_prestasi_kumulatif_teknik_tambang');
  Route::get('/jumlah_mahasiswa_matakuliah_teknik_tambang', [MatakuliahController::class, 'jumlah_mahasiswa_matakuliah_teknik_tambang'])->name('jumlah_mahasiswa_matakuliah_teknik_tambang');

  Route::get('/klasifikasi_c45_mahasiswa_teknik_tambang', [KlasifikasiC45TeknikTambangController::class, 'klasifikasi_mahasiswa_teknik_tambang'])->name('klasifikasi_c45_mahasiswa_teknik_tambang');
  Route::post('/klasifikasi_c45_mahasiswa_teknik_tambang', [KlasifikasiC45TeknikTambangController::class, 'klasifikasi_mahasiswa_teknik_tambang'])->name('klasifikasi_c45_mahasiswa_teknik_tambang');
  Route::get('/prediksi_mahasiswa_teknik_tambang', [KlasifikasiC45TeknikTambangController::class, 'prediksi_mahasiswa_teknik_tambang'])->name('prediksi_mahasiswa_teknik_tambang');
  Route::post('/prediksi_mahasiswa_teknik_tambang', [KlasifikasiC45TeknikTambangController::class, 'prediksi_mahasiswa_teknik_tambang'])->name('prediksi_mahasiswa_teknik_tambang');
  Route::get('/prediksi_per_mahasiswa_matakuliah_teknik_tambang_mahasiswa',[PediksiPerMahasiswaKlasifikasiC45TeknikTambangController::class, 'prediksi_per_mahasiswa_jurusan_teknik_tambang'])->name('prediksi_per_mahasiswa_matakuliah_teknik_tambang_mahasiswa');
});

// Rute untuk pengguna yang belum login (guest)
Route::middleware('guest')->group(function () {
  Route::get('/', [LoginController::class, 'index'])->name('login');
  Route::post('/log', [LoginController::class, 'login'])->name('login.store');
  Route::get('/register', [RegisterController::class, 'register'])->name('register');
  Route::post('/regist', [RegisterController::class, 'store'])->name('register.store');
  Route::get('/forgot', [ForgotController::class, 'index'])->name('forgot');
  Route::post('/forg', [ForgotController::class, 'store'])->name('forgot.store');
  // Confirm Password
    Route::get('/forgot/confirm_password', [ForgotController::class, 'confirm_password'])
        ->name('forgot.confirm_password'); // GET → tampilkan form confirm_password
    Route::post('/forgot/confirm_password', [ForgotController::class, 'confirm_password']); // POST → submit password baru

});

Route::get('/logout/{guard}', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
Route::post('/logout/{guard}', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
// Rute logout yang bisa diakses oleh pengguna yang sudah login
//Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
