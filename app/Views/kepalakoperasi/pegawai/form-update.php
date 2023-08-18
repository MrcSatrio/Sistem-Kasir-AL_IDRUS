<form action="<?= base_url('koperasi/pegawai/update/' . $pegawai['id_pegawai']) ?>" method="post" class="needs-validation">

    <h5 class="card-title"><strong>Informasi Pegawai</strong></h5>
            <?php if (session()->has('success')) : ?>
            <div class="alert alert-success">
                <?= session('success') ?>
            </div>
            <?php endif; ?>
    <div class="form-group row">
        <label for="nama_pegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session('field_error.nama_pegawai') ? 'is-invalid' : ''; ?>" id="nama_pegawai" placeholder="Nama Pegawai" name="nama_pegawai" value="<?= $pegawai['nama_pegawai']; ?>">
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
            <input type="text" class="form-control <?php echo session('field_error.telp_pegawai') ? 'is-invalid' : ''; ?>" id="telp_pegawai" placeholder="Nomor Telepon Pegawai" name="telp_pegawai" value="<?= $pegawai['telp_pegawai']; ?>">
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
        <textarea class="form-control <?php echo session('field_error.alamat_pegawai') ? 'is-invalid' : ''; ?>" id="alamat_pegawai" placeholder="Alamat Pegawai" name="alamat_pegawai" rows="3"><?= $pegawai['alamat_pegawai']; ?></textarea>
        <?php if (session()->has('field_error.alamat_pegawai')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.alamat_pegawai'); ?>
                </div>
            <?php endif; ?>
    </div>
</div>

    <button class="btn btn-primary" type="submit" id="save">Simpan Data Pegawai</button>

</form>