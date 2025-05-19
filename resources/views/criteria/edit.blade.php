@extends('layouts.app')
@section('title', 'Kriteria')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">✏️ Edit Kriteria</h5>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Terjadi kesalahan!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('criteria.update', $criterion->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kriteria</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $criterion->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="weight" class="form-label">Bobot (1 - 100)</label>
                            <input type="number" step="0.01" name="weight" id="weight" class="form-control" value="{{ $criterion->weight }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe Kriteria</label>
                            <select name="type" id="type" class="form-select" required>
                                <option value="">-- Pilih Tipe --</option>
                                <option value="cost" {{ $criterion->type == 'cost' ? 'selected' : '' }}>Cost (Semakin kecil semakin baik)</option>
                                <option value="benefit" {{ $criterion->type == 'benefit' ? 'selected' : '' }}>Benefit (Semakin besar semakin baik)</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('criteria.index') }}" class="btn btn-secondary">← Kembali</a>
                            <button type="submit" class="btn btn-success shadow-sm">💾 Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
