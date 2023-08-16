<form action="<?= base_url('koperasi/brand/update/' . $brand['id_brand']) ?>" method="post" class="needs-validation">

    <h5 class="card-title"><strong>Informasi Brand</strong></h5>

    <div class="form-group row">
        <label for="nama_brand" class="col-sm-2 col-form-label">Nama Brand</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session()->has('field_error.nama_brand') ? 'is-invalid' : ''; ?>" id="nama_brand" placeholder="Faber Castle" name="nama_brand" value="<?= $brand['nama_brand']; ?>">
            <?php if (session()->has('field_error.nama_brand')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.nama_brand'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group row">
        <label for="produsen_brand" class="col-sm-2 col-form-label">Produsen Brand</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session('field_error.produsen_brand') ? 'is-invalid' : ''; ?>" id="produsen_brand" placeholder="Opsional" name="produsen_brand" value="<?= $brand['produsen_brand']; ?>">
            <?php if (session('field_error.produsen_brand')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.produsen_brand'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <button class="btn btn-primary" type="submit" id="save">Simpan Brand</button>

</form>