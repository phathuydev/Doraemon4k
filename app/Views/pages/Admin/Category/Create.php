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
        $form->formOpen('', 'post', 'addCategoryForm');
        echo $form->field('name');
        echo $form->err('err_name');
        echo $form->field('image')->fileField();
        echo $form->err('err_image');
        $form->formSubmit("'" . _WEB_ROOT . "/categoryManage?pages=1'", '/categoryManage/createCategory', 'addCate', 'addCategory', 'Thêm');
        $form->formClose();
        ?>
      </div>
    </div>
  </div>
</div>