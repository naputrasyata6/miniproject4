<?php $__env->startSection('title', 'Daftar Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">Daftar Produk</h1>
    <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary btn-sm">Tambah Produk</a>
</div>

<form method="GET" action="<?php echo e(route('products.index')); ?>" class="row g-2 mb-3">
    <div class="col-sm-5">
        <label for="search" class="visually-hidden">Cari produk</label>
        <input type="text" id="search" name="search" class="form-control form-control-sm" placeholder="Cari nama produk..." value="<?php echo e(request('search')); ?>">
    </div>
    <div class="col-sm-4">
        <label for="category_id" class="visually-hidden">Filter kategori</label>
        <select id="category_id" name="category_id" class="form-select form-select-sm">
            <option value="">Semua Kategori</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>" <?php if(request('category_id') == $category->id): echo 'selected'; endif; ?>><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-sm-3">
        <button type="submit" class="btn btn-outline-primary btn-sm w-100">Filter</button>
    </div>
</form>

<div class="table-responsive">
    <table class="table table-sm align-middle bg-white">
        <thead>
            <tr>
                <th>SKU</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th class="text-end">Harga</th>
                <th class="text-end">Stok</th>
                <th>Status</th>
                <th class="text-end">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($product->sku); ?></td>
                    <td><a href="<?php echo e(route('products.show', $product)); ?>"><?php echo e($product->name); ?></a></td>
                    <td><?php echo e($product->category->name); ?></td>
                    <td class="text-end">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></td>
                    <td class="text-end"><?php echo e($product->stock); ?></td>
                    <td>
                        <?php if($product->isLowStock()): ?>
                            <span class="badge text-bg-warning">Stok Rendah</span>
                        <?php else: ?>
                            <span class="badge text-bg-success">Aman</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end">
                        <a href="<?php echo e(route('products.edit', $product)); ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form method="POST" action="<?php echo e(route('products.destroy', $product)); ?>" class="d-inline" onsubmit="return confirm('Hapus produk ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">Belum ada produk.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php echo e($products->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\AULIA\tugas-putra\inventory-laravel\resources\views/products/index.blade.php ENDPATH**/ ?>