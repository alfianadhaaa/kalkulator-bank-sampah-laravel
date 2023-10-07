@extends('layout')

@section('content')
    <h1 class="mt-4">Data Jenis Sampah</h1>
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success" id="success-alert">
                {{ session('success') }}
            </div>

            <script>
                setTimeout(function() {
                    document.getElementById('success-alert').style.display = 'none';
                }, 3000);
            </script>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('trash_types.create') }}" class="btn btn-primary mb-3">Tambah Jenis Sampah</a>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Deskripsi</th>
                    <th>Harga per Kg</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trashTypes as $trashType)
                    <tr>
                        <td>{{ $trashType->name }}</td>
                        <td>{{ $trashType->description }}</td>
                        <td>{{ $trashType->price_per_kg }}</td>
                        <td>
                            <a href="{{ route('trash_types.show', $trashType->id) }}"
                                class="btn btn-success btn-sm">Detail</a>
                            <a href="{{ route('trash_types.edit', $trashType->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('trash_types.destroy', $trashType->id) }}" class="d-inline"
                                onsubmit="return confirm('Yakin akan mengahapus data ini?')" method="POST">
                                @csrf
                                @method('DELETE')
                                <button name="submit" type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
