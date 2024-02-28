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
        $form->formOpen('', 'post', 'editCategoryForm');
        $item = $getCategoryEdit;
        if (isset($item)) {
          extract($item);
        ?>
          <div class="mb-3">
            <label class="form-label">Nhập Tên</label>
            <input type="text" name="name" id="name" value="<?= $category_name ?>" class="form-control bg-dark text-white small">
          </div>
          <p class="text-danger mb-3" id="err_name"></p>
          <img src="<?= $category_image ?>" width="150" alt="" class="mb-3">
          <div class="mb-3">
            <label class="form-label">Thay Ảnh</label>
            <input type="file" name="image" id="image" class="form-control bg-dark text-white small" accept="image/png, image/jpeg, image/jpg">
          </div>
        <?php
        }
        $form->formSubmit("'" . _WEB_ROOT . "/categoryManage?pages=1'", '/categoryManage/updateCategory?cateId=' . $_GET['cateId'] . '', 'editCate', 'editCategory', 'Lưu');
        $form->formClose();
        ?>
      </div>
    </div>
  </div>
</div>