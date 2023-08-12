<?= $this->extend('template/index');
$this->section('container'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">List Produk</h1>
  <a href="<?= base_url('koperasi/produk/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah Produk</a>
</div>

<div class="card shadow mb-4">

  <div class="card-body">
    <table class="table align-middle mb-0 bg-white" id="dataTableProduk">
      <thead class="bg-light">
        <tr>
          <th>Name</th>
          <th>Title</th>
          <th>Status</th>
          <th>Position</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
              <div class="ms-3">
                <p class="fw-bold mb-1">John Doe</p>
                <p class="text-muted mb-0">john.doe@gmail.com</p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1">Software engineer</p>
            <p class="text-muted mb-0">IT department</p>
          </td>
          <td>
            <span class="badge badge-success rounded-pill d-inline">Active</span>
          </td>
          <td>Senior</td>
          <td>
            <button type="button" class="btn btn-link btn-sm btn-rounded">
              Edit
            </button>
          </td>
        </tr>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <img src="https://mdbootstrap.com/img/new/avatars/6.jpg" class="rounded-circle" alt="" style="width: 45px; height: 45px" />
              <div class="ms-3">
                <p class="fw-bold mb-1">Alex Ray</p>
                <p class="text-muted mb-0">alex.ray@gmail.com</p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1">Consultant</p>
            <p class="text-muted mb-0">Finance</p>
          </td>
          <td>
            <span class="badge badge-primary rounded-pill d-inline">Onboarding</span>
          </td>
          <td>Junior</td>
          <td>
            <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">
              Edit
            </button>
          </td>
        </tr>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <img src="https://mdbootstrap.com/img/new/avatars/7.jpg" class="rounded-circle" alt="" style="width: 45px; height: 45px" />
              <div class="ms-3">
                <p class="fw-bold mb-1">Kate Hunington</p>
                <p class="text-muted mb-0">kate.hunington@gmail.com</p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1">Designer</p>
            <p class="text-muted mb-0">UI/UX</p>
          </td>
          <td>
            <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
          </td>
          <td>Senior</td>
          <td>
            <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">
              Edit
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection(); ?>