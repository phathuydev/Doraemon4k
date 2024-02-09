<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
  <a href="<?= _WEB_ROOT ?>/admin" class="navbar-brand d-flex d-lg-none me-4">
    <h3 class="text-primary"><img src="https://2.bp.blogspot.com/-5JzRsh0gSWw/Wx9cHZPmGtI/AAAAAAAABmQ/jfEbb9kGrdEwVHLisW1pIv7ezPbekJ9BwCLcBGAs/s640/17_tactics_that_made_doraemon_so_popular2.png" alt="" width="100"></h3>
  </a>
  <a href="#" class="sidebar-toggler flex-shrink-0">
    <i class="fa fa-bars"></i>
  </a>
  <div class="navbar-nav align-items-center ms-auto">
    <div class="nav-item dropdown">
      <button class="nav-link dropdown-toggle d-flex align-items-center bg-transparent border-0" data-bs-toggle="dropdown">
        <i class="fa fa-user bg-white border border-dark rounded-circle text-dark me-2" style="font-size: 25px; padding: 10px 12px 10px 12px;"></i>
        <span class="d-none d-lg-inline-flex"><?= $_SESSION['user_name']; ?></span>
      </button>
      <div class="dropdown-menu dropdown-menu-end bg-secondary border-info rounded-0 rounded-bottom m-0">
        <a href="<?= _WEB_ROOT ?>" class="dropdown-item text-white">Trang người dùng</a>
        <a href="<?= _WEB_ROOT ?>/signoutAdmin" class="dropdown-item text-white">Đăng xuất</a>
      </div>
    </div>
  </div>
</nav>