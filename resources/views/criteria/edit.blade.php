@extends('layouts.app')

@section('title', 'Edit Kriteria')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                {{-- Card Header for "Edit Kriteria" --}}
                <div class="card-header text-white rounded-top-3 py-3" style="background-color: #34495e;">
                    {{-- Using an edit icon --}}
                    <h4 class="mb-0 fw-bold text-center"><i class="fas fa-edit me-2"></i>Edit Kriteria Penilaian</h4>
                </div>
                <div class="card-body p-4">

                    {{-- Error message display area --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h6 class="alert-heading fw-bold"><i class="fas fa-exclamation-triangle me-2"></i>Terjadi Kesalahan Input!</h6>
                            <ul class="mb-0 mt-2 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Form for editing criteria --}}
                    <form method="POST" action="{{ route('criteria.update', $criterion->id) }}">
                        @csrf
                        @method('PUT')

                        {{-- Input field for Kriteria Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nama Kriteria <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control form-control-lg"
                                value="{{ old('name', $criterion->name) }}" placeholder="Contoh: Nilai Akademik" required>
                        </div>

                        {{-- Input field for Kriteria Weight --}}
                        <div class="mb-3">
                            <label for="weight" class="form-label fw-bold">Bobot Kriteria (%) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="weight" id="weight" class="form-control form-control-lg"
                                value="{{ old('weight', $criterion->weight) }}" placeholder="Contoh: 30.00" min="0" max="100" required>
                        </div>

                        {{-- Select field for Kriteria Type --}}
                        <div class="mb-4">
                            <label for="type" class="form-label fw-bold">Tipe Kriteria <span class="text-danger">*</span></label>
                            <select name="type" id="type" class="form-select form-select-lg" required>
                                <option value="">-- Pilih Tipe Kriteria --</option>
                                <option value="benefit" {{ old('type', $criterion->type) == 'benefit' ? 'selected' : '' }}>
                                    Benefit (Semakin besar nilainya, semakin baik)
                                </option>
                                <option value="cost" {{ old('type', $criterion->type) == 'cost' ? 'selected' : '' }}>
                                    Cost (Semakin kecil nilainya, semakin baik)
                                </option>
                            </select>
                        </div>

                        {{-- Action buttons: Back and Save --}}
                        <div class="d-grid gap-2 d-md-flex justify-content-md-between pt-3">
                            <a href="{{ route('criteria.index') }}" class="btn btn-secondary px-4 rounded-pill">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-primary px-4 rounded-pill shadow-sm">
                                <i class="fas fa-save me-2"></i>Perbarui Kriteria
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
