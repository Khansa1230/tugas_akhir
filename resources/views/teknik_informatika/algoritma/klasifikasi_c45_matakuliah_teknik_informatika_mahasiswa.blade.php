@extends('teknik_informatika.kerangka.master')
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
                    <span class="text-muted">Klasifikasi Algoritma C45 Jurusan Teknik Informatika</span> - 
                    <a href="{{ route('prediksi_mahasiswa_teknik_informatika') }}" 
                    style="text-decoration: none; color: inherit;">
                        Prediksi Jurusan Teknik Informatika
                    </a>
                </h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('klasifikasi_c45_mahasiswa_teknik_informatika') }}">
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

        {{-- ======== HASIL ENTROPY ======== --}}
        <div class="card">
            <div class="card-header">
                <h4 class="display-4 mb-0 text">Hasil Gain Entropy</h4>
            </div>
            <div class="card-body">
                @if (!empty($outputData['entropy_gain']) && is_array($outputData['entropy_gain']))
                    @foreach ($outputData['entropy_gain'] as $index => $item)
                        <div class="entropy-item mb-4">
                            <h5 class="text">=== TABEL ENTROPY GAIN ITEM {{ $index }} ===</h5>

                            {{-- Distribusi Data Pangkas --}}
                            @if (!empty($item['distribusi']))
                                <h6 class="text">Distribusi Data Pangkas:</h6>
                                <pre class="text">{!! $item['distribusi'] !!}</pre>
                            @endif

                            {{-- Tabel Gain Entropy --}}
                            @if (!empty($item['html']))
                                <h6 class="text">Gain Entropy:</h6>
                                <div class="text">{!! $item['html'] !!}</div>
                            @endif

                            <hr>
                        </div>
                    @endforeach
                @else
                    <p class="text no-data">Tidak ada data gain entropy yang dapat ditampilkan.</p>
                @endif
            </div>
        </div>

    </section>
</div>
@endsection

<script>
    // Simpan nilai filter saat halaman dimuat
    const yearSelect = document.getElementById('year');
    const storedYear = localStorage.getItem('selectedYear');
    if (storedYear) {
        yearSelect.value = storedYear;
    }
    yearSelect.addEventListener('change', function() {
        localStorage.setItem('selectedYear', this.value);
    });
</script>