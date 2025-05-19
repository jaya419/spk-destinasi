@extends('layouts.app')
@section('title', 'Destinasi')
@section('content')
<div class="container py-4">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Destinasi Wisata</h5>
            <a href="{{ route('destinations.create') }}" class="btn btn-light btn-sm shadow-sm">
                <i class="fas fa-plus"></i> Tambah Destinasi
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Nama Destinasi</th>
                            <th>Deskripsi</th>
                            <th>Lokasi</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($destinations as $destination)
                            <tr>
                                <td class="text-center">
                                    <span class="badge bg-primary">{{ $loop->iteration }}</span>
                                </td>
                                <td>{{ $destination->name }}</td>
                                <td>{{ $destination->description }}</td>
                                <td>{{ $destination->location }}</td>
                                <td class="text-center">
                                    <a href="{{ route('destinations.edit', $destination) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('destinations.destroy', $destination) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data destinasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3 text-end">
                <a href="{{ route('recomendasi.input') }}" class="btn btn-outline-primary shadow-sm">
                    <i class="fas fa-calculator me-1"></i> Hitung Skor Destinasi
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
