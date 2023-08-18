<form action="<?= base_url('koperasi/siswa/create') ?>" method="post" class="needs-validation">

    <h5 class="card-title"><strong>Informasi Siswa</strong></h5>

    <div class="form-group row">
        <label for="nama_customer" class="col-sm-2 col-form-label">Nama Siswa</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session('field_error.nama_customer') ? 'is-invalid' : ''; ?>" id="nama_customer" placeholder="Nama Siswa" name="nama_customer">
            <?php if (session()->has('field_error.nama_customer')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.nama_customer'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="telp_customer" class="col-sm-2 col-form-label">Telepon Siswa</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session('field_error.telp_customer') ? 'is-invalid' : ''; ?>" id="telp_customer" placeholder="Telepon Siswa" name="telp_customer">
            <?php if (session()->has('field_error.telp_customer')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.telp_customer'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="nomor_kartu" class="col-sm-2 col-form-label">Nomor Kartu Siswa</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session('field_error.nomor_kartu') ? 'is-invalid' : ''; ?>" id="nomor_kartu" placeholder="No Kartu Siswa" name="nomor_kartu">
            <?php if (session()->has('field_error.nomor_kartu')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.nomor_kartu'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Saldo Kartu Siswa</label>
        <div class="col-sm-10">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control <?php echo session('field_error.saldo_kartu') ? 'is-invalid' : ''; ?>" placeholder="9.900" name="saldo_kartu" oninput="formatNumber(this)">
                <?php if (session()->has('field_error.saldo_kartu')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.saldo_kartu'); ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit" id="save">Simpan</button>
</form>