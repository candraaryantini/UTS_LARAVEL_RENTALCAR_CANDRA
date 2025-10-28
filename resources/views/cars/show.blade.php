@extends('layouts.app')
@section('title', 'Detail Mobil - Rental Car')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
    
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
    }

    .detail-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        animation: fadeInUp 0.6s ease-out;
        max-width: 800px;
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

    .detail-header {
        text-align: center;
        margin-bottom: 40px;
        padding-bottom: 20px;
        border-bottom: 3px solid #667eea;
    }

    .detail-header h2 {
        color: #667eea;
        font-weight: 700;
        font-size: 2.2rem;
        margin-bottom: 10px;
    }

    .detail-header p {
        color: #7f8c8d;
        font-size: 0.95rem;
    }

    .car-icon {
        font-size: 5rem;
        color: #667eea;
        margin-bottom: 20px;
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .detail-table {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .detail-table table {
        width: 100%;
        margin: 0;
    }

    .detail-table tr {
        border-bottom: 1px solid #f0f0f0;
        transition: all 0.3s ease;
    }

    .detail-table tr:hover {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
        transform: scale(1.01);
    }

    .detail-table tr:last-child {
        border-bottom: none;
    }

    .detail-table th {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        font-weight: 600;
        padding: 18px 25px;
        text-align: left;
        width: 35%;
        font-size: 0.95rem;
    }

    .detail-table td {
        padding: 18px 25px;
        color: #2c3e50;
        font-weight: 500;
        font-size: 1rem;
    }

    .price-highlight {
        font-size: 1.4rem;
        font-weight: 700;
        color: #667eea;
    }

    .status-badge {
        padding: 8px 18px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-block;
        text-transform: capitalize;
    }

    .status-available {
        background: linear-gradient(135deg, #a8edea, #fed6e3);
        color: #155724;
    }

    .status-rented {
        background: linear-gradient(135deg, #ffd89b, #19547b);
        color: white;
    }

    .status-maintenance {
        background: linear-gradient(135deg, #ff9a9e, #fecfef);
        color: #721c24;
    }

    .btn-action {
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        text-decoration: none;
        display: inline-block;
        margin: 5px;
    }

    .btn-back {
        background: linear-gradient(135deg, #6c757d, #495057);
        color: white;
    }

    .btn-back:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
        color: white;
    }

    .btn-edit {
        background: linear-gradient(135deg, #ffecd2, #fcb69f);
        color: #333;
    }

    .btn-edit:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(252, 182, 159, 0.5);
        color: #333;
    }

    .alert-error {
        background: linear-gradient(135deg, #ff9a9e, #fecfef);
        border: none;
        border-radius: 15px;
        padding: 20px;
        color: #721c24;
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

    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-state i {
        font-size: 4rem;
        color: #ddd;
        margin-bottom: 20px;
    }

    .empty-state p {
        color: #7f8c8d;
        font-size: 1.1rem;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .detail-container {
            padding: 25px;
        }

        .detail-table th,
        .detail-table td {
            padding: 12px 15px;
            font-size: 0.9rem;
        }

        .detail-header h2 {
            font-size: 1.8rem;
        }

        .car-icon {
            font-size: 3.5rem;
        }
    }
</style>

<div class="container py-5">
    <div class="detail-container">
        <!-- Header -->
        <div class="detail-header">
            <div class="car-icon">
                <i class="bi bi-car-front-fill"></i>
            </div>
            <h2>Detail Mobil</h2>
            <p>Informasi lengkap kendaraan</p>
        </div>

        @if ($car)
            <!-- Detail Table -->
            <div class="detail-table">
                <table>
                    <tr>
                        <th><i class="bi bi-hash me-2"></i>ID Mobil</th>
                        <td><strong>#{{ $car->id }}</strong></td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-tag-fill me-2"></i>Brand</th>
                        <td><strong>{{ $car->brand }}</strong></td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-car-front me-2"></i>Model</th>
                        <td><strong>{{ $car->model }}</strong></td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-calendar-event me-2"></i>Tahun</th>
                        <td>{{ $car->year }}</td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-palette-fill me-2"></i>Warna</th>
                        <td>{{ $car->color ?? 'Tidak tersedia' }}</td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-credit-card-2-front me-2"></i>Plat Nomor</th>
                        <td><strong>{{ $car->license_plate }}</strong></td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-cash-coin me-2"></i>Harga per Hari</th>
                        <td>
                            <span class="price-highlight">
                                Rp {{ number_format($car->price_per_day, 0, ',', '.') }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-info-circle me-2"></i>Status</th>
                        <td>
                            @if($car->status == 'available')
                                <span class="status-badge status-available">
                                    ✅ Tersedia
                                </span>
                            @elseif($car->status == 'rented')
                                <span class="status-badge status-rented">
                                    🚗 Disewa
                                </span>
                            @elseif($car->status == 'maintenance')
                                <span class="status-badge status-maintenance">
                                    🔧 Maintenance
                                </span>
                            @else
                                <span class="status-badge status-available">
                                    {{ $car->status }}
                                </span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Action Buttons -->
            <div class="text-center mt-4">
                <a href="{{ route('cars.index') }}" class="btn-action btn-back">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali
                </a>
                <a href="{{ route('cars.edit', $car->id) }}" class="btn-action btn-edit">
                    <i class="bi bi-pencil-square me-2"></i>
                    Edit Mobil
                </a>
            </div>
        @else
            <!-- Empty State -->
            <div class="empty-state">
                <i class="bi bi-exclamation-triangle"></i>
                <div class="alert-error">
                    <strong><i class="bi bi-x-circle me-2"></i>Mobil tidak ditemukan.</strong>
                    <p class="mb-0 mt-2">Data mobil yang Anda cari tidak tersedia dalam sistem.</p>
                </div>
                <a href="{{ route('cars.index') }}" class="btn-action btn-back mt-3">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali ke Daftar
                </a>
            </div>
        @endif
    </div>
</div>
@endsection