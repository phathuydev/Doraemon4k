<?php
ob_start();

use Core\Form;

$form = new Form();

?>
<section class="signup" style="margin-bottom: 100px;">
  <div class="row m-0 p-0">
    <div class="col-lg-12 col-12">
      <div class="section-title-wrap mb-5 text-center mt-5">
        <h4 class="section-title">Tìm Tài Khoản</h4>
      </div>
    </div>
    <div class="col-lg-12 col-12">
      <div class="container d-flex justify-content-center align-items-center">
        <div class="loginBox rounded-2" style="width: 400px;">
          <img class="user rounded-circle" src="http://static.zerochan.net/Doraemon.(Character).full.1699608.jpg" height="100px" width="100px">
          <form method="post" id="forgotClientForm">
            <div class="inputBox">
              <input type="text" class="form-control" name="emailForgot" id="emailForgot" placeholder="Email">
              <?php $form->err('err_email_forgot'); ?>
            </div>
            <button class="bn635-hover bn25 bn5" id="forgotClientId" data-href="<?= _WEB_ROOT ?>/forgotPassword" onclick="forgotClient()" type="button">Tìm</button>
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