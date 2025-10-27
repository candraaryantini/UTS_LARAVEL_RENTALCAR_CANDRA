@extends('layouts.app')

@section('title', 'Edit Rental - Rental Car')

@section('content')
<div class="container mt-5 p-4 bg-white shadow rounded">
    <h1 class="mb-4">Edit Rental</h1>

    <form action="{{ route('rentals.update', $rental->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Pilih Mobil --}}
        <div class="mb-3">
            <label for="car_id" class="form-label">Mobil</label>
            <select name="car_id" id="car_id" class="form-select" required>
                <option value="">Pilih Mobil</option>
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}" {{ $car->id == $rental->car_id ? 'selected' : '' }}>
                        {{ $car->brand }} {{ $car->model }} ({{ $car->license_plate }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Pilih Pelanggan --}}
        <div class="mb-3">
            <label for="customer_id" class="form-label">Pelanggan</label>
            <select name="customer_id" id="customer_id" class="form-select" required>
                <option value="">Pilih Pelanggan</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $customer->id == $rental->customer_id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tanggal Rental --}}
        <div class="mb-3">
            <label for="rental_date" class="form-label">Tanggal Rental</label>
            <input type="date" name="rental_date" id="rental_date" class="form-control"
                   value="{{ old('rental_date', $rental->rental_date) }}" required>
        </div>

        {{-- Tanggal Kembali --}}
        <div class="mb-3">
            <label for="return_date" class="form-label">Tanggal Kembali</label>
            <input type="date" name="return_date" id="return_date" class="form-control"
                   value="{{ old('return_date', $rental->return_date) }}" required>
        </div>

        {{-- Total Harga --}}
        <div class="mb-3">
            <label for="total_price" class="form-label">Total Harga</label>
            <input type="number" name="total_price" id="total_price" step="0.01" class="form-control"
                   value="{{ old('total_price', $rental->total_price) }}" required>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="active" {{ $rental->status == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="completed" {{ $rental->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                <option value="cancelled" {{ $rental->status == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
        </div>

        {{-- Tombol --}}
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('rentals.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
