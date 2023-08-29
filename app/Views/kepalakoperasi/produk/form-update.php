<form action="<?= base_url('koperasi/produk/update/' . $produk['qr_produk']) ?>" method="post" class="needs-validation">

    <h5 class="card-title"><strong>Informasi Produk</strong></h5>

    <div class="form-group row">
        <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session()->has('field_error.nama_produk') ? 'is-invalid' : ''; ?>" id="nama_produk" placeholder="Faber Castle" name="nama_produk" value="<?= $produk['nama_produk']; ?>"disabled>
            <?php if (session()->has('field_error.nama_produk')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.nama_produk'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group row">
        <label for="qr_produk" class="col-sm-2 col-form-label">Barcode Produk</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session('field_error.qr_produk') ? 'is-invalid' : ''; ?>" id="qr_produk" placeholder="Opsional" name="qr_produk" value="<?= $produk['qr_produk']; ?>"disabled>
            <?php if (session('field_error.qr_produk')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.qr_produk'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="produsen_brand" class="col-sm-2 col-form-label">Kategori Produk</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session('field_error.produsen_brand') ? 'is-invalid' : ''; ?>" id="kategori_produk" placeholder="Opsional" name="kategori_produk" value="<?= $produk['nama_kategori']; ?>"disabled>
            <?php if (session('field_error.produsen_brand')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.produsen_brand'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="produsen_brand" class="col-sm-2 col-form-label">Brand Produk</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session('field_error.produsen_brand') ? 'is-invalid' : ''; ?>" id="brand_produk" placeholder="Opsional" name="brand_produk" value="<?= $produk['nama_brand']; ?>"disabled>
            <?php if (session('field_error.produsen_brand')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.produsen_brand'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="harga_produk" class="col-sm-2 col-form-label">Harga Produk</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session('field_error.harga_produk') ? 'is-invalid' : ''; ?>" id="harga_produk" placeholder="Opsional" name="harga_produk" value="<?= $produk['harga_produk']; ?>">
            <?php if (session('field_error.harga_produk')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.harga_produk'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <button class="btn btn-primary" type="submit" id="save">Simpan Produk</button>

</form>