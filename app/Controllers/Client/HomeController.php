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
    $this->data['subcontent']['home'] = '';
    $this->data['pages'] = 'pages/Client/Home/Home';
    $this->data['subcontent']['pages_title'] = 'Trang Chủ';
    $this->data['subcontent']['getAllVideoNewLitmit40'] = $this->province->getAllVideoNewLitmit40();
    $this->data['subcontent']['getAllCategoryHome'] = $this->province->getAllCategoryHome();
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
