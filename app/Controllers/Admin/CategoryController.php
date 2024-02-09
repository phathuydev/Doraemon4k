<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Admin\CategoryModel;

class CategoryController extends BaseController
{
  public $province;
  public $data = [];
  public function __construct()
  {
    if (empty($_SESSION['user_admin'])) {
      header('Location: ' . _WEB_ROOT . '/signinAdmin');
    }
    $this->data['subcontent']['video'] = '';
    $this->model('Admin', 'CategoryModel');
    $this->province = new CategoryModel();
  }
  public function index()
  {
    // Bắt đầu output buffering
    ob_start();
    if (isset($_POST['deleteCategory'])) {
      $countVideoCategory = $this->province->countVideoCategory($_POST['category_id']);
      if ($countVideoCategory > 0) {
        echo '<script>
          alert("Danh sách phát tồn tại video, không thể xóa!");
        </script>';
      } else {
        $this->province->deletedCategory($_POST['category_id']);
        echo '<script>
          alert("Đã xóa!");
        </script>';
      }
    }
    $countAllCategory = $this->province->countAllCategory();
    $page = $_GET['pages'];
    $perPage = 24;
    $offset = ($page - 1) * $perPage;
    $totalPage = ceil($countAllCategory / $perPage);
    $this->data['subcontent']['getAllCategory'] = $this->province->getAllCategory($perPage, $offset);
    $this->data['pages'] = 'pages/Admin/Category/Read';
    $this->data['subcontent']['pages_title'] = 'Quản Lý Danh Sách Phát';
    $this->data['subcontent']['totalPage'] = $totalPage;
    $this->data['subcontent']['perPage'] = $perPage;
    $this->data['subcontent']['page'] = $page;
    $this->data['subcontent']['offset'] = $offset + 1;
    $this->render('AdminMasterLayout', $this->data);

    // Lấy dữ liệu đã được render và gửi đến output buffer
    $content = ob_get_clean();  

    // Hiển thị dữ liệu đã được lưu trữ trong output buffer
    echo $content;
  }
  public function create()
  {
    // Bắt đầu output buffering
    ob_start();
    if (isset($_POST['name'])) {
      $getCategoryWhereName = $this->province->getCategoryWhereName($_POST['name']);
      if ($getCategoryWhereName) {
        echo 'Danh mục đã tồn tại!';
        return;
      } else {
        $image = $_FILES['image']['name'];
        $target_dir = 'public/uploads/';
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $data = [
          'category_image' => _WEB_ROOT . '/' . $target_file,
          'category_name' => $_POST['name']
        ];
        $this->province->insertCategory('categories', $data);
        echo 'Thêm thành công!';
        return;
      }
    }
    $this->data['pages'] = 'pages/Admin/Category/Create';
    $this->data['subcontent']['pages_title'] = 'Thêm Danh Sách Phát';
    $this->render('AdminMasterLayout', $this->data);

    // Lấy dữ liệu đã được render và gửi đến output buffer
    $content = ob_get_clean();  

    // Hiển thị dữ liệu đã được lưu trữ trong output buffer
    echo $content;
  }
  public function update()
  {
    // Bắt đầu output buffering
    ob_start();
    $getCategoryEdit = $this->province->getCategoryEdit($_GET['cateId']);
    if (isset($_POST['name'])) {
      if ($_POST['name'] == $getCategoryEdit['category_name']) {
        $image = $_FILES['image']['name'];
        $target_dir = 'public/uploads/';
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $data = [
          'category_image' => $image ? _WEB_ROOT . '/' . $target_file : $getCategoryEdit['category_image'],
          'category_name' => $_POST['name']
        ];
        $this->province->updateCategory('categories', $data, $_GET['cateId']);
        echo 'Đã lưu thông tin chỉnh sửa!!';
        return;
      } else {
        $getCategoryWhereName = $this->province->getCategoryWhereName($_POST['name']);
        if ($getCategoryWhereName) {
          echo 'Danh mục đã tồn tại!';
          return;
        } else {
          $image = $_FILES['image']['name'];
          $target_dir = 'public/uploads/';
          $target_file = $target_dir . basename($image);
          move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
          $data = [
            'category_image' => $image ? _WEB_ROOT . '/' . $target_file : $getCategoryEdit['category_image'],
            'category_name' => $_POST['name']
          ];
          $this->province->updateCategory('categories', $data, $_GET['cateId']);
          echo 'Đã lưu thông tin chỉnh sửa!!';
          return;
        }
      }
    }
    $this->data['pages'] = 'pages/Admin/Category/Update';
    $this->data['subcontent']['pages_title'] = 'Cập Nhật Danh Sách Phát';
    $this->data['subcontent']['getCategoryEdit'] = $getCategoryEdit;
    $this->render('AdminMasterLayout', $this->data);

    // Lấy dữ liệu đã được render và gửi đến output buffer
    $content = ob_get_clean();  

    // Hiển thị dữ liệu đã được lưu trữ trong output buffer
    echo $content;
  }
}
