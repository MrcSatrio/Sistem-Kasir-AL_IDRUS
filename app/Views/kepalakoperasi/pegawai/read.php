<?= $this->extend('template/index'); ?>
<?= $this->section('container'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Pegawai</h1>
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
                        <th>Instansi</th>
                        <th style="width: 15%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($pegawai as $br) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $br['nama_pegawai']; ?></td>
                            <td><?= $br['telp_pegawai']; ?></td>
                            <td><?= $br['alamat_pegawai']; ?></td>
                            <td><?= $br['instansi_pegawai']; ?></td>
                            <td>
                                  <a href="<?= base_url('koperasi/pegawai/delete/' . $br['id_pegawai']) ?>" class="btn btn-sm btn-danger btn-circle delete">
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


    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive: true // Menambahkan opsi responsif untuk tabel
        });
    });
</script>
<?= $this->endSection(); ?>