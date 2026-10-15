<?php $__env->startSection('title', 'Tambah Produk'); ?>

<?php $__env->startSection('content'); ?>
<h1 class="h4 mb-3">Tambah Produk</h1>

<form method="POST" action="<?php echo e(route('products.store')); ?>" class="card card-body bg-white">
    <?php echo csrf_field(); ?>
    <?php echo $__env->make('products._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="mt-3">
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-link btn-sm">Batal</a>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AULIA\tugas-putra\inventory-laravel\resources\views/products/create.blade.php ENDPATH**/ ?>