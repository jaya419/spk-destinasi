@extends('layouts.app')
@section('title', 'Rekomendasi')
@section('content')
<div class="container py-4">
    <div class="card shadow-sm rounded-3 border-0">
        <div class="card-header bg-primary text-white rounded-top-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-semibold">
                <i class="bi bi-geo-alt-fill me-2"></i>Hasil Rekomendasi Destinasi Wisata
            </h5>
        </div>
        <div class="card-body p-4">
            @if(count($results) > 0)
                <div class="table-responsive mb-4">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 10%;" class="text-center">Ranking</th>
                                <th>Destinasi Wisata</th>
                                <th style="width: 20%;" class="text-center">Skor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $i => $res)
                                <tr class="{{ $i == 0 ? 'table-success' : '' }}">
                                    <td class="text-center">
                                        <span class="badge 
                                            @if($i == 0) bg-success
                                            @elseif($i == 1) bg-primary
                                            @elseif($i == 2) bg-info
                                            @else bg-secondary
                                            @endif
                                            rounded-pill fw-semibold px-3 py-1">
                                            {{ $i + 1 }}
                                        </span>
                                    </td>
                                    <td>{{ $res['destination'] }}</td>
                                    <td class="text-center fw-semibold 
                                        @if($i == 0) text-success
                                        @else text-primary
                                        @endif">
                                        {{ number_format($res['score'], 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="alert alert-success border-start border-success border-4 bg-success-light mb-4">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-trophy-fill me-3 fs-4 text-success"></i>
                        <div>
                            <h6 class="fw-bold mb-1 text-success">Rekomendasi Terbaik</h6>
                            <p class="mb-0">
                                <span class="fw-semibold">{{ $results[0]['destination'] }}</span> 
                                memiliki skor tertinggi sebesar 
                                <span class="fw-semibold">{{ number_format($results[0]['score'], 2) }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-info bg-info-light border-info">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-info-circle-fill me-3 fs-4 text-info"></i>
                        <div>
                            <h6 class="fw-bold mb-1 text-info">Data Tidak Tersedia</h6>
                            <p class="mb-0">Belum ada data skor yang dapat dihitung. Silakan masukkan nilai terlebih dahulu.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
@if(count($results) > 0)
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const data = @json($results);
    const labels = data.map(r => r.destination);
    const scores = data.map(r => r.score);
    const maxScore = Math.max(...scores);

    const backgroundColors = scores.map((score, index) => {
        if (index === 0) return 'rgba(40, 167, 69, 0.7)';
        return 'rgba(13, 110, 253, 0.5)';
    });
    
    const borderColors = scores.map((score, index) => {
        if (index === 0) return 'rgba(40, 167, 69, 1)';
        return 'rgba(13, 110, 253, 1)';
    });

    const ctx = document.getElementById('chart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Nilai Rekomendasi',
                data: scores,
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1,
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: context => `${context.dataset.label}: ${context.parsed.y.toFixed(2)}`
                    }
                },
                legend: { 
                    display: false 
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false,
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    title: {
                        display: true,
                        text: 'Skor',
                        font: { 
                            weight: '600',
                            size: 13
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Destinasi Wisata',
                        font: { 
                            weight: '600',
                            size: 13
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
@endif

<style>
    .bg-success-light {
        background-color: rgba(40, 167, 69, 0.1) !important;
    }
    .bg-info-light {
        background-color: rgba(23, 162, 184, 0.1) !important;
    }
    .table-success {
        --bs-table-bg: rgba(40, 167, 69, 0.05);
        --bs-table-striped-bg: rgba(40, 167, 69, 0.05);
    }
</style>