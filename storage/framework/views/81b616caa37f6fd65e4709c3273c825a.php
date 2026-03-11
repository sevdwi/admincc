<?php $__env->startSection('content'); ?>
<div class="container" style=" position: relative;">
    <h3 class="text-center text-white my-4">Tambah pariwisata</h3>
    <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-success mt-3 mb-3">Kembali</a>
    <form action="<?php echo e(route('pariwisata.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <input type="text" name="nama" class="form-control mb-2" placeholder="Nama">
        <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi"></textarea>
        <input type="text" name="alamat" class="form-control mb-2" placeholder="Alamat">
        <input type="text" name="latlong" class="form-control mb-2" placeholder="LatLong">

        <button class="btn btn-primary">Simpan</button>
    </form>
    

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head-isi', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ghaninafiansyah/Documents/CODE/COMMAND_CENTER/CilacapSuperAppAdmin/resources/views/pariwisata/create.blade.php ENDPATH**/ ?>