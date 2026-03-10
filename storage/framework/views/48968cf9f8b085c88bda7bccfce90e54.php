

<?php $__env->startSection('content'); ?>
       
<div id="particles">
    <div class="container-fluid main-content d-flex justify-content-evenly">
            <div style="width:400px;height:330px;">
                <div class="card shadow" style="background: rgba(255, 255, 255, 0.5); border: none;">
                    <div class="card-body text-center">
                        <img src="<?php echo e(asset('images/server.png')); ?>" width="60" class="mb-3">
                        <form action="<?php echo e(route('ormas.login')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control"  id="username" name="username" required autofocus >
                                
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required  >
                                <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Masuk</button>
                            <button type="submit" class="btn btn-success"><a href="<?php echo e(route('page.register')); ?>"style="color: #fff;">Buat Akun</a></button>
                        </form>
                    </div>
                </div>
            </div>       
    </div>
</div>
    <!-- view passowrd -->
    <script type="text/javascript">
        const showPassword = document.getElementById("showPassword");
        const passwordField = document.getElementById("password");

        showPassword.addEventListener("change", function () {
            passwordField.type = this.checked ? "text" : "password";
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sevan\Documents\Diskominfo Kerja\cc\app-laravel\admincc-app\resources\views/auth/login.blade.php ENDPATH**/ ?>