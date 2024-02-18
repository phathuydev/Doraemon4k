<?php
ob_start();

use Core\Form;

$form = new Form();

?>
<section class="signup" style="margin-bottom: 100px;">
  <div class="row m-0 p-0">
    <div class="col-lg-12 col-12">
      <div class="section-title-wrap mb-5 text-center mt-5">
        <h4 class="section-title">Đăng Ký</h4>
      </div>
    </div>
    <div class="col-lg-12 col-12">
      <div class="container d-flex justify-content-center align-items-center">
        <div class="loginBox rounded-2" style="width: 400px;">
          <img class="user rounded-circle" src="https://zda.vn/wp-content/uploads/2023/01/bst-88-anh-doremon-ngau-chibi-cute-pho-mai-que-lam-hinh-nen_2.jpg" height="100px" width="100px">
          <form method="post" id="signupClientForm">
            <div class="inputBox">
              <input type="text" class="form-control" name="nameSignup" id="nameSignup" placeholder="Họ và tên">
              <?php $form->err('err_name'); ?>
              <input type="text" class="form-control" name="emailSignup" id="emailSignup" placeholder="Email">
              <?php $form->err('err_email'); ?>
              <input type="password" name="passwordSignup" class="form-control" id="passwordSignup" placeholder="Mật Khẩu">
              <?php $form->err('err_password'); ?>
              <input type="password" name="cpassword" class="form-control" id="cpasswordSignup" placeholder="Nhập Lại Mật Khẩu">
              <?php $form->err('err_cpassword'); ?>
            </div>
            <button class="bn635-hover bn25 bn5" id="signupClientId" data-href="<?= _WEB_ROOT ?>/signup" onclick="signupClient()" data-login="<?= _WEB_ROOT ?>/signin" type="button">Đăng Ký</button>
          </form>
          <div class="text-center mt-2">
            <a href="<?= _WEB_ROOT ?>/signin">
              <p style="color: #000000;">Đăng Nhập</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
ob_end_flush();
?>