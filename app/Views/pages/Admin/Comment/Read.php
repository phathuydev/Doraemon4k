<?php
ob_start();
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
                <th scope="col">Người dùng</th>
                <th scope="col">Phim</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Khác</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($getAllComment as $item) :
                extract($item);
              ?>
                <tr>
                  <td><?= $offset++ ?></td>
                  <td><?= $user_name ?></td>
                  <td>
                    <?php $getAllVideo = $this->province->getAllVideo($video_id); ?>
                    <?php foreach ($getAllVideo as $data) {
                      if ($data['video_form'] == 0) : ?>
                        <div class="truncate-text-1">
                          <a href="<?= _WEB_ROOT ?>/videoDetail?vdId=<?= $data['video_id'] ?>&cate=<?= $data['category_id'] ?>"><?= $data['video_title'] ?></a>
                        </div>
                      <?php else : ?>
                        <div class="truncate-text-1">
                          <a href="<?= _WEB_ROOT ?>/videoApiDetail?vdId=<?= $data['video_id'] ?>&slug=<?= $data['video_slug'] ?>&epi=1"><?= $data['video_title'] ?></a>
                        </div>
                      <?php endif ?>
                    <?php } ?>
                  </td>
                  <td>
                    <?= $content ?>
                  </td>
                  <td>
                    <button type="button" class="btn btn-outline-danger mb-1" data-bs-toggle="modal" data-bs-target="#deleteComment-<?= $video_id ?>">
                      Xóa
                    </button>
                    <div class="modal fade" id="deleteComment-<?= $video_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header border-bottom-0">
                            <p class="modal-title text-dark" id="exampleModalLabel">Xóa bình luận</p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Hủy</button>
                            <form action="/commentManage?pages=1" method="post">
                              <input type="hidden" name="comment_id" value="<?= $comment_id ?>">
                              <button type="submit" name="deleteComment" class="btn btn-primary">Xóa</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
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
                <li class="page-item <?= $page < 3 ? 'd-none' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/commentManage?pages=1')" tabindex="-1"><i class="fa fa-long-arrow-left"></i></a></li>
                <?php for ($num = 1; $num <= $totalPage; $num++) { ?>
                  <li class="page-item <?= $num == $page ? 'bg-danger' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/commentManage?pages=<?= $num; ?>')"><?= $num; ?></a>
                  </li>
                <?php } ?>
                <li class="page-item <?= $page > ($totalPage - 1) ? 'd-none' : false; ?>"><a href="javascript:void(0)" onclick="loadPage('<?= _WEB_ROOT ?>/commentManage?pages=<?= $page + 1; ?>')"><i class="fa fa-long-arrow-right"></i></a>
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