@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Berikan nilai pada destinasi</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('recomendasi.simpan') }}" method="POST">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th>Destinasi \ Kriteria</th>
                                @foreach($criterias as $c)
                                    <th>{{ $c->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($destinations as $d)
                                <tr>
                                    <th>{{ $d->name }}</th>
                                    @foreach($criterias as $c)
                                        <td>
                                            <input required
                                                type="number"
                                                step="any"
                                                min="1"
                                                max="100"
                                                name="scores[{{ $d->id }}][{{ $c->id }}]"
                                                class="form-control form-control-sm @error("scores.{$d->id}.{$c->id}") is-invalid @enderror" 
                                                value="{{ old("scores.{$d->id}.{$c->id}", \App\Models\Recomendasi::where('destination_id', $d->id)->where('criteria_id', $c->id)->value('value')) }}">
                                            @error("scores.{$d->id}.{$c->id}")
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 text-end">
                    <button type="submit" class="btn btn-success px-4">💾 Simpan Skor</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
