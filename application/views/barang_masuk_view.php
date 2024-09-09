<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Masuk Management</title>
    <!-- Bootstrap CSS -->
  
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Barang Masuk</h1>
        <button class="btn btn-primary" onclick="add_barang_Masuk()">Add Barang Masuk</button>
        <br><br>
        <table class="table table-bordered" id="barangMasukTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Masuk</th>
                </tr>
            </thead>
        </table>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        var table;

        $(document).ready(function () {
            table = $('#barangMasukTable').DataTable({
                "ajax": {
                    "url": "<?= site_url('BarangMasukController/fetch') ?>",
                    "type": "GET"
                },
                "columns": [
                    { "data": "id" },
                    { "data": "nama_barang" },
                    { "data": "jumlah" },
                    { "data": "tanggal_masuk" }
                ]
            });
        });

        function add_barang_Masuk() {
            var form = prompt("Enter item ID and amount (Format: ID,Amount):");
            if (form) {
                var values = form.split(',');
                var data = {
                    inventaris_id: values[0],
                    jumlah: values[1]
                };
                $.post('<?= site_url('BarangMasukController/create') ?>', data, function (response) {
                    alert("Barang Masuk added");
                    table.ajax.reload(null, false); // Reload table without resetting pagination
                });
            }
        }
    </script>
</body>
</html>
