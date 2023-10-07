@extends('layout')

@section('content')
    <div class="container mt-4">
        <h3>Edit Jenis Sampah</h3>
        <form method="POST" action="{{ route('trash_types.store') }}">
            @csrf
            <div class="form-group mb-3 col-6">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    required value="{{ $trashType->name }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3 col-6">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ $trashType->description }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3 col-6">
                <label for="price_per_kg" class="form-label">Harga per Kg</label>
                <input type="number" class="form-control @error('price_per_kg') is-invalid @enderror" id="price_per_kg"
                    name="price_per_kg" step="0.01" value="{{ $trashType->price_per_kg }}" required>
                @error('price_per_kg')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3 col-6">
                <label for="photo" class="form-label">Foto</label>
                <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo"
                    name="photo" value="{{ $trashType->photo_url }}">
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
