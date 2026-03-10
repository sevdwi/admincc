

<?php $__env->startSection('content'); ?>

<div id="particles">
    <div class="container-fluid main-content d-flex justify-content-evenly">
            <div style="width:400px;height:330px;">
                <div class="card shadow" style="background: rgba(255, 255, 255, 0.5); border: none;">
                    <div class="card-body text-center">
                        <img src="<?php echo e(asset('images/server.png')); ?>" width="60" class="mb-3">
                        <h1 class="mt-1 mb-2">Daftar Akun</h1>
                        <form action="<?php echo e(route('cc.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control"  name="nama_user" required autofocus >
                                
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required  >
                                <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" required  >
                            </div>
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>       
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function () {
     const passwordsInput = document.getElementById("passwords");

    function validatepasswords(passwords) {

        const minLength = passwords.length >= 8;
        const hasLower = /[a-z]/.test(passwords);
        const hasUpper = /[A-Z]/.test(passwords);
        const hasNumber = /[0-9]/.test(passwords);
        const hasSymbol = /[^A-Za-z0-9]/.test(passwords);

        return minLength && hasLower && hasUpper && hasNumber && hasSymbol;
    }

    function checkpasswords() {
        const passwords = passwordsInput.value;

        if (passwords.length === 0) return;

        if (validatepasswords(passwords)) {
            alertify.success("passwords sudah memenuhi kriteria keamanan ✅");
        } else {
            alertify.error("passwords minimal 8 karakter, kombinasi huruf besar, kecil, angka & simbol ❌");
        }
    }

    // Saat pindah field (blur)
    passwordsInput.addEventListener("blur", checkpasswords);

    const nomor_hpInput = document.getElementById("nomor_hp");

    function validateHp(nomor_hp) {

        const minLength = nomor_hp.length >= 10;
        const maxLength = nomor_hp.length <= 13;
        // const hasLower = /[a-z]/.test(passwords);
        // const hasUpper = /[A-Z]/.test(passwords);
        const hasNumber = /[0-9]/.test(nomor_hp);
        // const hasSymbol = /[^A-Za-z0-9]/.test(passwords);

        return minLength && maxLength && hasNumber;
    }

    function checkHp() {
        const nomor_hp = nomor_hpInput.value;

        if (nomor_hp.length === 0) return;

        if (validateHp(nomor_hp)) {
            alertify.success("No Hp sudah memenuhi kriteria ✅");
        } else {
            alertify.error("No Hp minimal 10 karakter dan maksimal 13 karakter berisi angka saja ❌");
        }
    }

    // Saat pindah field (blur)
    nomor_hpInput.addEventListener("blur", checkHp);



    function resetSelect(id, placeholder) {
        $(id).html('<option value="">' + placeholder + '</option>').prop('disabled', true);
        // alertify.success("Semua Data sudah ditampilkan✅");
    }

});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sevan\Documents\Diskominfo Kerja\cc\app-laravel\admincc-app\resources\views/auth/daftar.blade.php ENDPATH**/ ?>