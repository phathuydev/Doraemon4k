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
                    <?php $getAllVideo = $this->province->getAll('videos WHERE video_id = ' . $video_id . ''); ?>
                    <?php foreach ($getAllVideo as $data) { ?>
                      <div class="truncate-text-1">
                        <a href="<?= _WEB_ROOT ?>/videoApiDetail?vdId=<?= $data['video_id'] ?>&slug=<?= $data['video_slug'] ?>&epi=1"><?= $data['video_title'] ?></a>
                      </div>
                    <?php } ?>
                  </td>
                  <td>
                    <?= $content ?>
                  </td>
                  <td>
                    <button type="button" class="btn btn-outline-danger mb-1" data-bs-toggle="modal" data-bs-target="#deleteComment-<?= $comment_id ?>">
                      Xóa
                    </button>
                    <div class="modal fade" id="deleteComment-<?= $comment_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <select onchange="loadPage(this.value)" class="border-0 p-1 bg-dark text-white">
          <?php for ($num = 1; $num <= $totalPage; $num++) { ?>
            <option value="<?= _WEB_ROOT ?>/videoManage?pages=<?= $num; ?>" <?= ($num == $page) ? 'selected' : '' ?>>Trang <?= $num ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
  </div>
</div>