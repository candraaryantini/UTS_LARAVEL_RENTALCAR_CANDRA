@extends('layouts.app')

@section('title', 'Tambah Rental - Rental Car')

@section('content')
<div class="container mt-5 p-4 bg-white shadow rounded">
    <h2 class="fw-bold mb-4">Tambah Rental Baru</h2>

    <form action="{{ route('rentals.store') }}" method="POST">
        @csrf

        {{-- Pilih Mobil --}}
        <div class="mb-3">
            <label for="car_id" class="form-label">Mobil:</label>
            <select name="car_id" id="car_id" class="form-select" required>
                <option value="">-- Pilih Mobil --</option>
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }}>
                        {{ $car->brand }} {{ $car->model }} ({{ $car->license_plate }})
                    </option>
                @endforeach
            </select>
            @error('car_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Pilih Pelanggan --}}
        <div class="mb-3">
            <label for="customer_id" class="form-label">Pelanggan:</label>
            <select name="customer_id" id="customer_id" class="form-select" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
            @error('customer_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Tanggal Rental --}}
        <div class="mb-3">
            <label for="rental_date" class="form-label">Tanggal Rental:</label>
            <input type="date" name="rental_date" id="rental_date"
                   class="form-control" value="{{ old('rental_date') }}" required>
            @error('rental_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Tanggal Kembali --}}
        <div class="mb-3">
            <label for="return_date" class="form-label">Tanggal Kembali:</label>
            <input type="date" name="return_date" id="return_date"
                   class="form-control" value="{{ old('return_date') }}" required>
            @error('return_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Total Harga --}}
        <div class="mb-3">
            <label for="total_price" class="form-label">Total Harga (Rp):</label>
            <input type="number" name="total_price" id="total_price"
                   class="form-control" step="0.01" value="{{ old('to
