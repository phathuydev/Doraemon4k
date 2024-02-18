<?php
ob_start();

use App\Core\AppServiceProvider;

$asp = new AppServiceProvider();
?>
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-6 col-xl-4">
      <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
        <i class="fa fa-user fa-2x text-primary"></i>
        <div class="ms-3">
          <p class="mb-2">Người Dùng Đăng Ký</p>
          <h6 class="mb-0 float-end"><?= $asp->formatView($countUserDashboard) ?></h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-4">
      <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
        <i class="fa fa-eye fa-2x text-primary"></i>
        <div class="ms-3">
          <p class="mb-2">Tổng Lượt Xem</p>
          <h6 class="mb-0 float-end"><?= $asp->formatView($countViewDashboard) ?></h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-4">
      <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
        <i class="fa fa-thumbs-up fa-2x text-primary"></i>
        <div class="ms-3">
          <p class="mb-2">Tổng Lượt Thích</p>
          <h6 class="mb-0 float-end"><?= $asp->formatView($countLikeDashboard) ?></h6>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
ob_end_flush();
?>