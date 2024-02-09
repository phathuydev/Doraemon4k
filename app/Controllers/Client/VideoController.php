<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Client\VideoModel;

class VideoController extends BaseController
{
  public $province;
  public $data = [];
  public function __construct()
  {
    $this->data['subcontent']['video'] = '';
    $this->model('Client', 'VideoModel');
    $this->province = new VideoModel();
  }
  public function index()
  {
    // Bắt đầu output buffering
    ob_start();
    $countVideo = $this->province->countVideo(0);
    $perPage = 24;
    $page = $_GET['pages'];
    $offset = ($page - 1) * $perPage;
    $this->data['pages'] = 'pages/Client/Video/List';
    $this->data['subcontent']['pages_title'] = 'Tất Cả Video';
    $this->data['subcontent']['totalPage'] = ceil($countVideo / $perPage);
    $this->data['subcontent']['perPage'] = $perPage;
    $this->data['subcontent']['page'] = $page;
    $this->data['subcontent']['offset'] = $offset;
    $this->data['subcontent']['getAllVideo'] = $this->province->getAllVideoList($_GET['sort'], $perPage, $offset, 0);
    $this->render('ClientMasterLayout', $this->data);

    // Lấy dữ liệu đã được render và gửi đến output buffer
    $content = ob_get_clean();  

    // Hiển thị dữ liệu đã được lưu trữ trong output buffer
    echo $content;
  }
  public function detail()
  {
    // Bắt đầu output buffering
    ob_start();
    if (empty($_SESSION['last_view_time'])) {
      $_SESSION['last_view_time'] = time();
    }
    if (!empty($_SESSION['user_id_client'])) {
      $getNameCategory = $this->province->getUserWatched($_SESSION['user_id_client'], $_GET['vdId']);
      if (!$getNameCategory && (time() - $_SESSION['last_view_time']) >= 30) {
        $data = [
          'video_id' => $_GET['vdId'],
          'user_id' => $_SESSION['user_id_client']
        ];
        $this->province->insertView($data);
        unset($_SESSION['last_view_time']);
      }
    }
    if (isset($_POST['like'])) {
      $getUserLike = $this->province->getOneLike($_SESSION['user_id_client'], $_GET['vdId']);
      if ($getUserLike) {
        $this->province->deletedWhereVideoAndUser($_GET['vdId'], $_SESSION['user_id_client']);
      } else {
        $data = [
          'video_id' => $_GET['vdId'],
          'user_id' => $_SESSION['user_id_client']
        ];
        $this->province->insertLike($data);
      }
    } elseif (isset($_POST['dislike'])) {
      $this->province->deletedWhereVideoAndUser($_GET['vdId'], $_SESSION['user_id_client']);
    }
    $countLikeVideoWhereUserAndVideo = $this->province->countLikeVideoWhereUserAndVideo((!empty($_SESSION['user_id_client']) ? $_SESSION['user_id_client'] : 0), $_GET['vdId']);
    $this->data['pages'] = 'pages/Client/Video/Detail';
    $this->data['subcontent']['pages_title'] = 'Xem Video';
    $this->data['subcontent']['video_detail_css'] = '<link rel="stylesheet" href="' . _WEB_ROOT . '/public/client/css/videoDetail.css">';
    $this->data['subcontent']['getVideoDetail'] = $this->province->getVideoDetail($_GET['vdId']);
    $this->data['subcontent']['countViewVideo'] = $this->province->countViewVideo($_GET['vdId']);
    $this->data['subcontent']['countLikeVideo'] = $this->province->countLikeVideo($_GET['vdId']);
    $this->data['subcontent']['getVideoCategory'] = $this->province->getVideoCategoryDetail($_GET['cate'], 0);
    $this->data['subcontent']['getAllVideo'] = $this->province->getAllVideo(0);
    $this->data['subcontent']['countLikeVideoWhereUserAndVideo'] = $countLikeVideoWhereUserAndVideo['count'];
    $this->render('ClientMasterLayout', $this->data);

    // Lấy dữ liệu đã được render và gửi đến output buffer
    $content = ob_get_clean();  

    // Hiển thị dữ liệu đã được lưu trữ trong output buffer
    echo $content;
  }
  public function search()
  {
    // Bắt đầu output buffering
    ob_start();
    $countVideoWhereSearch = $this->province->countVideoWhereSearch($_GET['kw']);
    $page = $_GET['pages'];
    $sort = $_GET['sort'];
    $perPage = 24;
    $offset = ($page - 1) * $perPage;
    $totalPage = ceil($countVideoWhereSearch / $perPage);
    $getVideoSearch = $this->province->getVideoSearch($_GET['kw'], $sort, $perPage, $offset);
    $this->data['pages'] = 'pages/Client/Video/Search';
    $this->data['subcontent']['pages_title'] = 'Tìm Kiếm Video';
    $this->data['subcontent']['totalPage'] = $totalPage;
    $this->data['subcontent']['perPage'] = $perPage;
    $this->data['subcontent']['page'] = $page;
    $this->data['subcontent']['offset'] = $offset + 1;
    $this->data['subcontent']['getVideoSearch'] = $getVideoSearch;
    $this->data['subcontent']['countVideoWhereSearch'] = $countVideoWhereSearch;
    $this->render('ClientMasterLayout', $this->data);

    // Lấy dữ liệu đã được render và gửi đến output buffer
    $content = ob_get_clean();  

    // Hiển thị dữ liệu đã được lưu trữ trong output buffer
    echo $content;
  }
}
