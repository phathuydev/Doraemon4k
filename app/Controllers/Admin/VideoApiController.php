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
    if (isset($_POST['deleteVideo'])) {
      $this->province->deleteVideos('1', $_POST['video_id'], '1');
      echo '<script>
        alert("Đã xóa!");
      </script>';
    } elseif (isset($_POST['restoreVideo'])) {
      $this->province->deleteVideos('1', $_POST['video_id'], '0');
      echo '<script>
        alert("Đã khôi phục!");
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
  }
  public function detail()
  {
    $dataDetail = $this->province->getSlugMovies($_GET['slug']);
    $this->data['subcontent']['data'] = $dataDetail['movie'];
    $this->data['subcontent']['episodes'] = $dataDetail['episodes'][0]['server_data'];
    $this->data['pages'] = 'pages/Admin/VideoApi/Detail';
    $this->data['subcontent']['pages_title'] = 'Chi Tiết Phim ' . $dataDetail['movie']['name'] . '';
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
  }
}
