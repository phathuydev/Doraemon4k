<?php
ob_start();

use App\Core\AppServiceProvider;

$asp = new AppServiceProvider();
?>
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-12 col-xl-12">
      <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4"><?= isset($pages_title) ? $pages_title : 'Bảng chưa có tên' ?></h6>
        <?= (!empty($msg)) ? '<p class="text-danger">' . $msg . '</p>' : false; ?>
        <a href="<?= _WEB_ROOT ?>/videoManage?pages=1" class="btn mb-3 btn-outline-info text-white">Trở Lại</a>
        <a href="<?= _WEB_ROOT ?>/categoryManage/createCategory" class="btn mb-3 btn-outline-light text-white">Thêm</a>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Tên</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Khác</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($getAllCategory as $item) :
                extract($item);
              ?>
                <tr>
                  <td><?= $offset++ ?></td>
                  <td><img src="<?= $category_image ?>" width="100" alt=""></td>
                  <td><?= $category_name ?></td>
                  <td><?= $asp->formatTimeAgo(strtotime($created_at)) ?></td>
                  <td>
                    <?php if (!empty($category_id) > 0) : ?>
                      <a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/categoryManage/updateCategory?cateId=<?= $category_id ?>')" class="btn btn-outline-warning">Sửa</a>
                      <a class="btn btn-outline-danger" data-bs-toggle="modal" href="#deleteCategory-<?= $category_id ?>" role="button">Xóa</a>
                      <div class="modal fade" id="deleteCategory-<?= $category_id ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5 text-dark" id="exampleModalToggleLabel">Xóa Danh Sách Phát</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close">Hủy</button>
                              <form action="/categoryManage?pages=<?= $_GET['pages'] ?>" method="post">
                                <input type="hidden" name="category_id" value="<?= $category_id ?>">
                                <button type="submit" name="deleteCategory" class="btn btn-primary" data-bs-toggle="modal">Xóa</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endif ?>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <nav aria-label="Page navigation example">
            <div class="d-flex justify-content-between align-items-center">
              <ul class="product__pagination pagination pagination-sm">
                <li class="page-item <?= $page < 3 ? 'd-none' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/categoryManage?pages=<?= 1; ?>')" tabindex="-1"><i class="fa fa-long-arrow-left"></i></a></li>
                <?php for ($num = 1; $num <= $totalPage; $num++) { ?>
                  <li class="page-item <?= $num == $page ? 'bg-danger' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/categoryManage?pages=<?= $num; ?>')"><?= $num; ?></a>
                  </li>
                <?php } ?>
                <li class="page-item <?= $page > ($totalPage - 1) ? 'd-none' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/categoryManage?pages=<?= $page + 1; ?>')"><i class="fa fa-long-arrow-right"></i></a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
ob_end_flush();
?>