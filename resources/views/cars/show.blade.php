@extends('layouts.app')

@section('title', 'Detail Mobil - Rental Car')

@section('content')
<div class="container mt-5 p-4 bg-white shadow rounded">
    <h2 class="fw-bold mb-4">Detail Mobil</h2>

    @if ($car)
        <table class="table table-bordered">
            <tr>
                <th style="width: 200px;">ID</th>
                <td>{{ $car->id }}</td>
            </tr>
            <tr>
                <th>Brand</th>
                <td>{{ $car->brand }}</td>
            </tr>
            <tr>
                <th>Model</th>
                <td>{{ $car->model }}</td>
            </tr>
            <tr>
                <th>Tahun</th>
                <td>{{ $car->year }}</td>
            </tr>
            <tr>
                <th>Warna</th>
                <td>{{ $car->color }}</td>
            </tr>
            <tr>
                <th>Plat Nomor</th>
                <td>{{ $car->license_plate }}</td>
            </tr>
            <tr>
                <th>Harga per Hari</th>
                <td>Rp {{ number_format($car->price_per_day, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td class="text-capitalize">{{ $car->status }}</td>
            </tr>
        </table>

        <div class="mt-3">
            <a href="{{ route('cars.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Edit
            </a>
        </div>
    @else
        <div class="alert alert-danger">Mobil tidak ditemukan.</div>
        <a href="{{ route('cars.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali ke daftar
        </a>
    @endif
</div>
@endsection
