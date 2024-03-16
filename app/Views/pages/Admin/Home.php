<?php

use App\Core\AppServiceProvider;

$asp = new AppServiceProvider();
?>
<div class="container-fluid pt-4 px-4">
  <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
    <i class="fa fa-user fa-2x text-primary"></i>
    <div class="ms-3">
      <p class="mb-2">Người Dùng Đăng Ký</p>
      <h6 class="mb-0 float-end"><?= $asp->formatView($countUserDashboard) ?></h6>
    </div>
  </div>
</div>