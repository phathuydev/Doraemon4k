<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Client\VideoModel;
use App\Models\Admin\VideoModel as VideoAdminModel;

class VideoApiController extends BaseController
{
  public $province;
  public $VideoAdminModel;
  public $data = [];
  public function __construct()
  {
    $this->data['subcontent']['videoApi'] = '';
    $this->model('Client', 'VideoModel');
    $this->province = new VideoModel();
    $this->VideoAdminModel = new VideoAdminModel();
  }
  public function index()
  {
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
  }
  public function detail()
  {
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

    $dataDetail = $this->VideoAdminModel->getSlugMovies($_GET['slug']);
    $this->data['subcontent']['data'] = $dataDetail['movie'];
    $this->data['subcontent']['episodes'] = $dataDetail['episodes'][0]['server_data'];
    $this->data['subcontent']['pages_title'] = 'Xem Video';
    $this->data['subcontent']['video_detail_css'] = '<link rel="stylesheet" href="' . _WEB_ROOT . '/public/client/css/videoDetail.css">';
    $this->data['subcontent']['getAllComment'] = $this->province->getAllComment($_GET['vdId'], (!empty($_GET['sort']) ? $_GET['sort'] : 'DESC'));
    $this->data['subcontent']['countCommentVideo'] = $this->province->countCommentVideo($_GET['vdId']);
    $this->data['subcontent']['getVideoDetail'] = $this->province->getVideoDetail($_GET['vdId']);
    $this->data['subcontent']['countViewVideo'] = $this->province->countViewVideo($_GET['vdId']);
    $this->data['subcontent']['countLikeVideo'] = $this->province->countLikeVideo($_GET['vdId']);
    $this->data['subcontent']['getAllVideo'] = $this->province->getAllVideo(1);
    $this->data['subcontent']['current_url'] = "" . _WEB_ROOT . "$_SERVER[REQUEST_URI]";
    $this->data['subcontent']['countLikeVideoWhereUserAndVideo'] = $countLikeVideoWhereUserAndVideo['count'];
    $this->render('ClientMasterLayout', $this->data);
  }
}
