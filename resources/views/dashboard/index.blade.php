@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        {{-- Header Section --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden header-card">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="text-white fw-bolder mb-2 text-center text-md-start">
                            <i class="fas fa-clipboard-list me-3 bounce-in"></i> SISTEM PENDUKUNG KEPUTUSAN
                        </h3>
                        <h5 class="text-white text-opacity-75 mb-3 text-center text-md-start">
                            <i class="fas fa-calculator me-3 bounce-in-2"></i> Penentuan Siswa Berprestasi Metode SAW
                        </h5>
                        <h5 class="text-white text-opacity-75 lead mb-0 text-center text-md-start">
                            <i class="fas fa-user-shield me-2"></i> Selamat datang, Admin! Berikut ringkasan data dan hasil penilaian siswa berprestasi di SMAN 1 Parteng.
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        {{-- Statistics Cards Section --}}
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-3 statistic-card">
                    <div class="card-header text-white py-3 bg-primary-dark rounded-top-3">
                        <h6 class="mb-0 fw-semibold text-center">
                            <i class="fas fa-sliders-h me-2"></i> Total Kriteria
                        </h6>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center p-4">
                        <div class="display-3 fw-bold text-primary-dark me-3">{{ $criteriaCount }}</div>
                        <i class="fas fa-sliders-h fa-3x text-primary-light"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-3 statistic-card">
                    <div class="card-header bg-success-dark text-white py-3 rounded-top-3">
                        <h6 class="mb-0 fw-semibold text-center">
                            <i class="fas fa-users me-2"></i> Total Siswa
                        </h6>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center p-4">
                        <div class="display-3 fw-bold text-success-dark me-3">{{ $studentCount }}</div>
                        <i class="fas fa-users fa-3x text-success-light"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-3 statistic-card">
                    <div class="card-header text-white py-3 bg-info-dark rounded-top-3">
                        <h6 class="mb-0 fw-semibold text-center">
                            <i class="fas fa-table me-2"></i> Total Penilaian
                        </h6>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center p-4">
                        <div class="display-3 fw-bold text-info-dark me-3">{{ $scoreCount }}</div>
                        <i class="fas fa-table fa-3x text-info-light"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Recent Students & Top Students Section --}}
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 h-100 rounded-4">
                    <div class="card-header bg-white border-bottom-0 py-4 px-4 rounded-top-4">
                        <h5 class="fw-bold mb-0 text-primary-dark">
                            <i class="fas fa-user-clock me-2"></i> Siswa Baru Ditambahkan
                        </h5>
                    </div>
                    <div class="card-body px-4 pb-4">
                        @forelse ($recentStudents as $student)
                            <div class="d-flex align-items-center mb-3 p-3 bg-light rounded-3 transition-hover recent-student-item">
                                <div class="avatar bg-primary-light text-white rounded-circle me-3 flex-shrink-0">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 fw-bold text-dark">{{ $student->name }}</h6>
                                    <small class="text-muted">
                                        <i class="far fa-clock me-1"></i> Ditambahkan {{ $student->created_at->diffForHumans() }}
                                    </small>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5">
                                <i class="fas fa-user-slash fa-4x text-muted mb-3"></i>
                                <p class="text-muted fs-5">Belum ada siswa terbaru</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-lg border-0 h-100 rounded-4">
                    <div class="card-header bg-white border-bottom-0 py-4 px-4 rounded-top-4">
                        <h5 class="fw-bold mb-0 text-primary-dark">
                            <i class="fas fa-trophy me-2"></i> Top 3 Siswa Berprestasi
                        </h5>
                    </div>
                    <div class="card-body px-4 pb-4">
                        @forelse ($topStudents as $index => $item)
                            <div class="d-flex align-items-center mb-3 p-3 bg-light rounded-3 transition-hover top-student-item">
                                <div class="rank-circle me-3 flex-shrink-0
                                    @if ($index === 0) bg-gold-medal
                                    @elseif ($index === 1) bg-silver-medal
                                    @else bg-bronze-medal @endif">
                                    <span class="text-white fw-bolder">{{ $index + 1 }}</span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 fw-bold text-dark">{{ $item['student'] }}</h6>
                                    <small class="text-muted">
                                        <i class="fas fa-star me-1 text-warning-score"></i> Skor: {{ number_format($item['score'], 2) }}
                                    </small>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5">
                                <i class="fas fa-chart-line fa-4x text-muted mb-3"></i>
                                <p class="text-muted fs-5">Belum ada data penilaian siswa</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Google Fonts Import (Add this to your main CSS or layout head if not already present) */
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&family=Poppins:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif; /* A modern, clean sans-serif font */
            background-color: #f0f2f5; /* Light gray background */
        }

        /* Custom Colors */
        .bg-primary-dark { background-color: #2c3e50 !important; } /* Deep Slate Blue */
        .text-primary-dark { color: #2c3e50 !important; }

        .bg-primary-light { background-color: #34495e !important; } /* Lighter Slate Blue */
        .text-primary-light { color: #34495e !important; }

        .bg-success-dark { background-color: #27ae60 !important; } /* Emerald Green */
        .text-success-dark { color: #27ae60 !important; }

        .bg-success-light { background-color: #2ecc71 !important; } /* Lighter Emerald Green */
        .text-success-light { color: #2ecc71 !important; }

        .bg-info-dark { background-color: #2980b9 !important; } /* Belize Hole Blue */
        .text-info-dark { color: #2980b9 !important; }

        .bg-info-light { background-color: #3498db !important; } /* Lighter Belize Hole Blue */
        .text-info-light { color: #3498db !important; }

        .text-warning-score { color: #f39c12 !important; } /* Sunflower Yellow */

        .bg-gold-medal { background-color: #FFD700; } /* Gold */
        .bg-silver-medal { background-color: #C0C0C0; } /* Silver */
        .bg-bronze-medal { background-color: #CD7F32; } /* Bronze */

        /* General Card Styles */
        .card {
            border-radius: 0.75rem !important; /* Slightly more rounded corners */
            transition: all 0.3s ease-in-out;
        }

        .shadow-custom {
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1) !important; /* Softer, larger shadow */
        }
        .shadow-lg {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important; /* Enhanced shadow for main cards */
        }
        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important; /* Lighter shadow for smaller cards */
        }

        /* Header Card Specific Styles */
        .header-card {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); /* Gradient background */
            position: relative;
            overflow: hidden;
        }

        .header-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://www.transparenttextures.com/patterns/binding-dark.png'); /* Subtle texture */
            opacity: 0.1;
            pointer-events: none;
        }

        /* Statistic Card Specific Styles */
        .statistic-card .card-body {
            min-height: 120px; /* Ensure consistent height */
        }

        /* Recent and Top Students Card Styles */
        .recent-student-item, .top-student-item {
            background-color: #ffffff; /* White background for list items */
            border: 1px solid #e9ecef;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .recent-student-item:hover, .top-student-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08);
        }

        /* Icon & Avatar Styles */
        .avatar {
            width: 48px; /* Slightly larger avatar */
            height: 48px;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .rank-circle {
            width: 42px; /* Larger rank circle */
            height: 42px;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Animations */
        @keyframes bounceIn {
            0%, 20%, 40%, 60%, 80%, 100% {
                animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
            }
            0% {
                opacity: 0;
                transform: scale3d(.3, .3, .3);
            }
            20% {
                transform: scale3d(1.1, 1.1, 1.1);
            }
            40% {
                transform: scale3d(.9, .9, .9);
            }
            60% {
                opacity: 1;
                transform: scale3d(1.03, 1.03, 1.03);
            }
            80% {
                transform: scale3d(.97, .97, .97);
            }
            100% {
                opacity: 1;
                transform: scale3d(1, 1, 1);
            }
        }

        .bounce-in {
            animation: bounceIn 1s ease-out both;
        }
        .bounce-in-2 {
            animation: bounceIn 1s ease-out 0.2s both; /* Slight delay */
        }
    </style>
@endsection