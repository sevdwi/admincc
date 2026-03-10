<?php $__env->startSection('content'); ?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

body {
    font-family: 'Poppins', sans-serif;
}

/* Background */
body {
    font-family: 'Poppins', sans-serif;
    background:
        linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
        url('/images/cc-dremina.png');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

/* penting — jangan punya background sendiri */
#particles {
    min-height: 100vh;
    display: flex;
    align-items: center;
    background: transparent; /* 🔥 ini kuncinya */
}

/* Glass Card */
.login-card {
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.18);
    transition: all .3s ease;
}

.login-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.25);
}

/* Input */
.form-control {
    border-radius: 12px;
    padding: 12px;
    border: 1px solid rgba(255,255,255,0.3);
}

.form-control:focus {
    box-shadow: 0 0 0 0.15rem rgba(13,110,253,.25);
    border-color: #0d6efd;
}

/* Button */
.btn-primary {
    border-radius: 12px;
    padding: 10px;
    font-weight: 500;
    letter-spacing: .3px;
    transition: all .25s ease;
}

.btn-primary:hover {
    transform: scale(1.03);
}

/* Title */
.login-title {
    font-weight: 600;
    font-size: 20px;
    margin-bottom: 10px;
}

/* Error Alert */
.alert-custom {
    background: rgba(255, 0, 0, 0.12);
    border: 1px solid rgba(255, 0, 0, 0.25);
    color: #ffb3b3;
    border-radius: 12px;
    padding: 10px;
    text-align: center;
    margin-top: 15px;
}
</style>


<div id="particles">
    <div class="container-fluid d-flex justify-content-center">
        <div class="align-self-center" style="width:420px;">
            
            <div class="card login-card shadow-lg">
                <div class="card-body text-center p-4">

                    <img src="<?php echo e(asset('images/server.png')); ?>" width="70" class="mb-3">

                    <div class="login-title text-white mb-4">
                        Selamat Datang 👋
                    </div>

                    <form action="/login" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3 text-start">
                            <label class="form-label text-white">Nomor HP</label>
                            <input type="number" class="form-control"
                                   name="number" required>
                        </div>

                        <div class="mb-2 text-start">
                            <label class="form-label text-white">Password</label>
                            <input type="password" class="form-control"
                                   id="password" name="password" required>
                        </div>

                        <div class="form-check text-start mb-3">
                            <input class="form-check-input" type="checkbox" id="showPassword">
                            <label class="form-check-label text-white">
                                Tampilkan Password
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            🚀 Masuk
                        </button>
                    </form>

                    
                    <?php if($errors->any()): ?>
                        <div class="alert-custom">
                            <?php echo e($errors->first()); ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</div>


<script>
document.getElementById("showPassword").addEventListener("change", function () {
    document.getElementById("password").type =
        this.checked ? "text" : "password";
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_PHP8\htdocs\admincc\resources\views/auth/login.blade.php ENDPATH**/ ?>