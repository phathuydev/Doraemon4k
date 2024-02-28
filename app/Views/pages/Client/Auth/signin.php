<?php
use Core\Form;

$form = new Form();

?>
<section class="signup" style="margin-bottom: 100px;">
  <div class="row m-0 p-0">
    <div class="col-lg-12 col-12">
      <div class="section-title-wrap mb-5 text-center mt-5">
        <h4 class="section-title">Đăng Nhập</h4>
      </div>
    </div>
    <div class="col-lg-12 col-12">
      <div class="container d-flex justify-content-center align-items-center">
        <div class="loginBox rounded-2" style="width: 400px;">
          <img class="user rounded-circle" src="http://static.zerochan.net/Doraemon.(Character).full.1699608.jpg" height="100px" width="100px">
          <form method="post" id="signinClientForm">
            <div class="inputBox">
              <input type="text" class="form-control" name="email" id="emailSignin" placeholder="Email">
              <?php $form->err('err_email_signin'); ?>
              <input type="password" name="password" class="form-control" id="passwordSignin" placeholder="Mật Khẩu">
              <?php $form->err('err_password_signin'); ?>
            </div>
            <button class="bn635-hover bn25 bn5 mt-3" type="button" id="signinClientId" data-href="<?= _WEB_ROOT ?>/signin" data-home="<?= _WEB_ROOT ?>/home" onclick="signinClient()">Đăng Nhập</button>
          </form>
          <a href="<?= _WEB_ROOT ?>/forgotPassword" class="mt-3">Quên Mật Khẩu</a>
          <div class="text-center mt-3">
            <a href="<?= _WEB_ROOT ?>/signup">Đăng Ký</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>