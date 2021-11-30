<html>

<head>
    <title><?= $title; ?></title>
</head>

<body>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header m-0 font-weight-bold">
                    Backup Project
                </div>
                <div class="card-body">
                    <h5 class="card-title ">Backup Seluruh Project</h5>
                    <a href="<?= base_url('utilitas/backupproject'); ?>" class="btn btn-primary">Backup Project</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow">
                <div class="card-header m-0 font-weight-bold">
                    Backup Database
                </div>
                <div class="card-body">
                    <h5 class="card-title ">Backup Seluruh Database</h5>
                    <a href="<?= base_url('utilitas/backupdb'); ?>" class="btn btn-primary">Backup Database</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow">
                <div class="card-header m-0 font-weight-bold">
                    Restore Database
                </div>
                <div class="card-body">
                    <form action="<?= base_url('utilitas/restoredb'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label">File Database (*.sql)</label>
                            <div>
                                <input type="file" name="datafile" size="30" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger">Restore Database</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



</body>

</html>