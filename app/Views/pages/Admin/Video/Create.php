<?php
use Core\Form;

$form = new Form();
?>
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-12 col-xl-12">
      <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4"><?= $pages_title ?></h6>
        <?php
        $form->formOpen('', 'post', 'addVideoForm');
        echo $form->field('image')->fileField();
        echo $form->err('err_image');
        echo $form->field('video')->fileField();
        echo $form->err('err_video');
        ?>
        <div id="progress-container" class="mb-2">
          <div id="progress-bar"></div>
          <div id="progress-text" class="text-danger"></div>
        </div>
        <?php
        echo $form->field('title');
        echo $form->err('err_title');
        echo $form->textarea('Mô Tả', 'describe', 'describe');
        echo $form->err('err_describe');
        ?>
        <div class="mb-3">
          <label class="form-label">Danh Sách Phát</label>
          <select name="category" class="form-control bg-dark text-white small" id="category">
            <?php foreach ($getAllCategory as $value) { ?>
              <option value="<?= $value['category_id'] ?>"><?= $value['category_name'] ?></option>
            <?php } ?>
          </select>
        </div>
        <?php
        $form->formSubmit("'" . _WEB_ROOT . "/videoManage?pages=1'", '/videoManage/createVideo', 'addVd', 'AddVideo', 'Thêm');
        $form->formClose();
        ?>
      </div>
    </div>
  </div>
</div>