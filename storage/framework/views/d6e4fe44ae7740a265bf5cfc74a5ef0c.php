<?php $__env->startSection('content'); ?>

<div id="particles" style="overflow: auto">
    <div class="container-fluid main-content d-flex justify-content-evenly" style="margin-top: 100px ; margin-bottom: 200px;">
            <div class="align-self-start" style="width:400px;height:330px;">
                <div class="card shadow" style="background: rgba(255, 255, 255, 0.5); border: none;">
                    <div class="card-body text-center">
                        <img src="<?php echo e(asset('images/server.png')); ?>" width="60" class="mb-3">
                        <h1 class="mt-1 mb-2">Daftar Akun</h1>
                        <form action="<?php echo e(route('users.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control"  name="name" required autofocus >
                                
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required  >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="number" class="form-control" id="number" name="number" required  >
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required  >
                                <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
                            </div>

                            <button type="submit" class="btn btn-primary">Daftar</button>
                            <button type="submit" class="btn btn-success"><a href="<?php echo e(route('login')); ?>"style="color: #fff;">Back to Login</a></button>

                        </form>
                    </div>
                </div>
            </div>       
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ghaninafiansyah/Documents/CODE/COMMAND_CENTER/CilacapSuperAppAdmin/resources/views/users/create.blade.php ENDPATH**/ ?>