<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Client\HomeModel;
use PHPMailer\PHPMailer\PHPMailer;

class HomeController extends BaseController
{
  public $province;
  public $data = [];
  public function __construct()
  {
    $this->model('Client', 'HomeModel');
    $this->province = new HomeModel();
  }
  public function index()
  {
    // Bắt đầu output buffering
    ob_start();
    $this->data['subcontent']['home'] = '';
    $this->data['pages'] = 'pages/Client/Home/Home';
    $this->data['subcontent']['pages_title'] = 'Trang Chủ';
    $this->data['subcontent']['getAllVideoNewLitmit30'] = $this->province->getAllVideoNewLitmit40();
    $this->data['subcontent']['getAllCategoryHome'] = $this->province->getAllCategoryHome();
    $this->render('ClientMasterLayout', $this->data);

    // Lấy dữ liệu đã được render và gửi đến output buffer
    $content = ob_get_clean();

    // Hiển thị dữ liệu đã được lưu trữ trong output buffer
    echo $content;
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
