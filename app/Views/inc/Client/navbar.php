<?php

use Core\Form;

$form = new Form();

?>
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand me-lg-5 me-0" href="<?= _WEB_ROOT ?>">
      <img src="<?= _WEB_ROOT ?>/public/client/images/logo.png" class="logo-image img-fluid" alt="">
    </a>
    <form action="<?= _WEB_ROOT ?>/videoSearch" method="get" class="custom-form search-form flex-fill me-3" role="search">
      <div class="input-group input-group-lg" id="d-sm-none">
        <input type="hidden" name="pages" value="1">
        <input type="hidden" name="sort" value="desc" id="">
        <input name="kw" type="search" class="form-control rounded-start" id="kw" placeholder="Tìm Phim Theo Tên..." aria-label="Search">
        <button type="submit" class="form-control" id="submit">
          <i class="bi-search"></i>
        </button>
      </div>
    </form>
    <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" aria-controls="navbarNav" aria-expanded="false" data-bs-target="#navbarNav" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNav">
      <ul class="navbar-nav ms-lg-auto text-center">
        <li class="nav-item mb-1">
          <a class="nav-link <?= isset($home) ? 'active' : '' ?>" href="<?= _WEB_ROOT ?>">Trang Chủ</a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link <?= isset($videoApi) ? 'active' : '' ?>" href="<?= _WEB_ROOT ?>/videoApi?pages=1&sort=desc">Xem Phim</a>
        </li>
        <?php if (empty($_SESSION['user_id_client'])) { ?>
          <li class="nav-item mb-2">
            <a href="<?= _WEB_ROOT ?>/signin" class="nav-link <?= isset($auth) ? 'active' : '' ?>">Đăng Nhập</a>
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
            <h2 class="text-white mb-1 h1">MovieHub</h2>
            <a href="#section_2" class="bn632-hover bn24 p-3 bn5 custom-btn smoothscroll mt-3">Xem ngay</a>
          </div>
          <div class="owl-carousel owl-theme">
            <div class="owl-carousel-info-wrap item">
              <img src="https://d1j8r0kxyu9tj8.cloudfront.net/images/1566809340Y397jnilYDd15KN.jpg" class="owl-carousel-image img-fluid" alt="">
              <div class="owl-carousel-info">
                <h6 class="mb-2 h6">
                  Avengers
                </h6>
                <span class="badge">Viễn Tưởng</span>
              </div>
            </div>
            <div class="owl-carousel-info-wrap item">
              <img src="https://images.fpt.shop/unsafe/filters:quality(5)/fptshop.com.vn/uploads/images/tin-tuc/176627/Originals/poster-phim-hoat-hinh-1.jpg" class="owl-carousel-image img-fluid" alt="">
              <div class="owl-carousel-info">
                <h6 class="mb-2 h6">
                  K.Panda
                </h6>
                <span class="badge">Hoạt Hình</span>
              </div>
            </div>
            <div class="owl-carousel-info-wrap item">
              <img src="https://static1.dienanh.net/upload/202107/32b4edef-8a63-4ebb-b58f-f568d67da658.jpg" class="owl-carousel-image img-fluid" alt="">
              <div class="owl-carousel-info">
                <h6 class="mb-2 h6">
                  Tắm Cám
                </h6>
                <span class="badge">Tâm Lý</span>
              </div>
            </div>
            <div class="owl-carousel-info-wrap item">
              <img src="https://cdn.24h.com.vn/upload/4-2020/images/2020-12-02/bo-gia_teaser-1--1606900159-476-width660height873.jpg" class="owl-carousel-image img-fluid" alt="">
              <div class="owl-carousel-info">
                <h6 class="mb-2 h6">
                  Bố Già
                </h6>
                <span class="badge">Hài Hước</span>
              </div>
            </div>
            <div class="owl-carousel-info-wrap item">
              <img src="https://thegioiinnhanh.com/upload/tiny/5_Mu_In_Poster_Dan_Tng_p__Cho_Vic_Qung_Cao.png" class="owl-carousel-image img-fluid" alt="">
              <div class="owl-carousel-info">
                <h6 class="mb-2 h6">
                  Hai Phượng
                </h6>
                <span class="badge">Võ Thuật</span>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>