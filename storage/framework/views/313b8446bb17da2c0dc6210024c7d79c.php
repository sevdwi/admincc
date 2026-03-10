

<?php $__env->startSection('content'); ?>
<div class="container" style=" position: relative;">
    <!-- <a href="<?php echo e(route('pariwisata_images.create')); ?>" class="btn btn-primary mt-4 mb-4">
        Tambah Gambar
    </a> -->
    <h1 class="text-center text-white text-fw-bold my-5">Gallery Gambar Pariwisata</h1>

    <div class="row">

        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-md-4 col-lg-3 mb-4 my-6">
            <div class="card shadow-sm h-100">

                <img src="<?php echo e(asset('storage/'.$img->image)); ?>" 
                    class="card-img-top" 
                    style="height:200px; object-fit:cover;">

                <div class="card-body text-center">

                    <h6 class="card-title">
                        <?php echo e($img->pariwisata?->nama ?? 'Pariwisata tidak ditemukan'); ?>

                    </h6>

                    <form action="<?php echo e(route('pariwisata_images.destroy',$img->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-sm btn-danger">
                            Hapus
                        </button>
                    </form>

                </div>

            </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

    <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-success mb-3">Kembali</a>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.head-isi', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sevan\Documents\Diskominfo Kerja Teknis\cc\app-laravel\admincc\resources\views/pariwisata_images/index.blade.php ENDPATH**/ ?>