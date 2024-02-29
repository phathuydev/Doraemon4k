<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

set_time_limit(100);
class VideoModel extends BaseModel
{
  public function getAllVideo($perPage, $offset, $video_form)
  {
    $data = $this->getAll('videos INNER JOIN categories ON videos.category_id = categories.category_id WHERE video_form = ' . $video_form . ' LIMIT ' . $perPage . ' OFFSET ' . $offset . '', '*, videos.created_at as created_at_video');
    return $data;
  }
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
  public function getApiMovies($page)
  {
    $h = [
      'api' => 'http://ophim1.com/danh-sach/phim-moi-cap-nhat?page=' . $page,
      'data' => ''
    ];

    $h['data'] = $this->getApiCache($h['api']);
    return $h['data'];
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
  public function getAllVideoWhere($perPage, $offset, $kw, $video_form)
  {
    $data = $this->getJoinLimitWhereLike('videos', 'categories', 'videos.category_id = categories.category_id', 'videos.video_form = ' . $video_form . ' AND videos.video_title', $kw, '' . $perPage . ' OFFSET ' . $offset . '', '*, videos.created_at as created_at_video');
    return $data;
  }
  public function getAllCategory()
  {
    $data = $this->getAll('categories');
    return $data;
  }
  public function insertVideo($data)
  {
    $this->insert('videos', $data);
  }
  public function updateVideo($data, $video_id)
  {
    $this->update('videos', $data, 'video_id', $video_id);
  }
  public function deleteVideo($video_id)
  {
    $this->delete('videos', 'video_id', $video_id);
  }
  public function countAllVideo($video_form)
  {
    $data = $this->count('videos', 'video_id', 'count', 'video_form = :video_form', ['video_form' => $video_form]);
    return $data;
  }
  public function countAllVideoSearch($kw, $video_form)
  {
    $data = $this->count('videos', 'video_id', 'count', 'video_title LIKE :video_title AND video_form = :video_form', ['video_title' => '%' . $kw . '%', 'video_form' => $video_form]);
    return $data;
  }
  public function getVideoEdit($video_id)
  {
    $data = $this->getOne('videos', 'video_id', '=', $video_id, '*');
    return $data;
  }
  public function getVideoSlug($video_slug)
  {
    $data = $this->getOne('videos', 'video_slug', '=', $video_slug, '*');
    return $data;
  }
}
