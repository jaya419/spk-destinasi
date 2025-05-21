@extends('layouts.app')

@section('title', 'Daftar Siswa')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-3">
        {{-- Card Header for "Daftar Siswa" --}}
        <div class="card-header text-white rounded-top-3 py-3" style="background-color: #34495e;">
            <div class="d-flex justify-content-between align-items-center">
                {{-- Title with a relevant icon for student list --}}
                <h4 class="mb-0 fw-bold"><i class="fas fa-users me-2"></i>Daftar Siswa</h4>
                {{-- "Tambah Siswa" button, styled consistently with new design --}}
            <a href="{{ route('students.create') }}" class="btn btn-light btn-sm shadow-sm fw-bold">
                <i class="fas fa-plus-circle me-1"></i>Tambah Kriteria
            </a>
            </div>
        </div>
        <div class="card-body p-4">
            {{-- Table for displaying student data --}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle rounded-3 overflow-hidden">
                    <thead class="bg-light text-dark text-center fw-bold">
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Deskripsi</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td class="text-center">
                                    {{-- Iteration badge, styled with rounded corners --}}
                                    <span class="badge rounded-pill px-2 py-1" style="background-color: #34495e;">{{ $loop->iteration }}</span>
                                </td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->class }}</td>
                                <td>{{ $student->description }}</td>
                                <td class="text-center">
                                    {{-- Edit button, styled with rounded pills and icon --}}
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm px-3 rounded-pill me-1" title="Edit Siswa">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    {{-- Delete form and button, styled with rounded pills and icon --}}
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus siswa ini? Data yang terhapus tidak dapat dikembalikan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm px-3 rounded-pill" title="Hapus Siswa">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            {{-- Message when no student data is available --}}
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    <i class="fas fa-info-circle me-2"></i>Belum ada data siswa yang tersedia. Silakan tambahkan siswa baru.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- Button to navigate to Penilaian calculation --}}
            <div class="mt-4 text-center">
                <a href="{{ route('penilaian.input') }}" class="btn btn-primary px-5 rounded-pill shadow-sm">
                    <i class="fas fa-calculator me-2"></i> Lanjutkan ke Penilaian
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
