<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class VideoModel extends BaseModel
{
  public function getAllVideo($perPage, $offset)
  {
    $data = $this->getAll('videos LIMIT ' . $perPage . ' OFFSET ' . $offset . '', '*, videos.created_at as created_at_video');
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
  public function deleteVideos($is_deleted, $video_id)
  {
    $data = [
      'is_deleted' => $is_deleted,
    ];
    $this->update('videos', $data, 'video_id', $video_id);
  }
  public function getAllVideoWhere($perPage, $offset, $kw)
  {
    $data = $this->getAll("videos WHERE video_title LIKE '%$kw%' LIMIT $perPage OFFSET $offset", '*');
    return $data;
  }
  public function countAllVideo()
  {
    $data = $this->count('videos', 'video_id', 'count');
    return $data;
  }
  public function countAllVideoSearch($kw)
  {
    $data = $this->count('videos', 'video_id', 'count', 'video_title LIKE :video_title', ['video_title' => '%' . $kw . '%']);
    return $data;
  }
  public function getVideoSlug($video_slug)
  {
    $data = $this->getOne('videos', 'video_slug', '=', $video_slug, '*');
    return $data;
  }
}
