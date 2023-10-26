<form action="<?= base_url('koperasi/produk/create') ?>" method="post">
<?php if (session()->has('success')) : ?>
            <div class="alert alert-success">
                <?= session('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->has('break_the_rules')) : ?>
            <div class="alert alert-danger">
                <?= session('break_the_rules') ?>
            </div>
        <?php endif; ?>
    <h5 class="card-title"><strong>Bar Code Produk</strong></h5>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <button class="btn btn-outline-primary" type="button" id="barcode-scan">Scan</button>
        </div>
        <input type="text" class="form-control" placeholder="Tekan 'Scan' disamping dan mulai untuk membaca barcode dengan scanner" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly>
        <input type="hidden" name="qr_produk" id="qr_produk">
    </div>

    <h5 class="card-title"><strong>Informasi Produk</strong></h5>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Brand / Merk</label>
        <div class="col-sm-10">
            <div class="input-group mb-3">
                <select class="custom-select" name="id_brand" required>
                    <option disabled selected aria-describedby="button-addon1">Pilih Brand / Merk...</option>
                    <?php foreach ($brand as $br) : ?>
                        <option value="<?= $br['id_brand']; ?>"><?= ucfirst($br['nama_brand']); ?></option>
                    <?php endforeach ?>
                </select>
                <div class="input-group-append">
                    <a class="btn btn-outline-primary" href="<?= base_url('koperasi/brand/create') ?>">Tambah Brand / Merk</a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-10">
            <div class="input-group mb-3">
                <select class="custom-select" name="id_kategori" required>
                    <option disabled selected aria-describedby="button-addon1">Pilih Kategori...</option>
                    <option value="1">One</option>
                    <?php foreach ($kategori as $kategori) : ?>
                        <option value="<?= $kategori['id_kategori']; ?>"><?= ucfirst($kategori['nama_kategori']); ?></option>
                    <?php endforeach ?>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" id="button-addon2">Tambah Kategori</button>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="" placeholder="Pensil 2B" name="nama_produk">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Satuan Unit</label>
        <div class="col-sm-10">
            <select class="custom-select" name="uom_produk" required>
                <option disabled selected>Pilih Satuan Unit...</option>
                <option value="pcs">Pcs</option>
                <option value="pack">Pack</option>
                <option value="dus">Dus</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Harga Produk</label>
        <div class="col-sm-10">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control" placeholder="9.900" name="harga_produk">
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Simpan Produk</button>
</form>
<script>
    // format titik pada harga produk

    document.getElementById('barcode-scan').addEventListener('click', function() {
        Swal.fire({
            title: 'Scanning...',
            text: 'Mulai scan produk Anda',
            input: 'text',
            inputPlaceholder: 'Menunggu scanning...',
            confirmButtonText: 'OK',
            showCancelButton: true,
            preConfirm: (inputValue) => {
                if (inputValue) {
                    document.getElementById('qr_produk').value = inputValue;
                }
            }
        });
    });
</script>