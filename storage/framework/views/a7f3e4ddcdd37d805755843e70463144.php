

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h1 class="mb-4">Edit Mobil</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('cars.update', $car->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group mb-3">
            <label for="brand">Brand:</label>
            <input type="text" name="brand" id="brand" value="<?php echo e(old('brand', $car->brand)); ?>" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" value="<?php echo e(old('model', $car->model)); ?>" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="license_plate">Plat Nomor:</label>
            <input type="text" name="license_plate" id="license_plate" value="<?php echo e(old('license_plate', $car->license_plate)); ?>" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="year">Tahun:</label>
            <input type="number" name="year" id="year" value="<?php echo e(old('year', $car->year)); ?>" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="price_per_day">Harga per Hari:</label>
            <input type="number" name="price_per_day" id="price_per_day" value="<?php echo e(old('price_per_day', $car->price_per_day)); ?>" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-select">
                <option value="available" <?php echo e($car->status == 'available' ? 'selected' : ''); ?>>Tersedia</option>
                <option value="rented" <?php echo e($car->status == 'rented' ? 'selected' : ''); ?>>Disewa</option>
                <option value="maintenance" <?php echo e($car->status == 'maintenance' ? 'selected' : ''); ?>>Maintenance</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?php echo e(route('cars.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_rentalcar\resources\views/cars/edit.blade.php ENDPATH**/ ?>