<?= $this->extend('template/index');
$this->section('container'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">List Produk</h1>
    <a href="<?= base_url('koperasi/produk/create') ?>"
        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah Produk</a>
</div>

<div class="card shadow mb-4">

    <div class="card-body">
        <table class="table align-middle mb-0 bg-white" id="dataTable">
            <thead class="bg-light">
                <tr>
                    <th style="width: 5%;">No</th>
                    <th>Barcode</th>
                    <th>Merk</th>
                    <th>Kategori</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th style="width: 15%;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($produk as $list ) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $list['qr_produk']; ?></td>
                    <td><?= $list['id_brand']; ?></td>
                    <td><?= $list['id_kategori']; ?></td>
                    <td><?= $list['nama_produk']; ?></td>
                    <td><?= $list['harga_produk']; ?></td>
                    <td>
                        <button type="button" class="btn btn-link btn-sm btn-rounded">
                            Edit
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>