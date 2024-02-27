<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Admin\VideoModel;

class VideoApiController extends BaseController
{
  public $province;
  public $data = [];
  public function __construct()
  {
    if (empty($_SESSION['user_admin'])) {
      header('Location: ' . _WEB_ROOT . '/signinAdmin');
    }
    $this->data['subcontent']['videoApi'] = '';
    $this->model('Admin', 'VideoModel');
    $this->province = new VideoModel();
  }
  public function index()
  {
    // Bắt đầu output buffering
    ob_start();
    if (isset($_POST['deleteVideo'])) {
      $this->province->deleteVideo($_POST['video_id']);
      echo '<script>
        alert("Đã xóa!");
      </script>';
    }
    $countAllVideo = $this->province->countAllVideo(1);
    $page = $_GET['pages'];
    $perPage = 24;
    $offset = ($page - 1) * $perPage;
    $totalPage = ceil($countAllVideo / $perPage);
    $this->data['subcontent']['getAllVideo'] = $this->province->getAllVideo($perPage, $offset, 1);
    $this->data['pages'] = 'pages/Admin/VideoApi/Read';
    $this->data['subcontent']['pages_title'] = 'Phim Thêm Từ Kho';
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
  public function detail()
  {
    // Bắt đầu output buffering
    ob_start();
    $urlDetail = 'http://ophim1.com/phim/' . $_GET['slug'] . '';
    $responseDetail = file_get_contents($urlDetail);
    $dataDetail = json_decode($responseDetail, true);
    $this->data['subcontent']['data'] = $dataDetail['movie'];
    $this->data['subcontent']['episodes'] = $dataDetail['episodes'][0]['server_data'];
    $this->data['pages'] = 'pages/Admin/VideoApi/Detail';
    $this->data['subcontent']['pages_title'] = 'Chi Tiết Phim ' . $dataDetail['movie']['name'] . '';
    $this->render('AdminMasterLayout', $this->data);

    // Lấy dữ liệu đã được render và gửi đến output buffer
    $content = ob_get_clean();

    // Hiển thị dữ liệu đã được lưu trữ trong output buffer
    echo $content;
  }
  public function search()
  {
    // Bắt đầu output buffering
    ob_start();
    if (isset($_POST['deleteVideo'])) {
      $this->province->deleteVideo($_POST['video_id']);
      echo '<script>
        alert("Đã xóa!");
      </script>';
    }
    $countAllVideoSearch = $this->province->countAllVideoSearch($_GET['kw'], 1);
    $page = $_GET['pages'];
    $perPage = 24;
    $offset = ($page - 1) * $perPage;
    $totalPage = ceil($countAllVideoSearch / $perPage);
    $this->data['subcontent']['getAllVideoWhere'] = $this->province->getAllVideoWhere($perPage, $offset, $_GET['kw'], 1);
    $this->data['pages'] = 'pages/Admin/VideoApi/Search';
    $this->data['subcontent']['pages_title'] = 'Tìm Kiếm Phim';
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
}
