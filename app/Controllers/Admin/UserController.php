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
    $countAllUserAdminPage = $this->province->count('users', 'user_id', 'count');
    $page = $_GET['pages'];
    $perPage = 24;
    $offset = ($page - 1) * $perPage;
    $totalPage = ceil($countAllUserAdminPage / $perPage);
    $this->data['subcontent']['getAllUserAdminPage'] = $this->province->getAll('users LIMIT ' . $perPage . ' OFFSET ' . $offset . '');
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
    $countAllUserAdminPage = $this->province->count('users', 'user_id', 'count', 'user_name LIKE :user_name', ['user_name' => '%' . $_GET['kw'] . '%']);
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
    $this->render('AdminMasterLayout', $this->data);
  }
}
