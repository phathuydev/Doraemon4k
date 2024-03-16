<?php
use Core\Form;

$form = new Form();
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
                <th scope="col">Ảnh</th>
                <th scope="col">Tên</th>
                <th scope="col">Đường Dẫn</th>
                <th scope="col">Khác</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $value) {
                extract($value);
                $getVideoSlug = $this->province->getVideoSlug($slug);
              ?>
                <tr>
                  <td><?= $offset++ ?></td>
                  <td><img src="<?= $linkImage ?>/<?= $poster_url ?>" width="120" alt="Ảnh"></td>
                  <td>
                    <p class="truncate-text-1"><?= $name ?></p>
                  </td>
                  <td>
                    <div class="truncate-text-1"><?= $slug ?></div>
                  </td>
                  <td>
                    <?php if (empty($getVideoSlug)) : ?>
                      <form method="post" action="/ApiManage?pages=<?= $_GET['pages'] ?>">
                        <a href="DetailMovie?slug=<?= $slug ?>&pages=<?= $_GET['pages'] ?>&epi=1" class="btn btn-outline-warning text-white mb-1">Chi Tiết</a>
                        <input type="hidden" name="image" value="<?= $linkImage ?>/<?= $poster_url ?>">
                        <input type="hidden" name="title" value="<?= $name ?>">
                        <input type="hidden" name="slug" value="<?= $slug ?>">
                        <button type="submit" name="addVideoApi" class="btn btn-outline-light text-white mb-1">Thêm</button>
                      </form>
                    <?php else : ?>
                      <button type="button" class="btn btn-outline-success text-white mb-1" disabled>Đã Thêm</button>
                    <?php endif ?>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <select onchange="loadPage(this.value)" class="border-0 p-1 bg-dark text-white">
            <?php for ($num = 1; $num <= $totalPage; $num++) { ?>
              <option value="<?= _WEB_ROOT ?>/ApiManage?pages=<?= $num; ?>" <?= ($num == $page) ? 'selected' : '' ?>>Trang <?= $num ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>