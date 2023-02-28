<div class="container">
  <h3 class="my-3"><?= $title; ?></h3>

  <?php if (validation_errors() == true) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= validation_errors(); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
  <?= $this->session->flashdata('siswa_message'); ?>

  <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data Siswa</a>

  <!-- Start Table -->
  <table class="table table-striped table-responsive table-bordered  my-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Nama User</th>
        <th scope="col">Email</th>
        <th scope="col">Aktif</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($user as $u) : ?>
        <tr style="vertical-align:middle">
          <th scope="row"><?= $i; ?></th>
          <td><?= $u['username']; ?></td>
          <td><?= $u['nama_user']; ?></td>
          <td><?= $u['email']; ?></td>
          <td><?= $u['aktif']; ?></td>
          <td>
            <a href="<?= base_url('siswa/update/') . $u['username']; ?>" class="btn btn-primary">Update</a>
            <a href="#" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
  <!-- End Table -->
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Siswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('user/insertUser'); ?>">
          <div class="row">
            <div class="col">
              Username
            </div>
            <div class="col">
              <input type="text" name="username" class="form-control" required>
            </div>
          </div>
          <div class="row my-2">
            <div class="col">
              Nama User
            </div>
            <div class="col">
              <input type="text" name="nama_user" class="form-control" required>
            </div>
          </div>
          <div class="row my-2">
            <div class="col">
              Email
            </div>
            <div class="col">
              <input type="text" name="email" class="form-control" required>
            </div>
          </div>
          <div class="row">
            <div class="col">
              Password
            </div>
            <div class="col">
              <input type="password" name="password" class="form-control" required>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>