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
    $countVideo = $this->province->countVideo();
    $perPage = 24;
    $page = $_GET['pages'];
    $offset = ($page - 1) * $perPage;
    $this->data['pages'] = 'pages/Client/VideoApi/List';
    $this->data['subcontent']['pages_title'] = 'Tất Cả Video';
    $this->data['subcontent']['totalPage'] = ceil($countVideo / $perPage);
    $this->data['subcontent']['perPage'] = $perPage;
    $this->data['subcontent']['page'] = $page;
    $this->data['subcontent']['offset'] = $offset;
    $this->data['subcontent']['getAllVideo'] = $this->province->getAllVideoList($_GET['sort'], $perPage, $offset);
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
      $this->province->delete('comments', 'comment_id', $_POST['comment_id']);
    } else if (isset($_POST['edit'])) {
      $data = [
        'content' => $_POST['content'],
      ];
      $this->province->update('comments', $data, 'comment_id', $_POST['comment_id']);
    }
    $this->data['pages'] = 'pages/Client/VideoApi/Detail';
    $dataDetail = $this->province->getSlugMovies($_GET['slug']);
    $this->data['subcontent']['data'] = $dataDetail['movie'];
    $this->data['subcontent']['episodes'] = $dataDetail['episodes'][0]['server_data'];
    $this->data['subcontent']['pages_title'] = 'Xem Video';
    $this->data['subcontent']['video_detail_css'] = '<link rel="stylesheet" href="' . _WEB_ROOT . '/public/client/css/videoDetail.css">';
    $this->data['subcontent']['getAllComment'] = $this->province->getAllComment($_GET['vdId'], (!empty($_GET['sort']) ? $_GET['sort'] : 'DESC'));
    $this->data['subcontent']['countCommentVideo'] = $this->province->countCommentVideo($_GET['vdId']);
    $this->data['subcontent']['getVideoDetail'] = $this->province->getVideoDetail($_GET['vdId']);
    $this->data['subcontent']['getAllVideo'] = $this->province->getAllVideo();
    $this->data['subcontent']['current_url'] = "" . _WEB_ROOT . "$_SERVER[REQUEST_URI]";
    $this->render('ClientMasterLayout', $this->data);
  }
  public function search()
  {
    $countVideoWhereSearch = $this->province->countVideoWhereSearch($_GET['kw']);
    $page = $_GET['pages'];
    $sort = $_GET['sort'];
    $perPage = 24;
    $offset = ($page - 1) * $perPage;
    $totalPage = ceil($countVideoWhereSearch / $perPage);
    $getVideoSearch = $this->province->getVideoSearch($_GET['kw'], $sort, $perPage, $offset);
    $this->data['pages'] = 'pages/Client/VideoApi/Search';
    $this->data['subcontent']['pages_title'] = 'Tìm Kiếm Video';
    $this->data['subcontent']['totalPage'] = $totalPage;
    $this->data['subcontent']['perPage'] = $perPage;
    $this->data['subcontent']['page'] = $page;
    $this->data['subcontent']['offset'] = $offset + 1;
    $this->data['subcontent']['getVideoSearch'] = $getVideoSearch;
    $this->data['subcontent']['countVideoWhereSearch'] = $countVideoWhereSearch;
    $this->render('ClientMasterLayout', $this->data);
  }
}
