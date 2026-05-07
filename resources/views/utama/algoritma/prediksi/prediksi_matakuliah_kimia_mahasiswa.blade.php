@extends('utama.kerangka.master')

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
                <h4 class="mb-0" style="font-size: 1.2rem;">
                    <a href="{{ route('klasifikasi_c45_mahasiswa_jurusan_kimia') }}" 
                    style="text-decoration: none; color: inherit;">
                    Klasifikasi Algoritma C45 Jurusan Kimia
                    </a>
                    <span class="text-muted">- Prediksi Jurusan Kimia</span>
                </h4>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('prediksi_mahasiswa_jurusan_kimia') }}">
                    @csrf
                    <div class="form-group">
                        @php
                            // Menghitung nilai uji berdasarkan nilai yang dipilih
                            $predictedLulus = old('predicted_lulus', $predictedLulus);
                            $trainingValue = $predictedLulus;
                            $testingValue = 100 - $predictedLulus; // Misalkan total 100
                        @endphp

                        <label for="predicted_lulus" class="mb-0 mr-3 text">
                            Training {{ $trainingValue }} dan Uji {{ $testingValue }}:
                        </label>

                        <select name="predicted_lulus" id="predicted_lulus" class="form-control text">
                            <option class="text" value="">Pilih Prediksi Lulus</option>
                            @foreach(range(10, 100, 10) as $value)
                                <option class="text" value="{{ $value }}" {{ old('predicted_lulus', $predictedLulus) == $value ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>

        </div>


        <div class="card">
            <div class="card-header">
                <h4 class="display-4 mb-0">Hasil Analisis Teks Pohon Keputusan</h4>
            </div>
            <div class="card-body">
                @if(!empty($outputData['tree_text']))
                    <pre class="text">{{ $outputData['tree_text'] }}</pre>
                @else
                    <p class="text-muted mb-0" style="font-size: 1.1rem; text-align: left;">
                        Belum ada hasil analisis yang ditampilkan.
                    </p>
                @endif
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
                @if(!empty($outputData['rules_lulus']))
                    <ol class="rules-list">
                        @foreach($outputData['rules_lulus'] as $index => $rule)
                            <li><pre class="rule-item">{{ implode(' → ', $rule) }} => Lulus</pre></li>
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
                @if(!empty($outputData['rules_belum_lulus']))
                    <ol class="rules-list">
                        @foreach($outputData['rules_belum_lulus'] as $index => $rule)
                            <li><pre class="rule-item">{{ implode(' → ', $rule) }} => Belum Lulus</pre></li>
                        @endforeach
                    </ol>
                @else
                    <div class="text-muted">Tidak ada jalur menuju Belum Lulus.</div>
                @endif
            </div>
        </div>

        <!-- Card untuk menampilkan akurasi -->
        <div class="card mt-4">
            <div class="card-body">
                <!-- Tabel 1 -->
                <div class="table-responsive mb-5">
                    <h5 class="mb-3"><strong>Confusion Matrix</strong></h5>
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th></th>
                                <th class="text">Prediksi Lulus</th>
                                <th class="text">Prediksi Tidak Lulus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text">Sebenarnya Lulus</td>
                                <td class="text">{{ isset($outputData['TP']) ? $outputData['TP'] : '-' }}</td>
                                <td class="text">{{ isset($outputData['FN']) ? $outputData['FN'] : '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text">Sebenarnya Tidak Lulus</td>
                                <td class="text">{{ isset($outputData['FP']) ? $outputData['FP'] : '-' }}</td>
                                <td class="text">{{ isset($outputData['TN']) ? $outputData['TN'] : '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Tabel 2 -->
                <div class="table-responsive">
                    <h5 class="mb-3"><strong>Hasil Model</strong></h5>
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th class="text">Precision</th>
                                <th class="text">Accuracy</th>
                                <th class="text">Recall</th>
                                <th class="text">F1 Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text"><strong>{{ number_format($outputData['precision'], 2) }}%</strong></td>
                                <td class="text"><strong>{{ number_format($outputData['accuracy'], 2) }}%</strong></td>
                                <td class="text"><strong>{{ number_format($outputData['recall'], 2) }}%</strong></td>
                                <td class="text"><strong>{{ number_format($outputData['f1_score'], 2) }}%</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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