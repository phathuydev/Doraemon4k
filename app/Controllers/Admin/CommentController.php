<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\BaseModel;

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
    $this->province = new BaseModel();
  }
  public function index()
  {
    if (isset($_POST['deleteComment'])) {
      $this->province->delete('comments', 'comment_id', $_POST['comment_id']);
      echo '<script>
        alert("Đã xóa!");
      </script>';
    }
    $countAllUserAdminPage = $this->province->count('comments', 'comment_id', 'count');
    $page = $_GET['pages'];
    $perPage = 24;
    $offset = ($page - 1) * $perPage;
    $totalPage = ceil($countAllUserAdminPage / $perPage);
    $this->data['subcontent']['getAllComment'] = $this->province->getAll('comments INNER JOIN users ON comments.user_id = users.user_id LIMIT ' . $perPage . ' OFFSET ' . $offset . '');
    $this->data['pages'] = 'pages/Admin/Comment/Read';
    $this->data['subcontent']['pages_title'] = 'Quản Lý Bình Luận';
    $this->data['subcontent']['totalPage'] = $totalPage;
    $this->data['subcontent']['perPage'] = $perPage;
    $this->data['subcontent']['page'] = $page;
    $this->data['subcontent']['offset'] = $offset + 1;
    $this->render('AdminMasterLayout', $this->data);
  }
}
