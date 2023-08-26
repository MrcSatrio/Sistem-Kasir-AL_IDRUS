<form action="<?= base_url('koperasi/pegawai/insert') ?>" method="post" class="needs-validation">

    <h5 class="card-title"><strong>Informasi Pegawai</strong></h5>
    <?php if (session()->has('break_the_rules')) : ?>
            <div class="alert alert-danger">
                <?= session('break_the_rules') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->has('error_lm')) : ?>
            <div class="alert alert-danger">
                <?= session('error_lm') ?>
            </div>
        <?php endif; ?>
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
            <input type="text" class="form-control" id="username" placeholder="Username" name="username">
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>
    </div>
    <div class="form-group row">
        <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password_confirm" placeholder="Confirm Password" name="password_confirm">
        </div>
    </div>
    <div class="form-group row">
        <label for="nama_pegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_pegawai" placeholder="Nama Pegawai" name="nama_pegawai">
        </div>
    </div>
    <div class="form-group row">
        <label for="telp_pegawai" class="col-sm-2 col-form-label">Nomor Telepon Pegawai</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="telp_pegawai" placeholder="Nomor Telepon Pegawai" name="telp_pegawai">
        </div>
    </div>
    <div class="form-group row">
    <label for="alamat_pegawai" class="col-sm-2 col-form-label">Alamat Pegawai</label>
    <div class="col-sm-10">
        <textarea class="form-control" id="alamat_pegawai" placeholder="Alamat Pegawai" name="alamat_pegawai" rows="3"></textarea>
    </div>
</div>

    <button class="btn btn-primary" type="submit" id="save">Simpan Data Pegawai</button>

</form>