<form action="<?php echo base_url('user/tambahbarang') ?>" method="post">
    <table class="table table-borderless" style="width: 50rem;">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="nama_barang" required /></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="kategori_barang" required /></td>
        </tr>
        <tr>
            <td>Satuan</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="satuan_barang" required /></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="stok_barang" onkeypress="return hanyaAngka(event)" required /></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="harga_barang" onkeypress="return hanyaAngka(event)" required /></td>
        </tr>
    </table>
    <br>

    <input class="btn btn-primary" type="submit" value="Tambah">
    <a href="<?php echo base_url('user/barang') ?>"" class="btn btn-warning">Batal</a>
</form>
<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>