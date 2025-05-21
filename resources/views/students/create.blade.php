@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                {{-- Card Header for "Tambah Data Siswa" --}}
                <div class="card-header text-white rounded-top-3 py-3" style="background-color: #34495e;">
                    {{-- Title with a relevant icon for adding a student --}}
                    <h4 class="mb-0 fw-bold text-center"><i class="fas fa-user-plus me-2"></i>Tambah Data Siswa</h4>
                </div>
                <div class="card-body p-4">

                    {{-- Error message display area, styled with dismissible alert --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h6 class="alert-heading fw-bold"><i class="fas fa-exclamation-triangle me-2"></i>Terjadi Kesalahan Input!</h6>
                            <ul class="mb-0 mt-2 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            {{-- Dismiss button for the alert --}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Form for adding new student data --}}
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf {{-- CSRF token for security --}}

                        {{-- Input field for Student Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nama Siswa <span class="text-danger">*</span></label>
                            {{-- 'old()' helper retains input value on validation error --}}
                            <input type="text" name="name" id="name" class="form-control form-control-lg" required value="{{ old('name') }}" placeholder="Contoh: Budi Santoso">
                        </div>

                        {{-- Input field for Student Class --}}
                        <div class="mb-3">
                            <label for="class" class="form-label fw-bold">Kelas</label>
                            <input type="text" name="class" id="class" class="form-control form-control-lg" value="{{ old('class') }}" placeholder="Contoh: XII IPA 1">
                        </div>

                        {{-- Textarea for Student Description --}}
                        <div class="mb-4">
                            <label for="description" class="form-label fw-bold">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control form-control-lg" rows="3" placeholder="Contoh: Kelas Fokus Robotik.">{{ old('description') }}</textarea>
                        </div>

                        {{-- Action buttons: Back and Save --}}
                        <div class="d-grid gap-2 d-md-flex justify-content-md-between pt-3">
                            {{-- Back button, styled with rounded pills and icon --}}
                            <a href="{{ route('students.index') }}" class="btn btn-secondary px-4 rounded-pill">
                                <i class="fas fa-arrow-left me-2"></i> Kembali
                            </a>
                            {{-- Save button, styled with rounded pills, shadow, and icon --}}
                            <button type="submit" class="btn btn-success px-4 rounded-pill shadow-sm">
                                <i class="fas fa-save me-2"></i> Simpan Data Siswa
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
