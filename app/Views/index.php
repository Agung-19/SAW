<?= $this->include('layout/header') ?>
<?= $this->include('layout/sidebar') ?>
<!-- partial -->


<!-- CONTENT -->

<body >
  
  <div class="container mt-5">
  <div class="container">
    <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('success') ?>
      </div>
    <?php endif; ?>
  </div>
    <div class="card">
      <div class="card-body">
        <h1 class="card-title">Unggah Berkas Excel</h1>
        <form method="post" action="Home/import" enctype="multipart/form-data">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="excel_file">Pilih Berkas Excel:</label>
                <input type="file" class="form-control-file" name="excel_file" id="excel_file" accept=".xls,.xlsx" required>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Kolom lainnya di sini -->
            </div>
          </div>
          <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">Unggah</button>
          </div>
        </form>
      </div>
    </div>
    <div class="container">
    <h4>
      <b>Tambah Data Siswa</b>
    </h4>

    <form action="<?= base_url('Home/simpan') ?>" method="post">
      <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" class="form-control" name="nama" required="required">
      </div>
      <div class="form-group">
        <label for="nilai_sikap">Nilai Sikap:</label>
        <input type="number" class="form-control" name="nilai_sikap" required="required">
      </div>
      <div class="form-group">
        <label for="nilai_akademis">Nilai Akademis:</label>
        <input type="number" class="form-control" name="nilai_akademis" required="required">
      </div>
      <div class="form-group">
        <label for="absensi">Absensi:</label>
        <input type="number" class="form-control" name="absensi" required="required">
      </div>
      <div class="form-group">
        <label for="nilai_non_akademik">Nilai Non Akademik:</label>
        <input type="number" class="form-control" name="nilai_non_akademik" required="required">
      </div>
      <div class="form-group">
        <label for="kelas">Kelas:</label>
        <input type="number" class="form-control" name="kelas" required="required">
      </div>
      <div action="<?= base_url('Home/simpan') ?>" method="post">

        <!-- Form fields -->
        <button class="submit btn-primary float-right">Simpan</button>
      </div>

    </form>
  </div>
  <!-- Tabel Data Siswa -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama</th>
                  <th>Nilai Sikap</th>
                  <th>Nilai Akademis</th>
                  <th>Absensi</th>
                  <th>Nilai Non Akademik</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $nomor = 1; // Inisialisasi nomor awal
                foreach ($siswa as $row) :
                ?>
                  <tr>
                    <td><?= $nomor++; ?></td> <!-- Menambahkan nomor otomatis dan menginkrementasinya -->
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['nilai_sikap']; ?></td>
                    <td><?= $row['nilai_akademis']; ?></td>
                    <td><?= $row['absensi']; ?></td>
                    <td><?= $row['nilai_non_akademik']; ?></td>
                    <td><?= $row['kelas']; ?></td>
                    <td>
                      <a href="<?= base_url('Home/hapus/' . $row['id']); ?>" class="btn btn-danger btn-sm">Hapus</a>
                      <a href="<?= base_url('Home/edit/' . $row['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>

            </table>

          </div>
        </div>
      </div>
    </div>
  </div>

  </div>
  
  
  </div>

  
  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; Agung Selang</span>
      </div>
    </div>



    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>
<?php
// Masukkan kode PHP di sini, misalnya penutupan koneksi ke database atau operasi lainnya
?>