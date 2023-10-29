<form action="<?= base_url('koperasi/produk/update')?>" method="post">

    <h5 class="card-title"><strong>Informasi Produk</strong></h5>
    <input type="hidden" name="qr_produk" id="qr_produk" value="<?= $produk['qr_produk']; ?>">
     <div class="form-group row">
        <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_produk" placeholder="Opsional" name="nama_produk" value="<?= $produk['nama_produk']; ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="harga_produk" class="col-sm-2 col-form-label">Harga Jual</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="harga_produk" placeholder="Opsional" name="harga_produk" value="<?= $produk['harga_produk']; ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="harga_beli" class="col-sm-2 col-form-label">Harga Beli</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="harga_beli" placeholder="Opsional" name="harga_beli" value="<?= $produk['harga_beli']; ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="stok" class="col-sm-2 col-form-label">Stok Barang</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="stok" placeholder="Opsional" name="stok" value="<?= $produk['stok']; ?>">
        </div>
    </div>

    <div class="form-group row">
    <label for="id_kategori" class="col-sm-2 col-form-label">Kategori Produk</label>
    <div class="col-sm-10">
        <select class="form-control" id="id_kategori" name="id_kategori">
            <option value="">Pilih Kategori</option>
            <?php foreach ($kategoriList as $kategori) : ?>
                <option value="<?= $kategori['id_kategori']; ?>" <?= ($kategori['id_kategori'] == $produk['id_kategori']) ? 'selected' : ''; ?>>
                    <?= $kategori['nama_kategori']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="id_brand" class="col-sm-2 col-form-label">Brand Produk</label>
    <div class="col-sm-10">
        <select class="form-control" id="id_brand" name="id_brand">
            <option value="">Pilih Kategori</option>
            <?php foreach ($brandList as $brand) : ?>
                <option value="<?= $brand['id_brand']; ?>" <?= ($brand['id_brand'] == $produk['id_brand']) ? 'selected' : ''; ?>>
                    <?= $brand['nama_brand']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>


    <button class="btn btn-primary" type="submit" id="save">Simpan Produk</button>

</form>