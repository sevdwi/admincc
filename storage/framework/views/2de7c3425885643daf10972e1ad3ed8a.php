

<?php $__env->startSection('content'); ?>
<div class="container" style=" position: relative;">
    <h3 class="text-center text-white my-4">Edit pariwisata</h3>
    <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-success mt-3 mb-3">Kembali</a>

    <div class="card" style="width: 80rem;">

        <form action="<?php echo e(route('pariwisata.update', $pariwisata)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <input type="text" name="nama" value="<?php echo e($pariwisata->nama); ?>" class="form-control card-header mb-2">
            <ul class="list-group list-group-flush">
            <textarea name="deskripsi" class="form-control list-group-item mb-2"><?php echo e($pariwisata->deskripsi); ?></textarea>
            <input type="text" name="alamat" value="<?php echo e($pariwisata->alamat); ?>" class="form-control list-group-item mb-2">
            <input type="text" name="latlong" value="<?php echo e($pariwisata->latlong); ?>" class="form-control list-group-item mb-2">
            </ul>
    </div>
            <button class="btn btn-primary mt-4">Update</button>
        </form>




</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head-isi', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sevan\Documents\Diskominfo Kerja Teknis\cc\app-laravel\admincc\resources\views/pariwisata/edit.blade.php ENDPATH**/ ?>