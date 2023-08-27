<?= $this->extend('template/index'); ?>

<?= $this->section('container'); ?>
<div class="card">
    <div class="card-header">
        <strong>Detail Transaksi</strong>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Customer</th>
                    <th>Nama Produk</th>
                    <th>Total Barang</th>
                    <th>Total Pembayaran</th>
                    <th>Nama Kasir</th>
                    <th>Metode Pembayaran</th>
                    <th>Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transaksi as $row): ?>
                    <tr>
                        <td><?= $row->nama_customer; ?></td>
                        <td><?= $row->nama_produk; ?></td>
                        <td><?= $row->qty_transaksi; ?></td>
                        <td><?= number_format($row->total_transaksi, 2, ',', '.'); ?></td>
                        <td><?= $row->nama_pegawai; ?></td>
                        <td><?= $row->metode_bayar_transaksi; ?></td>
                        <td><?= $row->created_at; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>
