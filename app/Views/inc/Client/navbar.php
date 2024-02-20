<?php

use Core\Form;

$form = new Form();

?>
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand me-lg-5 me-0" href="<?= _WEB_ROOT ?>">
      <img src="https://2.bp.blogspot.com/-5JzRsh0gSWw/Wx9cHZPmGtI/AAAAAAAABmQ/jfEbb9kGrdEwVHLisW1pIv7ezPbekJ9BwCLcBGAs/s640/17_tactics_that_made_doraemon_so_popular2.png" class="logo-image img-fluid me-3" alt="Nobita 4k logo">
    </a>
    <form action="<?= _WEB_ROOT ?>/videoSearch" method="get" class="custom-form search-form flex-fill me-3 mt-2" role="search">
      <div class="input-group input-group-lg" id="d-sm-none">
        <input type="hidden" name="pages" value="1">
        <input type="hidden" name="sort" value="desc" id="">
        <input name="kw" type="search" class="form-control rounded-start" id="kw" placeholder="Tìm Phim Theo Tên..." aria-label="Search">
        <button type="submit" class="form-control" id="submit">
          <i class="bi-search"></i>
        </button>
      </div>
    </form>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" aria-controls="navbarNav" aria-expanded="false" data-bs-target="#navbarNav" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNav">
      <ul class="navbar-nav ms-lg-auto text-center">
        <li class="nav-item mb-1">
          <a class="nav-link <?= isset($home) ? 'active' : false ?>" href="<?= _WEB_ROOT ?>">Trang Chủ</a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link <?= isset($video) ? 'active' : false ?>" href="<?= _WEB_ROOT ?>/video?pages=1&sort=desc">Phim Doraemon</a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link <?= isset($videoApi) ? 'active' : false ?>" href="<?= _WEB_ROOT ?>/videoApi?pages=1&sort=desc">Phim Khác</a>
        </li>
        <?php if (empty($_SESSION['user_id_client'])) { ?>
          <li class="nav-item mb-2">
            <a href="<?= _WEB_ROOT ?>/signin" class="nav-link">Đăng Nhập</a>
          </li>
          <li class="nav-item">
            <form action="<?= _WEB_ROOT ?>/videoSearch" method="get" class="custom-form search-form flex-fill mt-2" role="search">
              <div class="input-group input-group-lg d-lg-none">
                <input type="hidden" name="pages" value="1">
                <input type="hidden" name="sort" value="desc" id="">
                <input name="kw" type="search" class="form-control rounded-start" style="border-radius: 20px 0 0 20px;" id="kw" placeholder="Tìm Phim Theo Tên..." aria-label="Search">
                <button type="submit" class="form-control" id="submit">
                  <i class="bi-search"></i>
                </button>
              </div>
            </form>
          </li>
        <?php } else { ?>
          <li class="nav-item dropdown mb-2">
            <a href="<?= _WEB_ROOT ?>" class="text-white nav-link">
              Xin Chào <?= $_SESSION['user_name_client'] ?>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-info border-info">
              <a href="<?= _WEB_ROOT ?>/signout" class="dropdown-item text-white">Đăng xuất</a>
            </div>
          </li>
          <li class="nav-item mb-2">
            <a href="<?= _WEB_ROOT ?>/signout" id="signout-dblock" class="text-white nav-link">Đăng xuất</a>
          </li>
          <li class="nav-item">
            <form action="<?= _WEB_ROOT ?>/videoSearch" method="get" class="custom-form search-form flex-fill" role="search">
              <div class="input-group input-group-lg d-lg-none">
                <input type="hidden" name="pages" value="1">
                <input type="hidden" name="sort" value="desc" id="">
                <input name="kw" type="search" class="form-control rounded-start" id="kw" placeholder="Tìm Phim Theo Tên..." aria-label="Search">
                <button type="submit" class="form-control" id="submit">
                  <i class="bi-search"></i>
                </button>
              </div>
            </form>
          </li>
        <?php } ?>
      </ul>
    </div>
