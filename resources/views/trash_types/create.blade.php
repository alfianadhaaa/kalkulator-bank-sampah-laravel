@extends('layout')

@section('content')
    <h1 class="mt-4">Data Jenis Sampah</h1>
    <div class="container">
        <h3>Tambah Jenis Sampah</h3>
        <form method="POST" action="{{ route('trash_types.store') }}">
            @csrf
            <div class="form-group mb-3 col-6">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3 col-6">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required></textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3 col-6">
                <label for="price_per_kg" class="form-label">Harga per Kg</label>
                <input type="number" class="form-control @error('price_per_kg') is-invalid @enderror" id="price_per_kg"
                    name="price_per_kg" step="0.01" required>
                @error('price_per_kg')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3 col-6">
                <label for="photo" class="form-label">Foto</label>
                <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo"
                    name="photo">
                @error('photo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
