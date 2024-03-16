<?php

use App\Core\AppServiceProvider;

$asp = new AppServiceProvider();
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
                <th scope="col">Đã thêm</th>
                <th scope="col">Khác</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($getAllVideo as $item) :
                extract($item);
              ?>
                <tr>
                  <td><?= $offset++ ?></td>
                  <td><img src="<?= $video_image ?>" width="120" alt=""></td>
                  <td>
                    <div class="truncate-text-1">
                      <a href="<?= _WEB_ROOT ?>/videoApiDetail?vdId=<?= $video_id ?>&slug=<?= $video_slug ?>&epi=1"><?= $video_title ?></a>
                    </div>
                  </td>
                  <td><?= $asp->formatTimeAgo(strtotime($created_at_video)) ?></td>
                  <td>
                    <?php if (!empty($is_deleted) == 0) : ?>
                      <button type="button" class="btn btn-outline-danger mb-1" data-bs-toggle="modal" data-bs-target="#deleteVideo-<?= $video_id ?>">
                        Ẩn
                      </button>
                      <div class="modal fade" id="deleteVideo-<?= $video_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                              <p class="modal-title text-dark" id="exampleModalLabel">Xóa Video</p>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary me-0" data-bs-dismiss="modal" aria-label="Close">Hủy</button>
                              <form action="/videoManage?pages=1" method="post">
                                <input type="hidden" name="video_id" value="<?= $video_id ?>">
                                <button type="submit" name="deleteVideo" class="btn btn-primary">Xóa</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php else : ?>
                      <button type="button" class="btn btn-outline-success mb-1" data-bs-toggle="modal" data-bs-target="#restoreVideo-<?= $video_id ?>">
                        Khôi Phục
                      </button>
                      <div class="modal fade" id="restoreVideo-<?= $video_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                              <p class="modal-title text-dark" id="exampleModalLabel">Khôi Phục Video</p>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary me-0" data-bs-dismiss="modal" aria-label="Close">Hủy</button>
                              <form action="/videoManage?pages=1" method="post">
                                <input type="hidden" name="video_id" value="<?= $video_id ?>">
                                <button type="submit" name="restoreVideo" class="btn btn-primary">Khôi Phục</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <button type="button" class="btn btn-outline-danger mb-1" data-bs-toggle="modal" data-bs-target="#deletedVideo-<?= $video_id ?>">
                        Xóa
                      </button>
                      <div class="modal fade" id="deletedVideo-<?= $video_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                              <p class="modal-title text-dark" id="exampleModalLabel">Xóa Vĩnh Viễn</p>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary me-0" data-bs-dismiss="modal" aria-label="Close">Hủy</button>
                              <form action="/videoManage?pages=1" method="post">
                                <input type="hidden" name="video_id" value="<?= $video_id ?>">
                                <button type="submit" name="deletedVideo" class="btn btn-primary">Xóa Vĩnh Viễn</button>
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
          <select onchange="loadPage(this.value)" class="border-0 p-1 bg-dark text-white">
            <?php for ($num = 1; $num <= $totalPage; $num++) { ?>
              <option value="<?= _WEB_ROOT ?>/videoManage?pages=<?= $num; ?>" <?= ($num == $page) ? 'selected' : '' ?>>Trang <?= $num ?></option>
            <?php } ?>
          </select>
          <div class="float-end">
            <form method="GET" action="<?= _WEB_ROOT ?>/searchVideo">
              <input type="hidden" name="pages" value="1">
              <input class="form-control" type="search" name="kw" id="kw" placeholder="Nhập tên phim">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>