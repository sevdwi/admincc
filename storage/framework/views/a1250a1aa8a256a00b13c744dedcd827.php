<?php $__env->startSection('content'); ?>

<div class="container" style=" position: relative;">
    <h1 class="text-center text-white text-fw-bold my-4">Data Pariwisata</h1>

    <a href="<?php echo e(route('pariwisata.create')); ?>" class="btn btn-primary mb-3">Tambah</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php $__currentLoopData = $pariwisata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($w->nama); ?></td>
            <td><?php echo e($w->alamat); ?></td>
            <td>
                <a href="<?php echo e(route('pariwisata.images', $w)); ?>" class="btn btn-primary btn-sm" title="upload gambar"><i class="fa fa-upload"></i></a>
                <a href="<?php echo e(route('pariwisata.edit', $w)); ?>" class="btn btn-warning btn-sm" title="edit data"><i class="fa fa-edit"></i></a>

                <form action="<?php echo e(route('pariwisata.destroy', $w)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-success mb-3">Kembali</a>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head-isi', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_PHP8\htdocs\admincc\resources\views/pariwisata/index.blade.php ENDPATH**/ ?>