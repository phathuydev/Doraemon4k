<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Admin\VideoModel;

class VideoController extends BaseController
{
  public $province;
  public $data = [];
  public function __construct()
  {
    if (empty($_SESSION['user_admin'])) {
      header('Location: ' . _WEB_ROOT . '/signinAdmin');
    }
    $this->data['subcontent']['video'] = '';
    $this->model('Admin', 'VideoModel');
    $this->province = new VideoModel();
  }
  public function index()
  {
    if (isset($_POST['deleteVideo'])) {
      $this->province->deleteVideo($_POST['video_id']);
      echo '<script>
        alert("Đã xóa!");
      </script>';
    }
    $countAllVideo = $this->province->countAllVideo(0);
    $page = $_GET['pages'];
    $perPage = 24;
    $offset = ($page - 1) * $perPage;
    $totalPage = ceil($countAllVideo / $perPage);
    $this->data['subcontent']['getAllVideo'] = $this->province->getAllVideo($perPage, $offset, 0);
    $this->data['pages'] = 'pages/Admin/Video/Read';
    $this->data['subcontent']['pages_title'] = 'Phim Đã Thêm';
    $this->data['subcontent']['totalPage'] = $totalPage;
    $this->data['subcontent']['perPage'] = $perPage;
    $this->data['subcontent']['page'] = $page;
    $this->data['subcontent']['offset'] = $offset + 1;
    $this->render('AdminMasterLayout', $this->data);
  }
  public function create()
  {
    if (isset($_FILES['image']) && isset($_FILES['video']) && isset($_POST['title']) && isset($_POST['category']) && isset($_POST['describe'])) {
      $image = $_FILES['image']['name'];
      $video = $_FILES['video']['name'];
      $target_dir = 'public/uploads/';
      $target_file = $target_dir . basename($image);
      $video_file = $target_dir . basename($video);
      move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
      move_uploaded_file($_FILES['video']['tmp_name'], $video_file);
      $data = [
        'video_path' =>  _WEB_ROOT . '/' . $video_file,
        'video_image' =>  _WEB_ROOT . '/' . $target_file,
        'video_title' => trim($_POST['title']),
        'video_describe' => $_POST['describe'],
        'category_id' => $_POST['category']
      ];
      $this->province->insertVideo($data);
      echo 'Thêm video thành công!';
      return;
    }
    $this->data['subcontent']['getAllCategory'] = $this->province->getAllCategory();
    $this->data['pages'] = 'pages/Admin/Video/Create';
    $this->data['subcontent']['pages_title'] = 'Thêm Phim Mới';
    $this->render('AdminMasterLayout', $this->data);
  }
  public function update()
  {
    $getVideoEdit = $this->province->getVideoEdit($_GET['vId']);
    if (isset($_POST['title']) && isset($_POST['category']) && isset($_POST['describe'])) {
      $image = $_FILES['image']['name'];
      $video = $_FILES['video']['name'];
      $target_dir = 'public/uploads/';
      $target_file = $target_dir . basename($image);
      $video_file = $target_dir . basename($video);
      move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
      move_uploaded_file($_FILES['video']['tmp_name'], $video_file);
      $data = [
        'video_title' => trim($_POST['title']),
        'video_describe' => $_POST['describe'],
        'video_path' => $video ? _WEB_ROOT . '/' . $video_file : $getVideoEdit['video_path'],
        'video_image' => $image ? _WEB_ROOT . '/' . $target_file : $getVideoEdit['video_image'],
        'category_id' => $_POST['category']
      ];
      $this->province->updateVideo($data, $_GET['vId']);
      echo 'Đã lưu chỉnh sửa!';
      return;
    }
    $this->data['subcontent']['getVideoEdit'] = $getVideoEdit;
    $this->data['subcontent']['getAllCategory'] = $this->province->getAllCategory();
    $this->data['pages'] = 'pages/Admin/Video/Update';
    $this->data['subcontent']['pages_title'] = 'Cập Nhật Phim';
    $this->render('AdminMasterLayout', $this->data);
  }
  public function search()
  {
    if (isset($_POST['deleteVideo'])) {
      $this->province->deleteVideo($_POST['video_id']);
      echo '<script>
        alert("Đã xóa!");
      </script>';
    }
    $countAllVideoSearch = $this->province->countAllVideoSearch($_GET['kw'], 0);
    $page = $_GET['pages'];
    $perPage = 24;
    $offset = ($page - 1) * $perPage;
    $totalPage = ceil($countAllVideoSearch / $perPage);
    $this->data['subcontent']['getAllVideoWhere'] = $this->province->getAllVideoWhere($perPage, $offset, $_GET['kw'], 0);
    $this->data['pages'] = 'pages/Admin/Video/Search';
    $this->data['subcontent']['pages_title'] = 'Tìm Kiếm Phim';
    $this->data['subcontent']['totalPage'] = $totalPage;
    $this->data['subcontent']['perPage'] = $perPage;
    $this->data['subcontent']['page'] = $page;
    $this->data['subcontent']['offset'] = $offset + 1;
    $this->render('AdminMasterLayout', $this->data);
  }
}
