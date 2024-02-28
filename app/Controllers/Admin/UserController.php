<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Admin\UserModel;

class UserController extends BaseController
{
  public $province;
  public $data = [];
  public function __construct()
  {
    if (empty($_SESSION['user_admin'])) {
      header('Location: ' . _WEB_ROOT . '/signinAdmin');
    }
    $this->data['subcontent']['user'] = '';
    $this->model('Admin', 'UserModel');
    $this->province = new UserModel();
  }
  public function index()
  {
    $countAllUserAdminPage = $this->province->countAllUserAdminPage();
    $page = $_GET['pages'];
    $perPage = 24;
    $offset = ($page - 1) * $perPage;
    $totalPage = ceil($countAllUserAdminPage / $perPage);
    $this->data['subcontent']['getAllUserAdminPage'] = $this->province->getAllUserAdminPage($perPage, $offset);
    $this->data['pages'] = 'pages/Admin/User/Read';
    $this->data['subcontent']['pages_title'] = 'Quản Lý Người Dùng';
    $this->data['subcontent']['totalPage'] = $totalPage;
    $this->data['subcontent']['perPage'] = $perPage;
    $this->data['subcontent']['page'] = $page;
    $this->data['subcontent']['offset'] = $offset + 1;
    $this->render('AdminMasterLayout', $this->data);
  }

  public function search()
  {
    // Bắt đầu output buffering
    ob_start();

    $countAllUserAdminPage = $this->province->countAllUserAdminPageWhere($_GET['kw']);
    $page = $_GET['pages'];
    $perPage = 24;
    $offset = ($page - 1) * $perPage;
    $totalPage = ceil($countAllUserAdminPage / $perPage);
    $this->data['subcontent']['getUserSearch'] = $this->province->getAllUserAdminPageWhere($perPage, $offset, $_GET['kw']);
    $this->data['pages'] = 'pages/Admin/User/Search';
    $this->data['subcontent']['pages_title'] = 'Tìm Kiếm Người Dùng';
    $this->data['subcontent']['totalPage'] = $totalPage;
    $this->data['subcontent']['perPage'] = $perPage;
    $this->data['subcontent']['page'] = $page;
    $this->data['subcontent']['offset'] = $offset + 1;

    // Gọi hàm render nhưng không gửi dữ liệu ra ngay lập tức
    $this->render('AdminMasterLayout', $this->data);

    // Lấy dữ liệu đã được render và gửi đến output buffer
    $content = ob_get_clean();

    // Hiển thị dữ liệu đã được lưu trữ trong output buffer
    echo $content;
  }
}
