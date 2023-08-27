<?= $this->extend('auth/template/index'); ?>

<?= $this->section('container'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
<div class="login-card-container">
    <div class="login-card">
        <div class="login-card-header">
            <h1>Selamat Datang!</h1>
            <div>Silahkan login menggunakan Username</div>
        </div>

        <?php if (session()->has('gagal')) : ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        title: 'Gagal!',
                        icon: 'error',
                        text: '<?= session('gagal') ?>',
                    });
                });
            </script>
        <?php endif; ?>
        <form class="login-card-form" method='POST' action="<?= base_url('login') ?>">
            <div class="form-item">
                <span class="form-item-icon material-symbols-rounded">
                    person
                </span>
                <input type="text" placeholder="Username" required autofocus name="username" id="username">
            </div>
            
            <div class="form-item">                
                <span class="form-item-icon material-symbols-rounded">lock</span>
                <input type="password" required placeholder="Password" name="password" id="pass" > 
                <span toggle="#password" class="fa fa-fw field-icon toggle-password fa-eye"></span>     
                
            </div>
            
            <button type="submit">Masuk</button>
        </form>
        <div class="login-card-footer">

        </div>
    </div>
</div>
<script>
    var passwordField = document.getElementById("pass");
    var togglePassword = document.querySelector(".toggle-password");

    togglePassword.addEventListener("click", function() {
        var type = passwordField.getAttribute("type");
        if (type === "password") {
            passwordField.setAttribute("type", "text");
            togglePassword.classList.remove("fa-eye");
            togglePassword.classList.add("fa-eye-slash");
        } else {
            passwordField.setAttribute("type", "password");
            togglePassword.classList.remove("fa-eye-slash");
            togglePassword.classList.add("fa-eye");
        }
    });
</script>
</html>

<?= $this->endSection(); ?>