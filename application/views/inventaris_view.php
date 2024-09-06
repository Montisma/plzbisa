<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- SB Admin 2 CSS Files -->
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
</head>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Barang</h1>
    <button id="addBtn" class="btn btn-primary mb-4">Add New Item</button>
    
    <!-- Modal Form for Adding New Item -->
    <div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="itemModalLabel">Add New Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-add-item">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                        </div>
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori_barang">Kategori Barang</label>
                            <input type="text" class="form-control" id="kategori_barang" name="kategori_barang" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                        </div>
                        <div class="form-group">
                            <label for="kondisi_barang">Kondisi Barang</label>
                            <input type="text" class="form-control" id="kondisi_barang" name="kondisi_barang" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_input">Tanggal Input</label>
                            <input type="date" class="form-control" id="tanggal_input" name="tanggal_input" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <table id="inventarisTable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Kategori Barang</th>
                <th>Jumlah</th>
                <th>Kondisi Barang</th>
                <th>Tanggal Input</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    var table = $('#inventarisTable').DataTable({
        ajax: {
            url: '<?= site_url('inventaris/fetch') ?>',
            dataSrc: 'data'
        },
        columns: [
            { data: 'id' },
            { data: 'nama_barang' },
            { data: 'kode_barang' },
            { data: 'kategori_barang' },
            { data: 'jumlah' },
            { data: 'kondisi_barang' },
            { data: 'tanggal_input' },
            { 
                data: 'id',
                render: function(data) {
                    return `<button class="btn btn-sm btn-warning edit-btn" data-id="${data}">Edit</button>
                            <button class="btn btn-sm btn-danger delete-btn" data-id="${data}">Delete</button>`;
                }
            }
        ]
    });

    // Show Modal Form
    $('#addBtn').click(function() {
        $('#itemModal').modal('show');
    });

    // Handle Form Submission for Adding New Item
    $('#form-add-item').submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: '<?= site_url('inventaris/create') ?>',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                var result = JSON.parse(response);
                if (result.status) {
                    $('#itemModal').modal('hide');
                    $('#form-add-item')[0].reset();
                    table.ajax.reload(); // Reload the data in the table
                } else {
                    alert('Failed to add item.');
                }
            }
        });
    });


});
</script>

<!-- Bootstrap and other JS files -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>
