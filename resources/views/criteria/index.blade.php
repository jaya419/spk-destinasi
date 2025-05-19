@extends('layouts.app')
@section('title', 'Kriteria')
@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <h5 class="mb-0">Daftar Kriteria</h5>
            <a href="{{ route('criteria.create') }}" class="btn btn-light btn-sm shadow-sm">
                + Tambah Kriteria
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Keterangan</th>
                            <th>Bobot</th>
                            <th>Tipe</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($criteria as $c)
                        <tr>
                            <td class="text-center">
                                <span class="badge bg-primary">{{ $loop->iteration }}</span>
                            </td>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->weight }}%</td>
                            <td>
                                @if($c->type == 'benefit')
                                    <span class="badge bg-success">Benefit</span>
                                @else
                                    <span class="badge bg-danger">Cost</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('criteria.edit', $c->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('criteria.destroy', $c->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus kriteria ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data kriteria.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
