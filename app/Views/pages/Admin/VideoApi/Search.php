<?php
ob_start();
?>
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-12 col-xl-12">
      <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4"><?= isset($pages_title) ? $pages_title : 'Bảng chưa có tên' ?></h6>
        <a href="<?= _WEB_ROOT ?>/ApiManage?pages=1" class="btn mb-3 btn-outline-light text-white">Thêm Phim</a>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Tên</th>
                <th scope="col">Danh sách phát</th>
                <th scope="col">Ngày thêm</th>
                <th scope="col">Khác</th>
              </tr>
            </thead>
            <tbody>
              <form method="post">
                <?php foreach ($getAllVideoWhere as $item) :
                  extract($item);
                ?>
                  <tr>
                    <td><?= $offset++ ?></td>
                    <td><img src="<?= $video_image ?>" width="120" alt=""></td>
                    <td>
                      <p class="truncate-text-1"><?= $video_title ?></p>
                    </td>
                    <td>
                      <?= $category_name ?>
                    </td>
                    <td><?= formatTimeAgo(strtotime($created_at_video)) ?></td>
                    <td>
                      <a href="<?= _WEB_ROOT ?>/videoApiManageDetail?slug=<?= $video_slug ?>&pages=<?= $_GET['pages'] ?>&epi=1" class="btn btn-outline-warning text-white mb-1">Chi Tiết</a>
                      <button type="button" class="btn btn-outline-danger mb-1" data-bs-toggle="modal" data-bs-target="#deleteVideo-<?= $video_id ?>">
                        Xóa
                      </button>
                      <div class="modal fade" id="deleteVideo-<?= $video_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                              <p class="modal-title text-dark" id="exampleModalLabel">Xóa Video</p>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Hủy</button>
                              <form action="/videoApiManage?pages=1" method="post">
                                <input type="hidden" name="video_id" value="<?= $video_id ?>">
                                <button type="submit" name="deleteVideo" class="btn btn-primary">Xóa</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php endforeach ?>
              </form>
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <nav aria-label="Page navigation example">
            <div class="d-flex justify-content-between align-items-center">
              <ul class="product__pagination pagination pagination-sm">
                <li class="page-item <?= $page < 3 ? 'd-none' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/videoApiManage?pages=1')" tabindex="-1"><i class="fa fa-long-arrow-left"></i></a></li>
                <?php for ($num = 1; $num <= $totalPage; $num++) { ?>
                  <li class="page-item <?= $num == $page ? 'bg-danger' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/videoApiManage?pages=<?= $num; ?>')"><?= $num; ?></a>
                  </li>
                <?php } ?>
                <li class="page-item <?= $page > ($totalPage - 1) ? 'd-none' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/videoApiManage?pages=<?= $page + 1; ?>')"><i class="fa fa-long-arrow-right"></i></a>
                </li>
              </ul>
            </div>
          </nav>
          <div class="float-end">
            <form method="GET" action="<?= _WEB_ROOT ?>/searchVideoApi">
              <input type="hidden" name="pages" value="1">
              <input class="form-control" type="search" name="kw" id="kw" placeholder="Nhập tên phim">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
ob_end_flush();
?>