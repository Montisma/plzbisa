<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Inventory Management</h1>
    <button class="btn btn-success" onclick="add_item()">Add Item</button>
    <table class="table table-bordered" id="inventarisTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Kategori Barang</th>
                <th>Jumlah</th>
                <th>Kondisi Barang</th>
                <th>Tanggal Input</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Add/Edit Modal -->
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_title"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" name="kode_barang" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori Barang</label>
                        <input type="text" name="kategori_barang" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kondisi Barang</label>
                        <input type="text" name="kondisi_barang" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

<script type="text/javascript">
var table;

$(document).ready(function() {
    // Initialize DataTables
    table = $('#inventarisTable').DataTable({
        "ajax": {
            "url": "<?= site_url('inventaris/get_data') ?>",
            "type": "GET"
        },
        "columns": [
            {"data": "id"},
            {"data": "nama_barang"},
            {"data": "kode_barang"},
            {"data": "kategori_barang"},
            {"data": "jumlah"},
            {"data": "kondisi_barang"},
            {"data": "tanggal_input"},
            {
                "data": null,
                "render": function(data, type, row) {
                    return `<button class="btn btn-warning" onclick="edit_item(${row.id})">Edit</button>
                            <button class="btn btn-danger" onclick="delete_item(${row.id})">Delete</button>`;
                }
            }
        ]
    });

    // Form submission for Create/Update
    $('#form').on('submit', function(e) {
        e.preventDefault();
        let url = save_method == 'add' ? "<?= site_url('inventaris/create') ?>" : "<?= site_url('inventaris/update') ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $(this).serialize(),
            dataType: "JSON",
            success: function(data) {
                $('#modal_form').modal('hide');
                table.ajax.reload();
            }
        });
    });
});

var save_method;

function add_item() {
    save_method = 'add';
    $('#form')[0].reset();
    $('#modal_form').modal('show');
    $('#modal_title').text('Add Item');
}

function edit_item(id) {
    save_method = 'update';
    $('#form')[0].reset();
    $.ajax({
        url: "<?= site_url('inventaris/get_data') ?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="id"]').val(data.id);
            $('[name="nama_barang"]').val(data.nama_barang);
            $('[name="kode_barang"]').val(data.kode_barang);
            $('[name="kategori_barang"]').val(data.kategori_barang);
            $('[name="jumlah"]').val(data.jumlah);
            $('[name="kondisi_barang"]').val(data.kondisi_barang);
            $('#modal_form').modal('show');
            $('#modal_title').text('Edit Item');
        }
    });
}

function delete_item(id) {
    if (confirm('Are you sure you want to delete this item?')) {
        $.ajax({
            url: "<?= site_url('inventaris/delete') ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                table.ajax.reload();
            }
        });
    }
}
</script>
</body>
</html>
