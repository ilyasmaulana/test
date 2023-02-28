<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bagian CSS Bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
  <title><?= $title; ?></title>
</head>

<body>

  <!-- Start Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">SMK Muda</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?= ($title == "Siswa Page") ? 'active' : '' ?>" aria-current="page" href="<?= base_url('siswa'); ?>">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($title == "Data Peserta Didik") ? 'active' : '' ?>" href="<?= base_url('siswa/datasiswa'); ?>">Siswa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Kelas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($title == "User Page") ? 'active' : '' ?>" href="<?= base_url('user'); ?>">User</a>
          </li>
        </ul>
        <div class="d-flex">
          <a type="button" class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->