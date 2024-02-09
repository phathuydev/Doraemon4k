<?php
ob_start();

use Core\Form;

$form = new Form();
?>
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-12 col-xl-12">
      <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4"><?= $pages_title ?></h6>
        <?php
        $form->formOpen('', 'post', 'editVideoForm');
        $item = $getVideoEdit;
        if (isset($item)) {
          extract($item);
        ?>
          <img src="<?= $video_image ?>" width="250" alt="" class="mb-3">
          <div class="mb-3">
            <label class="form-label">Thay Ảnh</label>
            <input type="file" name="image" id="image" class="form-control bg-dark text-white small" accept="image/png, image/jpeg, image/jpg">
          </div>
          <p class="text-danger mb-3" id="err_image"></p>
          <video width="250" controls playsinline>
            <source src="<?= $video_path ?>">
          </video>
          <div id="progress-container" class="mb-2">
            <div id="progress-bar"></div>
            <div id="progress-text" class="text-danger"></div>
          </div>
          <div class="mb-3">
            <label class="form-label">Thay Video</label>
            <input type="file" name="video" id="video" class="form-control bg-dark text-white small" accept="video/mp4">
          </div>
          <p class="text-danger mb-3" id="err_video"></p>
          <div class="mb-3">
            <label class="form-label">Nhập Tiêu Đề</label>
            <input type="text" name="title" id="title" value="<?= $video_title ?>" class="form-control bg-dark text-white small">
          </div>
          <p class="text-danger mb-3" id="err_title"></p>
          <?php $form->textarea('Mô Tả', 'describe', 'describe', '' . $video_describe . ''); ?>
          <p class="text-danger mb-3" id="err_describe"></p>
          <div class="mb-3">
            <label class="form-label">Danh Sách Phát</label>
            <select name="category" class="form-control bg-dark text-white small" id="category">
              <?php foreach ($getAllCategory as $value) { ?>
                <?php $selected = (!empty($value['category_id'] == $category_id) ? 'selected' : '') ?>
                <option value="<?= $value['category_id'] ?>" <?= $selected ?>><?= $value['category_name'] ?></option>
              <?php } ?>
            </select>
          </div>
        <?php
        }
        $form->formSubmit("'" . _WEB_ROOT . "/videoManage?pages=1'", '/videoManage/updateVideo?vId=' . $video_id . '', 'editVd', 'editVideo', 'Lưu');
        $form->formClose();
        ?>
      </div>
    </div>
  </div>
</div>
<?php
ob_end_flush();
?>