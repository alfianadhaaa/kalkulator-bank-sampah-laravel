@extends('layout')

@section('content')
    <div class="container">
        <h1>Detail Jenis Sampah</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>Nama</th>
                    <td></td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td></td>
                </tr>
                <tr>
                    <th>Harga per Kg</th>
                    <td>Rp </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $trashType->name }}</h5>
                    <p class="card-text">{{ $trashType->description }}</p>
                    <p class="card-text">
                        <small class="text-body-secondary">Harga per Kg
                            Rp{{ number_format($trashType->price_per_kg, 0, ',', '.') }}</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
