<div class="card mb-3" style="max-width: 620px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $user['name']; ?></h5>
        <p class="card-text">Email : <br><?= $user['email']; ?></p>
        <p class="card-text"><small class="text-muted">Dibuat pada : <br> <?= $user['date_created']; ?></small></p>
      </div>
    </div>
  </div>
</div>