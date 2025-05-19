@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="mb-4">
        <h3 class="fw-bold">Selamat Datang, Admin 👋</h3>
        <p class="text-muted mb-0">Ini adalah halaman dashboard Sistem Rekomendasi Destinasi Wisata menggunakan Metode SAW (Simple Additive Weighting).</p>
    </div>
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-shape icon-md bg-primary bg-opacity-10 text-primary rounded-circle me-3">
                        <i class="bi bi-sliders fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Kriteria</h6>
                        <h4 class="mb-0 fw-bold">{{ $criteriaCount }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-shape icon-md bg-success bg-opacity-10 text-success rounded-circle me-3">
                        <i class="bi bi-geo-alt fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Destinasi</h6>
                        <h4 class="mb-0 fw-bold">{{ $destinationCount }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-shape icon-md bg-warning bg-opacity-10 text-warning rounded-circle me-3">
                        <i class="bi bi-bar-chart-line fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Skor</h6>
                        <h4 class="mb-0 fw-bold">{{ $scoreCount }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="fw-semibold mb-0">Destinasi baru ditambahkan</h5>
                </div>
                <div class="card-body">
                    @forelse ($recentDestinations as $dest)
                        <div class="d-flex align-items-start mb-3">
                            <div class="icon-shape icon-sm bg-primary bg-opacity-10 text-primary rounded-circle me-3">
                                <i class="bi bi-plus-lg fs-6"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-semibold">{{ $dest->name }}</h6>
                                <small class="text-muted">Ditambahkan {{ $dest->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada destinasi terbaru.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="fw-semibold mb-0">Top 3 Destinasi</h5>
                </div>
                <div class="card-body">
                    @forelse ($topDestinations as $index => $item)
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <span class="badge bg-primary bg-opacity-10 text-primary me-3 fs-6">{{ $index + 1 }}</span>
                                <div>
                                    <h6 class="mb-0 fw-semibold">{{ $item['destination'] }}</h6>
                                    <small class="text-muted">Skor: {{ $item['score'] }}</small>
                                </div>
                            </div>
                            @if ($index === 0)
                                <span class="badge bg-success bg-opacity-10 text-success">Rekomendasi</span>
                            @endif
                        </div>
                    @empty
                        <p class="text-muted">Belum ada perhitungan skor.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
