<?= $this->extend('template/index'); ?>

<?= $this->section('container'); ?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Riwayat Transaksi</h1>
    <div class="d-none d-sm-inline-block filter-container">
        <input type="date" id="dateFrom" placeholder="Dari Tanggal" required>
        ->
        <input type="date" id="dateTo" placeholder="Hingga Tanggal" required>
        <button id="filterButton">Filter</button>
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
                        <th>Tanggal Transaksi</th>
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
$(document).ready(function() {
    $('#dataTable').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                text: 'Export Excel',
                title: 'Datatable Export',
                filename: 'datatable-export',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            }
        ]
    });

    $('#filterButton').on('click', function() {
        var dateFrom = $('#dateFrom').val();
        var dateTo = $('#dateTo').val();

        var formattedDateFrom = formatDateForURL(dateFrom);
        var formattedDateTo = formatDateForURL(dateTo);

        window.location.href = '<?= base_url('koperasi/riwayat/read'); ?>' + '?dateFrom=' + formattedDateFrom + '&dateTo=' + formattedDateTo;
    });

    $('#exportExcelButton').on('click', function() {
        $('#dataTable').DataTable().buttons.exportExcel();
    });
});

function formatDateForURL(date) {
    var parts = date.split('-');
    return parts[0] + '-' + parts[1] + '-' + parts[2];
}

</script>
<?= $this->endSection(); ?>
