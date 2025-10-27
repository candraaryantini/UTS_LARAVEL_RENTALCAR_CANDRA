@extends('layouts.app')

@section('title', 'Edit Pelanggan - Rental Car')

@section('content')
<div class="container mt-5 p-4 bg-white shadow rounded">
    <h2 class="fw-bold mb-4">Edit Pelanggan</h2>

    {{-- Form Edit Pelanggan --}}
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama:</label>
            <input type="text" name="name" id="name" class="form-control"
                   value="{{ old('name', $customer->name) }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control"
                   value="{{ old('email', $customer->email) }}" required>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="phone" class="form-label">Telepon:</label>
            <input type="text" name="phone" id="phone" class="form-control"
                   value="{{ old('phone', $customer->phone) }}">
            @error('phone')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="address" class="form-label">Alamat:</label>
            <textarea name="address" id="address" class="form-control" rows="3">{{ old('address', $customer->address) }}</textarea>
            @error('address')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Update
        </button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Batal
        </a>
    </form>
</div>
@endsection
