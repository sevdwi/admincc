<?php $__env->startSection('content'); ?>

<div class="container" style=" position: relative;">
    <h1 class="text-center text-white text-fw-bold my-4">Data Foto Pariwisata <?php echo e($pariwisata->nama); ?></h1>

    <a href="<?php echo e(route('pariwisata.data_images.create',$pariwisata->id)); ?>" class="btn btn-primary mb-3">Tambah</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <tr>
            <th>Nama Wisata</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($img->pariwisata->nama); ?></td>
            <td><img src="<?php echo e(asset('storage/'.$img->image)); ?>" width="100px" height="100px"><br><?php echo e($img->image); ?></td>
            <td>
                <a href="<?php echo e(route('pariwisata.data_images.edit',$img->id)); ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                <a href="<?php echo e(route('pariwisata.data_images.hapus',$img->id)); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                <button 
                class="btn btn-sm btn-success btn-view"
                data-image="<?php echo e(asset('storage/'.$img->image)); ?>"
                data-bs-toggle="modal"
                data-bs-target="#imageModal">
                <i class="fa fa-eye"></i>
            </button>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <a href="<?php echo e(route('pariwisata.index')); ?>" class="btn btn-success mb-3">Kembali</a>
</div>
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Detail Gambar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid">
            </div>

        </div>
    </div>
</div>
<script>
document.querySelectorAll('.btn-view').forEach(button => {

    button.addEventListener('click', function() {

        let image = this.getAttribute('data-image');

        document.getElementById('modalImage').src = image;

    });

});
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head-isi', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ghaninafiansyah/Documents/CODE/COMMAND_CENTER/CilacapSuperAppAdmin/resources/views/pariwisata/data_images.blade.php ENDPATH**/ ?>