</nav>
<section class="hero-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12">
        <?php if (isset($home)) { ?>
          <div class="text-center mb-5 pb-2">
            <h2 class="text-white mb-1">Doraemon4k</h2>
            <p class="text-white mb-0">Trở về tuổi thơ cùng tôi nhé</p>
            <a href="#section_2" class="bn632-hover bn24 p-3 bn5 custom-btn smoothscroll mt-3">Xem ngay</a>
          </div>
          <div class="owl-carousel owl-theme">
            <div class="owl-carousel-info-wrap item">
              <img src="<?= _WEB_ROOT ?>/public/client/images/hinh-anh-nobita_1.jpg" class="owl-carousel-image img-fluid" alt="">
              <div class="owl-carousel-info">
                <h4 class="mb-2">
                  Nobita
                  <img src="<?= _WEB_ROOT ?>/public/client/images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
                </h4>

                <span class="badge">Nv hoạt hình</span>
              </div>
              <div class="social-share">
                <ul class="social-icon" style="margin-bottom: 100px !important;">
                  <li class="social-icon-item">
                    <a href="https://doraemon.fandom.com/wiki/Nobita_Nobi" class="social-icon-link bi-info"></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="owl-carousel-info-wrap item">
              <img src="<?= _WEB_ROOT ?>/public/client/images/hinh-anh-doraemon-chibi-dep-nhat_20791020825.jpg" class="owl-carousel-image img-fluid" alt="">
              <div class="owl-carousel-info">
                <h4 class="mb-2">
                  Doraemon
                  <img src="<?= _WEB_ROOT ?>/public/client/images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
                </h4>
                <span class="badge">Nv hoạt hình</span>
              </div>
              <div class="social-share">
                <ul class="social-icon" style="margin-bottom: 100px !important;">
                  <li class="social-icon-item">
                    <a href="https://doraemon.fandom.com/wiki/Doraemon" class="social-icon-link bi-info"></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="owl-carousel-info-wrap item">
              <img src="<?= _WEB_ROOT ?>/public/client/images/suka.jpg" class="owl-carousel-image img-fluid" alt="">
              <div class="owl-carousel-info">
                <h4 class="mb-2">
                  Sizuka
                  <img src="<?= _WEB_ROOT ?>/public/client/images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
                </h4>
                <span class="badge">Nv hoạt hình</span>
              </div>
              <div class="social-share">
                <ul class="social-icon" style="margin-bottom: 100px !important;">
                  <li class="social-icon-item">
                    <a href="https://doraemon.fandom.com/wiki/Shizuka_Minamoto" class="social-icon-link bi-info"></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="owl-carousel-info-wrap item">
              <img src="<?= _WEB_ROOT ?>/public/client/images/chaien.jpg" class="owl-carousel-image img-fluid" alt="">
              <div class="owl-carousel-info">
                <h4 class="mb-2">
                  Chaien
                  <img src="<?= _WEB_ROOT ?>/public/client/images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
                </h4>
                <span class="badge">Nv hoạt hình</span>
              </div>
              <div class="social-share">
                <ul class="social-icon" style="margin-bottom: 100px !important;">
                  <li class="social-icon-item">
                    <a href="https://doraemon.fandom.com/vi/wiki/Goda_Takeshi" class="social-icon-link bi-info"></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="owl-carousel-info-wrap item">
              <img src="<?= _WEB_ROOT ?>/public/client/images/seko.jpg" class="owl-carousel-image img-fluid" alt="">
              <div class="owl-carousel-info">
                <h4 class="mb-2">
                  Suneo
                  <img src="<?= _WEB_ROOT ?>/public/client/images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
                </h4>
                <span class="badge">Nv hoạt hình</span>
              </div>
              <div class="social-share">
                <ul class="social-icon" style="margin-bottom: 100px !important;">
                  <li class="social-icon-item">
                    <a href="https://doraemon.fandom.com/wiki/Suneo_Honekawa" class="social-icon-link bi-info"></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>