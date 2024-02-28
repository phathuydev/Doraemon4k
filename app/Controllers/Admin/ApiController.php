<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Admin\VideoModel;

class ApiController extends BaseController
{
  public $province;
  public $data = [];
  public function __construct()
  {
    set_time_limit(3600);
    if (empty($_SESSION['user_admin'])) {
      header('Location: ' . _WEB_ROOT . '/signinAdmin');
    }
    $this->data['subcontent']['api'] = '';
    $this->model('Admin', 'VideoModel');
    $this->province = new VideoModel();
  }
  public function index()
  {
    if (isset($_POST['addVideoApi'])) {
      $getVideoSlug = $this->province->getVideoSlug($_POST['slug']);
      if (!$getVideoSlug) {
        $data = [
          'video_image' => $_POST['image'],
          'video_title' => $_POST['title'],
          'video_slug' => $_POST['slug'],
          'video_form' => 1,
        ];
        $this->province->insertVideo($data);
        echo '<script>
        alert("Thêm video thành công!");
        </script>';
      }
    }
    $page = $_GET['pages'];
    $offset = ($page - 1) * 24;
    $data = $this->province->getApiMovies($page);
    $this->data['subcontent']['data'] = $data['items'];
    $this->data['pages'] = 'pages/Admin/Api/Read';
    $this->data['subcontent']['pages_title'] = 'Kho Phim';
    $this->data['subcontent']['page'] = $page;
    $this->data['subcontent']['offset'] = $offset + 1;
    $this->data['subcontent']['totalPage'] = $data['pagination']['totalPages'];
    $this->render('AdminMasterLayout', $this->data);
  }
  public function detail()
  {
    $dataDetail = $this->province->getSlugMovies($_GET['slug']);
    $this->data['subcontent']['data'] = $dataDetail['movie'];
    $this->data['subcontent']['episodes'] = $dataDetail['episodes'][0]['server_data'];
    $this->data['pages'] = 'pages/Admin/Api/Detail';
    $this->data['subcontent']['pages_title'] = 'Chi Tiết Phim ' . $dataDetail['movie']['name'] . '';
    $this->render('AdminMasterLayout', $this->data);
  }
}
