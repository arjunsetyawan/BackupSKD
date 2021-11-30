<form action="<?php echo base_url('user/ubahUser') ?>" method="post">
    <table class="table table-borderless" style="width: 50rem;">
        <input type="hidden" class="form-control" name="id" value="<?= $usr->id ?>" required />
        <input type="hidden" class="form-control" name="image" value="<?= $usr->image ?>" required />
        <input type="hidden" class="form-control" name="password" value="<?= $usr->password ?>" required />
        <input type="hidden" class="form-control" name="date_created" value="<?= $usr->date_created ?>" required />
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="nama" value="<?= $usr->name ?>" required /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="email" class="form-control" name="email" value="<?= $usr->email ?>" required /></td>
        </tr>
        <tr>
            <td>Role</td>
            <td>:</td>
            <td>
                <select class="form-select" aria-label="Default select example" name="role">
                    <option value="3" selected>Member</option>
                    <option value="2">Staff</option>
                    <option value="1">Admin</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="1" value="1" checked>
                    <label class="form-check-label" for="1">
                        Aktif
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="0" value="0">
                    <label class="form-check-label" for="0">
                        Tidak Aktif
                    </label>
                </div>
            </td>
        </tr>
    </table>
    <br>

    <input class="btn btn-success" type="submit" value="Ubah">
    <a href="<?php echo base_url('user/pengguna') ?>" class="btn btn-warning">Batal</a>
</form>