<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col">
                <h6 class="m-0 font-weight-bold">Tabel Barang</h6>
            </div>
        </div>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <?php
                $count = 0;
                foreach($data_barang as $row) {
                    $count = $count + 1;
                ?>

                    <tr>
                        <td><?php echo $row->nama ?></td>
                        <td><?php echo $row->kategori ?></td>
                        <td><?php echo $row->satuan ?></td>
                        <td><?php echo $row->stok ?></td>
                        <td>
                            <?php
                                $konv = "Rp. " . number_format($row->harga, 0, ",", ".");
                                echo $konv;
                            ?>
                        </td>
                    </tr>

                <?php } ?>
            </table>
        </div>
    </div>
</div>