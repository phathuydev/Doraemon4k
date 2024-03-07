<?php include './app/Views/inc/Admin/header.php'; ?>
  <div class="container-fluid position-relative d-flex p-0">
    <div class="container-fluid">
      <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
          <form id="loginAdmin" method="post">
            <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <a href="<?= _WEB_ROOT ?>/admin" class="">
                  <h3 class="text-primary">Doraemon4k</h3>
                </a>
                <h3>Đăng nhập</h3>
              </div>
              <?= (!empty($msg)) ? '<p class="text-danger text-center">' . $msg . '</p>' : ''; ?>
              <div class="form-floating mb-3">
                <input type="text" name="email" class="form-control" id="email" placeholder="name@example.com">
                <p style="color: red; margin-top: 5px;" id="email_err"></p>
                <label for="">Địa chỉ email</label>
              </div>
              <div class="form-floating mb-4">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <p style="color: red; margin-top: 5px;" id="password_err"></p>
                <label for="">Mật khẩu</label>
              </div>
              <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                  <label class="form-check-label" for="exampleCheck1">Nhớ mật khẩu</label>
                </div>
              </div>
              <button type="button" id="loginLink" class="bn632-hover bn24 py-3 w-100 mb-3 rounded-2" onclick="login()" data-href="<?= _WEB_ROOT ?>/signinAdmin" data-result="<?= _WEB_ROOT ?>/admin">Đăng nhập</button>
              <a href="<?= _WEB_ROOT ?>/home" class="btn btn-warning rounded-2 bn24 py-3 w-100 mb-4">Trở Về</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= _WEB_ROOT ?>/public/admin/lib/chart/chart.min.js"></script>
  <script src="<?= _WEB_ROOT ?>/public/admin/lib/easing/easing.min.js"></script>
  <script src="<?= _WEB_ROOT ?>/public/admin/lib/waypoints/waypoints.min.js"></script>
  <script src="<?= _WEB_ROOT ?>/public/admin/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?= _WEB_ROOT ?>/public/admin/lib/tempusdominus/js/moment.min.js"></script>
  <script src="<?= _WEB_ROOT ?>/public/admin/lib/tempusdominus/js/moment-timezone.min.js"></script>
  <script src="<?= _WEB_ROOT ?>/public/admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="<?= _WEB_ROOT ?>/public/admin/js/main.js"></script>
  <script src="<?= _WEB_ROOT ?>/public/admin/js/ajax.js"></script>
</body>

</html>