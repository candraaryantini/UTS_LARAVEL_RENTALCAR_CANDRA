

<?php $__env->startSection('title', 'Detail Mobil - Rental Car'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5 p-4 bg-white shadow rounded">
    <h2 class="fw-bold mb-4">Detail Mobil</h2>

    <?php if($car): ?>
        <table class="table table-bordered">
            <tr>
                <th style="width: 200px;">ID</th>
                <td><?php echo e($car->id); ?></td>
            </tr>
            <tr>
                <th>Brand</th>
                <td><?php echo e($car->brand); ?></td>
            </tr>
            <tr>
                <th>Model</th>
                <td><?php echo e($car->model); ?></td>
            </tr>
            <tr>
                <th>Tahun</th>
                <td><?php echo e($car->year); ?></td>
            </tr>
            <tr>
                <th>Warna</th>
                <td><?php echo e($car->color); ?></td>
            </tr>
            <tr>
                <th>Plat Nomor</th>
                <td><?php echo e($car->license_plate); ?></td>
            </tr>
            <tr>
                <th>Harga per Hari</th>
                <td>Rp <?php echo e(number_format($car->price_per_day, 0, ',', '.')); ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td class="text-capitalize"><?php echo e($car->status); ?></td>
            </tr>
        </table>

        <div class="mt-3">
            <a href="<?php echo e(route('cars.index')); ?>" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <a href="<?php echo e(route('cars.edit', $car->id)); ?>" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Edit
            </a>
        </div>
    <?php else: ?>
        <div class="alert alert-danger">Mobil tidak ditemukan.</div>
        <a href="<?php echo e(route('cars.index')); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali ke daftar
        </a>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_rentalcar\resources\views/cars/show.blade.php ENDPATH**/ ?>