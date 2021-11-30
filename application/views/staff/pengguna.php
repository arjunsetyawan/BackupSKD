<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Tabel User</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Tanggal Pembuatan</th>
                    </tr>
                </thead>
                <?php
                $count = 0;
                foreach ($data_user as $row) {
                    $count = $count + 1;
                ?>

                        <tr>
                            <td><?php echo $row->name ?></td>
                            <td><?php echo $row->email ?></td>
                            <td>
                                <?php
                                // echo $row->role_id
                                if ($row->role_id == 1) {
                                    $role = 'Admin';
                                } else if ($row->role_id == 2) {
                                    $role = 'Staff';
                                } else if ($row->role_id == 3) {
                                    $role = 'Member';
                                }
                                echo $role;
                                ?>
                            </td>
                            <td>
                                <?php
                                // echo $row->is_active
                                if ($row->is_active == 1) {
                                    $status = 'Aktif';
                                } else if ($row->is_active == 1) {
                                    $status = 'Tidak Aktif';
                                } else {
                                    $status = 'Error';
                                }
                                echo $status;
                                ?>
                            </td>
                            <td><?php echo $row->date_created ?></td>
                        </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>