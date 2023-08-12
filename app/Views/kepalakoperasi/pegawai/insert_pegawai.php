<?= $this->extend('template/index'); ?>
<?= $this->section('container'); ?>

 <h5 class="card-title"><strong>Tambah Pegawai</strong></h5>

<div class="card shadow mb-2">
  <div class="card-body">
    <div class="card-header mb-3">
      <h4 class="text-center">Form Pegawai</h4>
    </div>
    <form action="<?= base_url('koperasi/pegawai/insert') ?>" method="post">
      <div class="row mb-3">
        <label for="" class="col-sm-2 col-form-label">Nama Pegawai</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="" name="nama_produk">
        </div>
      </div>
      <div class="row mb-3">
        <label for="" class="col-sm-2 col-form-label">Nomor Telepon</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="" name="telp_pegawai">
        </div>
      </div>
      <div class="row mb-3">
        <label for="" class="col-sm-2 col-form-label">Instansi Pegawai</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="" name="intansi_pegawai">
        </div>
      </div>
      <div class="row mb-3">
        <label for="" class="col-sm-2 col-form-label">Alamat Pegawai</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="" name="alamat_pegawai">
        </div>
      </div>
      <div class="col-sm-9">
          <input type="hidden" class="form-control" value="2" name="id_role">
      </div>
      
       <!-- Tombol Simpan -->
      <div class="row mb-3">
        <div class="col-sm-10 offset-sm-2">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
      <!-- Konten formulir lainnya di sini -->
    </form>
  </div>
</div>

<?= $this->endSection(); ?>
