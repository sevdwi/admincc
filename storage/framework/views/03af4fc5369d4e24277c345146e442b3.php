<?php $__env->startSection('content'); ?>
<div class="container" style=" position: relative;background-color: #fff;">
    <h3 class="text-center text-black my-4">Edit Foto Pariwisata</h3>
    <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-success mt-3 mb-3">Kembali</a> 
   <form action="<?php echo e(route('pariwisata.data_images.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?> 

    <div class="mb-3">
        <label class="form-label">Nama Tempat</label>
        <input type="text" name="nama" value="<?php echo e($pariwisata->nama); ?>" class="form-control">
        <input type="hidden" name="id" value="<?php echo e($pariwisata->id); ?>" class="form-control">
    </div> 

    <div class="mb-3">
        <label class="form-label">Upload Gambar</label>

        <?php if($pariwisata->image): ?>
            <div class="mb-2">
                <img src="<?php echo e(asset('storage/'.$pariwisata->image)); ?>" width="150" class="img-thumbnail">
            </div>
        <?php endif; ?>

        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-primary">Update Data</button><br><br><br>
</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head-isi', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sevan\Documents\Diskominfo Kerja Teknis\cc\app-laravel\admincc\resources\views/pariwisata/data_images_crt.blade.php ENDPATH**/ ?>