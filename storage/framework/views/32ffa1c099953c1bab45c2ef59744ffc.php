
<?php $__env->startSection('title', 'Data Rental - Rental Car'); ?>
<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
    body {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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
        color: #f5576c;
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
        background: linear-gradient(135deg, #f093fb, #f5576c);
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
    .search-container .form-control {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 12px 20px;
        transition: all 0.3s ease;
    }
    .search-container .form-control:focus {
        border-color: #f5576c;
        box-shadow: 0 0 0 0.2rem rgba(245, 87, 108, 0.25);
    }
    .btn-search {
        background: linear-gradient(135deg, #f093fb, #f5576c);
        border: none;
        color: white;
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-search:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(245, 87, 108, 0.4);
    }
    .table-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        animation: fadeInUp 0.6s ease-out 0.2s backwards;
        overflow: hidden;
    }
    .table {
        margin-bottom: 0;
    }
    .table thead {
        background: linear-gradient(135deg, #f093fb, #f5576c);
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
    .table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #f0f0f0;
    }
    .table tbody tr:hover {
        background: linear-gradient(135deg, rgba(240, 147, 251, 0.1), rgba(245, 87, 108, 0.1));
        transform: scale(1.01);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    .table tbody td {
        padding: 15px;
        vertical-align: middle;
    }
    .badge-status {
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
    }
    .badge-ongoing {
        background: linear-gradient(135deg, #ffd89b, #19547b);
        color: white;
    }
    .badge-completed {
        background: linear-gradient(135deg, #a8edea, #fed6e3);
        color: #333;
    }
    .badge-cancelled {
        background: linear-gradient(135deg, #ff9a9e, #fecfef);
        color: #fff;
    }
    .btn-table {
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        margin: 0 3px;
    }
    .btn-edit {
        background: linear-gradient(135deg, #ffecd2, #fcb69f);
        color: #333;
    }
    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(252, 182, 159, 0.5);
    }
    .btn-delete {
        background: linear-gradient(135deg, #ff9a9e, #fad0c4);
        color: #fff;
    }
    .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 154, 158, 0.5);
    }
    .alert {
        border-radius: 15px;
        border: none;
        animation: fadeInDown 0.6s ease-out;
    }
    .pagination {
        margin-top: 20px;
    }
    .pagination .page-link {
        border-radius: 10px;
        margin: 0 5px;
        border: 2px solid #f093fb;
        color: #f5576c;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .pagination .page-link:hover {
        background: linear-gradient(135deg, #f093fb, #f5576c);
        color: white;
        transform: translateY(-2px);
    }
    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #f093fb, #f5576c);
        border-color: #f5576c;
    }
    @media (max-width: 768px) {
        .page-header h2 {
            font-size: 1.5rem;
        }
        .table-container {
            overflow-x: auto;
        }
    }
</style>

<div class="container py-5">
    <!-- Header -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <h2>
                <i class="bi bi-calendar-check-fill"></i>
                Data Rental
            </h2>
            <div class="d-flex gap-2">
                <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-action btn-back">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="<?php echo e(route('rentals.create')); ?>" class="btn btn-action btn-add">
                    <i class="bi bi-plus-circle"></i> Tambah Rental
                </a>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            <?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Search Form -->
    <div class="search-container">
        <form action="<?php echo e(route('rentals.index')); ?>" method="GET">
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="customer" class="form-control" placeholder="🔍 Cari Customer..." value="<?php echo e(request('customer')); ?>">
                </div>
                <div class="col-md-4">
                    <input type="text" name="car" class="form-control" placeholder="🚗 Cari Mobil..." value="<?php echo e(request('car')); ?>">
                </div>
                <div class="col-md-4">
                    <select name="status" class="form-control">
                        <option value="">📊 Semua Status</option>
                        <option value="ongoing" <?php echo e(request('status') == 'ongoing' ? 'selected' : ''); ?>>Sedang Berjalan</option>
                        <option value="completed" <?php echo e(request('status') == 'completed' ? 'selected' : ''); ?>>Selesai</option>
                        <option value="cancelled" <?php echo e(request('status') == 'cancelled' ? 'selected' : ''); ?>>Dibatalkan</option>
                    </select>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-search">
                        <i class="bi bi-search"></i> Cari Rental
                    </button>
                    <a href="<?php echo e(route('rentals.index')); ?>" class="btn btn-action btn-back ms-2">
                        <i class="bi bi-arrow-clockwise"></i> Reset
                    </a>
                </div>
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
                        <th>Customer</th>
                        <th>Mobil</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Total Hari</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $rentals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $rental): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($rentals->firstItem() + $index); ?></td>
                            <td>
                                <strong><?php echo e($rental->customer->name); ?></strong><br>
                                <small class="text-muted"><?php echo e($rental->customer->email); ?></small>
                            </td>
                            <td>
                                <strong><?php echo e($rental->car->brand); ?> <?php echo e($rental->car->model); ?></strong><br>
                                <small class="text-muted"><?php echo e($rental->car->license_plate); ?></small>
                            </td>
                            <td><?php echo e(\Carbon\Carbon::parse($rental->start_date)->format('d M Y')); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($rental->end_date)->format('d M Y')); ?></td>
                            <td><?php echo e($rental->total_days); ?> hari</td>
                            <td><strong>Rp <?php echo e(number_format($rental->total_price, 0, ',', '.')); ?></strong></td>
                            <td>
                                <?php if($rental->status == 'ongoing'): ?>
                                    <span class="badge-status badge-ongoing">Berjalan</span>
                                <?php elseif($rental->status == 'completed'): ?>
                                    <span class="badge-status badge-completed">Selesai</span>
                                <?php else: ?>
                                    <span class="badge-status badge-cancelled">Dibatalkan</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('rentals.edit', $rental->id)); ?>" class="btn btn-table btn-edit">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="<?php echo e(route('rentals.destroy', $rental->id)); ?>" method="POST" style="display: inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-table btn-delete" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="9" class="text-center py-4">
                                <i class="bi bi-inbox" style="font-size: 3rem; color: #ddd;"></i>
                                <p class="mt-3 text-muted">Tidak ada data rental yang ditemukan</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            <?php echo e($rentals->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_rentalcar\resources\views/rentals/index.blade.php ENDPATH**/ ?>