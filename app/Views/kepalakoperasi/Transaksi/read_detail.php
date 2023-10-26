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
                    <th>Barcode Produk</th>
                    <th>Nama Produk</th>
                    <th>QTY</th>
                    <th>Jumlah Transaksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($transaksi as $transaction) : ?>
            <?php foreach ($transaction['items'] as $item) : ?>
                        <tr>
                            <td><?= esc($item['qr_produk']); ?></td>
                            <td><?= esc($item['nama_produk']); ?></td>
                            <td><?= esc($item['qty_transaksi']); ?></td>
                            <td><?= esc('Rp ' . number_format($item['jumlah_transaksi'], 0, ',', '.')); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td>TOTAL PEMBAYARAN</td>
                        <td></td>
                        <td></td>
                        <td><?= esc('Rp ' . number_format($transaction['total_transaksi'], 0, ',', '.')); ?></td>
                    </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>
