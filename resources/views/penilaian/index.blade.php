@extends('layouts.app')

@section('title', 'Hasil Penilaian Siswa')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-3">
        {{-- Card Header for "Hasil Penilaian Siswa Berprestasi" --}}
        <div class="card-header text-white rounded-top-3 py-3" style="background-color: #34495e;">
            <div class="d-flex justify-content-between align-items-center">
                {{-- Title with a relevant icon for assessment results --}}
                <h4 class="mb-0 fw-bold text-center"><i class="fas fa-award me-2"></i>Hasil Penilaian Siswa Berprestasi</h4>
            </div>
        </div>
        <div class="card-body p-4">
            @if(count($results) > 0)
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-hover align-middle rounded-3 overflow-hidden">
                        <thead class="bg-light text-dark text-center fw-bold">
                            <tr>
                                <th style="width: 10%;">No</th>
                                <th>Nama Siswa</th>
                                <th style="width: 20%;">Skor Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $i => $res)
                                {{-- Highlight the top-ranked student row --}}
                                <tr class="{{ $i == 0 ? 'table-primary-light' : '' }}">
                            <td class="text-center">
                                <span class="badge rounded-pill" style="background-color: #34495e;">{{ $loop->iteration }}</span>
                            </td>
                                    </td>
                                    <td>{{ $res['student'] }}</td>
                                    <td class="text-center fw-semibold text-primary">
                                        {{-- Score display, highlighted for the top student --}}
                                        <span class="{{ $i == 0 ? 'text-success' : '' }}">
                                            {{ number_format($res['score'], 2) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Alert for the top-ranked student --}}
                <div class="alert alert-success border-start border-success border-4 bg-success-light rounded-3 shadow-sm" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-trophy me-3 fs-4 text-success"></i> {{-- Trophy icon for the best student --}}
                        <div>

                            <p class="mb-0 text-dark">
                                <span class="fw-semibold">{{ $results[0]['student'] }}</span>
                                memiliki nilai tertinggi sebesar
                                <span class="fw-semibold">{{ number_format($results[0]['score'], 2) }}</span>. Selamat!
                            </p>
                        </div>
                    </div>
                </div>
            @else
                {{-- Alert when no assessment data is available --}}
                <div class="alert alert-info bg-info-light border-start border-info border-4 rounded-3 shadow-sm" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-info-circle me-3 fs-4 text-info"></i> {{-- Info icon for no data --}}
                        <div>
                            <h6 class="fw-bold mb-1 text-info">Data Tidak Tersedia</h6>
                            <p class="mb-0 text-dark">Belum ada data penilaian. Silakan input nilai terlebih dahulu.</p>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Back button at the bottom of the card body --}}
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('students.index') }}" class="btn btn-secondary px-4 rounded-pill shadow-sm">
                    <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Siswa
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Custom styles for light background colors and table row highlight --}}
<style>
    .bg-success-light {
        background-color: rgba(40, 167, 69, 0.1) !important;
    }
    .bg-info-light {
        background-color: rgba(23, 162, 184, 0.1) !important;
    }
    .table-primary-light {
        background-color: rgba(0, 123, 255, 0.05); /* A light blue for primary highlight */
    }
    /* Ensure text in alerts is readable against light backgrounds */
    .alert.bg-success-light .text-dark,
    .alert.bg-info-light .text-dark {
        color: #343a40 !important; /* Dark text for readability */
    }
</style>
@endsection
