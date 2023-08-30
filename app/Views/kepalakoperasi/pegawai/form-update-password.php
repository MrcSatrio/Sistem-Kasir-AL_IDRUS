<form action="<?= base_url('koperasi/pegawai/update_password/' . $pegawai['id_pegawai']) ?>" method="post" class="needs-validation">

    <h5 class="card-title"><strong>Ubah Password Pegawai</strong></h5>
            <?php if (session()->has('success')) : ?>
            <div class="alert alert-success">
                <?= session('success') ?>
            </div>
            <?php endif; ?>
            <?php if (session()->has('error_lm')) : ?>
            <div class="alert alert-danger">
                <?= session('error_lm') ?>
            </div>
        <?php endif; ?>
        <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
        <div class="input-group">
            <input type="password" class="form-control <?php echo session('field_error.password') ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" name="password" value="">
            <div class="input-group-append">
                <span class="input-group-text toggle-password" toggle="#password">
                    <i class="fa fa-eye field-icon"></i>
                </span>
            </div>
        </div>
        <?php if (session()->has('field_error.password')) : ?>
            <div class="invalid-feedback">
                <?php echo session('field_error.password'); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="form-group row">
    <label for="password_confirm" class="col-sm-2 col-form-label">Confirm Password</label>
    <div class="col-sm-10">
        <div class="input-group">
            <input type="password" class="form-control <?php echo session('field_error.password_confirm') ? 'is-invalid' : ''; ?>" id="password_confirm" placeholder="Confirm Password" name="password_confirm">
            <div class="input-group-append">
                <span class="input-group-text toggle-password" toggle="#password_confirm">
                    <i class="fa fa-eye field-icon"></i>
                </span>
            </div>
        </div>
        <?php if (session()->has('field_error.password_confirm')) : ?>
            <div class="invalid-feedback">
                <?php echo session('field_error.password_confirm'); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const togglePasswordIcons = document.querySelectorAll(".toggle-password");

        togglePasswordIcons.forEach(icon => {
            icon.addEventListener("click", function() {
                const target = document.querySelector(this.getAttribute("toggle"));
                if (target.type === "password") {
                    target.type = "text";
                } else {
                    target.type = "password";
                }
            });
        });
    });
</script>

    <button class="btn btn-primary" type="submit" id="save">Simpan Password Pegawai</button>

</form>