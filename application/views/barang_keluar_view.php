<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Barang Keluar</h1>
    <button class="btn btn-primary" onclick="add_barang_keluar()">Add Barang Keluar</button>
    <br><br>
    <table class="table table-bordered" id="barangKeluarTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Keluar</th>
            </tr>
        </thead>
    </table>
</div>

<script>
    var table;

    $(document).ready(function () {
    table = $('#barangKeluarTable').DataTable({
        "ajax": {
            "url": "<?= site_url('barangkeluarcontroller/fetch') ?>",
            "type": "GET"
        },
        "columns": [
            { "data": "id" },                // Corresponding to ID in response
            { "data": "nama_barang" },        // Corresponding to Nama Barang in response
            { "data": "jumlah" },             // Corresponding to Jumlah in response
            { "data": "tanggal_keluar" }      // Corresponding to Tanggal Keluar in response
        ]
    });
});


    function add_barang_keluar() {
        var form = prompt("Enter item ID and amount (Format: ID,Amount):");
        var values = form.split(',');
        var data = {
            inventaris_id: values[0],
            jumlah: values[1]
        };
        $.post('<?= site_url('barangkeluarcontroller/create') ?>', data, function (response) {
            alert("Barang Keluar added");
            table.ajax.reload();
        });
    }
</script>
