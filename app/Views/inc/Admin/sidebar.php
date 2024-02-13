<div class="container-fluid position-relative d-flex p-0">
  <div class="content">
    <div class="sidebar pe-4 pb-3 anthanhcuon">
      <nav class="navbar bg-secondary navbar-dark">
        <a href="<?= _WEB_ROOT ?>/admin" class="navbar-brand mx-5 mb-3">
          <h3 class="text-primary"><img src="https://2.bp.blogspot.com/-5JzRsh0gSWw/Wx9cHZPmGtI/AAAAAAAABmQ/jfEbb9kGrdEwVHLisW1pIv7ezPbekJ9BwCLcBGAs/s640/17_tactics_that_made_doraemon_so_popular2.png" alt="" width="100xư"></h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
          <div class="position-relative">
            <i class="fa fa-user bg-white border border-dark rounded-circle text-dark ms-2" style="font-size: 25px; padding: 10px 12px 10px 12px;"></i>
            <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
          </div>
          <div class="ms-3">
            <h6 class="mb-1"><?= $_SESSION['user_name']; ?></h6>
            <span></span>
          </div>
        </div>
        <div class="navbar-nav w-100">
          <a href="<?= _WEB_ROOT ?>/admin" class="nav-item nav-link text-white <?= isset($home) ? 'active' : false ?>">
            <i class="fa fa-tachometer-alt ms-1 me-2 small"></i>Bảng điều khiển
          </a>
          <a href="<?= _WEB_ROOT ?>/userManage?pages=1" class="nav-item nav-link text-white small <?= isset($user) ? 'active' : false ?>">
            <i class="fa fa-user ms-1 me-2"></i>Người Dùng
          </a>
          <a href="<?= _WEB_ROOT ?>/commentManage?pages=1" class="nav-item nav-link text-white small <?= isset($comment) ? 'active' : false ?>">
            <i class="fa fa-comment ms-1 me-2"></i>Bình luận
          </a>
          <a href="<?= _WEB_ROOT ?>/videoManage?pages=1" class="nav-item nav-link text-white small <?= isset($video) ? 'active' : false ?>">
            <i class="fa fa-film ms-1 me-2"></i>Phim Của Tôi
          </a>
          <a href="<?= _WEB_ROOT ?>/videoApiManage?pages=1" class="nav-item nav-link text-white small <?= isset($videoApi) ? 'active' : false ?>">
            <i class="fa fa-film ms-1 me-2"></i>Phim Thêm Từ Kho
          </a>
          <a href="<?= _WEB_ROOT ?>/ApiManage?pages=1" class="nav-item nav-link text-white small <?= isset($api) ? 'active' : false ?>">
            <i class="fa fa-film ms-1 me-2"></i>Kho Phim
          </a>
        </div>
      </nav>
    </div>