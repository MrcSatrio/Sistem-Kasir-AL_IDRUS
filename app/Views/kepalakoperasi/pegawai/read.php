<?= $this->extend('template/index'); ?>
<?= $this->section('container'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Pegawai</h1>
    <a href="<?= base_url('koperasi/pegawai/insert') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah Pegawai</a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle mb-0 bg-white" id="dataTable">
              <thead class="bg-light">
                    <tr>
                       <th style="width: 5%;">No</th>
                        <th>Nama Pegawai</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th style="width: 15%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($pegawai as $pg) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $pg['nama_pegawai']; ?></td>
                            <td><?= $pg['telp_pegawai']; ?></td>
                            <td><?= $pg['alamat_pegawai']; ?></td>
                            <td>
                                <a href="<?= base_url('koperasi/pegawai/update_profile/' . $pg['id_pegawai']) ?>" class="btn btn-sm btn-primary btn-circle profile">
                                <i class="fas fa-user"></i>
                                </a>
                                <a href="<?= base_url('koperasi/pegawai/update_password/' . $pg['id_pegawai']) ?>" class="btn btn-sm btn-warning btn-circle password">
                                <i class="fas fa-key"></i>
                                </a>
                                  <a href="<?= base_url('koperasi/pegawai/delete/' . $pg['id_pegawai']) ?>" class="btn btn-sm btn-danger btn-circle delete">
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
                text: 'Apakah Anda yakin ingin menghapus data pegawai ini?',
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
                    const idCustomer = <?= isset($pg['id_pegawai']) ? json_encode($pg['id_pegawai']) : 'null' ?>;
                    if (idCustomer !== null) {
                        window.location.href = url;
                    } else {
                        console.error('Profile tidak memiliki nilai.');
                    }
                }
            });
        });
    });

    const updatePassButton = document.querySelectorAll('.password');

    updatePassButton.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.getAttribute('href');

            Swal.fire({
                title: 'Konfirmasi Edit Password',
                text: 'Apakah Anda yakin ingin mengedit password ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Edit',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const idCustomer = <?= isset($pg['id_pegawai']) ? json_encode($pg['id_pegawai']) : 'null' ?>;
                    if (idCustomer !== null) {
                        window.location.href = url;
                    } else {
                        console.error('Password tidak memiliki nilai.');
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
