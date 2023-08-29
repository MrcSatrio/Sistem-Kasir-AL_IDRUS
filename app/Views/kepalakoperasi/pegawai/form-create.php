<form action="<?= base_url('koperasi/pegawai/insert') ?>" method="post" class="needs-validation">

    <h5 class="card-title"><strong>Informasi Pegawai</strong></h5>
        <?php if (session()->has('success')) : ?>
            <div class="alert alert-success">
                <?= session('success') ?>
            </div>
        <?php endif; ?>
    <div class="form-group row">
        <div class="col-sm-10">
            <input type="hidden" class="form-control" id="id_role" name="id_role" value="2">
        </div>
    </div>

    <div class="form-group row">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session('field_error.username') ? 'is-invalid' : ''; ?>" id="username" placeholder="Username" name="username">
            <?php if (session()->has('field_error.username')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.username'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
        <div class="input-group">
            <input type="password" class="form-control <?php echo session('field_error.password') ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" name="password">
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

    <div class="form-group row">
        <label for="nama_pegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session('field_error.nama_pegawai') ? 'is-invalid' : ''; ?>" id="nama_pegawai" placeholder="Nama Pegawai" name="nama_pegawai">
            <?php if (session()->has('field_error.nama_pegawai')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.nama_pegawai'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="telp_pegawai" class="col-sm-2 col-form-label">Nomor Telepon Pegawai</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session('field_error.telp_pegawai') ? 'is-invalid' : ''; ?>" id="telp_pegawai" placeholder="Nomor Telepon Pegawai" name="telp_pegawai">
            <?php if (session()->has('field_error.telp_pegawai')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.telp_pegawai'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group row">
    <label for="alamat_pegawai" class="col-sm-2 col-form-label">Alamat Pegawai</label>
    <div class="col-sm-10">
        <textarea class="form-control <?php echo session('field_error.alamat_pegawai') ? 'is-invalid' : ''; ?>" id="alamat_pegawai" placeholder="Alamat Pegawai" name="alamat_pegawai" rows="3"></textarea>
        <?php if (session()->has('field_error.alamat_pegawai')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.alamat_pegawai'); ?>
                </div>
            <?php endif; ?>
    </div>
</div>

    <button class="btn btn-primary" type="submit" id="save">Simpan Data Pegawai</button>

</form>

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
