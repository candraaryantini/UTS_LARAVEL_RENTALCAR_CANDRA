@extends('layouts.app')

@section('title', 'Data Mobil - Rental Car')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
    }

    .page-header {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.9));
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        animation: fadeInDown 0.6s ease-out;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .page-header h2 {
        color: #667eea;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .page-header h2 i {
        font-size: 2rem;
    }

    .btn-action {
        border-radius: 12px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .btn-action:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .btn-back {
        background: linear-gradient(135deg, #6c757d, #495057);
        color: white;
    }

    .btn-add {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
    }

    .search-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        animation: fadeInUp 0.6s ease-out 0.1s backwards;
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

    .search-input {
        border-radius: 15px;
        border: 2px solid #e9ecef;
        padding: 12px 20px;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        outline: none;
    }

    .btn-search {
        border-radius: 15px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border: none;
        padding: 12px 30px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-search:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
    }

    .table-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        animation: fadeInUp 0.6s ease-out 0.2s backwards;
    }

    .table {
        margin: 0;
    }

    .table thead {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
    }

    .table thead th {
        border: none;
        padding: 15px;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    .table thead th:first-child {
        border-top-left-radius: 12px;
    }

    .table thead th:last-child {
        border-top-right-radius: 12px;
    }

    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background: #f8f9fa;
        transform: scale(1.01);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .table tbody td {
        padding: 18px 15px;
        vertical-align: middle;
        border-color: #e9ecef;
    }

    .badge-status {
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .badge-available {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
    }

    .badge-rented {
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: white;
    }

    .badge-maintenance {
        background: linear-gradient(135deg, #ffc107, #ff9800);
        color: white;
    }

    .btn-table {
        border-radius: 10px;
        padding: 8px 15px;
        font-weight: 600;
        font-size: 0.85rem;
        border: none;
        transition: all 0.3s ease;
        margin: 2px;
    }

    .btn-table:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-view {
        background: linear-gradient(135deg, #17a2b8, #138496);
        color: white;
    }

    .btn-edit {
        background: linear-gradient(135deg, #ffc107, #ff9800);
        color: white;
    }

    .btn-delete {
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: white;
    }

    .alert-custom {
        border-radius: 15px;
        border: none;
        padding: 15px 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        animation: fadeInDown 0.5s ease-out;
    }

    .price-text {
        font-weight: 700;
        color: #667eea;
        font-size: 1.05rem;
    }

    .empty-state {
        padding: 60px 20px;
        text-align: center;
    }

    .empty-state i {
        font-size: 4rem;
        color: #ccc;
        margin-bottom: 20px;
    }

    .empty-state p {
        color: #999;
        font-size: 1.1rem;
    }

    /* Pagination Styling */
    .pagination {
        gap: 5px;
    }

    .page-item .page-link {
        border-radius: 10px;
        border: none;
        color: #667eea;
        font-weight: 600;
        padding: 10px 15px;
        transition: all 0.3s ease;
    }

    .page-item.active .page-link {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
    }

    .page-item .page-link:hover {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        transform: translateY(-2px);
    }
</style>

<div class="container py-4">
    <!-- Header -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <h2>
                <i class="bi bi-car-front-fill"></i>
                Daftar Mobil Rental
            </h2>
            <div class="d-flex gap-2">
                <a href="{{ route('dashboard') }}" class="btn btn-action btn-back">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('cars.create') }}" class="btn btn-action btn-add">
                    <i class="bi bi-plus-circle"></i> Tambah Mobil
                </a>
            </div>
        </div>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="alert alert-success alert-custom alert-dismissible fade show">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Search Bar -->
    <div class="search-container">
        <form method="GET" action="{{ route('cars.index') }}" class="row g-3">
            <div class="col-md-10">
                <input type="text" name="search" placeholder="🔍 Cari mobil berdasarkan brand, model, atau plat nomor..." 
                       value="{{ request('search') }}" class="form-control search-input">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-search w-100">
                    <i class="bi bi-search"></i> Cari
                </button>
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="table-container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Plat Nomor</th>
                        <th>Tahun</th>
                        <th>Harga/Hari</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cars as $index => $car)
                        <tr>
                            <td><strong>{{ $cars->firstItem() + $index }}</strong></td>
                            <td><strong>{{ $car->brand }}</strong></td>
                            <td>{{ $car->model }}</td>
                            <td><span class="badge bg-secondary">{{ $car->license_plate }}</span></td>
                            <td>{{ $car->year }}</td>
                            <td class="price-text">Rp {{ number_format($car->price_per_day, 0, ',', '.') }}</td>
                            <td>
                                @if($car->status === 'available')
                                    <span class="badge-status badge-available">
                                        <i class="bi bi-check-circle"></i> Tersedia
                                    </span>
                                @elseif($car->status === 'rented')
                                    <span class="badge-status badge-rented">
                                        <i class="bi bi-x-circle"></i> Disewa
                                    </span>
                                @else
                                    <span class="badge-status badge-maintenance">
                                        <i class="bi bi-tools"></i> Maintenance
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('cars.show', $car->id) }}" class="btn btn-table btn-view">
                                    <i class="bi bi-eye"></i> Lihat
                                </a>
                                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-table btn-edit">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-table btn-delete" 
                                            onclick="return confirm('Yakin ingin menghapus mobil ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <div class="empty-state">
                                    <i class="bi bi-car-front"></i>
                                    <p>Belum ada data mobil. Tambahkan mobil pertama Anda!</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($cars->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $cars->links() }}
            </div>
        @endif
    </div>
</div>
@endsection