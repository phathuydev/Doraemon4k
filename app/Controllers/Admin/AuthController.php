<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Admin\AuthModel;

class AuthController extends BaseController
{
  public $province;
  public $data = [];
  public function __construct()
  {
    $this->model('Admin', 'AuthModel');
    $this->province = new AuthModel();
  }
  public function index()
  {
    // Bắt đầu output buffering
    ob_start();
    if (isset($_POST['signin'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $checkEmail = $this->province->getUserLogin($email);
      if ($checkEmail) {
        if ($checkEmail['user_role'] == 1) {
          $msg = 'Không có quyền truy cập!';
        } else {
          if (password_verify($password, $checkEmail['user_password'])) {
            $_SESSION['user_admin'] = $checkEmail['user_id'];
            $_SESSION['user_name'] = $checkEmail['user_name'];
            $_SESSION['user_email'] = $checkEmail['user_email'];
            $_SESSION['user_role'] = $checkEmail['user_role'];
            header('Location: ' . _WEB_ROOT . '/admin');
          } else {
            $msg = 'Email hoặc mật khẩu không đúng!';
          }
        }
      } else {
        $msg = 'Email hoặc mật khẩu không đúng!';
      }
    }
    $this->data['pages_title'] = 'Đăng Nhập';
    $this->data['msg'] = (!empty($msg) ? $msg : '');
    $this->render('pages/Admin/Signin', $this->data);

    // Lấy dữ liệu đã được render và gửi đến output buffer
    $content = ob_get_clean();  

    // Hiển thị dữ liệu đã được lưu trữ trong output buffer
    echo $content;
  }

  public function signout()
  {
    unset($_SESSION['user_admin']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_role']);
    header('Location: ' . _WEB_ROOT . '/signinAdmin');
  }
}
