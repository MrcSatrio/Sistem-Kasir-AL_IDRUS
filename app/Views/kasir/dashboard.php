<?= $this->extend('template/index');

$this->section('container'); ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kasir</h1>
    <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Buat Laporan</a>-->
</div>

<?php if (session()->has('success')) : ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let timerInterval
            Swal.fire({
                title: '<?= session('success') ?>',
                html: 'Menyelesaikan Transaksi <b></b>',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            });
        });
    </script>
<?php endif; ?>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4" style="height: 35rem;">

            <!-- Card Body -->
            <div class="card-body">

                <form action="<?= base_url('kasir/transaksi/checkout') ?>" method="post">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group row">
                                <label for="inputKasir" class="col-sm-2 col-form-label">Kasir</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-sm" name="nama_kasir" id="inputKasir" value="<?= session('nama') ?>"disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-sm" id="inputKasir" value="<?= date('d F Y', strtotime(date('d-m-Y'))) ?>"disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card text-center text-white bg-danger mb-3" style="max-width: 18rem; height: 6rem;">
                                <div class="card-body">
                                    <h5 class="card-title ">Total Harga</h5>
                                    <h1>Rp.<strong id="totalHargaDisplay">0</strong></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="height: 10rem;">
                        <table class="table table-striped table-sm" id="myTable">
                            <thead>
                                <tr>
                                    <td>Barcode</td>
                                    <td>Keterangan</td>
                                    <td>Quantity</td>
                                    <td>Harga</td>
                                    <td>Jumlah</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 10%;">
                                        <input type="text" name="barcode" id="barcode" style="width: 100%;" onchange="tambahProduk()" autofocus>
                                    </td>
                                    <td style="width: 55%;">
                                        <input type="text" id="keterangan" style="width: 97%;">
                                    </td>
                                    <td>
                                        <input type="number" id="qty_transaksi" style="width: 60%;">
                                    </td>
                                    <td>
                                        <input type="text" id="harga_produk" style="width: 100%;">
                                    </td>
                                    <td>
                                        <input type="text" id="jumlah_transaksi" style="width: 100%;">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <td style="width: 70%;">Member
                                    <button type="button" class="btn btn-sm btn-outline-primary" id="getMember"><i class="fas fa-search-plus"></i> Cari</button>
                                </td>
                                <td style="width: 10%;">Total</td>
                                <td style="width: 20%;" colspan="" class="text-right">
                                    <input type="text" name="total_transaksi" id="total_transaksi" style="width: 100%;" required>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 70%;">
                                    <input type="text" name="nomor_kartu" id="nomor_kartu" readonly>
                                </td>
                                <td style="width: 10%;">Bayar</td>
                                <td style="width: 20%;" colspan="" class="text-right">
                                    <input type="text" name="bayar_transaksi" id="bayar_transaksi" style="width: 100%;" placeholder="Khusus Tunai" onchange="hitungKembalian()">
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 70%;">
                                    <input type="text" name="nama_customer" id="nama_customer" readonly>
                                </td>
                                <td style="width: 10%;">Kembalian</td>
                                <td style="width: 20%;" colspan="" class="text-right">
                                    <input type="text" name="kembalian_transaksi" id="kembalian_transaksi" style="width: 100%;" readonly>
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="id_customer" id="id_customer">
                        <input type="hidden" name="saldo_kartu" id="saldo_kartu">
                        <input type="hidden" name="id_pegawai" value="<?= session('id_pegawai') ?>">
                    </div>
                    <div class="text-right mr-2">
                        <a href="<?= site_url('kasir/checkout/print') ?>" class="btn btn-outline-primary w-25"><i class="fas fa-print"></i> Print Invoice</a>
                        <button type="submit" class="btn btn-primary w-25"><i class="fas fa-sync-alt"></i> Proses</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!--  -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
                <h5 class="card-title">Top-Up</h5>
                <?php if (session()->has('topup_errors')) : ?>
                    <div class="alert alert-danger" id="alertErrors">
                        <?= session('topup_errors') ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('kasir/transaksi/topup') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama_customer_topup" id="nama_customer_topup" readonly>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="getMemberTopup">Scan</button>
                        </div>
                    </div>

                    <select class="custom-select mb-3" name="nominal_topup">
                        <option selected>Nominal...</option>
                        <option value="2000">2.000</option>
                        <option value="5000">5.000</option>
                        <option value="10000">10.000</option>
                        <option value="20000">20.000</option>
                        <option value="50000">50.000</option>
                        <option value="100000">100.000</option>
                        <option value="150000">150.000</option>
                        <option value="200000">200.000</option>
                    </select>
                    <input type="hidden" name="id_kartu_topup" id="id_kartu_topup">
                    <input type="hidden" name="id_customer_topup" id="id_customer_topup">
                    <input type="hidden" name="id_pegawai_topup" value="<?= session('id_pegawai') ?>">
                    <input type="hidden" name="nama_pegawai_topup" value="<?= session('nama') ?>">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Top-Up</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function tambahProduk() {
        var barcode = document.getElementById("barcode").value;

        $.ajax({
            url: "<?= base_url('kasir/get-produk-row') ?>",
            method: "POST",
            data: {
                barcode: barcode
            },
            success: function(data) {
                console.log("Data received:", data);
                if (data.status) {
                    var produk = data.data;
                    var table = document.getElementById("myTable").getElementsByTagName('tbody')[0];
                    var existingRow = document.querySelector(`#myTable tr[data-barcode="${produk.qr_produk}"]`);

                    if (existingRow) {
                        var existingQtyInput = existingRow.querySelector('input[name="qty_transaksi[]"]');
                        var newQty = parseFloat(existingQtyInput.value) + 1;
                        existingQtyInput.value = newQty;
                        updateJumlahTransaksi(existingRow);
                    } else {
                        var newRow = table.insertRow(0);
                        newRow.setAttribute('data-barcode', produk.qr_produk);
                        var cols = 5;

                        for (var i = 0; i < cols; i++) {
                            var cell = newRow.insertCell(i);
                            var input = document.createElement("input");
                            input.type = "text";

                            if (i === 0) {
                                input.name = "qr_produk[]";
                                input.id = "qr_produk";
                                input.style.width = "100%";
                                input.value = produk.qr_produk;
                            } else if (i === 1) {
                                input.name = "keterangan[]";
                                input.id = "keterangan";
                                input.style.width = "97%";
                                input.value = produk.nama_brand + " " + produk.nama_produk;
                            } else if (i === 2) {
                                input.name = "qty_transaksi[]";
                                input.id = "qty_transaksi";
                                input.style.width = "60%";
                                input.type = "number";
                                input.value = 1;
                                input.addEventListener('input', function() {
                                    updateJumlahTransaksi(newRow);

                                });
                            } else if (i === 3) {
                                input.name = "harga_produk[]";
                                input.id = "harga_produk";
                                input.style.width = "100%";
                                input.value = produk.harga_produk;
                            } else if (i === 4) {
                                input.name = "jumlah_transaksi[]";
                                input.id = "jumlah_transaksi";
                                input.style.width = "100%";
                                input.value = produk.harga_produk;
                            }

                            cell.appendChild(input);
                        }
                    }
                    updateTotalTransaksi();
                    document.getElementById("barcode").value = "";
                    setTimeout(function() {
                        document.getElementById("barcode").focus();
                    }, 0);
                } else {
                    alert("Produk tidak ditemukan.");
                    document.getElementById("barcode").value = "";
                    setTimeout(function() {
                        document.getElementById("barcode").focus();
                    }, 0);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error:", textStatus, errorThrown);
            }
        });
    }

    function updateJumlahTransaksi(row) {
        var qtyTransaksiInput = row.querySelector('input[name="qty_transaksi[]"]');
        var hargaProdukInput = row.querySelector('input[name="harga_produk[]"]');
        var jumlahTransaksiInput = row.querySelector('input[name="jumlah_transaksi[]"]');

        if (qtyTransaksiInput && hargaProdukInput && jumlahTransaksiInput) {
            var qtyTransaksi = parseFloat(qtyTransaksiInput.value);
            var hargaProduk = parseFloat(hargaProdukInput.value);

            if (!isNaN(qtyTransaksi) && !isNaN(hargaProduk)) {
                var jumlahTransaksi = qtyTransaksi * hargaProduk;
                jumlahTransaksiInput.value = jumlahTransaksi;
            }
        }

        updateTotalTransaksi();
    }

    function updateTotalTransaksi() {
        var rows = document.getElementById('myTable').querySelectorAll('tr');
        var totalTransaksi = 0;

        for (var i = 0; i < rows.length; i++) {
            var rowJumlahTransaksiInput = rows[i].querySelector('input[name="jumlah_transaksi[]"]');
            if (rowJumlahTransaksiInput) {
                var rowTotal = parseFloat(rowJumlahTransaksiInput.value);
                if (!isNaN(rowTotal)) {
                    totalTransaksi += rowTotal;
                }
            }
        }

        var totalSemuaTransaksiInput = document.getElementById('total_transaksi');
        totalSemuaTransaksiInput.value = totalTransaksi;

        var totalHargaDisplayElement = document.getElementById('totalHargaDisplay');
        totalHargaDisplayElement.textContent = totalTransaksi.toFixed(0);
    }

    document.getElementById('getMember').addEventListener('click', function() {
        Swal.fire({
            title: 'Scanning...',
            text: 'Mulai scan kartu member',
            input: 'text',
            inputPlaceholder: 'Menunggu scanning...',
            confirmButtonText: 'OK',
            showCancelButton: true,
            preConfirm: (inputValue) => {
                if (inputValue) {
                    $.ajax({
                        url: "<?= base_url('kasir/get-member-row') ?>",
                        method: "POST",
                        data: {
                            nomor_kartu: inputValue
                        },
                        success: function(data) {
                            console.log("Data received:", data);
                            if (data.status) {
                                var member = data.data;
                                document.getElementById('nomor_kartu').value = member.nomor_kartu;
                                document.getElementById('saldo_kartu').value = member.saldo_kartu;
                                document.getElementById('nama_customer').value = member.nama_customer;
                                document.getElementById('id_customer').value = member.id_customer;
                            } else {
                                alert("Member tidak ditemukan.");
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log("Error:", textStatus, errorThrown);
                        }
                    });
                }
            }
        });
    });

    document.getElementById('getMemberTopup').addEventListener('click', function() {
        Swal.fire({
            title: 'Scanning...',
            text: 'Mulai scan kartu member',
            input: 'text',
            inputPlaceholder: 'Menunggu scanning...',
            confirmButtonText: 'OK',
            showCancelButton: true,
            preConfirm: (inputValue) => {
                if (inputValue) {
                    $.ajax({
                        url: "<?= base_url('kasir/get-member-row') ?>",
                        method: "POST",
                        data: {
                            nomor_kartu: inputValue
                        },
                        success: function(data) {
                            console.log("Data received:", data);
                            if (data.status) {
                                var member = data.data;
                                document.getElementById('id_kartu_topup').value = member.id_kartu;
                                document.getElementById('id_customer_topup').value = member.id_customer;
                                document.getElementById('nama_customer_topup').value = member.nama_customer;
                            } else {
                                alert("Member tidak ditemukan.");
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log("Error:", textStatus, errorThrown);
                        }
                    });
                }
            }
        });
    });

    function hitungKembalian() {
        var total = parseFloat(document.getElementById('total_transaksi').value);
        var bayar = parseFloat(document.getElementById('bayar_transaksi').value);

        var kembalian = bayar - total;

        document.getElementById('kembalian_transaksi').value = kembalian;
    }
</script>

<?= $this->endSection(); ?>