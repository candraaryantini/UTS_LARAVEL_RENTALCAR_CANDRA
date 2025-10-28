

<?php $__env->startSection('title', 'Edit Cutomers - Rental Car'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
    
    body {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
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
        color: #38f9d7;
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

    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 12px 18px;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    .form-control:focus {
        border-color: #38f9d7;
        box-shadow: 0 0 0 0.2rem rgba(56, 249, 215, 0.25);
        transform: translateY(-2px);
    }

    .form-control:hover {
        border-color: #38f9d7;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    .text-danger {
        font-size: 0.85rem;
        margin-top: 5px;
    }

    .btn-submit {
        background: linear-gradient(135deg, #43e97b, #38f9d7);
        border: none;
        color: white;
        padding: 12px 35px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(56, 249, 215, 0.4);
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(56, 249, 215, 0.5);
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
        .form-container {
            padding: 25px;
        }
    }
</style>

<div class="container py-5">
    <div class="form-container">
        <!-- Header -->
        <div class="form-header">
            <h2>✏️ Edit Pelanggan</h2>
            <p>Perbarui data pelanggan</p>
        </div>

        <!-- Form -->
        <form action="<?php echo e(route('customers.update', $customer->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="name" class="form-label">
                    <i class="bi bi-person-fill me-1"></i> Nama Lengkap
                </label>
                <input type="text" name="name" id="name" 
                       class="form-control"
                       value="<?php echo e(old('name', $customer->name)); ?>" 
                       required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">
                    <i class="bi bi-envelope-fill me-1"></i> Email
                </label>
                <input type="email" name="email" id="email" 
                       class="form-control"
                       value="<?php echo e(old('email', $customer->email)); ?>" 
                       required>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="mb-3">
                <label for="phone" class="form-label">
                    <i class="bi bi-telephone-fill me-1"></i> Nomor Telepon
                </label>
                <input type="text" name="phone" id="phone" 
                       class="form-control"
                       value="<?php echo e(old('phone', $customer->phone)); ?>">
                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="mb-4">
                <label for="address" class="form-label">
                    <i class="bi bi-geo-alt-fill me-1"></i> Alamat
                </label>
                <textarea name="address" id="address" 
                          class="form-control" 
                          rows="3"><?php echo e(old('address', $customer->address)); ?></textarea>
                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <!-- Buttons -->
            <div class="d-flex gap-3 justify-content-center">
                <button type="submit" class="btn btn-submit">
                    <i class="bi bi-save me-2"></i>
                    Update Data
                </button>
                <a href="<?php echo e(route('customers.index')); ?>" class="btn btn-cancel">
                    <i class="bi bi-arrow-left me-2"></i>
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_rentalcar\resources\views/customers/edit.blade.php ENDPATH**/ ?>