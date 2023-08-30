<form action="<?= base_url('koperasi/produk/update/' . $produk['qr_produk']) ?>" method="post" class="needs-validation">

    <h5 class="card-title"><strong>Informasi Produk</strong></h5>

    <div class="form-group row">
        <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?php echo session('field_error.nama_produk') ? 'is-invalid' : ''; ?>" id="nama_produk" placeholder="Opsional" name="nama_produk" value="<?= $produk['nama_produk']; ?>">
            <?php if (session('field_error.nama_produk')) : ?>
                <div class="invalid-feedback">
                    <?php echo session('field_error.nama_produk'); ?>
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

    <div class="form-group row">
    <label for="id_kategori" class="col-sm-2 col-form-label">Kategori Produk</label>
    <div class="col-sm-10">
        <select class="form-control <?php echo session('field_error.id_kategori') ? 'is-invalid' : ''; ?>" id="id_kategori" name="id_kategori">
            <option value="">Pilih Kategori</option>
            <?php foreach ($kategoriList as $kategori) : ?>
                <option value="<?= $kategori['id_kategori']; ?>" <?= ($kategori['id_kategori'] == $produk['id_kategori']) ? 'selected' : ''; ?>>
                    <?= $kategori['nama_kategori']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (session('field_error.id_kategori')) : ?>
            <div class="invalid-feedback">
                <?php echo session('field_error.id_kategori'); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="form-group row">
    <label for="id_brand" class="col-sm-2 col-form-label">Brand Produk</label>
    <div class="col-sm-10">
        <select class="form-control <?php echo session('field_error.id_brand') ? 'is-invalid' : ''; ?>" id="id_brand" name="id_brand">
            <option value="">Pilih Kategori</option>
            <?php foreach ($brandList as $brand) : ?>
                <option value="<?= $brand['id_brand']; ?>" <?= ($brand['id_brand'] == $produk['id_brand']) ? 'selected' : ''; ?>>
                    <?= $brand['nama_brand']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (session('field_error.id_brand')) : ?>
            <div class="invalid-feedback">
                <?php echo session('field_error.id_brand'); ?>
            </div>
        <?php endif; ?>
    </div>
</div>


    <button class="btn btn-primary" type="submit" id="save">Simpan Produk</button>

</form>