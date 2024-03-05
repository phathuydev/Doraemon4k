<?php

namespace App\Models\Client;

use App\Models\BaseModel;

set_time_limit(100);
class VideoModel extends BaseModel
{
  public function getApiCache($url)
  {
    $cacheFile = 'cache/' . md5($url) . '.json';
    $cacheTime = 259200;
    if (file_exists($cacheFile) && time() - fileatime($cacheFile) < $cacheTime) {
      $data = file_get_contents($cacheFile);
      return json_decode($data, true);
    }
    $apiResponse = file_get_contents($url);
    file_put_contents($cacheFile, $apiResponse);
    return json_decode($apiResponse, true);
  }
  public function getSlugMovies($slug)
  {
    $h = [
      'slug' => "http://ophim1.com/phim/" . $slug,
      'data' => ''
    ];

    $h['data'] = $this->getApiCache($h['slug']);
    return $h['data'];
  }
  public function getAllVideoList($orderBy, $perPage, $offset, $video_form)
  {
    $data = $this->getAll('videos WHERE video_form = ' . $video_form . ' AND is_deleted = 0 ORDER BY created_at ' . $orderBy . ' LIMIT ' . $perPage . ' OFFSET ' . $offset . '');
    return $data;
  }
  public function getAllVideo($video_form)
  {
    $data = $this->getAll('videos WHERE video_form = ' . $video_form . ' AND is_deleted = 0 ORDER BY created_at DESC');
    return $data;
  }
  public function countCommentVideo($video_id)
  {
    $data = $this->getOne('comments', 'parent_id = 0 AND grandParent_id = 0 AND video_id', '=', $video_id, 'COUNT(video_id) as count');
    return $data;
  }
  public function getAllComment($video_id, $order_by = 'DESC')
  {
    $data = $this->getAll('comments INNER JOIN users ON comments.user_id = users.user_id WHERE video_id = ' . $video_id . ' AND parent_id = 0 AND user_id_reply = 0 ORDER BY comments.created_at ' . $order_by . '');
    return $data;
  }
  public function getCommentReply($video_id, $parent_id)
  {
    $data = $this->getAll('comments INNER JOIN users ON comments.user_id = users.user_id WHERE video_id = ' . $video_id . ' AND parent_id = ' . $parent_id . ' AND grandParent_id = 0 AND user_id_reply = 0');
    return $data;
  }
  public function getGrandParentComment($video_id, $grandParent_id)
  {
    $data = $this->getAll('comments INNER JOIN users ON comments.user_id = users.user_id WHERE video_id = ' . $video_id . ' AND grandParent_id = ' . $grandParent_id . '');
    return $data;
  }
  public function getNameReply($user_id)
  {
    $data = $this->getAll('users WHERE user_id = ' . $user_id . '');
    return $data;
  }
  public function getVideoDetail($video_id)
  {
    $data = $this->getOne('videos INNER JOIN categories ON videos.category_id = categories.category_id', 'videos.video_id', '=', $video_id, '*, videos.created_at as created_at_video');
    return $data;
  }
  public function getVideoCategoryDetail($category_id, $video_form)
  {
    $data = $this->getAll('videos WHERE category_id = ' . $category_id . ' AND video_form = ' . $video_form . '');
    return $data;
  }
  public function getVideoSearch($keyword, $orderBy, $perPage, $offset)
  {
    $data = $this->getAll('videos WHERE video_title LIKE "' . '%' . $keyword . '%' . '"  AND is_deleted = 0 ORDER BY created_at ' . $orderBy . ' LIMIT ' . $perPage . ' OFFSET ' . $offset . '');
    return $data;
  }
  public function countVideo($video_form)
  {
    $data = $this->count('videos', 'video_id', 'count', 'video_form = :video_form AND is_deleted = :is_deleted', ['video_form' => $video_form, 'is_deleted' => '0']);
    return $data;
  }
  public function countVideoWhereSearch($keyword)
  {
    $data = $this->count('videos', 'video_id', 'count', 'video_title LIKE :keyword AND is_deleted = :is_deleted', ['keyword' => '%' . $keyword . '%', 'is_deleted' => '0']);
    return $data;
  }
  public function countViewVideo($video_id)
  {
    $data = $this->count('views', 'view_id', 'count', 'video_id = :video_id', ['video_id' => $video_id]);
    return $data;
  }
  public function countLikeVideo($video_id)
  {
    $data = $this->count('likes', 'like_id', 'count', 'video_id = :video_id', ['video_id' => $video_id]);
    return $data;
  }
  public function countLikeVideoWhereUserAndVideo($user_id, $video_id)
  {
    $data = $this->getAll('likes WHERE user_id = ' . $user_id . ' AND video_id = ' . $video_id . '', 'COUNT(like_id) as count');
    return $data;
  }
  public function getUserWatched($user_id, $video_id)
  {
    $data = $this->getAll('views WHERE user_id = ' . $user_id . ' AND video_id = ' . $video_id . '', '*');
    return $data;
  }
  public function getOneLike($user_id, $video_id)
  {
    $data = $this->getAll('likes WHERE user_id = ' . $user_id . ' AND video_id = ' . $video_id . '', '*');
    return $data;
  }
  public function insertLike($data)
  {
    $this->insert('likes', $data);
  }
  public function deletedWhereVideoAndUser($video_id, $user_id)
  {
    $this->delete('likes', 'video_id', '' . $video_id . ' AND user_id = ' . $user_id . '');
  }
  public function insertView($data)
  {
    $this->insert('views', $data);
  }
  public function getUserSignin($email)
  {
    $data = $this->getOne('users', 'user_email', '=', $email);
    return $data;
  }
}
