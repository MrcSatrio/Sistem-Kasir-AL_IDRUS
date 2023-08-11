<?= $this->extend('template/index');
$this->section('container'); ?>


<div class="card shadow mb-4">
  <div class="card-body">
    <body>
    <div class="card-header mb-2">
                <h4 class="text-center">Form Pegawai</h4>
            </div>
      <form action="proses_insert_pegawai.php" method="POST">
        <div class="form-group row">
          <div class="mb-3">
            <!-- Konten formulir lainnya di sini -->
          </div>
        </div>
      </form>
    </body>
  </div>
</div>




<?= $this->endSection(); ?>