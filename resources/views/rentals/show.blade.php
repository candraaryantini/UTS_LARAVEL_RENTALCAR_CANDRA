@extends('layouts.app')

@section('title', 'Detail Rental - Rental Car')

@section('content')
<div class="container mt-4 p-4 bg-white shadow rounded-4">
    <h1 class="fw-bold mb-4">Detail Rental</h1>

    @if($rental)
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $rental->id }}</td>
            </tr>
            <tr>
                <th>Mobil</th>
                <td>
                    {{ $rental->car->brand }} {{ $rental->car->model }}
                    ({{ $rental->car->license_plate }})
                </td>
            </tr>
            <tr>
                <th>Pelanggan</th>
                <td>{{ $rental->customer->name }}</td>
            </tr>
            <tr>
                <th>Tanggal Rental</th>
                <td>{{ $rental->rental_date }}</td>
            </tr>
            <tr>
                <th>Tanggal Kembali</th>
                <td>{{ $rental->return_date }}</td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td>Rp {{ number_format($rental->total_price, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if ($rental->status === 'active')
                        <span class="badge bg-warning text-dark">Rented</span>
                    @elseif ($rental->status === 'completed')
                        <span class="badge bg-success">Returned</span>
                    @elseif ($rental->status === 'cancelled')
                        <span class="badge bg-secondary">Dibatalkan</span>
                    @else
                        <span class="badge bg-light text-dark">{{ $rental->status }}</span>
                    @endif
                </td>
            </tr>
        </table>

        <div class="mt-3">
            <a href="{{ route('rentals.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    @else
        <p class="text-muted">Data rental tidak ditemukan.</p>
    @endif
</div>
@endsection
