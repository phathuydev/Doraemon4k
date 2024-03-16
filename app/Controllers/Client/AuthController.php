<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Client\AuthModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AuthController extends BaseController
{
  public $province;
  public $data = [];
  public function __construct()
  {
    $this->data['subcontent']['auth_css'] = '<link rel="stylesheet" href="' . _WEB_ROOT . '/public/client/css/auth.css">';
    $this->data['subcontent']['auth'] = '';
    $this->model('Client', 'AuthModel');
    $this->province = new AuthModel();
  }
  public function index()
  {
    if (isset($_POST['email']) && isset($_POST['password'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $checkEmail = $this->province->getUserSignin($email);
      if ($checkEmail) {
        if (password_verify($password, $checkEmail['user_password'])) {
          $_SESSION['user_id_client'] = $checkEmail['user_id'];
          $_SESSION['user_name_client'] = $checkEmail['user_name'];
          $_SESSION['user_email_client'] = $checkEmail['user_email'];
          $_SESSION['user_role_client'] = $checkEmail['user_role'];
          echo 'Đăng nhập thành công!';
          return;
        } else {
          echo 'Email hoặc mật khẩu không chính xác!';
          return;
        }
      } else {
        echo 'Email hoặc mật khẩu không chính xác!';
        return;
      }
    }
    $this->data['pages'] = 'pages/Client/Auth/signin';
    $this->data['subcontent']['pages_title'] = 'Đăng Nhập';
    $this->render('ClientMasterLayout', $this->data);
  }
  public function signup()
  {
    if (isset($_POST['nameSignup']) && isset($_POST['emailSignup']) && isset($_POST['passwordSignup'])) {
      $name = $_POST['nameSignup'];
      $email = $_POST['emailSignup'];
      $password = $_POST['passwordSignup'];
      $checkEmail = $this->province->getUserSignin($email);
      if ($checkEmail) {
        echo 'Tài Khoản Đã Tồn Tại!';
        return;
      } else {
        $mess = '<div>
        <p>
        <b>Doraemon4k.itfpolycantho.online xin Chào ' . $_POST['nameSignup'] . '!</b>
        </p>
        <p>Cảm ơn bạn đã đăng ký tài khoản!.</p>
        <div style="margin: 50px;"><img src="https://i.pinimg.com/originals/69/90/ad/6990ad3d2ed49eacdc008196b4024bbe.gif" style="width: 100%;"></div>
        </div>';

        $email = $_POST['emailSignup'];
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = "587";
        $mail->Username = "huylppc05334@fpt.edu.vn";
        $mail->Password = "lenl ztdz evcs foia";
        $mail->FromName = "Cam On Ban Da Dang Ky Tai Khoan";
        $mail->addAddress($email);
        $mail->Subject = "Cam On Ban Da Dang Ky Tai Khoan";
        $mail->isHTML(TRUE);
        $mail->Body = $mess;
        if (!$mail->send()) {
          exit();
        } else {
          $data = [
            'user_name' => $name,
            'user_email' => $email,
            'user_password' => password_hash($password, PASSWORD_DEFAULT),
          ];
          $this->province->insertUser('users', $data);
          echo 'Đăng Ký Thành Công!';
          return;
        }
      }
    }
    $this->data['pages'] = 'pages/Client/Auth/signup';
    $this->data['subcontent']['pages_title'] = 'Trang Chủ';
    $this->render('ClientMasterLayout', $this->data);
  }
  public function forgot()
  {
    if (isset($_POST['emailForgot'])) {
      $checkEmailForgot = $this->province->getUserSignin($_POST['emailForgot']);
      if ($checkEmailForgot) {
        $_SESSION['user_id'] = $checkEmailForgot['user_id'];
        $mess = '<div><p><b>Xin Chào ' . $checkEmailForgot['user_name'] . '!</b></p>
        <p>Bạn vừa gửi yêu cầu đổi mật khẩu đến chúng tôi thông qua email ' . $_POST['emailForgot'] . '.</p>
        <p><button style="padding: 7px; background-color: black;"><a style="text-decoration: none; color: #fff;" href="' . _WEB_ROOT . '/changePassword">
        Nhấn vào đây để thay đổi mật khẩu</a></button></p>
        <p>Nếu bạn không có yêu cầu đổi mật khẩu, vui lòng bỏ qua thông báo này!.</p></div>';

        $email = $_POST['emailForgot'];
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = "587";
        $mail->Username = "huylppc05334@fpt.edu.vn";
        $mail->Password = "lenl ztdz evcs foia";
        $mail->FromName = "Thay Doi Mat Khau";
        $mail->addAddress($email);
        $mail->Subject = "Thay Doi Mat Khau Tu Doraemon4k.itfpolycantho.online";
        $mail->isHTML(TRUE);
        $mail->Body = $mess;
        if (!$mail->send()) {
          exit();
        } else {
          echo 'Đường dẫn đổi mật khẩu đã gửi đến Email của bạn, vui lòng kiểm tra!';
          return;
        }
      } else {
        echo 'Không Tìm Thấy Email!';
        return;
      }
    };
    $this->data['pages'] = 'pages/Client/Auth/forgot';
    $this->data['subcontent']['pages_title'] = 'Quên Mật Khẩu';
    $this->render('ClientMasterLayout', $this->data);
  }
  public function reset()
  {
    if (empty($_SESSION['user_id'])) {
      header('Location: ' . _WEB_ROOT . '/home');
    } elseif (isset($_POST['password_new'])) {
      $data = [
        'user_password' => password_hash($_POST['password_new'], PASSWORD_DEFAULT),
      ];
      $this->province->resetPass($data, $_SESSION['user_id']);
      unset($_SESSION['user_id']);
      echo 'Mật khẩu đã được thay đổi';
      return;
    }
    $this->data['subcontent']['pages_title'] = 'Đổi mật khẩu';
    $this->data['pages'] = 'pages/Client/Auth/reset';
    $this->render('ClientMasterLayout', $this->data);
  }
  public function signout()
  {
    unset($_SESSION['user_id_client']);
    unset($_SESSION['user_name_client']);
    unset($_SESSION['user_email_client']);
    unset($_SESSION['user_role_client']);
    header('Location: ' . _WEB_ROOT . '/home');
  }
}
