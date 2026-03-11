<?php $__env->startSection('content'); ?>


  <!-- Main Content -->
  <div class="main-content">
    <div class="menu-container">

      <!-- Menu Item: Layanan Individu ASN (Top Left) -->
      <a href="<?php echo e(route('pariwisata.index')); ?>" class="menu-item item-top-left">
        <i class="bi bi-brightness-alt-high-fill"></i>
        <span class="text-uppercase">
            <h5> Pariwisata</h5>
        </span> 
      </a>

      <!-- Menu Item: Layanan Manajemen ASN Instansi (Top Right) -->
      <a href="<?php echo e(route('pariwisata_images.index')); ?>" class="menu-item item-top-right">
        <i class="bi bi-person-badge"></i>
        <span>
          <h5> Gallery Pariwisata</h5>
        </span>
      </a>

      <!-- Menu Item: Layanan Seleksi (Middle Left) -->
      <a href="#" class="menu-item item-middle-left">
        <i class="bi bi-building-fill-check"></i>
        <span class="text-uppercase">Layanan lainnyaa</span>
      </a>

      <!-- Center BKN Logo -->
      <div class="circle-center">
      <img src="<?php echo e(asset('images/server.png')); ?>" alt="CC Logo" class="bkn-icon">
        <div class="bkn-logo-text text-center">Command Center</div>
      </div>

      <!-- Menu Item: Layanan Pendukung (Middle Right) -->
      <a href="#" class="menu-item item-middle-right">
        <i class="bi bi-gear-wide-connected"></i>
        <span class="text-uppercase">Layanan lainnyaa</span>
      </a>

    </div>

    <!-- Majalah Digital Button -->
    <a href="https://cc.cilacapkab.go.id" class="btn-majalah">
      <i class="bi bi-book-half"></i>
      Dashboar utama Command Center
    </a>
  </div>

  <div class="privacy-link">Privacy · Terms</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.head-isi', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ghaninafiansyah/Documents/CODE/COMMAND_CENTER/CilacapSuperAppAdmin/resources/views/dashboard.blade.php ENDPATH**/ ?>