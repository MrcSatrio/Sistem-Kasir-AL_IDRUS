<?= $this->extend('template/index'); ?>

<?= $this->section('container'); ?>
<script src="https://unpkg.com/xlsx-style/dist/xlsx-style.min.js"></script>
<script src="https://unpkg.com/exceljs/dist/exceljs.min.js"></script>
<script src="https://unpkg.com/xlsx-populate/browser/xlsx-populate.min.js"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Detail Transaksi</h1>
    <div class="d-none d-sm-inline-block filter-container">
        <button class="btn btn-primary" onclick="exportToExcel()">Unduh Excel</button>
    </div>
    </div>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Barcode Produk</th>
                    <th>Nama Produk</th>
                    <th>QTY</th>
                    <th>Jumlah Transaksi</th>
                    <th>Harga Modal</th>
                    <th>Keuntungan Produk</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($transaksi as $transaction) : ?>
                <?php
                $total_keuntungan_transaksi = 0;
                ?>
                <?php foreach ($transaction['items'] as $item) : ?>
                    <?php
                    $harga_modal = $item['harga_modal'] * $item['qty_transaksi'];
                    $keuntungan_barang = $item['jumlah_transaksi']  - $harga_modal;
                    $total_keuntungan_transaksi += $keuntungan_barang; // Menambahkan keuntungan dari barang ini ke total transaksi
                    ?>
                    <tr>
                        <td><?= esc($item['qr_produk']); ?></td>
                        <td><?= esc($item['nama_produk']); ?></td>
                        <td><?= esc($item['qty_transaksi']); ?></td>
                        <td><?= esc('Rp ' . number_format($item['jumlah_transaksi'], 0, ',', '.')); ?></td>
                        <td><?= esc('Rp ' . number_format($item['harga_modal'], 0, ',', '.')); ?></td>
                        <td><?= esc('Rp ' . number_format($keuntungan_barang, 0, ',', '.')); ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td>TOTAL PEMBAYARAN</td>
                    <td></td>
                    <td></td>
                    <td><?= esc('Rp ' . number_format($transaction['total_transaksi'], 0, ',', '.')); ?></td>
                </tr>
                
                <tr>
                    <td>KEUNTUNGAN</td>
                    <td></td>
                    <td></td>
                    <td><?= esc('Rp ' . number_format($total_keuntungan_transaksi, 0, ',', '.')); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
function exportToExcel() {
    const table = document.querySelector('.table');
    const workbook = new ExcelJS.Workbook();
    const worksheet = workbook.addWorksheet('Transactions');

    // Add table headers to the worksheet
    const headerRow = worksheet.addRow([]);
    const headerCells = table.querySelectorAll('th');
    headerCells.forEach(cell => {
        if (cell.textContent.trim() !== 'Action') {
            headerRow.getCell(cell.cellIndex + 1).value = cell.textContent.trim();
        }
    });

    // Iterate over each table row and column to populate the worksheet
    const rows = table.getElementsByTagName('tr');
    let totalTransaksi = 0;

    for (let i = 1; i < rows.length; i++) {
        const row = rows[i];
        const columns = row.getElementsByTagName('td');
        const values = [];

        for (let j = 0; j < columns.length; j++) {
            // Check if the current column is the "Bukti Transfer" column
            if (j === 4) {
                // Assuming the total transaction column is the 4th column (change as needed)
                const totalValue = parseFloat(columns[j].innerText.replace('Rp ', '').replace(/\./g, '').replace(',', '.'));
                values.push({ formula: `TEXT(${totalValue}, "Rp #,##0.00")` });
                totalTransaksi += totalValue;
            } else {
                values.push(columns[j].innerText);
            }
        }

        worksheet.addRow(values);
    }

    // Add a row for the total transaction

    
    // Save the workbook as a Blob
    const currentDate = new Date().toISOString().split('T')[0];
    const fileName = `detail_transaksi_${currentDate}.xlsx`;
    workbook.xlsx.writeBuffer().then(function (buffer) {
        const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = fileName; 
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        window.URL.revokeObjectURL(url);
    });
}
</script>
<?= $this->endSection(); ?>
