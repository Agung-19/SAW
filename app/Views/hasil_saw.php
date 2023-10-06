<?= $this->include('layout/header') ?>
<?= $this->include('layout/sidebar') ?>
<!-- partial -->

<head>
    <title>Hasil Perhitungan SAW (Simple Additive Weighting)</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Hasil Perhitungan SAW (Simple Additive Weighting)</h1>
        <table class="table table-bordered id="dataTable" width="100%" cellspacing="0"">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nilai Total Integral</th>
                </tr>
            </thead>
            <?php 
$no = 1; 
arsort($results); // Mengurutkan array $results berdasarkan nilai tertinggi
?>
<tbody>
    <?php foreach ($results as $nama => $integral): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $nama ?></td>
            <td><?= number_format($integral, 2) ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
        </table>
    </div>
</body>

