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
    if (empty($_SESSION['user_admin'])) {
      header('Location: ' . _WEB_ROOT . '/signinAdmin');
    }
    $this->data['subcontent']['api'] = '';
    $this->model('Admin', 'VideoModel');
    $this->province = new VideoModel();
  }
  public function index()
  {
    // Bắt đầu output buffering
    ob_start();
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
    $totalPage = ceil(25313 / 24);
    $url = 'https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=' . $page . '';
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    $this->data['subcontent']['data'] = $data['items'];
    $this->data['pages'] = 'pages/Admin/Api/Read';
    $this->data['subcontent']['pages_title'] = 'Kho Phim';
    $this->data['subcontent']['page'] = $page;
    $this->data['subcontent']['offset'] = $offset + 1;
    $this->data['subcontent']['totalPage'] = $totalPage;
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
    $urlDetail = 'https://ophim1.com/phim/' . $_GET['slug'] . '';
    $responseDetail = file_get_contents($urlDetail);
    $dataDetail = json_decode($responseDetail, true);
    $this->data['subcontent']['data'] = $dataDetail['movie'];
    $this->data['subcontent']['episodes'] = $dataDetail['episodes'][0]['server_data'];
    $this->data['pages'] = 'pages/Admin/Api/Detail';
    $this->data['subcontent']['pages_title'] = 'Chi Tiết Phim ' . $dataDetail['movie']['name'] . '';
    $this->render('AdminMasterLayout', $this->data);

    // Lấy dữ liệu đã được render và gửi đến output buffer
    $content = ob_get_clean();

    // Hiển thị dữ liệu đã được lưu trữ trong output buffer
    echo $content;
  }
}
