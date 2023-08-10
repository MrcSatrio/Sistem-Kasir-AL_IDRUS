<?= $this->extend('auth/template/index'); ?>

<?= $this->section('container'); ?>

    <div class="login-card-container">
        <div class="login-card">
            
            <div class="login-card-header">
                <h1>Selamat Datang!</h1>
                <div>Silahkan login menggunakan Username</div>
            </div>
            <form class="login-card-form" method='POST' action="<?= base_url('login') ?>">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">
                        person
                        </span>
                    <input type="text" placeholder="Username" required autofocus name="username" id="username">
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" required placeholder="Password" name="password" id="pass">
                    </div>
                    <div class="footer-form">
                    <a href="#">Cek saldo ku</a><br>
                    </div>
                    <button type="submit">Masuk</button>
            </form>
            <div class="login-card-footer">

            </div>
        </div>
    </div>

</html>

<?= $this->endSection(); ?>