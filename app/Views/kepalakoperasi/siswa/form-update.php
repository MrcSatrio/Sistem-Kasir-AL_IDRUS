<form action="<?= base_url('koperasi/siswa/update/' . $siswa['id_customer']) ?>" method="post" class="needs-validation">

    <h5 class="card-title"><strong>Informasi Siswa</strong></h5>
            <?php if (session()->has('success')) : ?>
            <div class="alert alert-success">
                <?= session('success') ?>
            </div>
            <?php endif; ?>
    <div class="form-group row">
        <label for="nama_customer" class="col-sm-2 col-form-label">Nama Siswa</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session('field_error.nama_customer') ? 'is-invalid' : ''; ?>" id="nama_customer" placeholder="Nama Siswa" name="nama_customer" value="<?= $siswa['nama_customer']; ?>">
            <?php if (session()->has('field_error.nama_customer')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.nama_customer'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="telp_siswa" class="col-sm-2 col-form-label">Nomor Telepon Siswa</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session('field_error.telp_customer') ? 'is-invalid' : ''; ?>" id="telp_customer" placeholder="Nomor Telepon Siswa" name="telp_customer" value="<?= $siswa['telp_customer']; ?>">
            <?php if (session()->has('field_error.telp_customer')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.telp_customer'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <button class="btn btn-primary" type="submit" id="save">Simpan Data Pegawai</button>

</form>