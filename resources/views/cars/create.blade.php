@extends('layouts.app')

@section('title', 'Tambah Mobil - Rental Car')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Mobil Baru</h1>

    {{-- Pesan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form tambah mobil --}}
    <form action="{{ route('cars.store') }}" method="POST">
        @csrf
        
        <div class="form-group mb-3">
            <label for="brand">Brand:</label>
            <input type="text" name="brand" id="brand" value="{{ old('brand') }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" value="{{ old('model') }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="year">Tahun:</label>
            <input type="number" name="year" id="year" value="{{ old('year') }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="color">Warna:</label>
            <input type="text" name="color" id="color" value="{{ old('color') }}" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="license_plate">Plat Nomor:</label>
            <input type="text" name="license_plate" id="license_plate" value="{{ old('license_plate') }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="price_per_day">Harga per Hari (Rp):</label>
            <input type="number" name="price_per_day" id="price_per_day" value="{{ old('price_per_day') }}" class="form-control" step="0.01" required>
        </div>

        <div class="form-group mb-4">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                <option value="rented" {{ old('status') == 'rented' ? 'selected' : '' }}>Disewa</option>
                <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('cars.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
