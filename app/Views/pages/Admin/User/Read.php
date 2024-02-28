<?php
use App\Core\AppServiceProvider;

$asp = new AppServiceProvider();
?>
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-12 col-xl-12">
      <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4"><?= isset($pages_title) ? $pages_title : 'Bảng chưa có tên' ?></h6>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Email</th>
                <th scope="col">Vai trò</th>
                <th scope="col">Ngày tạo</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($getAllUserAdminPage as $item) :
                extract($item);
              ?>
                <tr>
                  <td><?= $offset++ ?></td>
                  <td><?= $user_name ?></td>
                  <td><?= $user_email ?></td>
                  <td><?= $user_role == 2 ? 'Quản trị viên' : 'Người dùng' ?></td>
                  <td><?= $asp->formatTimeAgo(strtotime($created_at)) ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <nav aria-label="Page navigation example">
            <div class="d-flex justify-content-between align-items-center">
              <ul class="product__pagination pagination pagination-sm">
                <li class="page-item <?= $page < 3 ? 'd-none' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/userManage?pages=<?= 1; ?>')" tabindex="-1"><i class="fa fa-long-arrow-left"></i></a></li>
                <?php for ($num = 1; $num <= $totalPage; $num++) { ?>
                  <li class="page-item <?= $num == $page ? 'bg-danger' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/userManage?pages=<?= $num; ?>')"><?= $num; ?></a>
                  </li>
                <?php } ?>
                <li class="page-item <?= $page > ($totalPage - 1) ? 'd-none' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/userManage?pages=<?= $page + 1; ?>')"><i class="fa fa-long-arrow-right"></i></a>
                </li>
              </ul>
            </div>
          </nav>
          <div class="float-end">
            <form method="get" action="<?= _WEB_ROOT ?>/searchUserManage">
              <input type="hidden" name="pages" value="1">
              <input class="form-control" type="search" name="kw" id="kw" placeholder="Nhập tên người dùng">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>