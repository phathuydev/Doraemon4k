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
    if (isset($_POST['email']) && isset($_POST['password'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $checkEmail = $this->province->getOne('users', 'user_email', '=', $email);
      if ($checkEmail) {
        if ($checkEmail['user_role'] == 1) {
          echo 'Không có quyền truy cập!';
          return;
        } else {
          if (password_verify($password, $checkEmail['user_password'])) {
            $_SESSION['user_admin'] = $checkEmail['user_id'];
            $_SESSION['user_name'] = $checkEmail['user_name'];
            $_SESSION['user_email'] = $checkEmail['user_email'];
            $_SESSION['user_role'] = $checkEmail['user_role'];
            echo 'Đăng nhập thành công!';
            return;
          } else {
            echo 'Email hoặc mật khẩu không đúng!';
            return;
          }
        }
      } else {
        echo 'Email hoặc mật khẩu không đúng!';
        return;
      }
    }
    $this->data['pages_title'] = 'Đăng Nhập';
    $this->data['msg'] = (!empty($msg) ? $msg : '');
    $this->render('pages/Admin/Signin', $this->data);
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
