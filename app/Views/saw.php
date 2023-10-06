<?= $this->include('layout/header') ?>
<?= $this->include('layout/sidebar') ?>
<!-- partial -->


<!-- CONTENT -->

<body>
    <!-- Tabel Data Siswa -->
    <div class="row">
    <form action="<?= base_url('Home/proses') ?>" method="post">
            <div class="form-group text-right" style="margin-right: 0;">
                <button type="submit" class="btn btn-primary" style="margin-right: 10px !important;">Proses</button>
            </div>
        </form>
        <div class="col-lg-16">
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
    <div class="container">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
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