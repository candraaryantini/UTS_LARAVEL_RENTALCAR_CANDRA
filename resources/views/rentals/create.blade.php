@extends('layouts.app')

@section('title', 'Tambah Rental - Rental Car')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
    
    body {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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
        color: #f5576c;
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
        border-color: #f5576c;
        box-shadow: 0 0 0 0.2rem rgba(245, 87, 108, 0.25);
        transform: translateY(-2px);
    }

    .form-control:hover, .form-select:hover {
        border-color: #f5576c;
    }

    /* Styling untuk invalid input */
    .form-control:invalid, .form-select:invalid {
        border-color: #dc3545;
    }

    .text-danger {
        font-size: 0.85rem;
        margin-top: 5px;
        display: block;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .btn-submit {
        background: linear-gradient(135deg, #f093fb, #f5576c);
        border: none;
        color: white;
        padding: 12px 35px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(245, 87, 108, 0.4);
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(245, 87, 108, 0.5);
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
            <h2>🚗 Tambah Rental Baru</h2>
            <p>Buat transaksi rental mobil baru</p>
        </div>

        <!-- Alert untuk error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('rentals.store') }}" method="POST" id="rentalForm">
            @csrf

            <!-- Pilih Mobil -->
            <div class="mb-3">
                <label for="car_id" class="form-label">
                    <i class="bi bi-car-front-fill me-1"></i> Pilih Mobil <span class="text-danger">*</span>
                </label>
                <select name="car_id" id="car_id" class="form-select @error('car_id') is-invalid @enderror" required>
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

            <!-- Pilih Pelanggan -->
            <div class="mb-3">
                <label for="customer_id" class="form-label">
                    <i class="bi bi-person-fill me-1"></i> Pilih Pelanggan <span class="text-danger">*</span>
                </label>
                <select name="customer_id" id="customer_id" class="form-select @error('customer_id') is-invalid @enderror" required>
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

            <!-- Tanggal Rental & Kembali -->
            <div class="form-row mb-3">
                <div>
                    <label for="start_date" class="form-label">
                        <i class="bi bi-calendar-event me-1"></i> Tanggal Rental <span class="text-danger">*</span>
                    </label>
                    <input type="date" name="start_date" id="start_date"
                           class="form-control @error('start_date') is-invalid @enderror" 
                           value="{{ old('start_date', date('Y-m-d')) }}" required>
                    @error('start_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label for="end_date" class="form-label">
                        <i class="bi bi-calendar-check me-1"></i> Tanggal Kembali <span class="text-danger">*</span>
                    </label>
                    <input type="date" name="end_date" id="end_date"
                           class="form-control @error('end_date') is-invalid @enderror" 
                           value="{{ old('end_date') }}" required>
                    @error('end_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Total Harga -->
            <div class="mb-3">
                <label for="total_price" class="form-label">
                    <i class="bi bi-cash-coin me-1"></i> Total Harga (Rp) <span class="text-danger">*</span>
                </label>
                <input type="number" name="total_price" id="total_price"
                       class="form-control @error('total_price') is-invalid @enderror" 
                       step="1" min="0" value="{{ old('total_price') }}" 
                       placeholder="350000" required>
                @error('total_price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="form-label">
                    <i class="bi bi-check-circle me-1"></i> Status <span class="text-danger">*</span>
                </label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="ongoing" {{ old('status', 'ongoing') == 'ongoing' ? 'selected' : '' }}>
                        🟢 Sedang Berlangsung
                    </option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>
                        ✅ Selesai
                    </option>
                    <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>
                        ❌ Dibatalkan
                    </option>
                </select>
                @error('status')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="d-flex gap-3 justify-content-center">
                <button type="submit" class="btn btn-submit">
                    <i class="bi bi-check-lg me-2"></i>
                    Simpan Rental
                </button>
                <a href="{{ route('rentals.index') }}" class="btn btn-cancel">
                    <i class="bi bi-x-lg me-2"></i>
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
// Validasi form sebelum submit
document.getElementById('rentalForm').addEventListener('submit', function(e) {
    const carId = document.getElementById('car_id').value;
    const customerId = document.getElementById('customer_id').value;
    const rentalDate = document.getElementById('rental_date').value;
    const returnDate = document.getElementById('return_date').value;
    const totalPrice = document.getElementById('total_price').value;
    const status = document.getElementById('status').value;
    
    // Cek apakah semua field terisi
    if (!carId || !customerId || !rentalDate || !returnDate || !totalPrice || !status) {
        e.preventDefault();
        alert('Mohon lengkapi semua field yang wajib diisi!');
        return false;
    }
    
    // Validasi tanggal
    if (new Date(returnDate) < new Date(rentalDate)) {
        e.preventDefault();
        alert('Tanggal kembali tidak boleh lebih awal dari tanggal rental!');
        return false;
    }
    
    // Validasi harga
    if (parseFloat(totalPrice) <= 0) {
        e.preventDefault();
        alert('Total harga harus lebih dari 0!');
        return false;
    }
});

// Auto set minimum return date
document.getElementById('rental_date').addEventListener('change', function() {
    const rentalDate = this.value;
    document.getElementById('return_date').min = rentalDate;
    
    // Jika return date sudah terisi tapi lebih kecil, reset
    const returnDate = document.getElementById('return_date').value;
    if (returnDate && new Date(returnDate) < new Date(rentalDate)) {
        document.getElementById('return_date').value = '';
    }
});
</script>
@endsection