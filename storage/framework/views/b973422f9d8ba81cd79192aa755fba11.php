<form action="<?php echo e(route('pariwisata_images.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <label>Wisata</label>
    <select name="pariwisata_id" required>
        <?php $__currentLoopData = $pariwisata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($p->id); ?>"><?php echo e($p->nama); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <br><br>

    <label>Upload Gambar</label>
    <input type="file" name="images[]" multiple required>

    <br><br>

    <button type="submit">Upload</button>
</form><?php /**PATH C:\Users\sevan\Documents\Diskominfo Kerja Teknis\cc\app-laravel\admincc\resources\views/pariwisata_images/create.blade.php ENDPATH**/ ?>