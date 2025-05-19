@extends('layouts.app')
@section('title', 'Kriteria')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">📝 Tambah Kriteria</h5>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Oops!</strong> Ada kesalahan pada input:<br><br>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('criteria.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kriteria</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Contoh: Harga, Jarak, Fasilitas" required>
                        </div>

                        <div class="mb-3">
                            <label for="weight" class="form-label">Bobot (1 - 100)</label>
                            <input type="number" name="weight" id="weight" class="form-control" placeholder="Contoh: 20" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe Kriteria</label>
                            <select name="type" id="type" class="form-select" required>
                                <option value="">-- Pilih Tipe --</option>
                                <option value="cost">Cost (Semakin rendah semakin baik)</option>
                                <option value="benefit">Benefit (Semakin tinggi semakin baik)</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('criteria.index') }}" class="btn btn-secondary">← Kembali</a>
                            <button type="submit" class="btn btn-primary shadow-sm">💾 Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
