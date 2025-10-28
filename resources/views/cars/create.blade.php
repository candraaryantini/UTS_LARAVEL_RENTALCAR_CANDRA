@extends('layouts.app')

@section('title', 'Tambah Mobil - Rental Car')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
    
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
    }

    .form-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        animation: fadeInUp 0.6s ease-out;
        max-width: 700px;
        margin: 0 auto;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .form-header h2 {
        color: #667eea;
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .form-header p {
        color: #7f8c8d;
        font-size: 0.95rem;
    }

    .form-label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
        font-size: 0.9rem;
    }

    .form-control, .form-select {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 12px 18px;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    .form-control:focus, .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        transform: translateY(-2px);
    }

    .form-control:hover, .form-select:hover {
        border-color: #667eea;
    }

    .alert {
        border-radius: 15px;
        border: none;
        padding: 15px 20px;
        animation: slideDown 0.4s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-danger {
        background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
        color: #721c24;
    }

    .btn-submit {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border: none;
        color: white;
        padding: 12px 35px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(102, 126, 234, 0.5);
        color: white;
    }

    .btn-cancel {
        background: linear-gradient(135deg, #6c757d, #495057);
        border: none;
        color: white;
        padding: 12px 35px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-cancel:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
        color: white;
    }

    .input-icon {
        position: relative;
    }

    .input-icon i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #667eea;
        font-size: 1.1rem;
    }

    .input-icon .form-control {
        padding-left: 45px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
        
        .form-container {
            padding: 25px;
        }
    }
</style>

<div class="container py-5">
    <div class="form-container">
        <!-- Header -->
        <div class="form-header">
            <h2>🚗 Tambah Mobil Baru</h2>
            <p>Lengkapi informasi mobil yang akan ditambahkan</p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Terjadi kesalahan!
                </strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('cars.store') }}" method="POST">
            @csrf
            
            <!-- Brand & Model -->
            <div class="form-row mb-3">
                <div>
                    <label for="brand" class="form-label">
                        <i class="bi bi-tag-fill me-1"></i> Brand
                    </label>
                    <input type="text" name="brand" id="brand" 
                           value="{{ old('brand') }}" 
                           class="form-control" 
                           placeholder="Contoh: Toyota"
                           required>
                </div>

                <div>
                    <label for="model" class="form-label">
                        <i class="bi bi-car-front me-1"></i> Model
                    </label>
                    <input type="text" name="model" id="model" 
                           value="{{ old('model') }}" 
                           class="form-control"
                           placeholder="Contoh: Avanza"
                           required>
                </div>
            </div>

            <!-- Year & Color -->
            <div class="form-row mb-3">
                <div>
                    <label for="year" class="form-label">
                        <i class="bi bi-calendar-event me-1"></i> Tahun
                    </label>
                    <input type="number" name="year" id="year" 
                           value="{{ old('year') }}" 
                           class="form-control"
                           placeholder="2024"
                           required>
                </div>

                <div>
                    <label for="color" class="form-label">
                        <i class="bi bi-palette-fill me-1"></i> Warna
                    </label>
                    <input type="text" name="color" id="color" 
                           value="{{ old('color') }}" 
                           class="form-control"
                           placeholder="Contoh: Hitam">
                </div>
            </div>

            <!-- License Plate -->
            <div class="mb-3">
                <label for="license_plate" class="form-label">
                    <i class="bi bi-credit-card-2-front me-1"></i> Plat Nomor
                </label>
                <input type="text" name="license_plate" id="license_plate" 
                       value="{{ old('license_plate') }}" 
                       class="form-control"
                       placeholder="Contoh: B 1234 XYZ"
                       required>
            </div>

            <!-- Price per Day -->
            <div class="mb-3">
                <label for="price_per_day" class="form-label">
                    <i class="bi bi-cash-coin me-1"></i> Harga per Hari (Rp)
                </label>
                <input type="number" name="price_per_day" id="price_per_day" 
                       value="{{ old('price_per_day') }}" 
                       class="form-control" 
                       step="0.01"
                       placeholder="350000"
                       required>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="form-label">
                    <i class="bi bi-check-circle me-1"></i> Status
                </label>
                <select name="status" id="status" class="form-select">
                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>
                        ✅ Tersedia
                    </option>
                    <option value="rented" {{ old('status') == 'rented' ? 'selected' : '' }}>
                        🚗 Disewa
                    </option>
                    <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>
                        🔧 Maintenance
                    </option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="d-flex gap-3 justify-content-center">
                <button type="submit" class="btn btn-submit">
                    <i class="bi bi-check-lg me-2"></i>
                    Simpan Data
                </button>
                <a href="{{ route('cars.index') }}" class="btn btn-cancel">
                    <i class="bi bi-x-lg me-2"></i>
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection