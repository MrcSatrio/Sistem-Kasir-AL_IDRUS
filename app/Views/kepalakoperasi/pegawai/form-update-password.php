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
            <input type="password" class="form-control <?php echo session('field_error.password') ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" name="password" value="">
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
            <input type="password" class="form-control" id="password_confirm" placeholder="Confirm Password" name="password_confirm" value="">
        </div>
    </div>
    <button class="btn btn-primary" type="submit" id="save">Simpan Password Pegawai</button>

</form>