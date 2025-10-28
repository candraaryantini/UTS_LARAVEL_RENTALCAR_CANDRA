

<?php $__env->startSection('title', 'Data Customers - Rental Car'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

    body {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
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
        color: #11998e;
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
        background: linear-gradient(135deg, #11998e, #38ef7d);
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
        border-color: #11998e;
        box-shadow: 0 0 0 0.2rem rgba(17, 153, 142, 0.25);
        outline: none;
    }

    .btn-search {
        border-radius: 15px;
        background: linear-gradient(135deg, #11998e, #38ef7d);
        border: none;
        padding: 12px 30px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-search:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 20px rgba(17, 153, 142, 0.4);
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
        background: linear-gradient(135deg, #11998e, #38ef7d);
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

    .customer-name {
        font-weight: 700;
        color: #11998e;
        font-size: 1.05rem;
    }

    .customer-email {
        color: #666;
        font-size: 0.9rem;
    }

    .customer-phone {
        background: linear-gradient(135deg, #11998e, #38ef7d);
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
        display: inline-block;
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

    .btn-edit {
        background: linear-gradient(135deg, #ffc107, #ff9800);
        color: white;
    }

    .btn-delete {
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: white;
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
        color: #11998e;
        font-weight: 600;
        padding: 10px 15px;
        transition: all 0.3s ease;
    }

    .page-item.active .page-link {
        background: linear-gradient(135deg, #11998e, #38ef7d);
        color: white;
        box-shadow: 0 5px 15px rgba(17, 153, 142, 0.3);
    }

    .page-item .page-link:hover {
        background: linear-gradient(135deg, #11998e, #38ef7d);
        color: white;
        transform: translateY(-2px);
    }
</style>

<div class="container py-4">
    <!-- Header -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <h2>
                <i class="bi bi-people-fill"></i>
                Data Customers
            </h2>
            <div class="d-flex gap-2">
                <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-action btn-back">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="<?php echo e(route('customers.create')); ?>" class="btn btn-action btn-add">
                    <i class="bi bi-person-plus"></i> Tambah Customer
                </a>
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="search-container">
        <form method="GET" action="<?php echo e(route('customers.index')); ?>" class="row g-3">
            <div class="col-md-10">
                <input type="text" name="search" placeholder="🔍 Cari customer berdasarkan nama, email, atau telepon..." 
                       value="<?php echo e(request('search')); ?>" class="form-control search-input">
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
                        <th>Nama Customer</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><strong><?php echo e($loop->iteration + ($customers->currentPage() - 1) * $customers->perPage()); ?></strong></td>
                            <td>
                                <div class="customer-name"><?php echo e($customer->name); ?></div>
                            </td>
                            <td>
                                <div class="customer-email">
                                    <i class="bi bi-envelope"></i> <?php echo e($customer->email); ?>

                                </div>
                            </td>
                            <td>
                                <span class="customer-phone">
                                    <i class="bi bi-telephone"></i> <?php echo e($customer->phone); ?>

                                </span>
                            </td>
                            <td><?php echo e(Str::limit($customer->address, 30)); ?></td>
                            <td class="text-center">
                                <a href="<?php echo e(route('customers.edit', $customer->id)); ?>" class="btn btn-table btn-edit">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="<?php echo e(route('customers.destroy', $customer->id)); ?>" method="POST" 
                                      class="d-inline" onsubmit="return confirm('Yakin ingin menghapus customer ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-table btn-delete">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <i class="bi bi-person-x"></i>
                                    <p>Belum ada data customer. Tambahkan customer pertama Anda!</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if($customers->hasPages()): ?>
            <div class="d-flex justify-content-center mt-4">
                <?php echo e($customers->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_rentalcar\resources\views/customers/index.blade.php ENDPATH**/ ?>