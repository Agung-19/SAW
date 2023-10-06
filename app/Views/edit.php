
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Siswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            margin-top: 50px;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
        }
    </style>
</head>
<div class="container">
    <h4>Edit Data Siswa</h4>

    <form action="<?= base_url('Home/update/' . $siswa['id']); ?>" method="post">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input
                type="text"
                class="form-control"
                name="nama"
                value="<?= $siswa['nama']; ?>"
                required="required">
        </div>
        <div class="form-group">
            <label for="nilai_sikap">Nilai Sikap:</label>
            <input
                type="number"
                class="form-control"
                name="nilai_sikap"
                value="<?= $siswa['nilai_sikap']; ?>"
                required="required">
        </div>
        <div class="form-group">
            <label for="nilai_akademis">Nilai Akademis:</label>
            <input
                type="number"
                class="form-control"
                name="nilai_akademis"
                value="<?= $siswa['nilai_akademis']; ?>"
                required="required">
        </div>
        <div class="form-group">
            <label for="absensi">Absensi:</label>
            <input
                type="number"
                class="form-control"
                name="absensi"
                value="<?= $siswa['absensi']; ?>"
                required="required">
        </div>
        <div class="form-group">
            <label for="nilai_non_akademik">Nilai Non Akademik:</label>
            <input
                type="number"
                class="form-control"
                name="nilai_non_akademik"
                value="<?= $siswa['nilai_non_akademik']; ?>"
                required="required">
        </div>
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <input
                type="number"
                class="form-control"
                name="kelas"
                value="<?= $siswa['kelas']; ?>"
                required="required">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>