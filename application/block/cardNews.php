<div class="card-title">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bgc card-item">
      <div class="col p-4 d-flex flex-column position-static ">
        <strong class="d-inline-block mb-2 text-primary"><?= $article['genre'] ?></strong>
        <h3 class="mb-0"><?= substr($article['title'], 0, 70) ?></h3>
        <div class="mb-1 text-muted"><?= $article['date'] ?></div>
        <p class="card-text mb-auto"><?= substr($article['description'], 0, 120) ?></p>
        <a href="/application/controllers/postNewsId.php?id=<?= $article['id'] ?>" class="stretched-link">Продовжити читання →</a>
      </div>
      <div class="col-auto d-none d-lg-block img">
        <img src="../../<?= $article['photo'] ?>" class="img-thumbnail" width="200px" height="250" alt="photo news">
      </div>
    </div>
</div>