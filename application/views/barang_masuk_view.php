<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Barang Masuk</h1>
    <form id="form_masuk">
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jumlah Masuk</label>
            <input type="number" name="jumlah_masuk" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    $('#form_masuk').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?= site_url('inventariscontroller/create_barang_masuk') ?>",
            type: "POST",
            data: $(this).serialize(),
            dataType: "JSON",
            success: function (data) {
                if (data.status) {
                    alert('Barang masuk berhasil ditambahkan!');
                    $('#form_masuk')[0].reset();
                } else {
                    alert(data.error);
                }
            }
        });
    });
</script>
