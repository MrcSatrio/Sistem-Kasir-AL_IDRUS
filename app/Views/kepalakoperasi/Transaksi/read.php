<?= $this->extend('template/index'); ?>

<?= $this->section('container'); ?>

<!-- Bootstrap -->
<script src="https://unpkg.com/xlsx-style/dist/xlsx-style.min.js"></script>
<!-- ExcelJS -->
<script src="https://unpkg.com/exceljs/dist/exceljs.min.js"></script>

<!-- XlsxPopulate -->
<script src="https://unpkg.com/xlsx-populate/browser/xlsx-populate.min.js"></script>
<!-- ExcelJS -->


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Riwayat Transaksi</h1>
    <div class="d-none d-sm-inline-block filter-container">
        <input type="date" id="dateFrom" placeholder="Dari Tanggal" required>
        ->
        <input type="date" id="dateTo" placeholder="Hingga Tanggal" required>
        <button id="filterButton">Filter</button>
        <button class="btn btn-primary" onclick="exportToExcel()">Unduh Excel</button>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle mb-0 bg-white" id="dataTable">
                <thead class="bg-light">
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Nama Pelanggan</th>
                        <th>Kasir</th>
                        <th>Metode Bayar</th>
                        <th>Total Transaksi</th>
                        <th>Waktu Transaksi</th>
                        <th style="width: 15%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($transaksi as $tr) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                             <td><?= $tr['nama_customer']; ?></td>
                            <td><?= $tr['nama_pegawai']; ?></td>
                            <td><?= $tr['metode_bayar_transaksi']; ?></td>
                            <td>Rp <?= number_format($tr['total_transaksi'], 0, ',', '.'); ?></td>
                            <td><?= $tr['created_at']; ?></td>
                            <td>
                                <a href="<?= base_url('koperasi/riwayat/detail/' . $tr['id_transaksi']) ?>" class="btn btn-sm btn-success btn-circle update">
                                    <i class="fas fa-info"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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
            if (j === 7) {
                const buktiCell = columns[j];
                const buktiLink = buktiCell.querySelector('a');
                if (buktiLink) {
                    // If there is a link, add the link address to the cell as a formula
                    const linkFormula = `HYPERLINK("${buktiLink.href}", "Lihat Bukti")`;
                    values.push({ formula: linkFormula });
                } else {
                    values.push('');
                }
            } else if (j === 4) {
                // Assuming the total transaction column is the 4th column (change as needed)
                const totalValue = parseFloat(columns[j].innerText.replace('Rp ', '').replace(/\./g, '').replace(',', '.'));
                values.push(totalValue);
                totalTransaksi += totalValue;
            } else {
                values.push(columns[j].innerText);
            }
        }

        worksheet.addRow(values);
    }

    // Add a row for the total transaction
    worksheet.addRow(['Total Transaksi', '', '', '', totalTransaksi]);

    // Apply hyperlink style to the "Bukti Transfer" column
    worksheet.getColumn(8).eachCell(cell => {
        if (cell.value && cell.value.hyperlink) {
            cell.font = { color: { argb: '0563C1' }, underline: true };
        }
    });

    // Save the workbook as a Blob
    workbook.xlsx.writeBuffer().then(function (buffer) {
        const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = 'transactions.xlsx';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        window.URL.revokeObjectURL(url);
    });
}
</script>
<?= $this->endSection(); ?>
