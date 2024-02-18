<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?= (isset($pages_title) ? $pages_title : 'Đăng Nhập'); ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link href="https://i.pinimg.com/originals/d0/7b/89/d07b8917505df251b276ff9486c02ecf.jpg" rel="icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= _WEB_ROOT ?>/public/admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= _WEB_ROOT ?>/public/admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
  <link href="<?= _WEB_ROOT ?>/public/admin/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= _WEB_ROOT ?>/public/admin/css/style.css" rel="stylesheet">
</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
    <div class="container-fluid">
      <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
          <form action="/signinAdmin" method="post">
            <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <a href="<?= _WEB_ROOT ?>/admin" class="">
                  <h3 class="text-primary">Doraemon4k</h3>
                </a>
                <h3>Đăng nhập</h3>
              </div>
              <?= (!empty($msg)) ? '<p class="text-danger text-center">' . $msg . '</p>' : ''; ?>
              <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="" placeholder="name@example.com">
                <label for="">Địa chỉ email</label>
              </div>
              <div class="form-floating mb-4">
                <input type="password" name="password" class="form-control" id="" placeholder="Password">
                <label for="">Mật khẩu</label>
              </div>
              <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                  <label class="form-check-label" for="exampleCheck1">Nhớ mật khẩu</label>
                </div>
              </div>
              <button type="submit" name="signin" class="bn632-hover bn24 py-3 w-100 mb-3 ">Đăng nhập</button>
              <a href="<?= _WEB_ROOT ?>/home" class="btn btn-warning rounded-pill bn24 py-3 w-100 mb-4">Trở Về</a>
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
</body>

</html>