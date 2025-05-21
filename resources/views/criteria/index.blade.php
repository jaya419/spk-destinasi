@extends('layouts.app')

@section('title', 'Kriteria')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center text-white rounded-top-3" style="background-color: #34495e;">
            <h5 class="mb-0 fw-bold"><i class="fas fa-clipboard-list me-2"></i>Daftar Kriteria Penilaian</h5>
            <a href="{{ route('criteria.create') }}" class="btn btn-light btn-sm shadow-sm fw-bold">
                <i class="fas fa-plus-circle me-1"></i>Tambah Kriteria
            </a>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="text-center" style="background-color: #e9ecef;">
                        <tr>
                            <th scope="col" style="width: 60px;">No</th>
                            <th scope="col">Nama Kriteria</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Tipe</th>
                            <th scope="col" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($criteria as $c)
                        <tr>
                            <td class="text-center">
                                <span class="badge rounded-pill" style="background-color: #34495e;">{{ $loop->iteration }}</span>
                            </td>
                            <td>{{ $c->name }}</td>
                            <td class="text-center fw-bold">{{ number_format($c->weight) }}%</td>
                            <td class="text-center">
                                @if($c->type == 'benefit')
                                    <span class="badge bg-success"><i class="fas fa-arrow-alt-circle-up me-1"></i>Benefit</span>
                                @else
                                    <span class="badge bg-danger"><i class="fas fa-arrow-alt-circle-down me-1"></i>Cost</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('criteria.edit', $c->id) }}" class="btn btn-warning btn-sm me-1 rounded-pill" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('criteria.destroy', $c->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-pill" onclick="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">
                                <i class="fas fa-box-open me-2"></i>Belum ada data kriteria yang ditambahkan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection