<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Inventory'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        :root { --teal: #0f766e; }
        .navbar { background-color: #ffffff; border-bottom: 1px solid #e2e8f0; }
        .navbar-brand { color: var(--teal); font-weight: 600; }
        .navbar-brand:hover { color: #115e59; }
        .nav-link.active { color: var(--teal); font-weight: 600; }
        .btn-primary { background-color: var(--teal); border-color: var(--teal); }
        .btn-primary:hover, .btn-primary:focus { background-color: #115e59; border-color: #115e59; }
        .btn-outline-primary { color: var(--teal); border-color: var(--teal); }
        .btn-outline-primary:hover { background-color: var(--teal); border-color: var(--teal); }
        a { color: var(--teal); }
        a:hover { color: #115e59; }
        .page-link { color: var(--teal); }
        .page-item.active .page-link { background-color: var(--teal); border-color: var(--teal); }
        .form-control:focus, .form-select:focus { border-color: var(--teal); box-shadow: 0 0 0 .2rem rgba(15,118,110,.25); }
        body { background-color: #f8fafc; color: #1e293b; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('products.index')); ?>">Inventory</a>
            <div class="navbar-nav">
                <a class="nav-link <?php echo e(request()->routeIs('products.*') ? 'active' : ''); ?>" href="<?php echo e(route('products.index')); ?>">Produk</a>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\Users\AULIA\tugas-putra\inventory-laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>