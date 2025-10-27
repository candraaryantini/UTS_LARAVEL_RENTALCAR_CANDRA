@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Mobil</h1>

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

    <form action="{{ route('cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="brand">Brand:</label>
            <input type="text" name="brand" id="brand" value="{{ old('brand', $car->brand) }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" value="{{ old('model', $car->model) }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="license_plate">Plat Nomor:</label>
            <input type="text" name="license_plate" id="license_plate" value="{{ old('license_plate', $car->license_plate) }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="year">Tahun:</label>
            <input type="number" name="year" id="year" value="{{ old('year', $car->year) }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="price_per_day">Harga per Hari:</label>
            <input type="number" name="price_per_day" id="price_per_day" value="{{ old('price_per_day', $car->price_per_day) }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-select">
                <option value="available" {{ $car->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                <option value="rented" {{ $car->status == 'rented' ? 'selected' : '' }}>Disewa</option>
                <option value="maintenance" {{ $car->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('cars.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
