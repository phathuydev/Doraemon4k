<?php
use Core\Form;

$form = new Form();

?>
<section class="signup" style="margin-bottom: 100px;">
  <div class="row m-0 p-0">
    <div class="col-lg-12 col-12">
      <div class="section-title-wrap mb-5 text-center mt-5">
        <h4 class="section-title">Thay Đổi Mật Khẩu</h4>
      </div>
    </div>
    <div class="col-lg-12 col-12">
      <div class="container d-flex justify-content-center align-items-center">
        <div class="loginBox rounded-2" style="width: 400px;">
          <img class="user rounded-circle" src="https://zda.vn/wp-content/uploads/2023/01/bst-88-anh-doremon-ngau-chibi-cute-pho-mai-que-lam-hinh-nen_2.jpg" height="100px" width="100px">
          <form method="post" id="resetPassForm">
            <div class="inputBox">
              <input type="password" class="form-control" id="password_new" name="password_new" placeholder="Mật khẩu mới">
              <?php $form->err('err_password_reset'); ?>
              <input type="password" class="form-control" id="cpassword_new" placeholder="Nhập lại mật khẩu mới">
              <?php $form->err('err_cpassword_reset'); ?>
            </div>
            <button class="mt-3 bn635-hover bn25 bn5" type="button" id="resetPassId" data-href="<?= _WEB_ROOT ?>/changePassword" data-login="<?= _WEB_ROOT ?>/signin" onclick="resetPass()">Thay Đổi</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>