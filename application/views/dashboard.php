<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

        <div class="row">
            <!-- Card Total Barang di Inventaris -->
            <div class="col-lg-4 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Barang di Inventaris</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_items; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-boxes fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Total Barang Masuk -->
            <div class="col-lg-4 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Barang Masuk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_masuk; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-boxes fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Total Barang Keluar -->
            <div class="col-lg-4 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Barang Keluar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_keluar; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-boxes fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End of row -->

        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Inventaris Barang</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="inventoryChart"></canvas>
                    </div>
                </div>
            </div>
        </div> <!-- End of row for chart -->
    </div> <!-- End of container-fluid -->

    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data yang akan ditampilkan dalam chart
        const labels = <?= json_encode($category_names); ?>; // Ini adalah kategori barang
        const data = {
            labels: labels,
            datasets: [{
                label: 'Jumlah Barang',
                data: <?= json_encode($category_counts); ?>, // Ini adalah jumlah barang per kategori
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        // Konfigurasi chart
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Inisialisasi dan render chart
        const inventoryChart = new Chart(
            document.getElementById('inventoryChart'),
            config
        );
    </script>

</body>

</html>
