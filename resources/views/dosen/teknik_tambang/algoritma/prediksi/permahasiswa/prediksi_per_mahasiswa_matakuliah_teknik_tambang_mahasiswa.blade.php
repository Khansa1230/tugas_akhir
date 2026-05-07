@extends('dosen.teknik_tambang.kerangka.master')

@section('title', 'Dashboard')

@section('content')
<style>
    .text {
        font-size: 1.5rem;
    }
    .rules-list {
        padding-left: 20px;
    }

    #year {
    font-size: 1.5rem; /* tulisan yg tampil di box select */
    }

    #year option {
    font-size: 1.5rem; /* tulisan pilihan yg keluar pas klik */
    }

    .rule-item {
        white-space: pre-wrap;
        word-wrap: break-word;
        font-size: 1.5rem;
        margin-bottom: 10px;
        font-family: inherit;
    }
</style>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>
                    Prediksi Jurusan Teknik Pertambangan
                </h4>
            </div>
            <form method="GET" action="{{ route('dosen_prediksi_per_mahasiswa_matakuliah_teknik_tambang_mahasiswa') }}" id="filter-form">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nim" class="text">NIM Mahasiswa:</label>
                        <input type="number" name="nim" id="nim" class="form-control text"
                            placeholder="Masukkan NIM"
                            value="{{ old('nim', $nim ?? '') }}">
                    </div>

                    <div class="form-group">
                        @php
                            $predictedLulus = old('predicted_lulus', $predictedLulus ?? 0);
                            $trainingValue = $predictedLulus;
                            $testingValue = 100 - $predictedLulus;
                        @endphp

                        <label for="predicted_lulus" class="mb-0 mr-3 text">
                            Training {{ $trainingValue }} dan Uji {{ $testingValue }}:
                        </label>

                        <select name="predicted_lulus" id="predicted_lulus" class="form-control text">
                            <option class="text" value="">Pilih Prediksi Lulus</option>
                            @foreach(range(10, 100, 10) as $value)
                                <option class="text" value="{{ $value }}" {{ $predictedLulus == $value ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Status Prediksi Mahasiswa</h5>
            </div>
            <div class="card-body">
                <p class="text">
                    NIM: {{ $nim ?? 'Tidak ada' }} <br>
                    Status Prediksi: <strong class="text">{{ $statusPrediksi ?? '-' }}</strong>
                </p>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Hasil Data Mahasiswa</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table2">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>SKS</th>
                                <th>IPK</th>
                                <th>Indeks Prestasi Semester 1</th>
                                <th>Indeks Prestasi Semester 2</th>
                                <th>Indeks Prestasi Semester 3</th>
                                <th>Indeks Prestasi Semester 4</th>
                                <th>Indeks Prestasi Semester 5</th>
                                <th>Indeks Prestasi Semester 6</th>
                                <th>Indeks Prestasi Semester 7</th>
                                <th>Geologi Lapangan</th>
                                <th>Kuliah Lapangan 1</th>
                                <th>Kuliah Lapangan 2</th>
                                <th>Praktek Kerja Lapangan</th>
                                <th>Kuliah Kerja Nyata</th>
                                <th>Seminar</th>
                                <th>Jenis Sekolah</th>
                                <th>Yudisium</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty(request('nim')) && $results->isNotEmpty())
                                @foreach($results as $row)
                                    <tr>
                                        <td>{{ $row->nim }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->status_mahasiswa }}</td>
                                        <td>{{ $row->kategori_sks }}</td>
                                        <td>{{ $row->kategori_ipk }}</td>
                                        <td>{{ $row->ipsmt_1 }}</td>
                                        <td>{{ $row->ipsmt_2 }}</td>
                                        <td>{{ $row->ipsmt_3 }}</td>
                                        <td>{{ $row->ipsmt_4 }}</td>
                                        <td>{{ $row->ipsmt_5 }}</td>
                                        <td>{{ $row->ipsmt_6 }}</td>
                                        <td>{{ $row->ipsmt_7 }}</td>
                                        <td>{{ $row->kategori_geologi_lapangan }}</td>
                                        <td>{{ $row->kategori_kuliah_lapangan_1 }}</td>
                                        <td>{{ $row->kategori_kuliah_lapangan_2 }}</td>
                                        <td>{{ $row->kategori_pkl }}</td>
                                        <td>{{ $row->kategori_kkn }}</td>
                                        <td>{{ $row->kategori_seminar }}</td>
                                        <td>{{ $row->jenis_sekolah }}</td>
                                        <td>{{ $row->judisium }}</td>
                                    </tr>
                                @endforeach
                            @elseif(!empty(request('nim')))
                                <tr>
                                    <td colspan="12" class="text-center text-warning">
                                        Data tidak ditemukan untuk NIM tersebut.
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="12" class="text-center text-muted">
                                        Silakan masukkan NIM untuk menampilkan data mahasiswa.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <div class="card">
            <div class="card-header">
                <h4 class="display-4 mb-0">Hasil Analisis Teks Pohon Keputusan</h4>
            </div>
            <div class="card-body">
                <pre class="text">{!! $outputData['tree_text'] !!}</pre>
            </div>
        </div>


        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Visualisasi Decision Tree</h5>
            </div>
            <div class="card-body">
                @if(!empty($outputData['image_path']))
                    <div style="overflow-x: auto;">
                        <img src="{{ asset($outputData['image_path']) }}" alt="Decision Tree" style="min-width: 1000px;">
                    </div>
                @else
                    <p class="text-muted mb-0" style="font-size: 1.1rem; text-align: left;">
                        Belum ada visualisasi pohon keputusan yang ditampilkan.
                    </p>
                @endif
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h4 class="mb-0">Jalur Menuju <span class="text-success">Lulus</span></h4>
            </div>
            <div class="card-body">
                @if (!empty($outputData['rules_lulus']) && is_array($outputData['rules_lulus']))
                    <ol class="rules-list">
                        @foreach ($outputData['rules_lulus'] as $index => $rule)
                            <li>
                            <pre class="rule-item">{!! $rule !!}</pre>
                            </li>
                        @endforeach
                    </ol>
                @else
                    <div class="text-muted">Tidak ada jalur menuju Lulus.</div>
                @endif
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h4 class="mb-0">Jalur Menuju <span class="text-danger">Belum Lulus</span></h4>
            </div>
            <div class="card-body">
                @if (!empty($outputData['rules_belum_lulus']) && is_array($outputData['rules_belum_lulus']))
                    <ol class="rules-list">
                        @foreach ($outputData['rules_belum_lulus'] as $index => $rule)
                            <li>
                            <pre class="rule-item">{!! $rule !!}</pre>
                            </li>
                        @endforeach
                    </ol>
                @else
                    <div class="text-muted">Tidak ada jalur menuju Belum Lulus.</div>
                @endif
            </div>
        </div>



    </section>
</div>
@endsection

<script>
    // Simpan nilai filter saat halaman dimuat
    const yearSelect = document.getElementById ('year');
    const storedYear = localStorage.getItem('selectedYear');
    if (storedYear) {
        yearSelect.value = storedYear;
    }
    yearSelect.addEventListener('change', function() {
        localStorage.setItem('selectedYear', this.value);
    });
</script>