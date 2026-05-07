
<?php
use App\Http\Controllers\DosenPediksiPerMahasiswaKlasifikasiC45Controller;
use App\Http\Controllers\DosenKlasifikasiC45Controller;
use App\Http\Controllers\DosenMahasiswaTeknikInformatikaController;
use App\Http\Controllers\DosenMahasiswaSistemInformasiController;
use App\Http\Controllers\DosenMahasiswaAgribisnisController;
use App\Http\Controllers\DosenMahasiswaBiologiController;
use App\Http\Controllers\DosenMahasiswaFisikaController;
use App\Http\Controllers\DosenMahasiswaKimiaController;
use App\Http\Controllers\DosenMahasiswaMatematikaController;
use App\Http\Controllers\DosenMahasiswaTeknikTambangController;

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