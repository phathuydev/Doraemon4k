<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Admin\CommentModel;

class CommentController extends BaseController
{
  public $province;
  public $data = [];
  public function __construct()
  {
    if (empty($_SESSION['user_admin'])) {
      header('Location: ' . _WEB_ROOT . '/signinAdmin');
    }
    $this->data['subcontent']['comment'] = '';
    $this->model('Admin', 'CommentModel');
    $this->province = new CommentModel();
  }
  public function index()
  {
    if (isset($_POST['deleteComment'])) {
      $this->province->delete('comments', 'comment_id', $_POST['comment_id']);
      echo '<script>
        alert("Đã xóa!");
      </script>';
    }
    $countAllUserAdminPage = $this->province->countAllComment();
    $page = $_GET['pages'];
    $perPage = 24;
    $offset = ($page - 1) * $perPage;
    $totalPage = ceil($countAllUserAdminPage / $perPage);
    $this->data['subcontent']['getAllComment'] = $this->province->getAllComment($perPage, $offset);
    $this->data['pages'] = 'pages/Admin/Comment/Read';
    $this->data['subcontent']['pages_title'] = 'Quản Lý Bình Luận';
    $this->data['subcontent']['totalPage'] = $totalPage;
    $this->data['subcontent']['perPage'] = $perPage;
    $this->data['subcontent']['page'] = $page;
    $this->data['subcontent']['offset'] = $offset + 1;
    $this->render('AdminMasterLayout', $this->data);
  }
}
