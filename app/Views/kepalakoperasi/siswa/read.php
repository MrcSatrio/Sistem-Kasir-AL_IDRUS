<?= $this->extend('template/index'); ?>
<?= $this->section('container'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Member Customer</h1>
    <a href="<?= base_url('koperasi/siswa/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah Customer</a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle mb-0 bg-white" id="dataTable">
              <thead class="bg-light">
                    <tr>
                       <th style="width: 5%;">No</th>
                        <th>Nama Customer</th>
                        <th>No Telepon</th>
                        <th>Nomor Kartu</th>
                        <th>Saldo Kartu</th>
                        <th style="width: 15%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($siswa as $sw) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $sw['nama_customer']; ?></td>
                            <td><?= $sw['telp_customer']; ?></td>
                            <td><?= $sw['nomor_kartu']; ?></td>
                            <td>Rp.<?= number_format($sw['saldo_kartu']); ?></td>
                            <td>
                                <a href="<?= base_url('koperasi/siswa/update_profile/' . $sw['id_customer']) ?>" class="btn btn-sm btn-primary btn-circle profile">
                                    <i class="far fa-user"></i>
                                </a>
                                <a href="<?= base_url('koperasi/siswa/update_kartu/' . $sw['id_customer']) ?>" class="btn btn-sm btn-warning btn-circle kartu">
                                    <i class="fas fa-credit-card"></i>
                                </a>
                                <a href="<?= base_url('koperasi/siswa/update_saldo/' . $sw['id_customer']) ?>" class="btn btn-sm btn-success btn-circle saldo">
                                <i class="fas fa-coins"></i>
                                </a>
                                  <a href="<?= base_url('koperasi/siswa/delete/' . $sw['id_customer']) ?>" class="btn btn-sm btn-danger btn-circle delete">
                                    <i class="fas fa-trash"></i>
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
 
    const deleteButtons = document.querySelectorAll('.delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.getAttribute('href');

            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Anda yakin ingin menghapus data customer ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(url, {
                            method: 'DELETE'
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: 'Sukses Hapus',
                                    text: data.message,
                                    icon: 'success'
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Gagal Hapus',
                                    text: data.message,
                                    icon: 'error'
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Terjadi kesalahan:', error);
                        });
                }
            });
        });
    });

    const updateProfileButton = document.querySelectorAll('.profile');

    updateProfileButton.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.getAttribute('href');

            Swal.fire({
                title: 'Konfirmasi Edit Profile',
                text: 'Apakah Anda yakin ingin mengedit profile ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Edit',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const idCustomer = <?= isset($sw['id_customer']) ? json_encode($sw['id_customer']) : 'null' ?>;
                    if (idCustomer !== null) {
                        window.location.href = url;
                    } else {
                        console.error('Profie tidak memiliki nilai.');
                    }
                }
            });
        });
    });

    const updateSaldoButton = document.querySelectorAll('.saldo');

    updateSaldoButton.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.getAttribute('href');

            Swal.fire({
                title: 'Konfirmasi Edit Saldo',
                text: 'Apakah Anda yakin ingin mengedit saldo ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Edit',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const idCustomer = <?= isset($sw['id_customer']) ? json_encode($sw['id_customer']) : 'null' ?>;
                    if (idCustomer !== null) {
                        window.location.href = url;
                    } else {
                        console.error('Saldo tidak memiliki nilai.');
                    }
                }
            });
        });
    });


    const updateKartuButton = document.querySelectorAll('.kartu');

    updateKartuButton.forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const url = this.getAttribute('href');

        Swal.fire({
            title: 'Konfirmasi Edit Kartu',
            text: 'Apakah Anda yakin ingin mengedit kartu ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Edit',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                const idCustomer = <?= isset($sw['id_customer']) ? json_encode($sw['id_customer']) : 'null' ?>;
                if (idCustomer !== null) {
                    window.location.href = url;
                } else {
                    console.error('Kartu tidak memiliki nilai.');
                }
            }
        });
    });
});
    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive: true // Menambahkan opsi responsif untuk tabel
        });
    });
</script>
<?= $this->endSection(); ?>
