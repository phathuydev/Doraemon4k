<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Client\VideoModel;

class VideoApiController extends BaseController
{
  public $province;
  public $data = [];
  public function __construct()
  {
    $this->data['subcontent']['videoApi'] = '';
    $this->model('Client', 'VideoModel');
    $this->province = new VideoModel();
  }
  public function index()
  {
    // Bắt đầu output buffering
    ob_start();
    $countVideo = $this->province->countVideo(1);
    $perPage = 24;
    $page = $_GET['pages'];
    $offset = ($page - 1) * $perPage;
    $this->data['pages'] = 'pages/Client/VideoApi/List';
    $this->data['subcontent']['pages_title'] = 'Tất Cả Video';
    $this->data['subcontent']['totalPage'] = ceil($countVideo / $perPage);
    $this->data['subcontent']['perPage'] = $perPage;
    $this->data['subcontent']['page'] = $page;
    $this->data['subcontent']['offset'] = $offset;
    $this->data['subcontent']['getAllVideo'] = $this->province->getAllVideoList($_GET['sort'], $perPage, $offset, 1);
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
    if (isset($_POST['comment'])) {
      $data = [
        'user_id' => $_SESSION['user_id_client'],
        'video_id' => $_GET['vdId'],
        'content' => $_POST['content']
      ];
      $this->province->insert('comments', $data);
    } else if (isset($_POST['reply'])) {
      $data = [
        'user_id' => $_SESSION['user_id_client'],
        'video_id' => $_GET['vdId'],
        'content' => $_POST['content_reply'],
        'parent_id' => $_POST['parent_id'],
        'grandParent_id' => (isset($_POST['grandparent_id']) ? $_POST['grandparent_id'] : 0),
        'user_id_reply' => (isset($_POST['user_id_reply']) ? $_POST['user_id_reply'] : 0),
      ];
      $this->province->insert('comments', $data);
    } else if (isset($_POST['delete'])) {
      $this->province->delete('comments', 'comment_id', '' . $_POST['comment_id'] . ' AND user_id = ' . $_SESSION['user_id_client'] . ' AND video_id = ' . $_GET['vdId'] . '');
    } else if (isset($_POST['edit'])) {
      $data = [
        'content' => $_POST['content'],
      ];
      $this->province->update('comments', $data, 'comment_id', $_POST['comment_id']);
    } 
    $countLikeVideoWhereUserAndVideo = $this->province->countLikeVideoWhereUserAndVideo((!empty($_SESSION['user_id_client']) ? $_SESSION['user_id_client'] : 0), $_GET['vdId']);
    $this->data['pages'] = 'pages/Client/VideoApi/Detail';
    $urlDetail = 'https://ophim1.com/phim/' . $_GET['slug'] . '';
    $responseDetail = file_get_contents($urlDetail);
    $dataDetail = json_decode($responseDetail, true);
    $this->data['subcontent']['data'] = $dataDetail['movie'];
    $this->data['subcontent']['episodes'] = $dataDetail['episodes'][0]['server_data'];
    $this->data['subcontent']['pages_title'] = 'Xem Video';
    $this->data['subcontent']['video_detail_css'] = '<link rel="stylesheet" href="' . _WEB_ROOT . '/public/client/css/videoDetail.css">';
    $this->data['subcontent']['getAllComment'] = $this->province->getAllComment($_GET['vdId'], (!empty($_GET['sort']) ? $_GET['sort'] : 'DESC'));
    $this->data['subcontent']['getVideoDetail'] = $this->province->getVideoDetail($_GET['vdId']);
    $this->data['subcontent']['countViewVideo'] = $this->province->countViewVideo($_GET['vdId']);
    $this->data['subcontent']['countLikeVideo'] = $this->province->countLikeVideo($_GET['vdId']);
    $this->data['subcontent']['getAllVideo'] = $this->province->getAllVideo(1);
    $this->data['subcontent']['countLikeVideoWhereUserAndVideo'] = $countLikeVideoWhereUserAndVideo['count'];
    $this->render('ClientMasterLayout', $this->data);

    // Lấy dữ liệu đã được render và gửi đến output buffer
    $content = ob_get_clean();

    // Hiển thị dữ liệu đã được lưu trữ trong output buffer
    echo $content;
  }
}
