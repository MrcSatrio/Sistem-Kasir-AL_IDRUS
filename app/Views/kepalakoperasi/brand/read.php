<?= $this->extend('template/index');
$this->section('container'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Brand Lists</h1>
    <a href="<?= base_url('koperasi/brand/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah Brand</a>
</div>

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-body">

    </div>
</div>

<?= $this->endSection(); ?>