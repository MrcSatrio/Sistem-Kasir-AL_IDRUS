<?= $this->extend('template/index');
$this->section('container'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Produk</h1>
</div>

<!-- Basic Card Example -->
<div class="card shadow mb-4">

    <div class="card-body">

        <h5 class="card-title"><strong>QR Code Produk</strong></h5>

        <form action="<?= base_url() ?>" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-primary" type="button" id="button-addon1">Scan</button>
                </div>
                <input type="text" class="form-control" placeholder="Hasil scan akan muncul disini..." value="" name="qr_produk" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly>
            </div>

            <h5 class="card-title"><strong>Informasi Produk</strong></h5>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Brand / Merk</label>
                <div class="col-sm-10">
                    <div class="input-group mb-3">
                        <select class="custom-select" name="id_brand">
                            <option selected aria-describedby="button-addon1">Pilih Brand / Merk...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="button-addon2">Tambah Brand / Merk</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <div class="input-group mb-3">
                        <select class="custom-select" name="id_kategori">
                            <option selected aria-describedby="button-addon1">Pilih Kategori...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
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
                    <select class="custom-select" name="uom_produk">
                        <option selected>Pilih Satuan Unit...</option>
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
                        <input type="text" class="form-control" id="" placeholder="2900" name="harga_produk">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Simpan Produk</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>