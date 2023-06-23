<?php
  if (session_status() == PHP_SESSION_NONE) {
}
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = '';
}
?>

<header class="blog-header lh-1 py-3">
  <div class="row flex-nowrap justify-content-between align-items-center">
    <div class="col-4 pt-1">
      <a class="link-secondary" href="#">
        <div style="vertical-align: inherit;">
          <p style="vertical-align: inherit;">Підпишіться</p>
        </div>
      </a>
    </div>
    <div class="col-4 text-center">
      <a class="blog-header-logo text-dark" href="#">
        <div style="vertical-align: inherit;">
          <p style="vertical-align: inherit;">News today</p>
        </div>
      </a>
    </div>
    <div class="col-4 d-flex justify-content-end align-items-center">
      <a class="link-secondary" href="#" aria-label="Пошук">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24">
          <title>Search</title>
          <circle cx="10.5" cy="10.5" r="7.5"></circle>
          <path d="M21 21l-5.2-5.2"></path>
        </svg>
      </a>
    <a class="p-2 text-dark" href="./../controllers/postNews.php">Головна</a>
    <?php
        if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
            ?>
            <a class="btn btn-sm btn-outline-secondary" href="./../views/login.php">
                <div style="vertical-align: inherit;">
                    <p style="vertical-align: inherit;">Увійти</p>
                </div>
            </a>
        <?php } else { ?>
            <a class="p-2 text-dark" href="./../controllers/postMyNews.php">Moї новини</a>
        <?php } ?>
    </div>
  </div>
</header>
