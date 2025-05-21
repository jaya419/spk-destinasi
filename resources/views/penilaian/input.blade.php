@extends('layouts.app')

@section('title', 'Input Penilaian Siswa')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-3">
        {{-- Card Header for "Input Nilai Siswa" --}}
        <div class="card-header text-white rounded-top-3 py-3" style="background-color: #34495e;">
            <div class="d-flex justify-content-between align-items-center">
                {{-- Title with a relevant icon for inputting scores --}}
                <h4 class="mb-0 fw-bold text-center"><i class="fas fa-clipboard-check me-2"></i>Input Nilai Siswa Berdasarkan Kriteria</h4>
            </div>
        </div>
        <div class="card-body p-4">
            {{-- Form for inputting student scores --}}
            <form action="{{ route('penilaian.simpan') }}" method="POST">
                @csrf {{-- CSRF token for security --}}

                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-hover align-middle rounded-3 overflow-hidden">
                        <thead class="bg-light text-dark text-center fw-bold">
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th style="min-width: 150px;">Nama Siswa</th>
                                @foreach($criterias as $c)
                                    <th>{{ $c->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $s)
                                <tr>
                                    <td class="text-center" style="font-weight: bold;">{{ $loop->iteration }}</td>
                                    <th class="text-start">{{ $s->name }}</th>
                                    @foreach($criterias as $c)
                                        <td>
                                            <input required
                                                type="number"
                                                step="any"
                                                min="1"
                                                max="100"
                                                name="scores[{{ $s->id }}][{{ $c->id }}]"
                                                class="form-control form-control-lg text-center @error('scores.' . $s->id . '.' . $c->id) is-invalid @enderror"
                                                value="{{ old('scores.' . $s->id . '.' . $c->id, \App\Models\Penilaian::where('student_id', $s->id)->where('criteria_id', $c->id)->value('value')) }}"
                                                placeholder="0-100">
                                            @error('scores.' . $s->id . '.' . $c->id)
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ count($criterias) + 2 }}" class="text-center text-muted py-4">
                                        <i class="fas fa-exclamation-circle me-2"></i>Belum ada siswa atau kriteria yang terdaftar.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-between pt-3">
                    {{-- Back button --}}
                    <a href="{{ route('students.index') }}" class="btn btn-secondary px-4 rounded-pill shadow-sm">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Siswa
                    </a>
                    {{-- Save button --}}
                    <button type="submit" class="btn btn-primary px-4 rounded-pill shadow-sm">
                        <i class="fas fa-save me-2"></i> Simpan Nilai
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
