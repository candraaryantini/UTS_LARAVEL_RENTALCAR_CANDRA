@extends('layouts.app')

@section('title', 'Detail Rental - Rental Car')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
    
    body {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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
        border-bottom: 3px solid #f093fb;
    }

    .detail-header h1 {
        color: #f5576c;
        font-weight: 700;
        font-size: 2.2rem;
        margin-bottom: 10px;
    }

    .detail-header p {
        color: #7f8c8d;
        font-size: 0.95rem;
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
        background: linear-gradient(135deg, rgba(240, 147, 251, 0.05), rgba(245, 87, 108, 0.05));
    }

    .detail-table tr:last-child {
        border-bottom: none;
    }

    .detail-table th {
        background: linear-gradient(135deg, #f093fb, #f5576c);
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
    }

    .badge-status {
        padding: 8px 18px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-block;
    }

    .badge-warning {
        background: linear-gradient(135deg, #ffd89b, #19547b);
        color: white;
    }

    .badge-success {
        background: linear-gradient(135deg, #a8edea, #fed6e3);
        color: #333;
    }

    .badge-secondary {
        background: linear-gradient(135deg, #bdc3c7, #95a5a6);
        color: white;
    }

    .price-highlight {
        font-size: 1.3rem;
        font-weight: 700;
        color: #f5576c;
    }

    .btn-back {
        background: linear-gradient(135deg, #6c757d, #495057);
        border: none;
        color: white;
        padding: 12px 35px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-back:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
        color: white;
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

        .detail-header h1 {
            font-size: 1.8rem;
        }
    }
</style>

<div class="container py-5">
    <div class="detail-container">
        <!-- Header -->
        <div class="detail-header">
            <h1>📋 Detail Rental</h1>
            <p>Informasi lengkap transaksi rental</p>
        </div>

        @if($rental)
            <!-- Detail Table -->
            <div class="detail-table">
                <table>
                    <tr>
                        <th><i class="bi bi-cash-coin me-2"></i>Total Harga</th>
                        <td>
                            <span class="price-highlight">
                                Rp {{ number_format($rental->total_price, 0, ',', '.') }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-info-circle me-2"></i>Status</th>
                        <td>
                            @if ($rental->status === 'active')
                                <span class="badge-status badge-warning">
                                    🚗 Sedang Berlangsung
                                </span>
                            @elseif ($rental->status === 'completed')
                                <span class="badge-status badge-success">
                                    ✅ Selesai
                                </span>
                            @elseif ($rental->status === 'cancelled')
                                <span class="badge-status badge-secondary">
                                    ❌ Dibatalkan
                                </span>
                            @else
                                <span class="badge-status badge-secondary">
                                    {{ $rental->status }}
                                </span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Button -->
            <div class="text-center mt-4">
                <a href="{{ route('rentals.index') }}" class="btn-back">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali ke Daftar Rental
                </a>
            </div>
        @else
            <!-- Empty State -->
            <div class="empty-state">
                <i class="bi bi-inbox"></i>
                <p>Data rental tidak ditemukan.</p>
                <a href="{{ route('rentals.index') }}" class="btn-back mt-3">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali
                </a>
            </div>
        @endif
    </div>
</div>
@endsection<th><i class="bi bi-hash me-2"></i>ID Rental</th>
                        <td><strong>#{{ $rental->id }}</strong></td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-car-front-fill me-2"></i>Mobil</th>
                        <td>
                            <strong>{{ $rental->car->brand }} {{ $rental->car->model }}</strong><br>
                            <small class="text-muted">{{ $rental->car->license_plate }}</small>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-person-fill me-2"></i>Pelanggan</th>
                        <td>
                            <strong>{{ $rental->customer->name }}</strong><br>
                            <small class="text-muted">{{ $rental->customer->email ?? 'Email tidak tersedia' }}</small>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-calendar-event me-2"></i>Tanggal Rental</th>
                        <td>{{ \Carbon\Carbon::parse($rental->rental_date)->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-calendar-check me-2"></i>Tanggal Kembali</th>
                        <td>{{ \Carbon\Carbon::parse($rental->return_date)->format('d F Y') }}</td>
                    </tr>
                    <tr>