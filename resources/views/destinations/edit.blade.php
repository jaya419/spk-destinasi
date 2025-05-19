@extends('layouts.app')
@section('title', 'Destinasi')
@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0">Edit Destinasi Wisata</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('destinations.update', $destination) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Destinasi</label>
                    <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $destination->name) }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description', $destination->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Lokasi</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $destination->location) }}">
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('destinations.index') }}" class="btn btn-secondary me-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-warning text-white">
                        <i class="fas fa-edit"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
